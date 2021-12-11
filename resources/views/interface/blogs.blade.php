@extends('interface.layout.layout')

@section('blogs')

   

    <div class="row">
        @foreach ($blogs as $blog)
            <div class="col-md-6">
                <hr class="tm-hr-primary">
                <a href="{{route('post', $blog->id)}}" class="effect-lily tm-post-link tm-pt-60">
                    <div class="tm-post-link-inner">
                        <img src="{{asset('blog-images/'.$blog->image)}}" alt="Image" class="" width="500" height="300">                            
                    </div>
                    <h2 class="tm-pt-30 tm-color-primary tm-post-title">{{$blog->title}}</h2>
                </a>                    
                <p class="tm-pt-30">
                    {{ \Illuminate\Support\Str::words(strip_tags($blog->blog), 50 ) }}
                </p>

                <div class="d-flex justify-content-between tm-pt-45">
                    <span class="tm-color-primary text-capitalize">{{$blog->category}}</span>
                    <span class="tm-color-primary">{{$blog->created_at}}</span>
                </div>
                <hr>
                <div class="d-flex justify-content-between">
                    <span>by Kamran Khan</span>
                </div>
            </div>
        @endforeach
    </div>
    

    <div class="row tm-row tm-mt-100 tm-mb-75">
        <div class="tm-prev-next-wrapper">
            {{$blogs->links()}}
            
        </div>                
    </div>   

    <div class="row tm-row tm-mb-120">
        <div class="col-12">
            <h2 class="tm-color-primary tm-post-title tm-mb-60">Contact Us</h2>
        </div>
        <div class="col-md-10 col-sm-12">
            <form method="POST" action="{{route('contactus')}}">
                @csrf                      
                <div class="form-group row mb-4">
                    <label for="name" class="col-sm-3 col-form-label text-right tm-color-primary">Name</label>
                    <div class="col-sm-9">
                        <input class="form-control mr-0 ml-auto" name="name" id="name" type="text" required>                            
                    </div>
                </div>
                <div class="form-group row mb-4">
                    <label for="email" class="col-sm-3 col-form-label text-right tm-color-primary">Email</label>
                    <div class="col-sm-9">
                        <input class="form-control mr-0 ml-auto" name="email" id="email" type="email" required>
                    </div>
                </div>
                <div class="form-group row mb-4">
                    <label for="subject" class="col-sm-3 col-form-label text-right tm-color-primary">Subject</label>
                    <div class="col-sm-9">
                        <input class="form-control mr-0 ml-auto" name="subject" id="subject" type="text" required>
                    </div>
                </div>
                <div class="form-group row mb-5">
                    <label for="message" class="col-sm-3 col-form-label text-right tm-color-primary">Message</label>
                    <div class="col-sm-9">
                        <textarea class="form-control mr-0 ml-auto" name="message" id="message" rows="8" required></textarea>                                
                    </div>
                </div>
                <div class="form-group row text-right">
                    <div class="col-12">
                        <button class="tm-btn tm-btn-primary tm-btn-small">Submit</button>                        
                    </div>                            
                </div>                                
            </form>
        </div>
    </div> 

@endsection

