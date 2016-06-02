<?php

namespace App\Http\Controllers\Staff;

use App\Address;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Staff;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;

class StaffController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return void
     */
    public function index()
    {
        $staff = Staff::paginate(15);

        return view('Staff.staff.index', compact('staff'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return void
     */
    public function create()
    {
        $address_list  = Address::lists('address','id');
        return view('Staff.staff.create')->with('address', $address_list);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return void
     */
    public function store(Request $request)
    {
        $this->validate($request, ['first_name' => 'required', 'last_name' => 'required', 'address_id' => 'required', 'email' => 'required', 'active' => 'required', 'username' => 'required', 'password' => 'required', ]);

        Staff::create($request->all());

        Session::flash('flash_message', 'Staff added!');

        return redirect('Staff/staff');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return void
     */
    public function show($id)
    {
        $staff = Staff::findOrFail($id);

        return view('Staff.staff.show', compact('staff'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return void
     */
    public function edit($id)
    {
        $staff = Staff::findOrFail($id);
        $address_list = Address::lists('address','id');

        return view('Staff.staff.edit', compact('staff'))->with('address', $address_list);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     *
     * @return void
     */
    public function update($id, Request $request)
    {
        $this->validate($request, ['first_name' => 'required', 'last_name' => 'required', 'address_id' => 'required', 'email' => 'required', 'active' => 'required', 'username' => 'required', 'password' => 'required', ]);

        $staff = Staff::findOrFail($id);
        $staff->update($request->all());

        Session::flash('flash_message', 'Staff updated!');

        return redirect('Staff/staff');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return void
     */
    public function destroy($id)
    {
        Staff::destroy($id);

        Session::flash('flash_message', 'Staff deleted!');

        return redirect('Staff/staff');
    }
}
