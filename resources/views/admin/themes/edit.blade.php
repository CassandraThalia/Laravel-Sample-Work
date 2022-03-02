@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">Edit {{$theme->name}}</div>

                    <div class="card-body">

                        <form action="/admin/themes/{{$theme->id}}" method="post">
                            @csrf
                            @method('PATCH')

                            <div class="form-group">
                                <div class="form-group">
                                    <label for="name">User Name</label>
                                    <input type="text" class="form-control" name="name"
                                           autocomplete="off" value="{{ $theme->name }}">
                                    @error('name') <p style="color: red">{{ $message }}</p> @enderror
                                </div>
                                <div class="form-group">
                                    <label for="cdn_url">Email address</label>
                                    <input type="text" class="form-control" name="cdn_url"
                                           value="{{ $theme->cdn_url }}" autocomplete="off">
                                    @error('url') <p style="color: red">{{ $message }}</p> @enderror
                                </div>

                            </div>

                            <button type="submit" class="btn btn-success">Save Changes</button>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
