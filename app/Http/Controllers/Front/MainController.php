<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Client;
use App\Models\DonationRequest;
use App\Models\Page;
use App\Models\Contact;
use App\Models\City;
use Illuminate\Support\Facades\DB;
class MainController extends Controller
{
    public function home(Request $request)
{
    
    // $client=Client::first();
    // auth('client_web')->login($client);
    $posts=Post::take(9)->get(); 
    $donations=DonationRequest::take(9)->get();
    $city = DB::table('cities')->get();
    $blood_types = DB::table('blood_types')->get();

        return view('front.home',compact('posts','donations','city','blood_types'));

}
public function about()
{
    return view('front.about');

}
public function articles()
{
    $posts= Post::paginate(20);
    return view('front.articles',compact('posts'));

}
public function article($id)
{
    $post= Post::findOrFail($id);
    $posts=Post::take(3)->get();

    // dd($post);
    return view('front.article',compact('post','posts'));

}
public function donations()
{
    $donations=DonationRequest::paginate(20);
    $city = DB::table('cities')->get();
    $blood_types = DB::table('blood_types')->get();

    return view('front.donations',compact('donations','blood_types','city'));

}
public function donation($id)
{
    $donation= DonationRequest::findOrFail($id);

    // dd($post);
    return view('front.donation',compact('donation'));

}
public function pages($id)
{
    $page= Page::findOrFail($id);

    // dd($post);
    return view('front.who_we_are',compact('page'));

}
public function contacts()
{
    
    return view('front.contact');

}
public function storeContact(Request $request)
{
    $rules = [
    'name' => 'required',
    'email' => 'required|email',
    'subject' => 'required',
    'phone' => 'required',
    'message' => 'required'


];
    $messages = ['name.required' => 'name is required'];
    $this->validate($request, $rules, $messages);
    $contact = new Contact;

        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->subject = $request->subject;
        $contact->phone = $request->phone;
        $contact->message = $request->message;

        $contact->save();
        
    flash()->success("Thank you for contact us!");

    return back();
}
public function searchDonation(Request $request)
{
    $city = DB::table('cities')->get();
    $blood_types = DB::table('blood_types')->get();
    $donations= DonationRequest::where(function ($query) use($request){
        if ($request->input('blood_type'))
        {
            $query->where(function ($query) use($request){
                $query->where('blood_type_id','like','%'.$request->blood_type.'%');
            

            });
            
        }
        if ($request->input('city'))
        {
            $query->where(function ($query) use($request){
                $query->where('city_id','like','%'.$request->city.'%');
            

            });
    }
      
    })->paginate(20);
    return view('front.donations',compact('donations','blood_types','city'));

}
public function toggleFavourite(Request $request)
{
    $toggle=$request->user()->posts()->toggle($request->post_id);
dd($toggle);
// return responseJson(1,'success',$toggle);
}
}
