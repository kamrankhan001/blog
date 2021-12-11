@extends('admin.layout.layout')

@section('edit')
    <div class="mx-2">
        <div class="bg-primary py-3 rounded-top">
            <div class="col-12 px-2">
                <h3 class="text-white">Edit Blog</h3>
            </div>
        </div>
        <div class="bg-white py-3">
            <div class="row">
                <div class="col-12 my-2">
                    <form action="#" method="POST" enctype="multipart/form-data" class="px-2">
                        @csrf
                        <div class="row">
                            <div class="form-group col-md-4 col-12">
                                <label for="image">Image</label>
                                <input type="file" name="image" id="image" class="form-control">
                                @error('image')
                                    <div class="my-1 p-2">
                                        <span class="alert-danger">{{$message}}</span>
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group col-md-4 col-12">
                                <label for="image">Category</label>
                                <select name="category" id="category" class="form-control">
                                    @if (isset($blog) and $blog->category === 'visual designs')
                                        <option value="visual designs" selected>Visual Designs</option>
                                        <option value="travel events">Travel Events</option>
                                        <option value="web development">Web Development</option>
                                        <option value="video and audio">Video and Audio</option>
                                    @endif
                                    @if (isset($blog) and $blog->category === 'travel events')
                                        <option value="travel events" selected>Travel Events</option>
                                        <option value="visual designs">Visual Designs</option>
                                        <option value="web development">Web Development</option>
                                        <option value="video and audio">Video and Audio</option>
                                    @endif
                                    @if (isset($blog) and $blog->category === 'web development')
                                        <option value="travel events">Travel Events</option>
                                        <option value="visual designs">Visual Designs</option>
                                        <option value="web development" selected>Web Development</option>
                                        <option value="video and audio">Video and Audio</option>
                                    @endif
                                    @if (isset($blog) and $blog->category === 'video and audio')
                                        <option value="travel events">Travel Events</option>
                                        <option value="visual designs">Visual Designs</option>
                                        <option value="web development">Web Development</option>
                                        <option value="video and audio" selected>Video and Audio</option>
                                    @endif
                                </select>
                                @error('category')
                                    <div class="my-1 p-2">
                                        <span class="alert-danger">{{$message}}</span>
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group col-md-4 col-12">
                                <label for="title">Title</label>
                                <input type="text" name="title" id="title" class="form-control" placeholder="Title" @if (isset($blog)) value="{{$blog->title}}" @endif>
                                @error('title')
                                    <div class="my-1 p-2">
                                        <span class="alert-danger">{{$message}}</span>
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group col-12 my-2">
                                <textarea name="blog" id="blog" cols="30" rows="10" class="form-control">
                                    @if (isset($blog)) {{$blog->blog}} @endif
                                </textarea>
                                @error('blog')
                                    <div class="my-1 p-2">
                                        <span class="alert-danger">{{$message}}</span>
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group col-12 my-2">
                                <input type="submit" value="Upload" class="btn btn-outline-primary">
                                <a href="{{route('blogs')}}" class="btn btn-outline-danger">Cancel</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection