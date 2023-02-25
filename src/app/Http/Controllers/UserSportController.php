<?php

namespace App\Http\Controllers;

use App\Models\MemberSport;
use App\Models\Sport;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserSportController extends Controller
{
    public function index()
    {
        $userSports = Auth::user()->sports;
        $sports = Sport::whereNotIn('id', $userSports->pluck('id'))->get();

        return view('usersports.index', compact('userSports', 'sports'));
    }

    public function store($id)
    {
        $auth = Auth::user();
        $user = User::find($auth->id);

        if ($user->sports->contains($id)) {
            return redirect()->back()->withErrors('Sport already subscribed');
        }

        $user->sports()->attach($id);

        return redirect()->back()->withSuccess('Sport subscribed successfully');
    }

    public function destroy($id)
    {
        $user = Auth::user();

        $sport = MemberSport::where('user_id', $user->id)
            ->where('sport_id', $id)
            ->first();

        if (!$sport) {
            return redirect()->back()->with('error', 'You are not subscribed to this sport.');
        }

        $sport->delete();

        return redirect()->back()->with('success', 'Sport unsubscribed successfully.');
    }

}