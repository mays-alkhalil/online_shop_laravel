@extends('layouts.master')

@section('title', 'View Users')
@section('content')

<div class="container-fluid px-4">
    <div class="card mt-4">
        <div class="card-header">
            <h4>View Users
                <!-- <a href="{{ url('admin/add-user') }}" class="btn btn-primary btn-sm float-end">Add User</a> -->
            </h4>
        </div>

        <div class="card-body">
            @if(session('message'))
                <div class="alert alert-success">{{ session('message') }}</div>
            @endif

            <!-- نموذج البحث -->
            <form action="{{ url('admin/users') }}" method="GET" class="mb-3">
                <div class="row">
                    <div class="col-12 col-md-6">
                        <input type="text" name="search" class="form-control" placeholder="Search by User Name or Email" value="{{ request('search') }}">
                    </div>
                    <div class="col-12 col-md-6 mt-2 mt-md-0">
                        <button type="submit" class="btn btn-primary w-100">Search</button>
                    </div>
                </div>
            </form>

            <!-- جدول المستخدمين -->
            <div class="table-responsive">
                <table class="table table-bordered" id="myDataTable">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>User Name</th>
                            <th>Email</th>
                            <th>Role</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    {{ $user->role_as == '1' ? 'Admin' : ($user->role_as == '2' ? 'Store' : 'User') }}
                                </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!-- روابط الباجينيشن هنا -->
            <div class="pagination">
                {!! $users->links('pagination::bootstrap-4') !!} <!-- رابط الباجينيشن مع Bootstrap 4 -->
            </div>

        </div>
    </div>
</div>

@endsection
