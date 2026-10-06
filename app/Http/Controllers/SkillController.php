<?php

namespace App\Http\Controllers;

use App\Models\Skill;
use Illuminate\Http\Request;

class SkillController extends Controller
{
    public function index()
    {
        $skills = Skill::all();
        $mySkills = auth()->user()->skills;

        return view('skills.index', compact('skills', 'mySkills'));
    }

    public function add(Request $request)
    {
        $data = $request->validate([
            'skill_id' => 'required|exists:skills,id',
        ]);

        auth()->user()->skills()->attach($data['skill_id']);

        return redirect('/my-skills');
    }

    public function remove(Skill $skill)
    {
        auth()->user()->skills()->detach($skill->id);

        return redirect('/my-skills');
    }

    public function sync(Request $request)
    {
        $data = $request->validate([
            'skills' => 'array',
            'skills.*' => 'exists:skills,id',
        ]);

        auth()->user()->skills()->sync($data['skills'] ?? []);

        return redirect('/my-skills');
    }
}
