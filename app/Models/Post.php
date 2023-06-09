<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\{Comment, User};

class Post extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'data',
    ];

    public function comment()
    {
      return $this->hasMany(Comment::class);
    }

    public function users()
    {
      return $this->belongsTo(User::class);
    }
}
