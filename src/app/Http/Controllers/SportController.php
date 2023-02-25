<?php

namespace App\Http\Controllers;

use App\Models\Sport;
use Illuminate\Http\Request;

class SportController extends Controller
{
    public function index()
    {
        $sports = Sport::all();

        return view('sports.index', compact('sports'));
    }

    public function edit($id)
    {
        $sport = Sport::find($id);

        return view('sports.edit', compact('sport'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
        ]);

        $sport = Sport::findOrFail($id);
        $sport->name = $request->name;
        $sport->description = $request->description;
        $sport->save();

        return redirect()->route('sports.index')->withSuccess('Sport updated successfully');
    }

    public function destroy($id)
    {
        $sport = Sport::find($id);

        if (!$sport) {
            return redirect()->route('sports.index')->withErrors('Sport not found.');
        }

        $sport->delete();

        return redirect()->route('sports.index')->withSuccess('Sport deleted successfully.');
    }

}