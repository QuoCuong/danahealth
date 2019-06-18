<?php

namespace App\Http\Controllers\Admin;

use App\Supplier;
use App\Http\Requests\CreateSupplierRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $suppliers = Supplier::paginate(12);

        return view('admin.suppliers.index', compact('suppliers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.suppliers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateSupplierRequest $request)
    {
        $data = $request->only('name', 'email', 'address', 'phone', 'country');

        $supplier = Supplier::create($data);

        return redirect()->route('admin.suppliers.edit', $supplier->id);
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
    public function edit(Supplier $supplier)
    {
        return view('admin.suppliers.edit', compact('supplier'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CreateSupplierRequest $request, $id)
    {
        $data = $request->only('name', 'email', 'address', 'phone', 'country');

        Supplier::find($id)->update($data);

        return back()->with([
            'type' => 'success',
            'msg' => trans('messages.update.success'),
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Supplier::find($id)->delete();

        return redirect()->route('admin.suppliers.index')->with([
            'type' => 'success',
            'msg' => trans('messages.delete.success'),
        ]);
    }
}
