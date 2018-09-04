@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="float-left">

            </div>
            <div class="float-right">
                <a href="{{ action('SecretController@create') }}" role="button" class="btn btn-primary">Create</a>
            </div>
            <div class="clearfix">

            </div>
            <br>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="table-responsive">
                <table class="table table-striped table-hover">
                    <caption>List of secrets</caption>
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Label</th>
                            <th scope="col">Notes</th>
                            <th scope="col">Type</th>
                            <th scope="col">Username</th>
                            <th scope="col">Data</th>
                            <th scope="col">URL</th>
                            <th scope="col">Updated</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($secrets as $secret)
                        <tr>
                            <th scope="row">{{ $secret->id }}</th>
                            <th>{{ $secret->label }}</th>
                            <th>{{ $secret->notes }}</th>
                            <th>{{ $secret->type }}</th>
                            <th>{{ $secret->username }}</th>
                            <th>{{ $secret->data }}</th>
                            <th>{{ $secret->url }}</th>
                            <th>{{ $secret->created_at }}</th>
                            <th>{{ $secret->updated_at }}</th>
                            <th>
                                <div class="btn-group">
                                    <a class="btn btn-secondary btn-sm" href="{{ action('SecretController@show', ['secret' => $secret]) }}" type="button">
                                        View
                                    </a>
                                    <button type="button" class="btn btn-sm btn-secondary dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <span class="sr-only">Toggle Dropdown</span>
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <a href="{{ action('SecretController@edit', ['secret' => $secret ]) }}" role="button" class="dropdown-item">Edit</a>
                                        <form action="{{ action('SecretController@destroy', ['secret' => $secret ]) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="dropdown-item">Delete</button>
                                        </form>
                                    </div>
                                </div>
                            </th>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
