<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\{Post, User};

class Comment extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'comment',
    ];

    public function posts()
    {
      return $this->belongsTo(Post::class);
    }

    public function users()
    {
      return $this->belongsTo(User::class);
    }
}
