@extends('layouts.main')
@section('main-container')

<div class="content">
        <!-- Header -->
        <div class="header">
            <h1>Blog</h1>
        </div>

        <!-- Main Content Area -->
        <div class="container">
        <div class="d-flex justify-content-between">
  <div class="p-2 bd-highlight"><h1 class="mb-4">Blog List</h1></div>
  <div class="p-2 bd-highlight"><a  type="button" href="{{route('blogs.create')}}">Add Blog</a></div>
</div>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Sr. No.</th>
                        <th>Name</th>
                        <th>Industry</th>
                        <th>Service</th>
                        <th>image</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($blogs as $blog)
                    <tr>
                        <td>{{ $blog->id }}</td>
                        <td>{{ $blog->name }}</td>
                        <td>{{ $blog->industry->name ?? 'N/A' }}</td>
                        <td>{{ $blog->service->service_name ?? 'N/A' }}</td>
                        <td>
                        @if($blog->image)
                        <img src="{{ asset('storage/' . $blog->image) }}" width="100">
                        @else
                        No Image
                        @endif
                    </td>
                    <td>
                <a href="{{ route('blogs.edit', $blog->id) }}" class="btn btn-primary">Edit</a>
                <form action="{{ route('blogs.destroy', $blog->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection