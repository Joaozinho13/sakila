<?php

namespace App\Http\Controllers\FilmText;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\FilmText;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;

class FilmTextController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return void
     */
    public function index()
    {
        $filmtext = FilmText::paginate(15);

        return view('FilmText.film-text.index', compact('filmtext'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return void
     */
    public function create()
    {
        return view('FilmText.film-text.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return void
     */
    public function store(Request $request)
    {
        $this->validate($request, ['title' => 'required', ]);

        FilmText::create($request->all());

        Session::flash('flash_message', 'FilmText added!');

        return redirect('FilmText/film-text');
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
        $filmtext = FilmText::findOrFail($id);

        return view('FilmText.film-text.show', compact('filmtext'));
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
        $filmtext = FilmText::findOrFail($id);

        return view('FilmText.film-text.edit', compact('filmtext'));
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
        $this->validate($request, ['title' => 'required', ]);

        $filmtext = FilmText::findOrFail($id);
        $filmtext->update($request->all());

        Session::flash('flash_message', 'FilmText updated!');

        return redirect('FilmText/film-text');
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
        FilmText::destroy($id);

        Session::flash('flash_message', 'FilmText deleted!');

        return redirect('FilmText/film-text');
    }
}
