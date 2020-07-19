<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Webkul\Checkout\Facades\Cart;

class CartController extends Controller
{
	public function index(Request $request)
	{
		// dd(42);

		$cart = Cart::getCart();
		$currency = core()->currencySymbol(core()->getBaseCurrencyCode());

		if($request->ajax() && $request->format == 'html'){
			return view('public.cart.cart', compact('cart', 'currency'));
		}
		return view('public.cart.index', compact('cart', 'currency'));
	}
	
	public function cartPreview(Request $request){
		return view('public.cart.cart_preview');
	}
}
