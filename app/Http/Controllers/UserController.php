<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $records = User::paginate(20);
        return view('users.index', compact('records'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            
            'name' => 'required',
            'password' => 'required|confirmed',
            'email' => 'email',

    
    
    ];
        $messages = ['name.required' => 'name is required',
        'email.required' => 'email is required',
        'password.required' => 'password is required'
    
    ];
        $this->validate($request, $rules, $messages);
        $request->merge(['password' => bcrypt($request->password) ]);
        $record = User::create($request->except('roles_list'));
        $record->roles()->attach($request->input('roles_list'));

        flash()->success("User created successfully");
        return redirect(route('users.index'));

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $model = User::findOrFail($id);
        return view('users.edit', compact('model'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $record = User::findOrFail($id);     
         $rules = [
            
            'name' => 'required',
            'password' => 'required|confirmed',
            'email' => 'email',

    
    
    ];
        $messages = ['name.required' => 'name is required',
        'email.required' => 'email is required',
        'password.required' => 'password is required'
    
    ]; 
        $this->validate($request, $rules, $messages);
       
        $record->roles()->sync((array) $request->input('roles_list'));
        $request->merge(['password' => bcrypt($request->password)]);
        $record->update($request->all());
        flash()->success("user updated successfully");
        return redirect(route('users.index'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $record = User::findOrFail($id);
        $record->delete();
        flash()->success("user deleted successfully");
        return redirect(route('users.index'));

    }
}

