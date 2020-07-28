<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Contracts\UserContract;

class AccountController extends Controller
{
    protected $userRepository;

    public function __construct(UserContract $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function getOrders()
    {
        $orders = auth()->user()->orders;

        return view('site.pages.account.orders', compact('orders'));
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

        if (!$user) {
            return redirect()->back()->with('message', 'User Profile is not updated.');
        }
        return redirect()->back()->with('Category updated successfully');
    }

    public function deleteProfile(Request $request)
    {
        $this->userRepository->deleteUser(auth()->user()->id);
    }
}