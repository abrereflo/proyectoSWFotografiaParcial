<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AwsRekognition extends Model
{
    use HasFactory;

    public function cliente(){
        return $this->hasMany(User::class);
    }

}
