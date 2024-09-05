<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Category;

use App\Models\Product;

use App\Models\Order;

use Illuminate\Support\Facades\Mail;

use App\Mail\OrderDeliveredNotification;


use function Pest\Laravel\delete;

class AdminController extends Controller
{
    public function view_category()
    {
        $data = category::all();
        return view('admin.category', compact('data'));
    }

    public function add_category(Request $request)
    {
        $data = new category;
        $data->category_name = $request->category_name;

        $data->save();

        return redirect()->back()->with('message', 'Category Added Successfully');
    }

    public function delete_category($id)
    {
        $data = category::find($id);
        $data->delete();
        return redirect()->back()->with('message', 'Category Deleted Successfully');
    }

    public function view_product()
    {
        $category = category::all();
        return view('admin.product', compact('category'));
    }

    public function add_product(Request $request)
    {
        $product = new product;

        $product->product_name = $request->product_name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->quantity = $request->quantity;
        $product->discount_price = $request->discount;
        $product->category = $request->category;

        $image = $request->image;
        $imagename = time() . '.' . $image->getClientOriginalExtension();
        $request->image->move('product', $imagename);
        $product->image = $imagename;

        $product->save();

        return redirect()->back()->with('message', 'Product Added Successfully');
    }

    public function inventory()
    {
        $product = product::all();
        return view('admin.inventory', compact('product'));
    }

    public function delete_product($id)
    {
        $data = product::find($id);
        $data->delete();
        return redirect()->back()->with('message', 'Product Deleted Successfully');
    }

    public function orders()
    {
        $orders = order::all();
        return view('admin.orders', compact('orders'));
    }

    public function delivered($id)
    {
        $orders = order::find($id);

        $orders->delivery_status = "Delivered";
        $orders->payment_status = "Paid";
        $order_name = $orders->name;
        $orders->save();

        Mail::to($orders->email)->send(new OrderDeliveredNotification($orders));

        return redirect()->back()->with('message', 'Order of ' . $order_name . ' marked as Delivered');
    }
}
