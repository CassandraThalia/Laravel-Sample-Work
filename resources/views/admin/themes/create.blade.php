@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">Create New Theme</div>

                    <div class="card-body">

                        <form action="/admin/themes" method="post">
                            @csrf
                            <div class="form-group">
                                <div class="form-group">
                                        <label for="name">Theme Name</label>
                                        <input type="text" class="form-control" name="name"
                                               autocomplete="off" value="{{ old('name') ?? $theme->name }}">
                                        @error('name') <p style="color: red">{{ $message }}</p> @enderror
                                </div>
                                <div class="form-group">
                                    <label for="cdn_url">Theme URL</label>
                                    <input type="text" class="form-control" name="cdn_url"
                                           value="{{ old('cdn_url') ?? $theme->cdn_url }}" autocomplete="off">
                                    @error('cdn_url') <p style="color: red">{{ $message }}</p> @enderror
                                </div>

                            </div>

                            <button type="submit" class="btn btn-success">Save New Theme</button>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
