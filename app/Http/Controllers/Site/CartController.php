<?php

namespace App\Http\Controllers\Site;

use Cart;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CartController extends Controller
{
    public function getCart()
    {
        return view('site.pages.cart');
    }

    public function removeItem($id)
    {
        Cart::remove($id);

        if (Cart::isEmpty()) {
            return redirect('/');
        }
        return redirect()->back()->with('message', 'Item removed from cart successfully.');
    }

    public function incrementItemQuantity($id)
    {
        
        Cart::update($id, array(
            'quantity' => 1, 
        ));
        return redirect()->back()->with('message', 'Item quantity changed.');
    }

    public function decrementItemQuantity($id)
    {
        
        Cart::update($id, array(
            'quantity' => -1, 
        ));
        return redirect()->back()->with('message', 'Item quantity changed.');;
    }

    public function clearCart()
    {
        Cart::clear();

        return redirect('/');
    }
}
