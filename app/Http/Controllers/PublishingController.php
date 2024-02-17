<?php

namespace App\Http\Controllers;

use App\Models\Publishing;
use Illuminate\Http\Request;

class PublishingController extends Controller
{

    // public function __construct()
    // {
    //     $this->middleware('auth:sanctum')->except(['index', 'store']);
    // }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Publishing::all();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $all_rows = $request->all();

        collect($all_rows)->map(function ($obj_) {
            $per_row = [];
            foreach ($obj_ as $key => $value) {
                $per_row[$key] = $value;
            };
            Publishing::create($per_row);
            logger($per_row);
        });
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // return is_null($id) ? Publishing::all() : Publishing::find($id);
        return Publishing::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
