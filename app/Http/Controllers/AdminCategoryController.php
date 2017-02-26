<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Category;
use App\Http\Requests\CategoriesRequest;

class AdminCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {




        $categories =  Category::all();
        return view('admin.categories.index',compact('categories'));
    }

   

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoriesRequest $request)
    {
        $category = $request->all();
        Category::create($category);
        return redirect('admin/categories');
    }

    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       
        $category = Category::findOrFail($id);
        return view('admin.categories.edit',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoriesRequest $request, $id)
    {
       

      


        $category = Category::findOrFail($id);
        $category->update($request->all());
        return redirect('/admin/categories');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(CategoriesRequest $request,$id)
    {
       Category::findOrFail($id)->delete();
       return redirect('/admin/categories');
    }
}
