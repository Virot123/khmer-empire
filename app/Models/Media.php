<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Media extends Model
{
    use HasFactory;

    protected $fillable = [
        'thumbnail',
        'link',
        'user_id',
    ];

    public function users()
    {
        return $this->belongsTo(User::class);
    }
   
}
