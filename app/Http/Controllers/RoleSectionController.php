<?php

namespace App\Http\Controllers;

use App\Models\RoleSection;
use Illuminate\Http\Request;

class RoleSectionController extends Controller
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
        $roleSection = new RoleSection();
        return view('role-sections.create', compact('roleSection'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $roleSection = new RoleSection($request->all());
        if($roleSection->save()) {
            return redirect()->route('roles.index');
        }

        return view('role-sections.create', compact('roleSection'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\RoleSection  $roleSection
     * @return \Illuminate\Http\Response
     */
    public function show(RoleSection $roleSection)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\RoleSection  $roleSection
     * @return \Illuminate\Http\Response
     */
    public function edit(RoleSection $roleSection)
    {
        return view('role-sections.create', compact('roleSection'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\RoleSection  $roleSection
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RoleSection $roleSection)
    {
        if($roleSection->update($request->all())) {
            return redirect()->route('roles.index');
        }
        return redirect()->route('role-sections', compact('roleSection'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\RoleSection  $roleSection
     * @return \Illuminate\Http\Response
     */
    public function destroy(RoleSection $roleSection)
    {
        //
    }
}
