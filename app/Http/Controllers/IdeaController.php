<?php

namespace App\Http\Controllers;

use App\Models\Idea;
use Illuminate\Contracts\View\View;

class IdeaController extends Controller
{
    public function show(Idea $idea){

        return View("ideas.show", compact('idea'));
    }

    public function store()
    {
        $validate = request()->validate([
            'content' => 'required|min:5|max:240'
        ]);

        $validate['user_id'] = auth()->id();

        Idea::create($validate);

        return redirect()->route('dashboard')->with('success' , 'Idea created success');
    }

    public function destroy(Idea $idea){

        $idea->delete();

        return redirect()->route('dashboard')->with('success' , 'Idea deleted success');
    }

    public function edit(Idea $idea){

        if(auth()->id() !== $idea->user_id){
            abort(404);
        }

        $editing  = true;
        return view('ideas.show', compact('idea', 'editing'));
    }

    public function update(Idea $idea){
        $validate = request()->validate([
            'content' => 'required|min:5|max:240'
        ]);

        $idea->update($validate);

        return redirect()->route('ideas.show', $idea->id)->with('success', "idea updated successfuly!");
    }
}
