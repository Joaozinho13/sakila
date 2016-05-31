<?php

namespace App\Http\Controllers\Address;

use App\City;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Address;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;

class AddressController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return void
     */
    public function index()
    {
        $address = Address::paginate(15);

        return view('Address.address.index', compact('address'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return void
     */
    public function create()
    {
        $city_list  = City::lists('city','id');
        return view('Address.address.create')->with('city', $city_list);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return void
     */
    public function store(Request $request)
    {
        $this->validate($request, ['address' => 'required', 'number' => 'required', 'district' => 'required', 'city_id' => 'required', 'postal_code' => 'required', ]);

        Address::create($request->all());

        Session::flash('flash_message', 'Address added!');

        return redirect('Address/address');
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
        $address = Address::findOrFail($id);

        return view('Address.address.show', compact('address'));
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
        $address = Address::findOrFail($id);
        $city_list  = City::lists('city','id');
        return view('Address.address.edit', compact('address'))->with('city', $city_list);
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
        $this->validate($request, ['address' => 'required', 'number' => 'required', 'district' => 'required', 'city_id' => 'required', 'postal_code' => 'required', ]);

        $address = Address::findOrFail($id);
        $address->update($request->all());

        Session::flash('flash_message', 'Address updated!');

        return redirect('Address/address');
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
        Address::destroy($id);

        Session::flash('flash_message', 'Address deleted!');

        return redirect('Address/address');
    }
}
