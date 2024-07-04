<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    protected $fillable = [
        'name',
    ];
    // Relations
    public function ideas()
    {
        return $this->hasMany(Idea::class);
    }
    use HasFactory;
}
