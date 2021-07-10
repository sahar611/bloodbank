<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Client;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{

    public function register(Request $request)
    {
        $validator = Validator()->make($request->all() , ['name' => 'required', 'email' => 'required|unique:clients', 'phone' => 'required', 'last_donation_date' => 'required', 'date_of_birth' => 'required', 'password' => 'required', 'blood_type_id' => 'required',

        ]);
        if ($validator->fails())
        {
            return resposeJson(0, $validator->errors()
                ->first() , $validator->errors());

        }
        $request->merge(['password' => bcrypt($request->password) ]);
        $client = Client::create($request->all());
        $client->api_token = Str::random(60);
        $client->save();
        return resposeJson(1, 'success', ['api_token' => $client->api_token, 'client' => $client]);

    }
    public function login(Request $request)
    {
        $validator = Validator()->make($request->all() , [

        'phone' => 'required', 'password' => 'required',

        ]);
        if ($validator->fails())
        {
            return resposeJson(0, $validator->errors()
                ->first() , $validator->errors());

        }
        $client = Client::where('phone', $request->phone)
            ->first();
        if ($client)
        {
            if (Hash::check($request->password, $client->password))
            {
                return resposeJson(1, ' تم تسجيل الدخول بنجاح   ', ['api_token' => $client->api_token, 'client' => $client]);
            }
            else
            {
                return resposeJson(0, 'بيانات الدخول غير صحيحه ');

            }
        }
        else
        {
            return resposeJson(0, 'بيانات الدخول غير صحيحه ');

        }

    }
}

