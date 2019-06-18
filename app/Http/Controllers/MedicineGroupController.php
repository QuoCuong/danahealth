<?php

namespace App\Http\Controllers;

use App\Medicine;
use App\MedicineGroup;
use Illuminate\Http\Request;

class MedicineGroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $medicineGroups = MedicineGroup::whereParentId(0)->with('children')->get();

        return response()->json($medicineGroups);
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
     * @param  \App\MedicineGroup  $medicineGroup
     * @return \Illuminate\Http\Response
     */
    public function show(MedicineGroup $medicineGroup)
    {
        //
    }

    public function listMedicines(Request $request, $slug)
    {
        $sortBy = $request->sortBy ?? 'price';
        $type = $request->type ?? 'asc';
        $limit = $request->limit ?? 12;

        $medicineGroup = MedicineGroup::whereSlug($slug)->first();
        $medicine;

        if ($medicineGroup->childMedicines->count()) {
            $medicines = $medicineGroup->childMedicines();
        } else {
            $medicines = $medicineGroup->medicines();
        }

        $medicines = $medicines->orderBy($sortBy, $type)->with('images')->paginate($limit);

        return response()->json([
            'medicineGroup' => $medicineGroup,
            'medicines'     => $medicines,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\MedicineGroup  $medicineGroup
     * @return \Illuminate\Http\Response
     */
    public function edit(MedicineGroup $medicineGroup)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\MedicineGroup  $medicineGroup
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MedicineGroup $medicineGroup)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\MedicineGroup  $medicineGroup
     * @return \Illuminate\Http\Response
     */
    public function destroy(MedicineGroup $medicineGroup)
    {
        //
    }
}
