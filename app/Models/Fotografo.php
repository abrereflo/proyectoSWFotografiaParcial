<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fotografo extends Model
{
    use HasFactory;
    protected $table = 'fotografos';
    protected $fillable = ['estado', 'persona_id'];

    public function persona(){
        return $this->belongsTo(Persona::class);
    }

    public function albums(){
        return $this->hasMany(Album::class);
    }
}
