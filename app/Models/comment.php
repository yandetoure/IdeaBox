<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class comment extends Model
{
    protected $fillable = [
        'content',
        'user_id',
        'idea_id',
    ];
    // Relations
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function idea()
    {
        return $this->belongsTo(Idea::class);
    }
    use HasFactory;
}
