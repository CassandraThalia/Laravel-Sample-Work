@extends('layouts.app')

@section('content')

    <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Admin Users</div>

                <div class="card-body">

                    <form id="createBtn" action="users/create">
                        <button type="submit" class="btn btn-success col-md-12 m-2">Create New Admin User</button>
                    </form>

                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">ID#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Roles</th>
                            <th scope="col">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($adminUsers as $user)
                            <tr>
                                <th scope="row">{{$user->id}}</th>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                <td>
                                    @foreach ($user->roles as $role)
                                        <p>{{$role->name}}</p>
                                    @endforeach
                                </td>
                                <td class="btn-group">
                                    <form action="/admin/users/{{ $user->id }}" method="get">
                                        <button type="submit" class="btn btn-success m-2">View</button>
                                    </form>

                                    <form action="/admin/users/{{ $user->id }}/edit" method="get">
                                        <button type="submit" class="btn btn-warning m-2">Edit</button>
                                    </form>

                                    <form action="/admin/users/{{ $user->id }}" method="post">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit" class="btn btn-danger m-2">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <p>No Authenticated Users</p>
                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
