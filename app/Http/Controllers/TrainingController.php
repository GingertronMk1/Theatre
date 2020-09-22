<?php

namespace App\Http\Controllers;

use App\Models\Prerequisite;
use App\Models\Training;
use Illuminate\Http\Request;

class TrainingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $training = Training::all();
        return view('training.index', compact('training'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $training = new Training();
        $other_training = Training::all();
        return view('training.create', compact('training', 'other_training'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $training = new Training([
            'name' => $request->input('name')
        ]);
        if ($training->save()) {
            foreach ($request->input('prerequisite') as $prereq_id) {
                $prereq = new Prerequisite([
                    'training_id' => $training->id,
                    'prerequisite_id' => $prereq_id
                ]);
                $prereq->save();
            }
            return redirect()->route('training.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Training  $training
     * @return \Illuminate\Http\Response
     */
    public function show(Training $training)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Training  $training
     * @return \Illuminate\Http\Response
     */
    public function edit(Training $training)
    {
        $other_training = Training::all();
        return view('training.create', compact('training', 'other_training'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Training  $training
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Training $training)
    {
        $training->update($request->all());
        if ($training->save()) {
            /*
                Find those prerequisites in the database
                whose training ID = $training->id, but whose
                prerequisite_id is not in the array of prerequisite IDs given
            */
            $prerequisite_ids = $request->input('prerequisite');
            $useless = Prerequisite::where('training_id', $training->id)
            ->whereNotIn('prerequisite_id', $prerequisite_ids)
            ->delete();
            foreach ($prerequisite_ids as $prereq_id) {
                $prereq = Prerequisite::where([
                    ['training_id', '=', $training->id],
                    ['prerequisite_id', '=', $prereq_id]
                ])->first();
                if ($prereq === null) {
                    $prereq = new Prerequisite([
                        'training_id' => $training->id,
                        'prerequisite_id' => $prereq_id
                    ]);
                }
                $prereq->save();
            }
            return redirect()->route('training.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Training  $training
     * @return \Illuminate\Http\Response
     */
    public function destroy(Training $training)
    {
        //
    }
}
