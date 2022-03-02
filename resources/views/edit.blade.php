@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">Edit Your Post</div>

                    <div class="card-body">

                        <form action="/{{ $post->id }}" method="post">
                            @csrf
                            @method('PATCH')

                            <div class="form-group">
                                <div class="form-group">
                                    <label for="title">Title</label>
                                    <input type="text" class="form-control" name="title"
                                           autocomplete="off" value="{{ $post->title }}">
                                    @error('title') <p style="color: red">{{ $message }}</p> @enderror
                                </div>

                                <div class="form-group">
                                    <label for="content">Your Post:</label>
                                    <input type="text" class="form-control" name="content"
                                           autocomplete="off" value="{{ $post->content }}">
                                    @error('content') <p style="color: red">{{ $message }}</p> @enderror
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
