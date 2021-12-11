@extends('admin.layout.layout')

@section('blogs')
    <div class="mx-2">
        <div class="bg-primary py-3 rounded-top">
            <div class="row">
                <div class="col-4 px-4">
                    <a href="{{route('create')}}" class="btn btn-outline-light">Create New</a>
                </div>
                <div class="col-4">
                    @if (session()->has('success-blog'))
                        <div class="alert-success px-2">
                            {{ session()->get('success-blog') }}
                        </div>
                     @endif
                </div>
                <div class="col-4 text-right px-4">
                    <a href="{{route('logout')}}" class="btn btn-outline-light">Logout</a>
                </div>
            </div>
        </div>
        <div class="bg-white py-3">
            <div class="row">
                <div class="col-12 my-2">
                    <table class="table table-hover table-responsive">
                        <thead>
                        <tr>
                            <th scope="col">Category</th>
                            <th scope="col">Title</th>
                            <th scope="col">Blog</th>
                            <th scope="col">Created at</th>
                            <th scope="col">Updated at</th>
                            <th scope="col">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach ($blogs as $blog)
                                <tr>
                                    <td>{{$blog->category}}</td>
                                    <td>{{$blog->title}}</td>
                                    <td class="text-truncate px-1"  style="max-width: 250px;">{!! $blog->blog !!}</td>
                                    <td>{{$blog->created_at}}</td>
                                    <td>{{$blog->updated_at}}</td>
                                    <td>
                                        <a href="{{route('edit',$blog->id)}}" class="btn btn-outline-warning btn-sm">Edit</a>
                                        <a href="{{route('destroy',$blog->id)}}" class="btn btn-outline-danger btn-sm">Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <nav aria-label="Page navigation my-5">
        <ul class="pagination px-2">
            {{$blogs->links()}}
        </ul>
    </nav>
@endsection