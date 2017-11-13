<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Categories;
use Redirect;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct ()
    {
        $this->middleware('auth');
    }

    public function index()
    {

        return view('category.index');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('category.create');
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
        $this->validate($request, [

            'name' => 'required|unique:categories|string|max:30',

        ]);

        $slug = str_slug($request->name, '-');

        $categories = Categories::create(['name' => $request->name,
                                          'slug' => $slug,
                                          'user_id' => Auth::id()]);

        $categories->save();

        alert()->success('Thành công', 'Bạn đã thêm 1 danh mục');

        return Redirect::route('categories.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $categories = Categories::findOrFail($id);

        return view('category.show', compact('categories'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = Categories::findOrFail($id);
        return view('category.edit', compact('categories'));
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
        $categories = Categories::findOrFail($id);

        $this->validate($request, [

            'name' => 'required|string|max:30|unique:categories,name,'.$categories->id

        ]);

        $slug = str_slug($categories->name, '-');

        $categories->update(['name' => $request->name,
                             'slug' => $slug,
                             'user_id' => Auth::id()
        ]);

        alert()->success('Thành công','Bạn đã cập nhật danh mục');

        return Redirect::route('category.show', [
            'categories' => $categories, 'slug' => $slug
        ]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Categories::destroy($id);

        alert()->overlay('Lưu ý', 'Bạn đã xóa danh mục','error');

        return Redirect::route('category.index');

    }
}
