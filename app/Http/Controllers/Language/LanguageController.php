<?php

namespace App\Http\Controllers\Language;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Language;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;

class LanguageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return void
     */
    public function index()
    {
        $language = Language::paginate(15);

        return view('Language.language.index', compact('language'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return void
     */
    public function create()
    {
        return view('Language.language.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return void
     */
    public function store(Request $request)
    {
        $this->validate($request, ['language_name' => 'required', ]);

        Language::create($request->all());

        Session::flash('flash_message', 'Language added!');

        return redirect('Language/language');
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
        $language = Language::findOrFail($id);

        return view('Language.language.show', compact('language'));
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
        $language = Language::findOrFail($id);

        return view('Language.language.edit', compact('language'));
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
        $this->validate($request, ['language_name' => 'required', ]);

        $language = Language::findOrFail($id);
        $language->update($request->all());

        Session::flash('flash_message', 'Language updated!');

        return redirect('Language/language');
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
        Language::destroy($id);

        Session::flash('flash_message', 'Language deleted!');

        return redirect('Language/language');
    }
}
