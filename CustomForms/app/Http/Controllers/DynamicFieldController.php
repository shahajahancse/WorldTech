<?php

namespace App\Http\Controllers;

use App\DynamicField;
use Illuminate\Http\Request;

class DynamicFieldController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dynamic_field');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'qty' => 'required|Numeric',
            'price' => 'required|Numeric',
            'item_total' => 'required|Numeric',
            'grand_total' => 'required|Numeric',
        ]);

        $dynamicField = new DynamicField();
        $dynamicField->qty = $request->qty;
        $dynamicField->price = $request->price;
        $dynamicField->item_total = $request->item_total;
        $dynamicField->grand_total = $request->grand_total;
        $dynamicField->save(); 
        session()->flash('status', 'Data inserted successfully'); 
        return redirect()->back()->withInput();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\DynamicField  $dynamicField
     * @return \Illuminate\Http\Response
     */
    public function show(DynamicField $dynamicField)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\DynamicField  $dynamicField
     * @return \Illuminate\Http\Response
     */
    public function edit(DynamicField $dynamicField)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\DynamicField  $dynamicField
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DynamicField $dynamicField)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\DynamicField  $dynamicField
     * @return \Illuminate\Http\Response
     */
    public function destroy(DynamicField $dynamicField)
    {
        //
    }
}
