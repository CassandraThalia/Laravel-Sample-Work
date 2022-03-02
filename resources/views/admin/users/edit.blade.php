@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">Edit {{$user->name}}</div>

                    <div class="card-body">

                        <form action="/admin/users/{{$user->id}}" method="post">
                            @csrf
                            @method('PATCH')
                            <div class="form-group">
                                <div class="form-group">
                                    <label for="name">User Name</label>
                                    <input type="text" class="form-control" name="name"
                                           autocomplete="off" value="{{ $user->name }}">
                                    @error('name') <p style="color: red">{{ $message }}</p> @enderror
                                </div>
                                <div class="form-group">
                                    <label for="email">Email address</label>
                                    <input type="email" class="form-control" name="email"
                                           aria-describedby="emailHelp" value="{{ $user->email }}" autocomplete="off">
                                    @error('email') <p style="color: red">{{ $message }}</p> @enderror
                                </div>

                                @foreach($roles as $role)
                                    <input type="checkbox" name="roles[]" class="form-check-input ml-2 mb-2"
                                            value="{{$role->name}}" id="{{$role->name}}"
                                        {{ $user->roles->contains($role) ? 'checked' : '' }}>
                                    <label class="form-check-label ml-4 mb-2" for="{{$role->name}}">{{$role->name}}</label>
                                    <br>
                                @endforeach
                                @error('roles') <p style="color: red">{{ $message }}</p> @enderror

                            </div>

                            <button type="submit" class="btn btn-success">Save Changes</button>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
