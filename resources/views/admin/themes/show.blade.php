@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">{{$theme->name}}'s Info</div>

                    <div class="card-body">

                        <strong>Name</strong>
                        <p>{{ $theme->name }}</p>

                        <strong>URL</strong>
                        <p>{{ $theme->cdn_url }}</p>

                        <div class="btn-group">
                            <form action="/admin/themes/{{ $theme->id }}/edit" method="get">
                                <button type="submit" class="btn btn-warning m-2">Edit</button>
                            </form>

                            <form action="/admin/themes/{{ $theme->id }}" method="post">
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
