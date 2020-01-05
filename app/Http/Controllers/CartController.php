<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Webkul\Checkout\Facades\Cart;

class CartController extends Controller
{
    public function index(Request $request)
    {
        $cart = Cart::getCart();
        $currency = core()->currencySymbol(core()->getBaseCurrencyCode());
        return view('public.cart.index', compact('cart', 'currency'));
    }

}
