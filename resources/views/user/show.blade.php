@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div class="float-left">
                        User Details
                    </div>
                    <div class="float-right">
                        <div class="btn-group" role="group" aria-label="Basic example">
                          <a href="{{ action('UserController@index') }}" role="button" class="btn btn-secondary">Back</a>
                          <a href="{{ action('UserController@edit', ['user' => $user ]) }}" role="button" class="btn btn-primary">Edit</a>
                          <form action="{{ action('UserController@destroy', ['user' => $user ]) }}" method="POST">
                              @csrf
                              @method('DELETE')
                              <button type="submit" class="btn btn-danger">Delete</button>
                          </form>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>

                <div class="card-body">
                    <form>
                      <div class="form-group row">
                        <label for="id" class="col-sm-2 col-form-label">ID</label>
                        <div class="col-sm-10">
                          <input type="text" readonly class="form-control-plaintext" id="id" value="{{ $user->id }}">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="name" class="col-sm-2 col-form-label">Name</label>
                        <div class="col-sm-10">
                          <input type="text" readonly class="form-control-plaintext" id="name" value="{{ $user->name }}">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="email" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                          <input type="text" readonly class="form-control-plaintext" id="email" value="{{ $user->email }}">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="Created" class="col-sm-2 col-form-label">Created</label>
                        <div class="col-sm-10">
                          <input type="text" readonly class="form-control-plaintext" id="Created" value="{{ $user->created_at }}">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="Updated" class="col-sm-2 col-form-label">Updated</label>
                        <div class="col-sm-10">
                          <input type="text" readonly class="form-control-plaintext" id="Updated" value="{{ $user->updated_at }}">
                        </div>
                      </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
