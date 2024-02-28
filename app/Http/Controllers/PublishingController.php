<?php

namespace App\Http\Controllers;

use App\Models\Publishing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use PhpParser\Node\Expr\Cast\Array_;
use Spatie\QueryBuilder\Filters\Filter;

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
    public function index(Request $request)
    {
        $sortByColumn = preg_replace("/-/", '', $request->sort);

        $columns = Schema::getColumnListing((new Publishing())->getTable());

        $result = QueryBuilder::for(Publishing::class)
            ->allowedFilters(['id', "YTD_avg_discount_%"])

            // filther through ALL columns
            ->where(function ($query) use ($request, $columns) {
                foreach ($columns as $column) {
                    $query->orWhere($column, 'like', "%$request->search%");
                }
            })

            // filther through selected columns
            // ->where(function ($query) use ($request) {
            //     $query->where('publisher_number', 'like', "%$request->search%")
            //         ->orWhere('publisher_name', 'like', "%$request->search%")
            //         ->orWhere('isbn', 'like', "%$request->search%")
            //         ->orWhere('sku', 'like', "%$request->search%")
            //         ->orWhere('title', 'like', "%$request->search%")
            //         ->orWhere('author', 'like', "%$request->search%");
            // })

            // sorting with desired field
            ->allowedSorts([$sortByColumn])
            ->get();

        // return response($result);
        return response()->json([$result, $request->search], 200);
        logger($request->search);
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
        $sortByColumn = preg_replace("/-/", '', $request->sort);
        $result = QueryBuilder::for(Publishing::class)
            // ->allowedFilters(['result'])

            // searching with desired field
            ->allowedFilters(array_keys($request->filter))

            // sorting with desired field
            ->allowedSorts([$sortByColumn])
            ->get();
        // return response($result);
        return response()->json([$result], 200);
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
