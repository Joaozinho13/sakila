<?php

namespace App\Http\Controllers\Country;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Country;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;

class CountryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return void
     */
    public function index()
    {
        $country = Country::paginate(15);

        return view('Country.country.index', compact('country'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return void
     */
    public function create()
    {
        return view('Country.country.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return void
     */
    public function store(Request $request)
    {
        $this->validate($request, ['country_name' => 'required', ]);

        Country::create($request->all());

        Session::flash('flash_message', 'Country added!');

        return redirect('Country/country');
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
        $country = Country::findOrFail($id);

        return view('Country.country.show', compact('country'));
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
        $country = Country::findOrFail($id);

        return view('Country.country.edit', compact('country'));
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
        $this->validate($request, ['country_name' => 'required', ]);

        $country = Country::findOrFail($id);
        $country->update($request->all());

        Session::flash('flash_message', 'Country updated!');

        return redirect('Country/country');
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
        Country::destroy($id);

        Session::flash('flash_message', 'Country deleted!');

        return redirect('Country/country');
    }
}
