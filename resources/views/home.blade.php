@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Social Media Feed</div>

                <div class="card-body">

                    @if($errors->any())
                        <h4 class="alert alert-danger">{{$errors->first()}}</h4>
                    @endif

                    @if(Auth::check())
                        <form id="createBtn" action="/create">
                            <button type="submit" class="btn btn-success col-md-12 mb-4">Create Post</button>
                        </form>
                    @endif

                    @foreach($posts as $post)
                    <div class="card border-dark mb-3">
                        <div class="card-body">
                            <p class="card-subtitle mb-2 text-muted">Posted at: {{$post->created_at}}</p>
                            <h1 class="card-title">{{$post->title}}</h1>
                            <p class="card-text">{{$post->content}}</p>
                            <p class="card-subtitle mb-2 text-muted">Created by: {{$user = App\User::firstWhere('id', $post->created_by)->name}}</p>

                            @if(Auth::check())
                                <div class="btn-group">
                                @if($post->created_by == auth()->user()->id)
                                        <form id="editBtn" action="/{{$post->id}}/edit" method="get">
                                            <button type="submit" class="btn btn-success m-2">Edit Post</button>
                                        </form>
                                    @endif

                                @if(($post->created_by == auth()->user()->id) || (auth()->user()->hasRole('Moderator')))
                                    <form id="deleteBtn" action="/{{$post->id}}" method="post">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit" class="btn btn-danger m-2">Delete Post</button>
                                    </form>
                                    @endif
                                    </div>
                                @endif

                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
