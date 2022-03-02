@extends('layouts.app')

@section('content')

    <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Admin Users</div>

                <div class="card-body">

                    <form id="createBtn" action="themes/create">
                        <button type="submit" class="btn btn-info col-md-4 mb-4">Create New Theme</button>
                    </form>

                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">ID#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($themes as $theme)
                            <tr>
                                <th class="col-md-2" scope="row">{{$theme->id}}</th>
                                <td class="col-md-6">{{$theme->name}}</td>
                                <td class="btn-group">
                                    <form action="/admin/themes/{{ $theme->id }}" method="get">
                                        <button type="submit" class="btn btn-success m-2">View</button>
                                    </form>

                                    <form action="/admin/themes/{{ $theme->id }}/edit" method="get">
                                        <button type="submit" class="btn btn-warning m-2">Edit</button>
                                    </form>

                                    <form action="/admin/themes/{{ $theme->id }}" method="post">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit" class="btn btn-danger m-2">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <p>No Theme to Display</p>
                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
