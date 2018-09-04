@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div class="float-left">
                        Secret Edit
                    </div>
                    <div class="float-right">
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <a href="{{ action('SecretController@show', ['secret' => $secret ]) }}" role="button" class="btn btn-secondary">Back</a>
                            <form action="{{ action('SecretController@destroy', ['secret' => $secret ]) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>

                <div class="card-body">
                    <form action="{{ action('SecretController@update', ['secret' => $secret]) }}" method="post">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}
                        <div class="form-group row {{ $errors->has('label') ? ' has-error' : '' }}">
                            <label for="label" class="col-sm-3 col-form-label">Label</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="label" name="label" value="{{ (isset($secret->label) && !empty($secret->label)) ? $secret->label : old('label') }}" placeholder="Label">
                                @if ($errors->has('label'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('label') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row {{ $errors->has('notes') ? ' has-error' : '' }}">
                            <label for="notes" class="col-sm-3 col-form-label">Notes</label>
                            <div class="col-sm-9">
                                <textarea class="form-control" id="label" name="notes">{{ (isset($secret->notes) && !empty($secret->notes)) ? $secret->notes : old('notes') }}</textarea>
                                @if ($errors->has('notes'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('notes') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row {{ $errors->has('label') ? ' has-error' : '' }}">
                            <label for="type" class="col-sm-3 col-form-label">Type</label>
                            <div class="col-sm-9">
                                <select class="form-control" id="type">
                                    <option value="credential">Credential</option>
                                      <option value="secret">Secret</option>
                                    </select>
                                @if ($errors->has('type'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('type') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row {{ $errors->has('username') ? ' has-error' : '' }}">
                            <label for="type" class="col-sm-3 col-form-label">User Name</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="type" name="type" value="{{ (isset($secret->username) && !empty($secret->username)) ? $secret->username : old('username') }}" placeholder="User Name">
                                @if ($errors->has('username'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row {{ $errors->has('data') ? ' has-error' : '' }}">
                            <label for="type" class="col-sm-3 col-form-label">Data</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="type" name="type" value="{{ (isset($secret->data) && !empty($secret->data)) ? $secret->data : old('data') }}" placeholder="Data">
                                @if ($errors->has('data'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('data') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row {{ $errors->has('url') ? ' has-error' : '' }}">
                            <label for="url" class="col-sm-3 col-form-label">URL</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="url" name="url" value="{{ (isset($secret->url) && !empty($secret->url)) ? $secret->url : old('url') }}" placeholder="URL">
                                @if ($errors->has('url'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('url') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
