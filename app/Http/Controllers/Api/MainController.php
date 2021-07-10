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
}

