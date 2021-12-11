@extends('interface.layout.layout')

@section('post')
    <div class="row tm-row">
        <div class="col-12">
            <hr class="tm-hr-primary tm-mb-55">
            <img src="{{asset('blog-images/'.$blog->image)}}" alt="Image" class="img-fluid">
        </div>
    </div>
    <div class="row tm-row">
        <div class="col-lg-8 tm-post-col">
            <div class="tm-post-full">                    
                <div class="mb-4">
                    <h2 class="pt-2 tm-color-primary tm-post-title">{{$blog->title}}</h2>
                    <p class="tm-mb-40">{{$blog->created_at}} by Kamran Khan</p>
                    <p>
                        {{strip_tags($blog->blog)}}
                    </p>
                    <span class="d-block text-right tm-color-primary text-capitalize">{{$blog->category}}</span>
                </div>
            </div>
        </div>
        <aside class="col-lg-4 tm-aside-col">
            <div class="tm-post-sidebar">
                <hr class="mb-3 tm-hr-primary">
                <h2 class="mb-4 tm-post-title tm-color-primary">Categories</h2>
                <ul class="tm-mb-75 pl-5 tm-category-list">
                    <li><a href="{{route('visualdesigns')}}" class="tm-color-primary">Visual Designs</a></li>
                    <li><a href="{{route('travelevents')}}" class="tm-color-primary">Travel Events</a></li>
                    <li><a href="{{route('webdevelopment')}}" class="tm-color-primary">Web Development</a></li>
                    <li><a href="{{route('videoandaudio')}}" class="tm-color-primary">Video and Audio</a></li>
                </ul>
                <hr class="mb-3 tm-hr-primary">
                <h2 class="tm-mb-40 tm-post-title tm-color-primary">Related Posts</h2>
                @foreach ($related as $blog) 
                    <a href="{{route('post', $blog->id)}}" class="d-block tm-mb-40">
                        <figure>
                            <img src="{{asset('blog-images/'.$blog->image)}}" alt="Image" class="mb-3 img-fluid">
                            <figcaption class="tm-color-primary">{{ \Illuminate\Support\Str::words(strip_tags($blog->blog), 50 ) }}</figcaption>
                        </figure>
                    </a>
                @endforeach
            </div>                    
        </aside>
    </div>
@endsection