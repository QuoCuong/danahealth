<?php

namespace App\Http\Controllers;

use App\Prescription;
use App\Http\Requests\CreatePrescriptionRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PrescriptionController extends Controller
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
    public function store(CreatePrescriptionRequest $request)
    {
        $user   = Auth::user();
        $data   = $request->all('phone', 'email', 'fullname', 'address', 'district_id');
        $images = $request->images;
        $path   = 'storage/images/prescription';

        DB::beginTransaction();
        try {
            //create new prescription
            $prescription = $user->prescriptions()->create([
                'phone'       => $data['phone'],
                'email'       => $data['email'],
                'fullname'    => $data['fullname'],
                'address'     => $data['address'],
                'district_id' => $data['district_id'],
            ]);

            //upload images
            foreach ($images as $image) {
                $imageName = date('dmYHis') . uniqid() . '.' . $image->getClientOriginalExtension();
                $imagePath = $path . '/' . $imageName;

                $image->move(public_path($path), $imageName);
                $prescription->images()->create([
                    'path' => $imagePath,
                ]);
            }

            DB::commit();
        } catch(\Exception $e) {
            DB::rollback();
            dd($e);
            return response()->json([
                'errors' => $e,
            ], Response::HTTP_BAD_REQUEST);
        }
        return response()->json([
            'success' => 'Đặt đơn thuốc thành công',
        ], Response::HTTP_OK);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Prescription  $prescription
     * @return \Illuminate\Http\Response
     */
    public function show(Prescription $prescription)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Prescription  $prescription
     * @return \Illuminate\Http\Response
     */
    public function edit(Prescription $prescription)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Prescription  $prescription
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Prescription $prescription)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Prescription  $prescription
     * @return \Illuminate\Http\Response
     */
    public function destroy(Prescription $prescription)
    {
        //
    }
}
