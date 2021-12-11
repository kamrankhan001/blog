<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog;
use Mail;

class BlogController extends Controller
{
    public function index(){
        $blogs = Blog::simplePaginate(4);
        return view('admin.blogs', ['blogs'=>$blogs]);
    }

    public function create(){
        
        return view('admin.create');
    }

    public function store(Request $request){
        $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'category' => ['required', 'string', 'max:255'],
            'image' => ['required', 'image' ,'mimes:jpg,png,jpeg', 'max:2048'],
            'blog' => ['required']
        ]);
        
        if ($request->hasFile('image')) {
            $newImageName = time() . '-' . $request->title . '.' . $request->image->extension();
            $request->image->move(public_path('blog-images'), $newImageName);
            
            Blog::create([
                'title' => $request->title,
                'blog' => $request->blog,
                'category' => $request->category,
                'image' => $newImageName,
            ]);
        }

        return redirect(route('blogs'))->with("success-blog", "Blog Uploaded successfully");
    }

    public function edit($id){
        $blog = Blog::find($id);
        return view('admin.edit', ['blog'=>$blog]);
    }

    public function update(Request $request, $id){
        $record = Blog::find($id);

        $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'category' => ['required', 'string', 'max:255'],
            'image' => ['image', 'mimes:jpg,png,jpeg', 'max:2048'],
            'blog' => ['required']
        ]);
        
        if($request->hasFile('image')){
            $image = $record->image;
            unlink('blog-images/'.$image);
            $newImageName = time() . '-' . $request->title . '.' . $request->image->extension();
            $request->image->move(public_path('blog-images'), $newImageName);
            $record->image = $newImageName;
        }



        $record->title = $request->title;
        $record->category = $request->category;
        $record->blog = $request->blog;

        $record->save();

        return redirect(route('blogs'))->with("success-blog", "Blog Updated successfully");

    }

    public function destroy($id){
        $record = Blog::find($id);
        $image = $record->image;
        unlink('blog-images/'.$image);
        $record->delete();
        return redirect(route('blogs'))->with("success-blog", "Blog Deleted successfully");
    }

    public function show_all_blog(){
        $blogs = Blog::orderBy('id', 'desc')->simplePaginate(4);
        return view('interface.blogs', ['blogs'=>$blogs]);
    }

    public function show_blog($id){
        $blog = Blog::find($id);
        $category = $blog->category;
        $related = Blog::where('category', '=', $category)->where('id', '!=', $id)->paginate(3);
        return view('interface.post', ['blog'=>$blog, 'related'=>$related]);
    }

    public function visual_designs(){
        $blogs = Blog::orderBy('id', 'desc')->where('category', '=', 'visual designs')->paginate(6);
        return view('interface.categories.visualdesigns', ['blogs'=>$blogs]);
    }

    public function video_and_audio(){
        $blogs = Blog::orderBy('id', 'desc')->where('category', '=', 'video and audio')->paginate(6);
        return view('interface.categories.videoandaudio', ['blogs'=>$blogs]);
    }

    public function web_development(){
        $blogs = Blog::orderBy('id', 'desc')->where('category', '=', 'web development')->paginate(6);
        return view('interface.categories.webdevelopment', ['blogs'=>$blogs]);
    }

    public function travel_events(){
        $blogs = Blog::orderBy('id', 'desc')->where('category', '=', 'travel events')->paginate(6);
        return view('interface.categories.travelevents', ['blogs'=>$blogs]);
    }

    public function contact_us(Request $request){
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email'],
            'subject'=> ['required', 'string', 'max:255'],
            'message' => ['required']
         ]);

        \Mail::send('contact.mail', array(
            'name' => $request->name,
            'email' => $request->email,
            'subject' => $request->subject,
            'user_query' => $request->message,
        ), function($message) use ($request){
            $message->from($request->email);
            $message->to('oliverqueen00300@gmail.com', 'Admin')->subject($request->subject);
        });

        return redirect(route('home'))->with('message', 'We have received your message and would like to thank you for writing to us.');
    }
}
