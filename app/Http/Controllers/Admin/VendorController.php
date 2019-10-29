<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Vendor;
use Illuminate\Http\Request;

class VendorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['vendors'] = Vendor::orderBy('id','desc')->paginate(2);
        return view('admin.vendor.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.vendor.create');
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
            'name' => 'required',
            'email' => 'required|email',
            'status' => 'required|in:'.Vendor::ACTIVE_STATUS.','.Vendor::INACTIVE_STATUS
        ]);

        Vendor::create($request->except(['_token'])) ;
        session()->flash('message','Vendor Added Successfully');
        return redirect()->route('vendor.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Vendor  $vendor
     * @return \Illuminate\Http\Response
     */
    public function show(Vendor $vendor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Vendor  $vendor
     * @return \Illuminate\Http\Response
     */
    public function edit(Vendor $vendor)
    {
        $data['vendor'] = $vendor;
        return view('admin.vendor.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Vendor  $vendor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Vendor $vendor)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'status' => 'required|in:'.Vendor::ACTIVE_STATUS.','.Vendor::INACTIVE_STATUS
        ]);

        $vendor->update($request->except(['_token'])) ;
        session()->flash('message','Vendor Details Updated Successfully');
        return redirect()->route('vendor.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Vendor  $vendor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vendor $vendor)
    {
        Vendor::destroy($vendor->id);
        session()->flash('message','Vendor deleted successfully');
        return redirect()->back();
    }
}
