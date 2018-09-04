@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div class="float-left">
                        Secret Details
                    </div>
                    <div class="float-right">
                        <div class="btn-group" role="group" aria-label="Basic example">
                          <a href="{{ action('SecretController@index') }}" role="button" class="btn btn-secondary">Back</a>
                          <a href="{{ action('SecretController@edit', ['user' => $secret ]) }}" role="button" class="btn btn-primary">Edit</a>
                          <form action="{{ action('SecretController@destroy', ['user' => $secret ]) }}" method="POST">
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
                          <input type="text" readonly class="form-control-plaintext" id="id" value="{{ $secret->id }}">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="label" class="col-sm-2 col-form-label">Label</label>
                        <div class="col-sm-10">
                          <input type="text" readonly class="form-control-plaintext" id="label" value="{{ $secret->label }}">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="notes" class="col-sm-2 col-form-label">Notes</label>
                        <div class="col-sm-10">
                          <textarea readonly class="form-control-plaintext" id="notes">{{ $secret->notes }}</textarea>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="type" class="col-sm-2 col-form-label">Type</label>
                        <div class="col-sm-10">
                          <input type="text" readonly class="form-control-plaintext" id="type" value="{{ $secret->type }}">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="username" class="col-sm-2 col-form-label">User Name</label>
                        <div class="col-sm-10">
                          <input type="text" readonly class="form-control-plaintext" id="username" value="{{ $secret->username }}">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="data" class="col-sm-2 col-form-label">Data</label>
                        <div class="col-sm-10">
                          <input type="text" readonly class="form-control-plaintext" id="data" value="{{ $secret->data }}">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="url" class="col-sm-2 col-form-label">URL</label>
                        <div class="col-sm-10">
                          <input type="text" readonly class="form-control-plaintext" id="url" value="{{ $secret->url }}">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="Created" class="col-sm-2 col-form-label">Created</label>
                        <div class="col-sm-10">
                          <input type="text" readonly class="form-control-plaintext" id="Created" value="{{ $secret->created_at }}">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="Updated" class="col-sm-2 col-form-label">Updated</label>
                        <div class="col-sm-10">
                          <input type="text" readonly class="form-control-plaintext" id="Updated" value="{{ $secret->updated_at }}">
                        </div>
                      </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
