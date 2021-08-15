<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DonationRequest;

class DonationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
     
        $records = DonationRequest::where(function ($query) use($request){
            if ($request->input('keyword'))
            {
                $query->where(function ($query) use($request){
                    $query->where('patient_name','like','%'.$request->keyword.'%');
                    $query->orWhere('patient_phone','like','%'.$request->keyword.'%');
                    $query->orWhere('hospital_name','like','%'.$request->keyword.'%');
                    $query->orWhere('hospital_address','like','%'.$request->keyword.'%');

                });
            }

          
        })->paginate(20);
          return view('donations.index', compact('records'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $row = DonationRequest::findOrFail($id);
        return view('donations.show', compact('row'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $record = DonationRequest::findOrFail($id);
        $record->delete();
        flash()->success("donation request deleted successfully");
        return redirect(route('donations.index'));
    }
}
