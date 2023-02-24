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

        // ddd($articles);

        return view('articles.index', [
            'articles' => $articles,
            'user' => $user,
            'mode' => $mode,
        ]);
    }
}
