@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">Create New Post</div>

                    <div class="card-body">

                        <form action="/home" method="post">
                            @csrf

                            <div class="form-group">
                                <div class="form-group">
                                    <label for="title">Title</label>
                                    <input type="text" class="form-control" name="title"
                                           autocomplete="off" value="{{ old('title') ?? $post->title }}">
                                    @error('title') <p style="color: red">{{ $message }}</p> @enderror
                                </div>

                                <div class="form-group">
                                    <label for="content">Your Post:</label>
                                    <input type="text" class="form-control" name="content"
                                           autocomplete="off" value="{{ old('content') ?? $post->content }}">
                                    @error('content') <p style="color: red">{{ $message }}</p> @enderror
                                </div>

                            </div>

                            <button type="submit" class="btn btn-success">POST</button>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
