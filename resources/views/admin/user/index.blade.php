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
           


            <div class="mb-3">
                <form action="{{ url('admin/users') }}" method="GET" class="d-flex justify-content-between">
               
                    <input type="text" name="search" class="form-control" placeholder="Search by User Name or Email" value="{{ request('search') }}">
                    <button type="submit" class="btn btn-primary ms-2">Search</button>
                </form>
        </div>

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
