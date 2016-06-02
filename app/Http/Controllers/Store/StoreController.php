<?php

namespace App\Http\Controllers\Store;

use App\Address;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Staff;
use App\Store;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;

class StoreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return void
     */
    public function index()
    {
        $store = Store::paginate(15);

        return view('Store.store.index', compact('store'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return void
     */
    public function create()
    {
        $address_list  = Address::lists('address','id');
        $staff_list  = Staff::lists('first_name','id');
        return view('Store.store.create')->with('address', $address_list)->with('staff', $staff_list);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return void
     */
    public function store(Request $request)
    {
        $this->validate($request, ['manager_staff_id' => 'required', 'address_id' => 'required', ]);

        Store::create($request->all());

        Session::flash('flash_message', 'Store added!');

        return redirect('Store/store');
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
        $store = Store::findOrFail($id);

        return view('Store.store.show', compact('store'));
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
        $store = Store::findOrFail($id);
        $address_list = Address::lists('address','id');
        $staff_list  = Staff::lists('first_name','id');
        return view('Store.store.edit', compact('store'))->with('address', $address_list)->with('staff', $staff_list);;
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
        $this->validate($request, ['manager_staff_id' => 'required', 'address_id' => 'required', ]);

        $store = Store::findOrFail($id);
        $store->update($request->all());

        Session::flash('flash_message', 'Store updated!');

        return redirect('Store/store');
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
        Store::destroy($id);

        Session::flash('flash_message', 'Store deleted!');

        return redirect('Store/store');
    }
}
