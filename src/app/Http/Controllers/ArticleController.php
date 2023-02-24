<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\MemberSport;
use App\Models\Sport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ArticleController extends Controller
{
    public function index(Request $request)
    {
        $user = Auth::user();

        $perPage = $request->query('per_page', 6);
        $mode = $request->query('mode', 'user');

        $articles = null;

        if ($mode === 'user') {
            $userId = $user->id;

            $articles = Article::with('sport')
                ->whereHas('sport.users', function ($query) use ($userId) {
                    $query->where('user_id', $userId);
                })
                ->paginate($perPage);
        } else if ($mode === 'all') {
            $articles = Article::paginate($perPage);
        }

        return view('articles.index', [
            'articles' => $articles,
            'user' => $user,
            'mode' => $mode,
        ]);
    }

    public function create()
    {
        $sports = Sport::all();

        return view('articles.create', compact('sports'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'body' => 'required',
            'sport_id' => 'required|exists:sports,id',
        ]);

        Article::create([
            'body' => $validatedData['body'],
            'sport_id' => $validatedData['sport_id'],
        ]);

        return redirect()->route('articles.index')->with('success', 'Article created successfully!');
    }

    public function edit($id)
    {
        $article = Article::find($id);
        $sports = Sport::all();

        return view('articles.edit', compact('article', 'sports'));
    }

    public function update(Request $request, $id)
    {
        // Check if user is an admin
        /*if (!Auth::user()->isAdmin()) {
            return redirect()->back()->with('error', 'Unauthorized access');
        }*/

        $validatedData = $request->validate([
            'body' => 'required',
            'sport_id' => 'required|exists:sports,id',
        ]);

        $article = Article::find($id);
        
        $article->body = $validatedData['body'];
        $article->sport_id = $validatedData['sport_id'];
        $article->save();
        
        return redirect()->route('articles.index')->with('success', 'Article updated successfully');
    }

}
