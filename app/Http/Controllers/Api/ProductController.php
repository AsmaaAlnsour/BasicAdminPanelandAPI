<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Order;
use App\Models\OrderItems;
use Illuminate\Http\Request;

use App\Models\Product;

use App\Http\Resources\ProductResource;
use Illuminate\Validation\Rule;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $products = Product::all();
        return $this->sendResponse(ProductResource::collection($products), 'Products retrieved successfully.');
    }

    public function addToCart(Request $request)
    {
        $request->validate([
            'product_id' => ['required', Rule::exists('products', 'id')],
        ]);
        $user_id = auth()->user()->id;
        $product = Product::where('id', $request->product_id)->first();
        $product->customers()->attach([$user_id]);
        return $this->sendResponse(true, 'Products added to cart successfully.');
    }

    public function removeFromCart(Request $request)
    {
        $request->validate([
            'product_id' => ['required', Rule::exists('products', 'id')],
        ]);
        $user_id = auth()->user()->id;
        $product = Product::where('id', $request->product_id)->first();
        $product->customers()->detach([$user_id]);
        return $this->sendResponse(true, 'Products removed to cart successfully.');
    }

    public function checkOut(Request $request)
    {
        $user = auth()->user();
        $products = $user->products;
         if ($products->count() <= 0) {
             return $this->sendError(false, 'Sorry you dont have items in your cart  .');
        }
        $products->sum('price');

        if ($products->sum('price') > (integer)$user->balance) {
            return $this->sendError(false, 'Sorry your balancer is less than your cart items.');
        }

        $user->update([
            'balance'=>$user->balance - $products->sum('price') ,
        ]);

        $order = Order::create([
            'customer_id' => $user->id,
            'status' => Order::UNPAID
        ]);

        foreach ($products as $product) {
            if ($product->quantity > 0) {
                $product->update(['quantity' => $product->quantity - 1]);
            }
            OrderItems::create([
                'order_id' => $order->id,
                'product_id' => $product->id,
                'price' => $product->price,
            ]);
        }

        $user->products()->detach($products->map(function ($q) {
            return $q->id;
        }));

        return $this->sendResponse(true, 'order placed successful');
    }
}
