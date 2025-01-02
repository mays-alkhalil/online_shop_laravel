@extends ('layouts.master')

@section('title', 'Category')
@section('content')

<div class="container-fluid px-4">
    <div class="card mt-4">
        <div class="card-header">
            <h4 class="mt-4">Add Category</h4>
        </div>
        <div class="card-body">

            @if ($errors->any())
                <div class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        <div>{{ $error }}</div>
                    @endforeach
                </div>
            @endif

            <form method="POST" action="{{ url('admin/add-category') }}" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="name">Category Name</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>

               

                <div class="mb-3">
                    <label for="description">Description</label>
                    <textarea class="form-control" id="description" name="description" rows="5"></textarea>
                </div>

                <div class="mb-3">
                    <label for="image">Image</label>
                    <input type="file" class="form-control" id="image" name="image" required>
                </div>

</div>

           

                    <div class="col-md-6">
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
