@extends('admin.layout.layout')

@section('create')
    <div class="mx-2">
        <div class="bg-primary py-3 rounded-top">
            <div class="col-12 px-2">
                <h3 class="text-white">Upload new Blog</h3>
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
                                    <option value="">Choose Category</option>
                                    <option value="visual designs">Visual Designs</option>
                                    <option value="travel events">Travel Events</option>
                                    <option value="web development">Web Development</option>
                                    <option value="video and audio">Video and Audio</option>
                                </select>
                                @error('category')
                                    <div class="my-1 p-2">
                                        <span class="alert-danger">{{$message}}</span>
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group col-md-4 col-12">
                                <label for="title">Title</label>
                                <input type="text" name="title" id="title" class="form-control" placeholder="Title">
                                @error('title')
                                    <div class="my-1 p-2">
                                        <span class="alert-danger">{{$message}}</span>
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group col-12 my-2">
                                <textarea name="blog" id="blog" cols="30" rows="10" class=""></textarea>
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