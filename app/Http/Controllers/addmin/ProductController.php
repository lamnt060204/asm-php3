<?php

namespace App\Http\Controllers\addmin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Product::query();
        if($request->has("search")){
            $query->where("name", "like", "%" . $request->search . "%");
    }
         $products = $query->orderBy("id","desc")->paginate(10);
         return view("admin.products.index", compact("products"));
}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view("admin.products.create", compact("categories"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductRequest $req)
    {   
        $data = $req->validated();
        if($req->hasFile("image")){
            $data["image"] = $req->file("image")->store("products","public");
        };
        Product::create($data);
        return redirect()->route("admin.products.index")->with("success", "Thêm thành công");
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return view("admin.products.show", compact("product"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $categories = Category::all();
        return view("admin.products.edit", compact("product", "categories"));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductRequest $request, Product $product)
    {
        $data = $request->validated();
        if($request->hasFile("image")){
            $data["image"] = $request->file("image")->store("products", "public");
        };
        $product->update($data);
        return redirect()->route("admin.products.index")->with("success","Sửa thành công");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route("admin.products.index")->with("success","Xóa thành công");
    }

    public function listSoftDelete(Request $request){
        $query = Product::query();
        if($request->has("search")){
            $query->where("name", "like", "%" . $request->search ."%");
        }
         $products = $query->onlyTrashed()->paginate(10);
        return view("admin.products.listSoftDelete", compact("products"));
    }
    public function deleteForever($id){
        $delete = Product::withTrashed()->find( $id );
        $delete->delete();
        return redirect()->route("admin.products.index")->with("success","Xóa thành công");
    }

    public function restore($id) {
        $restore = Product::onlyTrashed()->find( $id );
        $restore->restore(); 
        return redirect()->route("admin.products.index")->with("success","Khôi phục thành công");
    }
}
