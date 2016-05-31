<?php

namespace App\Http\Controllers\City;

use App\Category;
use App\Country;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\City;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return void
     */
    public function index()
    {
        $city = City::paginate(15);


        return view('City.city.index', compact('city'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return void
     */
    public function create()
    {
        $country_list  = Country::lists('country_name','id');
        return view('City.city.create')->with('countries', $country_list);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return void
     */
    public function store(Request $request)
    {
        $this->validate($request, ['city' => 'required', 'country_id' => 'required', ]);

        City::create($request->all());

        Session::flash('flash_message', 'City added!');

        return redirect('City/city');
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
        $city = City::findOrFail($id);
        $country = Country::findOrFail($city->country_id);

        return view('City.city.show', compact('city'))->with('country', $country);
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
        $city = City::findOrFail($id);
        $country_list  = Country::lists('country_name','id');

        return view('City.city.edit', compact('city'))->with('countries', $country_list);
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
        $this->validate($request, ['city' => 'required', 'country_id' => 'required', ]);

        $city = City::findOrFail($id);
        $city->update($request->all());

        Session::flash('flash_message', 'City updated!');

        return redirect('City/city');
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
        City::destroy($id);

        Session::flash('flash_message', 'City deleted!');

        return redirect('City/city');
    }
}
