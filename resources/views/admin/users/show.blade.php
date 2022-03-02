@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">{{$user->name}}'s Info</div>

                    <div class="card-body">

                        <strong>Name</strong>
                        <p>{{ $user->name }}</p>

                        <strong>Email</strong>
                        <p>{{ $user->email }}</p>

                        <strong>Roles</strong>
                        @foreach ($user->roles as $role)
                            <p>{{$role->name}}</p>
                        @endforeach

                        <div class="btn-group">
                            <form action="/admin/users/{{ $user->id }}/edit" method="get">
                                <button type="submit" class="btn btn-warning m-2">Edit</button>
                            </form>

                            <form action="/admin/users/{{ $user->id }}" method="post">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="btn btn-danger m-2">Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
