<?php

namespace App\Http\Controllers;

use App\Models\ShowRole;
use Illuminate\Http\Request;

class ShowRoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ShowRole  $showRole
     * @return \Illuminate\Http\Response
     */
    public function show(ShowRole $showRole)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ShowRole  $showRole
     * @return \Illuminate\Http\Response
     */
    public function edit(ShowRole $showRole)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ShowRole  $showRole
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ShowRole $showRole)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ShowRole  $showRole
     * @return \Illuminate\Http\Response
     */
    public function destroy(ShowRole $showRole)
    {
        //
    }

    public function addToForm() {
        return view('components.shows.show-role');
    }
}
