<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home(Request $request){
        $category = Category::query()->limit(4)->get();
        // dd($category);
        $query = Product::query();
        if($request->has("sreach")) {
            $query->where("name", "like", "%" . $request->sreach . "%");
        }
        if($request->has('sort')) {
            switch($request->sort) {
                case 'asc':
                case 'desc':
                    $query->orderBy('price', $request->sort); // sắp xếp theo giá
                    break;
        
                case 'new':
                    $query->orderBy('id', 'desc'); // sản phẩm mới nhất
                    break;
        
                case 'view':
                    $query->orderBy('views', 'desc'); // lượt xem nhiều nhất
                    break;
            }
        }
        if ($request->has('cate')) {
            $query->where('category_id', $request->cate);
        }
        if($request->has("price")){
            $prices = $request->price;
            if(in_array("1m", $prices)) {
                $query->where("price", "<" ,1000);
            }

            if(in_array("1m5", $prices)) {
                $query->whereBetween("price",[1000000, 5000000]);
            }
            if(in_array("5m", $prices)) {
                $query->where('price', '>', 5000000);
            }
        }
        $products = $query->orderBy("id","desc")->paginate(perPage: 10);
      
        return view("client.home", compact("products",  "category"));
    }

    public function detallProduct($id) {
        // Lấy sản phẩm chi tiết
        $product = Product::findOrFail($id);
    
        // Tăng lượt xem
        $product->increment('views');
    
        
        $relatedProducts = Product::where('category_id', $product->category_id)
            ->where('id', '!=', $product->id)
            ->orderBy('id', 'desc')
            ->limit(4)
            ->get();
    
        return view('client.detallProduct', compact('product', 'relatedProducts'));
    }
    
}
