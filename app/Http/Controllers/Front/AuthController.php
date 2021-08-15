<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Client;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\DonationRequest;
class AuthController extends Controller
{
public function register()

{
    return view('front.register');

}
public function storeClient(Request $request){
    $rules = [
        'name' => 'required',
        'email' => 'required|email',
        'phone' => 'required',
        'password' => 'required|confirmed',
    
    ];
        $messages = ['name.required' => 'name is required'];
        $this->validate($request, $rules, $messages);
        $client = new Client;
        $request->merge(['password' => bcrypt($request->password) ]);
        $client = Client::create($request->all());
       
        $client->save();
            
        flash()->success("your account created successfully");
    
        return back();
}
public function askDonation(){
    return view('front.ask_donation');

}
public function storeDonation(Request $request){
    $rules = [
        'name' => 'required',
      
       
    
    ];
        $messages = ['name.required' => 'name is required'];
        $this->validate($request, $rules, $messages);
        $donation = new DonationRequest;
        $donation = DonationRequest::create($request->all());
       
        $donation->save();
            
        flash()->success("your account created successfully");
    
        return back();

}

}
