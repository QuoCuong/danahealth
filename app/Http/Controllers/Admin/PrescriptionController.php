<?php

namespace App\Http\Controllers\Admin;

use App\Prescription;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PrescriptionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $status = $request->status ?? 'pending';
        $isDescending = $request->isDescending ?? false;

        $prescriptions = Prescription::whereStatus($status)->orderBy('id', $isDescending ? 'desc' : 'asc')->paginate(12);

        return view('admin.prescriptions.index', [
            'status'        => $status,
            'isDescending'  => $isDescending,
            'prescriptions' => $prescriptions,
        ]);
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
        $prescription = Prescription::with('user', 'district', 'images')->find($id);

        return view("admin.prescriptions.status.$prescription->status", compact('prescription'));
    }

    public function cancel($id)
    {
        Prescription::find($id)->update([
            'status' => 'cancelled',
        ]);

        return back();
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
