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
    public function index(Request $request)
    {
        $request->validate([
            'status' => ['in:accepted,rejected']
        ]);

        switch ($request->status) {
            case 'accepted':
                $donors = Donor::where('status', true)->latest()->get();
                break;

            case 'rejected':
                $donors = Donor::where('status', false)->latest()->get();
                break;

            default:
                $donors = Donor::latest()->get();
                break;
        }


        // return $donors;

        return view('admin.donors.index', compact('donors'));
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
            'agreement' => ['required'],
            'positiveImage' => ['required', 'image'],
            'negativeImage' => ['required', 'image'],
            'city' => ['required', 'max:255', 'in:jakarta pusat,jakarta utara,jakarta barat,jakarta selatan,jakarta timur']
        ]);

        $positiveImage = $request->file('positiveImage');
        $negativeImage = $request->file('negativeImage');

        $positiveImageName = $positiveImage->hashName();
        $negativeImageName = $negativeImage->hashName();

        $dirPositive = 'public/positives';
        $dirNegative = 'public/negatives';

        $request->file('positiveImage')->storeAs($dirPositive, $positiveImageName);
        $request->file('negativeImage')->storeAs($dirNegative, $negativeImageName);

        $donor = Donor::create([
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
            'agreement' => $request->agreement == 'on' ? true : false,
            'positiveImage' => $positiveImageName,
            'negativeImage' => $negativeImageName,
            'status' => false,
            'city' => $request->city
        ]);

        return redirect()->route('formulir.pendaftaran')->with('success', 'Terimakasih telah mendaftar :)');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        $request->validate([
            'status' => ['required', 'boolean']
        ]);

        $donor = Donor::where('id', $id)->first();
        $donor->update([
            'status' => $request->status
        ]);

        return redirect()->route('admin.donors.index')->with('success', 'Data updated !');
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
        Donor::destroy($id);

        return redirect()->route('admin.donors.index')->with('success', 'Data deleted !');
    }

    public function massDelete(Request $request)
    {
        $arr = explode(',', $request->ids);

        foreach ($arr as $id) {
            Donor::destroy($id);
        }

        return redirect()->route('admin.donors.index')->with('success', 'Bulk delete success');
    }

    public function search(Request $request)
    {
        // $request->validate([
        //     'bloodType' => ['in:blood-group-a,blood-group-b,blood-group-o,blood-group-ab'],
        //     'rhesus' => ['in:rhesus-plus,rhesus-minus'],
        //     'city' => ['in:jakarta pusat,jakarta utara,jakarta barat,jakarta selatan,jakarta timur'],
        //     'search' => ['boolean']
        // ]);

        // if ($request->search == true) {
        //     $donors = Donor::where(['bloodType' => $request->bloodType, 'rhesus' => $request->rhesus, 'city' => $request->city])->latest()->get();
        // } else {
        $donors = Donor::where('status', true)->latest()->get();
        // }


        $aArr = [];
        $abArr = [];
        $bArr = [];
        $oArr = [];

        // return explode(0, $donors[0]->mobile)[1];

        foreach ($donors as $donor) {
            switch ($donor->bloodType) {
                case 'blood-group-a':
                    array_push($aArr, $donor);
                    break;

                case 'blood-group-b':
                    array_push($bArr, $donor);
                    break;

                case 'blood-group-o':
                    array_push($oArr, $donor);
                    break;

                case 'blood-group-ab':
                    array_push($abArr, $donor);
                    break;

                default:
                    //
                    break;
            }
        }

        return view('cari-pendonor', compact('donors', 'aArr', 'abArr', 'bArr', 'oArr'));
    }
    public function search2(Request $request)
    {
        $request->validate([
            'bloodType' => ['in:blood-group-a,blood-group-b,blood-group-o,blood-group-ab'],
            'rhesus' => ['in:rhesus-plus,rhesus-minus'],
            'city' => ['in:jakarta pusat,jakarta utara,jakarta barat,jakarta selatan,jakarta timur'],
            'search' => ['boolean']
        ]);

        $donors = Donor::where(['status' => true, 'bloodType' => $request->bloodType, 'rhesus' => $request->rhesus, 'city' => $request->city])->latest()->get();

        // return $donors;

        return view('cari-pendonor2', compact('donors'));
    }
}
