<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateMedicineRequest;
use App\Http\Requests\UpdateMedicineRequest;
use App\Medicine;
use App\MedicineGroup;
use App\Supplier;
use DB;
use Illuminate\Http\Request;

class MedicineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $isDescending = $request->isDescending ?? false;

        $medicines = Medicine::orderBy('id', $isDescending ? 'desc' : 'asc')->paginate(12);

        return view('admin.medicines.index', [
            'isDescending' => $isDescending,
            'medicines' => $medicines,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $medicineGroups = MedicineGroup::all();
        $suppliers = Supplier::all();

        return view('admin.medicines.create', [
            'medicineGroups' => $medicineGroups,
            'suppliers' => $suppliers,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateMedicineRequest $request)
    {
        DB::beginTransaction();
        try {
            $medicine = $this->createMedicine($request);
            $this->createMedicineDetail($request, $medicine);
            $this->uploadMedicineImage($request, $medicine);

            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            return back()->with([
                'type' => 'error',
                'msg' => $e->getMessage(),
            ]);
        }

        return redirect()->route('admin.medicines.show', $medicine->id)->with([
            'type' => 'success',
            'msg' => 'Thêm thuốc thành công',
        ]);
    }

    public function createMedicine(Request $request)
    {
        $data = $request->only('name', 'medicine_group_id', 'supplier_id', 'description', 'unit', 'quantity', 'price', 'exp');
        $data['exp'] = date('Y-m-d', strtotime($data['exp']));
        $medicine = Medicine::create($data);

        return $medicine;
    }

    public function createMedicineDetail(Request $request, Medicine $medicine)
    {
        $data = $request->only('ingredients', 'objects_used', 'dosage_and_usage', 'preservation', 'careful');
        $medicine->medicineDetail()->create($data);
    }

    public function uploadMedicineImage(Request $request, Medicine $medicine)
    {
        $images = $request->images;
        $path = 'storage/images/medicine';

        foreach ($images as $image) {
            $imageName = date('dmYHis') . uniqid() . '.' . $image->getClientOriginalExtension();
            $imagePath = $path . '/' . $imageName;

            $image->move(public_path($path), $imageName);
            $medicine->images()->create([
                'path' => $imagePath,
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Medicine $medicine)
    {
        return view('admin.medicines.show', compact('medicine'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Medicine $medicine)
    {
        $medicineGroups = MedicineGroup::all();
        $suppliers = Supplier::all();

        return view('admin.medicines.edit', [
            'medicine' => $medicine,
            'medicineGroups' => $medicineGroups,
            'suppliers' => $suppliers,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMedicineRequest $request, Medicine $medicine)
    {
        DB::beginTransaction();
        try {
            $medicine->update($request->all());
            $medicine->medicineDetail->update($request->all());
            if ($request->has('images')) {
                $this->uploadMedicineImage($request, $medicine);
            }

            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            return back()->with([
                'type' => 'error',
                'msg' => $e->getMessage(),
            ]);
        }

        $medicineGroups = MedicineGroup::all();
        $suppliers = Supplier::all();

        return redirect()->route('admin.medicines.edit', [
            'medicine' => $medicine,
            'medicineGroups' => $medicineGroups,
            'suppliers' => $suppliers,
        ])->with([
            'type' => 'success',
            'msg' => 'Cập nhật thuốc thành công',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Medicine $medicine)
    {
        $medicine->delete();

        return redirect()->route('admin.medicines.index')->with([
            'type' => 'success',
            'msg' => 'Xóa thuốc thành công',
        ]);
    }
}
