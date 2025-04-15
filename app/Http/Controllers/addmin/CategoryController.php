<?php

namespace App\Http\Controllers\addmin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function dashboard(){
        // dd(123);
        return view("admin.dashboard");
    }
    public function index(Request $request)
    {   
       $query = Category::query();
       if($request->has("search")){
        $query->where("name", "like", "%" . $request->search ."%");
       }
       $categories = $query->orderBy("id", "desc")->paginate(10);
        return view("admin.categories.index",compact("categories"));
    }
    
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("admin.categories.create");
      
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryRequest $req)
    {
        Category::create($req->validated());
        return redirect()->route("admin.categories.index")->with("success","Thêm thành công");

    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        $productById = Product::query()->where("category_id", $category->id)->get();
        return view("admin.categories.show",compact("productById",'category'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view("admin.categories.edit",compact("category"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategoryRequest $req, Category $category)
    {
        $category->update($req->validated());
        return redirect()->route("admin.categories.index")->with("success","Sửa thành công");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route("admin.categories.index")->with("success","Xóa thành công");
    }

    public function listSoftDelete(Request $request){
        $query = Category::query();
    
        if($request->has("search")) {
            $query->where("name", "like", "%" . $request->search . "%");
        }
    
        $softDeletedCategories = $query->onlyTrashed()
                                       ->orderBy("id", "desc")
                                       ->paginate(10);
    
        return view("admin.categories.listSoftDelete", compact("softDeletedCategories"));
    }
    public function restore($id) {
        $cateDelete = Category::withTrashed()->find($id );
        $cateDelete->restore();
        return redirect()->route("admin.categories.index")->with("success","Khôi phục thành công");
    }

    public function deleteForeverCategory($id) {
        $cateDelete = Category::withTrashed()->find($id );
        $cateDelete->forceDelete();
        return redirect()->route("admin.categories.index")->with("success","Xóa thành công");
    }


}
