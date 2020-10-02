<?php

namespace App\Http\Controllers;

use App\Models\Connote;
use Illuminate\Http\Request;

class ConnoteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Connote::get();
        return response()->json($data);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = Connote::create($request->all());

        return response()->json($data);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Connote  $connote
     * @return \Illuminate\Http\Response
     */
    public function show(Connote $connote)
    {
        return response()->json($connote);
    }

}
