<?php

namespace App\Http\Controllers;

use App\Models\Koli;
use Illuminate\Http\Request;

class KoliController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Koli::get();
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
        $data = Koli::create($request->all());

        return response()->json($data);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Koli  $koli
     * @return \Illuminate\Http\Response
     */
    public function show(Koli $koli)
    {
        return response()->json($koli);
    }
}
