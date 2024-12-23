{{-- @extends('layouts.master')

@section('title', 'Add Product')

@section('content')
<div class="container-fluid px-4">
    <div class="card mt-4">
        <div class="card-header">
            <h4>Add Product</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="name">Product Name</label>
                    <input type="text" name="name" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="description">Description</label>
                    <textarea name="description" class="form-control"></textarea>
                </div>
                <div class="mb-3">
                    <label for="price">Price</label>
                    <input type="number" name="price" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="category_id">Category</label>
                    <select name="category_id" class="form-control" required>
                        <option value="">Select Category</option>
                        @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="image">Product Image</label>
                    <input type="file" name="image" class="form-control">
                </div>

                
                <div>
                    <button type="submit" class="btn btn-primary">Add Product</button>
                </div>


                
            </form>
        </div>
    </div>
</div>
@endsection --}}



@extends('layouts.master')

@section('title', 'Add Product')

@section('content')
<div class="container-fluid px-4">
    <div class="card mt-4">
        <div class="card-header">
            <h4>Add Product</h4>
        </div>
        <div class="card-body">
            @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="name">Product Name</label>
                    <input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
                    @error('name')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="description">Description</label>
                    <textarea name="description" class="form-control" required>{{ old('description') }}</textarea>
                    @error('description')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="price">Price</label>
                    <input type="number" name="price" class="form-control" value="{{ old('price') }}" step="0.01" required>
                    @error('price')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="category_id">Category</label>
                    @if($categories->count() > 0)
                    <select name="category_id" class="form-control" required>
                        <option value="">Select Category</option>
                        @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                        @endforeach
                    </select>
                    @else
                    <p class="text-danger">No categories available. Please create a category first.</p>
                    @endif
                    @error('category_id')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="image">Product Image</label>
                    <input type="file" name="image" class="form-control">
                    @error('image')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <!-- New Fields: Store, Color, Size -->
                <div class="mb-3">
                    <label for="store_id">Store</label>
                    @if($stores->count() > 0)
                    <select name="store_id" class="form-control" required>
                        <option value="">Select Store</option>
                        @foreach($stores as $store)
                        <option 
                            value="{{ $store->id }}" 
                            {{ old('store_id', $store->id == 1 ? $store->id : '') == $store->id ? 'selected' : '' }}>
                            {{ $store->name }}
                        </option>
                        @endforeach
                    </select>
                    @else
                    <p class="text-danger">No stores available. Please create a store first.</p>
                    @endif
                    @error('store_id')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                

                <div class="mb-3">
                    <label for="color">Color</label>
                    <input type="text" name="color" class="form-control" value="{{ old('color') }}" required>
                    @error('color')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="size">Size</label>
                    <input type="text" name="size" class="form-control" value="{{ old('size') }}" required>
                    @error('size')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="d-flex justify-content-between">
                    <button type="submit" class="btn btn-primary">Add Product</button>
                    <button type="reset" class="btn btn-secondary">Reset</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection




