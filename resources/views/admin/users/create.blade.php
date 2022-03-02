@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">Create New Admin User</div>

                    <div class="card-body">

                        <form action="/admin/users" method="post">
                            @csrf
                            <div class="form-group">
                                <div class="form-group">
                                        <label for="name">User Name</label>
                                        <input type="text" class="form-control" name="name"
                                               autocomplete="off" value="{{ old('name') ?? $adminUser->name }}">
                                        @error('name') <p style="color: red">{{ $message }}</p> @enderror
                                </div>
                                <div class="form-group">
                                    <label for="email">Email address</label>
                                    <input type="email" class="form-control" name="email"
                                           aria-describedby="emailHelp" value="{{ old('email') ?? $adminUser->email }}" autocomplete="off">
                                    @error('email') <p style="color: red">{{ $message }}</p> @enderror
                                </div>
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password" class="form-control" name="password"
                                           autocomplete="off">
                                    @error('password') <p style="color: red">{{ $message }}</p> @enderror
                                </div>
                                <div class="form-group">
                                    <div class="form-check">
                                        <input type="checkbox" name='roles[]' class="form-check-input" value="user administrator">
                                        <label class="form-check-label" for="userAdmin">User Administrator</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="checkbox" name='roles[]' class="form-check-input" value="moderator">
                                        <label class="form-check-label" for="moderator">Moderator</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="checkbox" name='roles[]' class="form-check-input" value="theme manager">
                                        <label class="form-check-label" for="themeManager">Theme Manager</label>
                                    </div>
                                    @error('roles') <p style="color: red">{{ $message }}</p> @enderror
                                </div>
                            </div>

                            <button type="submit" class="btn btn-success">Create New Admin User</button>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
