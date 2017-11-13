<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Products;
use App\Categories;
use Redirect;


class ProductController extends Controller
{
    public function __construct ()
    {
        $this->middleware('auth', ['except' => ['index','show']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Products::paginate(10);

        return view('product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cat = Categories::pluck('name','id');
        $abc = ['a','b','c'];
        return view('product.create', compact('cat','abc'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:products|string|max:30',
        ]);

        $slug = str_slug($request->name,'-');

        $products = Products::create(['name' => $request->name,
                                        'slug' => $slug,
                                        'price' => $request->price,
                                        'content' => $request->content,
                                        'title_seo' => $request->title_seo,
                                        'meta_description' => $request->meta_description,
                                        'meta_keyword' => $request->meta_keyword,
                                        'cat_id' => $request->cat_id,
                                        'user_id' => Auth::id()
                                    ]);

        $products->save();

        alert()->success('Thành công', 'Bạn đã thêm 1 sản phẩm');

        return Redirect::route('product.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Products::findOrFail($id);
        return view('product.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Products::findOrFail($id);
        $cat = Categories::pluck('name','id');
        return view('product.edit', compact('product', 'cat'));
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
        $product = Products::findOrFail($id);

        $this->validate($request, [
            'name' => 'required|string|max:30|unique:products,name,'.$product->id
        ]);

        $slug = str_slug($request->name, '-');

        $product->update(['name' => $request->name,
                        'slug' => $slug,
                        'price' => $request->price,
                        'content' => $request->content,
                        'title_seo' => $request->title_seo,
                        'meta_description' => $request->meta_description,
                        'meta_keyword' => $request->meta_keyword,
                        'cat_id' => $request->cat_id,
                        'user_id' => Auth::id()
                        ]);

        alert()->success('Thành công','Bạn đã cập nhật danh mục');

        return Redirect::route('product.show', [
            'product' => $product, 'slug' => $slug
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
        Products::destroy($id);

        alert()->overlay('Lưu ý', 'Bạn đã xóa sản phẩm','error');

        return Redirect::route('product.index');
    }
}
