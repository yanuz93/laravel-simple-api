<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePackage;
use App\Models\Package;
use Illuminate\Http\Request;

class PackageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Package::get();
        return response()->json($data);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePackage $request)
    {
        $requestData = $request->validated();
        foreach ([
                "transaction_discount" => "0",
                "transaction_cash_amount" => "0",
                "transaction_cash_change" => "0",
                "transaction_additional_field" => "",
            ] as $field => $value
        )
        {
            $requestData[$field] = isset($requestData[$field])
                ? $requestData[$field]
                : $value;
        }

        $data = Package::create($requestData);
        $data['connote'] = $data->connote;
        $data['koli_data'] = $data->connote->koli_data;
        return response()->json($data);
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $package = Package::findOrFail($id);
        return response()->json($package);
    }

    /**
     * Show the form for editing (put) the specified resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param string $id
     * @return \Illuminate\Http\Response
     */
    public function update(StorePackage $request, $id)
    {
        $data = Package::firstOrNew(['_id' => $id]);
        
        collect($request->validated())->each(
            function ($value, $field) use ($data) {
                $data->$field = $value;
            }
        );

        $data->save();

        return response()->json($data);
    }

    /**
     * Update (patch) the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param string $id
     * @return \Illuminate\Http\Response
     */
    public function patch(Request $request, string $id)
    {
        $request->validate([
            'connote_id' => ['sometimes', 'exists:connotes,_id'],
        ]);

        $package = Package::findOrFail($id);

        collect($request->all())->each(
            function ($value, $field) use ($package) {
                $package->$field = $value;
            }
        );

        $package->save();
        return response()->json($package);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param string $id
     * @return \Illuminate\Http\Response
     */
    public function delete(string $id)
    {
        $package = Package::findOrFail($id);
        $package->delete();

        return response()->json([
            'message' => 'The transaction has been deleted successfully.',
            'data' => $package,
        ]);
    }
}
