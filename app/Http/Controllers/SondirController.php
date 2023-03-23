<?php

namespace App\Http\Controllers;

use App\Models\sondir;
use App\Http\Requests\StoresondirRequest;
use App\Http\Requests\UpdatesondirRequest;

class SondirController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = sondir::all();
        $send = [
            'title' => 'sondir',
            'data' => $data

        ];
        return view('terms', $send);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoresondirRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoresondirRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\sondir  $sondir
     * @return \Illuminate\Http\Response
     */
    public function show(sondir $sondir)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\sondir  $sondir
     * @return \Illuminate\Http\Response
     */
    public function edit(sondir $sondir)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatesondirRequest  $request
     * @param  \App\Models\sondir  $sondir
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatesondirRequest $request, sondir $sondir)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\sondir  $sondir
     * @return \Illuminate\Http\Response
     */
    public function destroy(sondir $sondir)
    {
        //
    }
}
