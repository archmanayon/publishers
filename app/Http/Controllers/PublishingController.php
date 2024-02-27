<?php

namespace App\Http\Controllers;

use App\Models\Publishing;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\Cast\Array_;
use Spatie\QueryBuilder\QueryBuilder;

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

        $request->user()->currentAccessToken()->delete();
        return response([
            "message" => "Successfully saved to database"
        ], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // return is_null($id) ? Publishing::all() : Publishing::find($id);
        return Publishing::find($id);
    }

    public function chooseFilter(Request $request)
    {
        $sortByColumn = preg_replace('/[^a-zA-Z0-9]+/', '', $request->sort);
        $author = QueryBuilder::for(Publishing::class)
            // ->allowedFilters(['author'])

            // searching with desired field
            ->allowedFilters(array_keys($request->filter)[0])

            // sorting with desired field
            ->allowedSorts($sortByColumn)
            ->get();
        // return response($author);
        return response()->json([$author], 200);
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
