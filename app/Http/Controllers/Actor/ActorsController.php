<?php

namespace App\Http\Controllers\Actor;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Actor;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;

class ActorsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return void
     */
    public function index()
    {
        $actors = Actor::paginate(15);

        return view('Actor.actors.index', compact('actors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return void
     */
    public function create()
    {
        return view('Actor.actors.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return void
     */
    public function store(Request $request)
    {
        $this->validate($request, ['first_name' => 'required', 'last_name' => 'required', ]);

        Actor::create($request->all());

        Session::flash('flash_message', 'Actor added!');

        return redirect('Actor/actors');
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
        $actor = Actor::findOrFail($id);

        return view('Actor.actors.show', compact('actor'));
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
        $actor = Actor::findOrFail($id);

        return view('Actor.actors.edit', compact('actor'));
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
        $this->validate($request, ['first_name' => 'required', 'last_name' => 'required', ]);

        $actor = Actor::findOrFail($id);
        $actor->update($request->all());

        Session::flash('flash_message', 'Actor updated!');

        return redirect('Actor/actors');
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
        Actor::destroy($id);

        Session::flash('flash_message', 'Actor deleted!');

        return redirect('Actor/actors');
    }
}
