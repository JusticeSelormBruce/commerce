<?php

namespace App\Http\Controllers;

use App\Category;
use App\Images;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use function Ramsey\Uuid\v1;

class MarketController extends Controller
{
    public function index()
    {
        if (Images::all()->count() < 1) {
            $data = null;
        } else {
            $data = Images::all()->random(4);
        }

        $categories = Category::all()->random();
        $products = Product::get()->all();

        return view('welcome', compact('data', 'categories', 'products'));
    }

    public function searchResult($id)
    {
        $result = Category::whereId($id)->get();
        dd($result);
    }
    public function SearchAnything(Request $request)
    {
        $result =   DB::table('products')->where('name', 'Like', '%' . $request->search . '%')->paginate(15);
        if ($result != null) {
        } else {
            $result =   DB::table('products')->where('category', 'Like', '%' . $request->search . '%')->paginate(15);
        }

        return view('search.result');
    }
    public function showProductDetails($id)
    {
         $productDetails = Product::whereId($id)->get();

        return view('view_product',compact('productDetails'));
    }
}
