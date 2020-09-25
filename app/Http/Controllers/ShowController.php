<?php

namespace App\Http\Controllers;

use App\Models\Show;
use App\Models\ShowRole;
use Illuminate\Http\Request;

class ShowController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $shows = Show::all();
        return view('shows.index', compact('shows'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $show = new Show();
        return view('shows.create', compact('show'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $show = new Show($request->all());
        if($show->save()) {
            $role_ids = $request->input('role_id');
            $user_ids = $request->input('user_id');
            foreach($role_ids as $index => $role_id) {
                if(isset($user_ids[$index])) {
                    $showRole = new ShowRole([
                        'show_id' => $show->id,
                        'role_id' => $role_ids[$index],
                        'user_id' => $user_ids[$index]
                    ]);
                    $showRole->save();
                } else {
                    break;
                }
            }
            return redirect()->route('shows.show', compact('show'));
        }
        return view('shows.create', compact('show'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Show  $show
     * @return \Illuminate\Http\Response
     */
    public function show(Show $show)
    {
        return view('shows.show', compact('show'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Show  $show
     * @return \Illuminate\Http\Response
     */
    public function edit(Show $show)
    {
        return view('shows.create', compact('show'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Show  $show
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Show $show)
    {
        $show->update($request->all());
        if($show->save()) {
            return redirect()->route('shows.show', compact('show'));
        }

        return redirect()->route('shows.edit', compact('show'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Show  $show
     * @return \Illuminate\Http\Response
     */
    public function destroy(Show $show)
    {
        //
    }
}
