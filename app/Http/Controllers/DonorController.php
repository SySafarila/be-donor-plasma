<?php

namespace App\Http\Controllers;

use App\Models\Donor;
use Illuminate\Http\Request;

class DonorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $request->validate([
            'fullName' => ['required', 'max:255'],
            'gender' => ['required', 'in:rhesus-plus,rhesus-minus'],
            'placeBirth' => ['required', 'max:255'],
            'dateBirth' => ['required'],
            'mobile' => ['required', 'max:20'],
            'email' => ['required', 'email'],
            'bloodType' => ['required', 'in:blood-group-a,blood-group-b,blood-group-o,blood-group-ab'],
            'rhesus' => ['required', 'in:rhesus-plus,rhesus-minus'],
            'height' => ['required', 'max:255'],
            'weight' => ['required', 'max:255'],
            'positiveDate' => ['required'],
            'negativeDate' => ['required'],
            'agreement' => ['required']
        ]);

        Donor::create([
            'fullName' => $request->fullName,
            'gender' => $request->gender,
            'placeBirth' => $request->placeBirth,
            'dateBirth' => $request->dateBirth,
            'mobile' => $request->mobile,
            'email' => $request->email,
            'bloodType' => $request->bloodType,
            'rhesus' => $request->rhesus,
            'height' => $request->height,
            'weight' => $request->weight,
            'positiveDate' => $request->positiveDate,
            'negativeDate' => $request->negativeDate,
            'agreement' => $request->agreement == 'on' ? true : false
        ]);

        return redirect()->route('formulir.pendaftaran')->with('success', 'Terimakasih telah mendaftar :)');
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
        //
    }
}
