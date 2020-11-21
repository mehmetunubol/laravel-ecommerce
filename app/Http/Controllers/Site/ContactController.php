<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

use App\Mail\ContactMail;

class ContactController extends Controller
{

    protected $userRepository;

    public function __construct(
    )
    {
        //
    }

    public function index()
    {
        return view('site.contact.index');
    }

    public function submit(Request $request)
    {
        $this->validate($request, [
            'subject'      =>  'required|max:191',
            'name'      =>  'required',
            'email'      =>  'required',
            'message'      =>  'required'
        ]);
        $mailData = $request->except('_token');
        Mail::to(config('settings.info_email_address'))->send(new ContactMail($mailData));
    }
}