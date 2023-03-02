<?php

namespace App\Http\Controllers;

use App\Models\category;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use RealRashid\SweetAlert\Facades\Alert;




class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): mixed
    {
        $categories = category::all();
        return view('admin.category.index', compact('categories'));
        // $categories = DB::table("categories")->get();
        // return response()->json(["status" => 200, "data" => $categories]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        category::create($request->all());
        return redirect('admin/category')->withSuccess("Category Was Created!");
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $category = category::find($id);
        return view('admin.category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request): RedirectResponse
    {
        $category = category::find($request->id);
        $category->update($request->except(["_token", "id"]));
        return redirect("admin/category")->withSuccess("Category Updated!");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id): RedirectResponse
    {
        $category = category::find($id);
        $category->delete();
        return redirect('admin/category')->with('toast_info', 'Category Deleted!');
    }
}
