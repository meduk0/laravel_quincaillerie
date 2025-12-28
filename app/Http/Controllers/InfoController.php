<?php

namespace App\Http\Controllers;

use App\Models\Info;
use Illuminate\Http\Request;

class InfoController extends Controller
{
    public function create()
    {
        // You can pass the allowed options to the view
        $selectionOptions = ['Reading', 'Music', 'Cooking', 'Sports', 'Travel', 'Gaming'];

        return view('infos.create', compact('selectionOptions'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'firstname'       => ['required', 'string', 'max:255'],
            'surname'         => ['required', 'string', 'max:255'],
            'age'             => ['required', 'integer', 'between:20,150'],
            'gender'          => ['required', 'in:male,female'],
            'selection_list'         => ['required', 'array'],
            'selection_list.*'       => ['in:reading,music,cooking,sports,travel,gaming'],
        ]);


        $out=Info::create([
            'firstname'      => $validated['firstname'],
            'surname'        => $validated['surname'],
            'age'            => $validated['age'],
            'gender'         => $validated['gender'],
            'selection_list' => $validated['selection_list'] ?? [],
        ]);
        if ($out)
        return 'out';
        else 'oo';
        //dd($validated);
        //return 'firstname';
        /*return redirect()
            ->route('getform')
            ->with('success', 'Info created successfully.');*/
    }
}
