@extends('layouts.master')

@section('title', 'Edit Store')
@section('content')

<div class="container-fluid px-4">
    <div class="card mt-4">
        <div class="card-header">
            <h4 class="mt-4">Edit Store</h4>
        </div>
        <div class="card-body">

            @if ($errors->any())
            <div class="alert alert-danger">
                @foreach ($errors->all() as $error)
                <div>{{ $error }}</div>
                @endforeach
            </div>
            @endif

            <form method="POST" action="{{ route('admin.stores.update', $store->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="name">Store Name</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $store->name) }}" required>
                </div>

                <div class="mb-3">
                    <label for="address">Store Address</label>
                    <input type="text" class="form-control" id="address" name="address" value="{{ old('address', $store->address) }}">
                </div>

                <div class="mb-3">
                    <label for="description">Description</label>
                    <textarea class="form-control" id="description" name="description" rows="5">{{ old('description', $store->description) }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="image">Store Image</label>
                    <input type="file" class="form-control" id="image" name="image">
                    @if($store->image)
                    <img src="{{ asset('storage/'.$store->image) }}" width="100px" height="100px" alt="Current Image">
                    @endif
                </div>

               
                <div class="row">
                    

                    <div class="col-md-6">
                        <button type="submit" class="btn btn-primary">Update Store</button>
                    </div>
                </div>
            </form>

        </div>
    </div>
</div>

@endsection
