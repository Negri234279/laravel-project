<?php

namespace App\Models;

use App\Enums\ArticleSort;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    protected $fillable = [
        'body',
        'sport_id'
    ];

    protected $with = ['sport'];

    public function users()
    {
        return $this->belongsToMany(User::class, 'member_sports');
    }

    public function sport()
    {
        return $this->belongsTo(Sport::class);
    }

    public function scopeFilter($query, $user, $mode)
    {
        if ($mode === 'sub') {
            $query->whereHas('sport.users', function ($query) use ($user) {
                $query->where('user_id', $user->id);
            });
        }

        return $query;
    }

    public function scopeSortBy($query, string $sort): void
    {
        match ($sort) {
            ArticleSort::BODY_ASC => $query->orderBy('body', 'asc'),
            ArticleSort::BODY_DESC => $query->orderBy('body', 'desc'),
            ArticleSort::LASTED => $query->latest(),
            ArticleSort::OLDER => $query->oldest(),
            default => $query->latest(),
        };
    }

}
