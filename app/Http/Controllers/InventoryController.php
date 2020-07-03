<?php

namespace App\Http\Controllers;

use App\Category;
use App\Customer;
use App\Images;
use App\Odertemp;
use App\Outorder;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class InventoryController extends Controller
{

    public function Dashboard()
    {
        return view('Inventory.dashboard');
    }
    public function AddCategory()
    {
        return view('Inventory.Items.add_category');
    }

    public function SaveCategoryDetails(Request $request)
    {
        $data = $request->all();
        Category::create($data);
        return back()->with('msg', 'Category Added Successfully');
    }

    public function CategoryIndex()
    {
        $categories = Category::all();
        return view('Inventory.Items.index', compact('categories'));
    }


    public function UpdateCategoryDetails(Request $request)
    {
        $data = ['category_name' => $request->category_name, 'category_description' => $request->category_description];
        DB::table('categories')->where('id', $request->id)->update($data);
        return back()->with('msg', 'Category Editd Successfully');
    }

    public function DeleteCategory(Request $request)
    {
        DB::table('categories')->where('id', $request->id)->delete();
        return back()->with('msg', 'Category Deleted Successfully');
    }

    public function AddProduct()
    {
        $categories = Category::all();
        return view('Inventory.Items.Products.add_product', compact('categories'));
    }

    public function SaveProduct(Request $request)
    {

        $category =Category::whereId($request->category)->get('category_name')->all();
        $data = $this->ValidateProductDetails() + ['category'=>$category[0]->category_name,'cat_id'=>$request->category];
        $code = $request->prefix . '' . $request->code;
        Product::create($data + ['sku' => $code]);
        return back()->with('msg', 'Product Added Successfully');
    }

    public function ProductIndex()
    {

        $products = Product::all();
        return view('Inventory.Items.Products.index', compact('products'));
    }

    public function UpdateProduct(Request $request)
    {
        $data = $this->ValidateProductDetails() + ['sku' => $request->sku]; 
        DB::table('products')->where('id', $request->id)->update($data);
        return back()->with('msg', 'Product Updated Successfully');
    }

    public function DeleteProduct(Request $request)
    {
        DB::table('products')->where('id', $request->id)->delete();
        return back()->with('msg', 'Product Deleted Successfully');
    }
    public function SaveProductImage()
    {
        $image = new Images();
        $data = $image->LogoData();
        Images::create($data);
        return back()->with('msg', 'Product Image Added Successfully');
    }

    public function ShowProductImages($id)
    {

        $images = Images::where('product_id', $id)->get()->all();
        return view('Inventory.Items.Products.show', compact('images'));
    }
    public function CustomersIndex()
    {
        $customers = Customer::all();
        return view('Inventory.customers.index', compact('customers'));
    }

    public function AddCustomers()
    {
        return view('Inventory.customers.add_customers');
    }

    public function SaveCustomerDetails(Request $request)
    {

        $data = $this->ValidateCustomerDetails();
        $customer = Customer::create($data);
        $this->storeImage($customer);
        return back()->with('msg', 'Customer / Vendor Added Successfully');
    }


    public function updateCustomersDetails(Request $request)
    {

        $data = $this->ValidateCustomerDetails();
        $customer = Customer::whereId($request->id)->update($data);
        $currentCustomer = Customer::find($request->id);
        $this->storeImage($currentCustomer);
        return back();
    }

    public function DeleteCustomer(Request $request)
    {

        DB::table('customers')->where('id', $request->id)->delete();
        return back();
    }

    public function allPurchaseOrders()
    {
        $orders = Outorder::all()->sortByDesc('id');
        $items = DB::table('products')->get()->all();
        $product = Session::get('item');
        return view('Inventory.orders.list', compact('orders', 'items', 'product'));
    }

    public function AddPurchaseOrder()
    {

        $vendors = Customer::all();
        $items = Product::all();
        $price = Session::get('price');
        $product = Session::get('item');
        $orders = Odertemp::all();
        return view('Inventory.orders.add_purchase_order', compact('vendors', 'items', 'price', 'product', 'orders'));
    }

    public function GetProductPrice(Request $request)
    {
        $product = Product::where('id', $request->product_id)->first();
        Session::put('price', $product->price);
        Session::put('item', $product);
        return redirect('purchase-orders');
    }

    public function savePurchaseOrderDetails(Request $request)
    {

        $item = Session::get('item');
        $data = $request->all() + ['items_id' => $item->id];
        Outorder::create($data);
        return back();
    }

    public function savePurchaseOrderDetailsTemp(Request $request)
    {
        $item = Session::get('item');
        $data = $request->all() + ['items_id' => $item->id, 'code' => 100];
        Odertemp::create($data);
        return redirect('purchase-orders');
    }
    public function migratetemOders()
    {

        $value = Odertemp::all();

        for ($x = 1; $x <= $value->count(); $x++) {
            $id = Odertemp::get('id')->first();
            $data = Odertemp::get(['vendor', 'delivery_address', 'order_code', 'reference_code', 'date', 'delivery_date', 'items_id', 'quantity', 'currency', 'amount'])->toArray();
            Outorder::create($data[0]);
            Odertemp::whereId($id['id'])->delete();
        }
        return back()->with('msg', 'Oder was Successful');
    }

    public function StockState()
    {
        $stock_status = Product::get(['id', 'name', 'number', 'category'])->all();
        return view('Inventory.out_of_stoke', compact('stock_status'));
    }

    public function TransactionHistory()
    {
        $transactions =  Outorder::all();
        $items =Product::get(['id','name'])->all();
        return view('inventory.transaction', compact('transactions','items'));
    }
    public function ValidateProductDetails()
    {
        return request()->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            'number' => 'required|numeric',
            'amount' => 'required|numeric',
            'currency' => 'required',
            'description' => '',

        ]);
    }
    public function ValidateCustomerDetails()
    {
        return tap(
            request()->validate(
                [
                    "customer_type" => "required",
                    "primary_contact" => "required",
                    "company_name" => "",
                    "display_name" => "",
                    "customer_email" => "",
                    "customer_phone" => "required",
                    "website" => ""
                ]
            ),
            function () {
                if (request()->hasFile('avatar')) {
                    request()->validate(
                        [
                            'avatar' => 'file|image|max:10000'
                        ]
                    );
                }
            }
        );
    }

    public function storeImage($avatar)
    {

        if (request()->has('avatar')) {
            $avatar->update(
                [
                    'avatar' => request()->avatar->store('avatars', 'public')
                ]

            );
        }
    }
}
