<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\SaveForLater;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class CartController extends Controller
{
    //cart add
    public function addCart($id)
    {
        Cart::create([
            'course_id' => $id,
            'user_id' => Auth::user()->id,
        ]);

        return redirect()->back();
    }

    //remove cart
    public function removeCart($id)
    {
        Cart::where('id', $id)->delete();
        return back();
    }

    //save for later
    public function saveForLater($id)
    {
        $cart = Cart::where('id', $id)->first();
        SaveForLater::create([
            'course_id' => $cart->course_id,
            'user_id' => $cart->user_id,
        ]);
        Cart::where('id', $id)->delete();
        return back();
    }

    //move to cart
    public function moveToCart($id)
    {
        $cart = SaveForLater::where('id', $id)->first();
        Cart::create([
            'course_id' => $cart->course_id,
            'user_id' => $cart->user_id,
        ]);
        SaveForLater::where('id', $id)->delete();
        return back();
    }

    //remove from save for later
    public function removeLaterCart($id)
    {
        SaveForLater::where('id', $id)->delete();
        return back();
    }

    //checkout
    public function checkout()
    {
        Cart::truncate();
        return Inertia::render('User/Cart/Checkout');
    }
}
