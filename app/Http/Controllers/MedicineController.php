<?php

namespace App\Http\Controllers;

use App\Medicine;
use DB;
use Illuminate\Http\Request;

class MedicineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $medicines = Medicine::inRandomOrder()->with('images')->limit(10)->get();

        return response()->json($medicines);
    }

    public function search(Request $request)
    {
        $request->validate(['q' => 'required']);

        $q = $request->q;

        $medicines = DB::table('suppliers')
            ->join('medicines', 'suppliers.id', '=', 'medicines.supplier_id')
            ->join('images', 'medicines.id', '=', 'images.medicine_id')
            ->select('suppliers.name as supplier_name', 'suppliers.country', 'medicines.*', 'images.path as image_path')
            ->where('medicines.name', 'like', "%$q%")
            ->orWhere('suppliers.name', 'like', "%$q%")
            ->groupBy('medicines.id')
            ->limit(20)
            ->get();

        return response()->json($medicines);
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
     * @param  \App\Medicine  $medicine
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $medicine = Medicine::whereId($id)->with('medicineDetail', 'medicineGroup', 'supplier', 'images')->first();

        return response()->json($medicine);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Medicine  $medicine
     * @return \Illuminate\Http\Response
     */
    public function edit(Medicine $medicine)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Medicine  $medicine
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Medicine $medicine)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Medicine  $medicine
     * @return \Illuminate\Http\Response
     */
    public function destroy(Medicine $medicine)
    {
        //
    }
}
