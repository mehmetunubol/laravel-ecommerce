<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Contracts\UserContract;
use App\Contracts\WishlistContract;
use App\Contracts\OrderContract;

class AccountController extends Controller
{
    protected $userRepository;
    protected $wishlistRepository;
    protected $orderRepository;

    public function __construct(UserContract $userRepository, WishlistContract $wishlistRepository, OrderContract $orderRepository)
    {
        $this->userRepository = $userRepository;
        $this->wishlistRepository = $wishlistRepository;
        $this->orderRepository = $orderRepository;
    }

    public function getAccount($page_name)
    {
        $wishlists = auth()->user()->wishlist()->get();
        $orders = auth()->user()->orders;
        $user = $this->userRepository->findUserById(auth()->user()->id);
        $addresses = $user->addresses;
        return view('site.account.account' ,compact('page_name', 'orders', 'user', 'wishlists','addresses'));
    }

    public function getOrders()
    {
        $orders = auth()->user()->orders;

        return view('site.pages.account.orders', compact('orders'));
    }
    
    public function getOrderItems($id)
    {
        $order = $this->orderRepository->findOrderById($id);
        $items = $order->items;
        return view('site.account.orderItems', compact('items'));
    }

    public function getProfile()
    {
        $user = $this->userRepository->findUserById(auth()->user()->id);
        return view('site.pages.account.profile', compact('user'));
    }

    public function updateProfile(Request $request)
    {
        $this->validate($request, [
            'first_name'      =>  'required|max:191',
        ]);

        $params = $request->except('_token');
        $params['user_id'] = auth()->user()->id;

        $user = $this->userRepository->updateUser($params);

        if (!$user) 
        {
            return redirect()->back()->with('message', 'User Profile is not updated.');
        }
        return redirect()->back()->with('Category updated successfully');
    }

    public function deleteProfile(Request $request)
    {
        $this->userRepository->deleteUser(auth()->user()->id);
    }
}