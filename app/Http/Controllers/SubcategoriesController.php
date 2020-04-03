<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\SubCategory;
use Illuminate\Http\Request;
use App\Product;
use Illuminate\Support\Facades\File;

class SubcategoriesController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:roles:subcategories.create')->only(['create', 'store']);
        $this->middleware('can:roles:subcategories.index')->only('index');
        $this->middleware('can:roles:subcategories.edit')->only(['edit', 'update']);
        $this->middleware('can:roles:subcategories.show')->only('show');
        $this->middleware('can:roles:subcategories.destroy')->only('destroy');
    }
    public function index()
    {
        {
            $subcategories = SubCategory::paginate();

            return view('subcategories.index', compact('subcategories'));
        }
    }
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
