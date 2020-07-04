<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Category;
use App\Images;
use App\Product;
use App\Sales;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Ramsey\Uuid\Type\Integer;

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
        $result = Product::where('cat_id', $id)->get()->all();
        return view('search.result', compact('result'));
    }
    public function SearchAnything(Request $request)
    {
        $result =   DB::table('products')->where('name', 'Like', '%' . $request->search . '%')->paginate(15);
        if ($result != null) {
        } else {
            $result =   DB::table('products')->where('category', 'Like', '%' . $request->search . '%')->paginate(15);
        }

        // return view('search.result');
    }
    public function showProductDetails($id)
    {
        $productDetails = Product::whereId($id)->get();

        return view('view_product', compact('productDetails'));
    }

    public function addToCart($id)
    {
        if (Auth::check()) {
            Cart::create(['product_id' => $id, 'user_id' => Auth::id()]);
        } else {
            return redirect('/login')->with('msg', 'Dear Customer, Kindly login to add Items to your cart');
        }
    }

    public function checkout()
    {
        $sum = 0;
        $productId = Cart::where('user_id', Auth::id())->get('product_id');
        foreach ($productId as $ids) {
            $cart[] = Product::find($ids);
            $value = Product::where('id', $ids->product_id)->sum('price');
            $sum = $sum + (int) $value;
        }
        return view('checkout.index', compact('cart', 'sum'));
    }

    public function processCheckout()
    {

        $productId = Cart::where('user_id', Auth::id())->get('product_id');
        foreach ($productId as $ids) {
            $value = Product::where('id', $ids->product_id)->get()->all();
            $result = Product::where('id', $ids->product_id)->update(['number' => ($value[0]->number - 1)]);
            Sales::create(['product_id' => $value[0]->id, 'user_id' => Auth::id()]);
            Cart::where('user_id', Auth::id())->delete();
            return redirect('market-place-index')->with('msg', 'Checkout Success');
        }
    }
    public function dropItem($id)
    {
        Cart::where('product_id', $id)->delete();
        return back()->with('msg', 'item droped successfully');
    }
}
