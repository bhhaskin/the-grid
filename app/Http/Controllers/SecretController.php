<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\Secret\Update as SecretUpdate;
use App\Http\Requests\Secret\Store as SecretStore;
use App\Secret;

class SecretController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $secrets = Secret::all();
        return view('secret.index', ['secrets' => $secrets]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('secret.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SecretStore $request)
    {
        $secret = new Secret();
        $secret->label = $request->input('label');
        $secret->notes = $request->input('notes');
        $secret->type = $request->input('type');
        $secret->username = $request->input('username');
        $secret->data = $request->input('data');
        $secret->url = $request->input('url');
        $secret->save();

        return redirect()->action('SecretController@show', ['secret' => $secret]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Secret $secret)
    {
        return view('secret.show', ['secret' => $secret]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Secret $secret)
    {
        return view('secret.edit', ['secret' => $secret]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SecretUpdate $request, Secret $secret)
    {
        $secret->label = $request->input('label');
        $secret->notes = $request->input('notes');
        $secret->type = $request->input('type');
        $secret->username = $request->input('username');
        $secret->data = $request->input('data');
        $secret->url = $request->input('url');
        $secret->save();

        return redirect()->action('SecretController@show', ['secret' => $secret]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Secret $secret)
    {
        $secret->delete();
        return redirect()->action('SecretController@index');
    }
}
