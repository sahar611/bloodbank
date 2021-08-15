<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Governorate;
use App\Models\City;
use App\Models\Post;
use App\Models\Category;
use App\Models\BloodType;
use App\Models\Setting;
use App\Models\Contact;
use App\Models\Client;
use App\Models\DonationRequest;
use Log;

class MainController extends Controller
{

    public function governorates()
    {
        $governorates = Governorate::all();
        return resposeJson(1, 'succss', $governorates);
    }
    public function cities(Request $request)
    {
        $cities = City::where(function ($query) use ($request)
        {
            if ($request->has('governorate_id'))
            {
                $query->where('governorate_id', $request->governorate_id);

            }
        })
            ->get();

        return resposeJson(1, 'succss', $cities);

    }
    public function posts()
    {
        $posts = Post::with('category')->paginate(10);
        return resposeJson(1, 'succss', $posts);
    }
    public function categories()
    {
        $categories = Category::all();
        return resposeJson(1, 'succss', $categories);
    }
    public function blood_types()
    {
        $blood = BloodType::all();
        return resposeJson(1, 'succss', $blood);
    }
    public function settings()
    {
        $settings = Setting::all();
        return resposeJson(1, 'succss', $settings);
    }
    

    public function contacts(Request $request)
    {
        $validator = Validator()->make($request->all() , [

        'name' => 'required', 'email' => 'required', 'phone' => 'required', 'subject' => 'required', 'message' => 'required',

        ]);
        if ($validator->fails())
        {
            return resposeJson(0, '', $validator->errors());

        }
        else
        {

            $contact = Contact::create($request->all());
            $contact->save();

            return resposeJson(1, 'success', $contact);
        }

    }
    public function postFavourites(Request $request){
         $rule=[
'post_id'=>'required|exists:posts,id',
         ];
         $validator = Validator()->make($request->all() , $rule);
            if ($validator->fails())
            {
                return resposeJson(0, '', $validator->errors());
    
            }
           $toggle=$request->user()->posts()->toggle($request->post_id);
           return resposeJson(1, 'success', $toggle);

    }
    public function myFavourites(Request $request){
      $posts=$request->user()->posts->paginate(20);;
      return resposeJson(1, 'success', $posts);


   }
   public function donationRequest(Request $request){
   $validator = Validator()->make($request->all() , [

     
    'patient_name'=>'required',
    'patient_phone'=>'required',
    'hospital_name'=>'required',
    'hospital_address'=>'required',
    'patient_age'=>'required:digits',
    'bages_num'=>'required:digits',
    'longitude'=>'required',
    'latitude'=>'required',
    'city_id'=>'required',
    'blood_type_id'=>'required',
    'client_id'=>'',
    'notes'=>'',



    ]);
  

       if ($validator->fails())
       {
           return resposeJson(0, $validator->errors()->first() , $validator->errors());

       }
       $donation_request = $request->user()->donationRequests()->create($request->all());

       $clientIds=$donation_request->city->governorate->
       clients()->whereHas('bloodTypes',function($q) use ($request){

       $q->where('blood_types.id',$request->blood_type_id);


     })->pluck('clients.id')->toArray();
     if(count($clientIds)){
         $notification= $donation_request->notification()->create([
             'tittle'=>'احتاج متبرع',
             'contant'=>$donation_request->BloodType->name .'محتاج متبرع لفصيلة'
         ]);
         $notification->clients()->attach($clientIds);

     }
     
       
   }
     public function NotificationSettings(Request $request)
    {
        $rules = [
            'governorates.*' => 'exists:governorates,id',
            'blood_types.*'  => 'exists:blood_types,id',
        ];
        $validator = validator()->make($request->all(), $rules);
        if ($validator->fails()) {
            return responseJson(0, $validator->errors()->first(), $validator->errors());
        }

        if ($request->has('governorates')) {
            $request->user()->governorates()->sync($request->governorates);
        }

        if ($request->has('blood_types')) {
            $request->user()->bloodTypes()->sync($request->blood_types);
        }

        $data = [
            'governorates' => $request->user()->governorates()->pluck('governorates.id')->toArray(), 
            'blood_types'  => $request->user()->bloodTypes()->pluck('blood_types.id')->toArray(),
        ];
        return resposeJson(1, 'تم  التحديث', $data);
    }}