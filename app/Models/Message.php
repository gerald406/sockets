<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    /** @use HasFactory<\Database\Factories\MessageFactory> */
    use HasFactory;
    
    //hablitamos la asignación masiva
    protected $fillable = [
        'content',
        'user_id',
    ];

    //establecemos la relacion con el modelo user
    public function user(){
        return $this->belongsTo(User::class);
    }
}
