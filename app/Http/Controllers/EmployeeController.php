<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index(Request $request)
    {
        $users = User::query();

        if ($request->search) {
            $users->where('name', 'like', "%" . $request->search . "%");
        }

        if ($request->sort) {
            $order = $request->sortOrder ? $request->sortOrder : "asc";
            $users->orderBy($request->sort, $order);
        }

        return $users->get();

        // return $request->search;
    }
}
