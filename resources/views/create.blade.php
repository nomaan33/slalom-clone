<!-- resources/views/admin/blogs/create.blade.php -->

@extends('layouts.main')
@section('main-container')
    

    <!-- Content -->
    <div class="content">
        <!-- Header -->
        <div class="header">
            <h1>Blog</h1>
        </div>
<div class="container">
    <h1 class="mb-4">Add New Blog</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('blogs.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label for="name">Title</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}" required>
        </div>
        <div class="form-group">
            <label for="industry_id">Industry</label>
            <select name="industry_id" id="industry_id" class="form-control" required>
                <option value="">Select Industry</option>
                @foreach($industries as $industry)
                    <option value="{{ $industry->id }}" {{ (old('industry_id') ?? $blog->industry_id ?? '') == $industry->id ? 'selected' : '' }}>
                        {{ $industry->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="service_id">Services</label>
            <select name="service_id" id="service_id" class="form-control" required>
                <option value="">Select Services</option>
                @foreach($services as $service)
                    <option value="{{ $service->id }}" {{ (old('service_id') ?? $blog->service_id ?? '') == $service->id ? 'selected' : '' }}>
                        {{ $service->service_name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" id="description" class="form-control" rows="5" required>{{ old('description') }}</textarea>
        </div>

        <div class="form-group">
            <label for="image">Image</label>
            <input type="file" name="image" id="image" class="form-control-file">
        </div>

        <button type="submit" class="btn btn-primary">Add Blog</button>
    </form>
</div>
@endsection
