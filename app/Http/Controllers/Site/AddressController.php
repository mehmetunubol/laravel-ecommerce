<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Contracts\UserContract;
use App\Contracts\AddressContract;
use Auth;

class AddressController extends Controller
{
	protected $addressRepository;
	protected $userRepository;

    public function __construct(AddressContract $addressRepository, UserContract $userRepository)
    {
        $this->userRepository = $userRepository;
        $this->addressRepository = $addressRepository;
    }

    public function addresses()
    {
    	$addresses = Auth::user()->addresses;

    	return view('site.address.addresses', compact('addresses'));
    }

    public function create()
    {
    	return view('site.address.create');
    }

    public function store(Request $request)
    {
    	$this->validate($request, [
            'first_name' =>  'required',
            'last_name'  =>  'required',
            'firm_name' => 'required',
            'address'	 =>  'required',
            'district'	     => 'required',
            'city'       => 'required',
            'country'    => 'required',
            'cell_phone'      => 'required',
        ]);
        $params = $request->except('_token');
        $address = $this->addressRepository->createAddress($params);

        if (!$address) {
            return redirect('/addresses')->with('message','error | An error is occured.');
        }
        return redirect('/addresses')->with('message','success | Product is removed from your wishlist.');
    }

    public function edit($id)
    {
    	$address = $this->addressRepository->findAddressById($id);

    	return view('site.address.edit', compact('address'));
    }

    public function update(Request $request)
    {
    	$this->validate($request, [
            'first_name' =>  'required',
            'last_name'  =>  'required',
            'firm_name' => 'required',
            'address'    =>  'required',
            'district'       => 'required',
            'city'       => 'required',
            'country'    => 'required',
            'cell_phone'      => 'required',
        ]);
        $params = $request->except('_token');

        $address = $this->addressRepository->updateAddress($params);

        if (!$address) {
            return redirect('/addresses')->with('message','error | An error is occured.');
        }
        return redirect('/addresses')->with('message','success | Product is removed from your wishlist.');
    }

    public function delete(Request $request)
    {
    	$id = $request['addressID'];
    	$address = $this->addressRepository->deleteAddress($id);

    	if (!$address) {
            return redirect()->back()->with('message','error | An error is occured.');
        }
        return redirect()->back()->with('message','success | Product is removed from your wishlist.');
    }
    
}