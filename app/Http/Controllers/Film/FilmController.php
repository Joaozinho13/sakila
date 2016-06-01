<?php

namespace App\Http\Controllers\Film;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Film;
use App\Language;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;

class FilmController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return void
     */
    public function index()
    {
        $film = Film::paginate(15);

        return view('Film.film.index', compact('film'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return void
     */
    public function create()
    {
        $language_list  = Language::lists('language_name','id');
        return view('Film.film.create')->with('language', $language_list);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return void
     */
    public function store(Request $request)
    {
        $this->validate($request, ['title' => 'required', 'description' => 'required', 'release_year' => 'required', 'language_id' => 'required', 'original_language_id' => 'required', 'rental_duration' => 'required', 'rental_rate' => 'required', 'length' => 'required', 'replacement_cost' => 'required', 'rating' => 'required', ]);

        Film::create($request->all());

        Session::flash('flash_message', 'Film added!');

        return redirect('Film/film');
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
        $film = Film::findOrFail($id);

        return view('Film.film.show', compact('film'));
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
        $film = Film::findOrFail($id);

        $language_list  = Language::lists('language_name','id');

        return view('Film.film.edit', compact('film'))->with('language', $language_list);
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
        $this->validate($request, ['title' => 'required', 'description' => 'required', 'release_year' => 'required', 'language_id' => 'required', 'original_language_id' => 'required', 'rental_duration' => 'required', 'rental_rate' => 'required', 'length' => 'required', 'replacement_cost' => 'required', 'rating' => 'required', ]);

        $film = Film::findOrFail($id);
        $film->update($request->all());

        Session::flash('flash_message', 'Film updated!');

        return redirect('Film/film');
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
        Film::destroy($id);

        Session::flash('flash_message', 'Film deleted!');

        return redirect('Film/film');
    }
}
