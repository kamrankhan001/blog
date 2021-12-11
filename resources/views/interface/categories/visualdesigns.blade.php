@extends('interface.layout.layout')

@section('visual')

   

    <div class="row">
        @foreach ($blogs as $blog)
            <div class="col-md-6">
                <hr class="tm-hr-primary">
                <a href="{{route('post', $blog->id)}}" class="effect-lily tm-post-link tm-pt-60">
                    <div class="tm-post-link-inner">
                        <img src="{{asset('blog-images/'.$blog->image)}}" alt="Image" class="img-fluid">                            
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
@endsection