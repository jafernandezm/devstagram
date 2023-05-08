<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
            'titulo',
            'descripcion',
            'imagen',
            'user_id'
        ];

   

    // un post pertece a un usuario

    public function user()
    {
        return $this->belongsTo(User::class)->select(['name','username']);
    }


}
