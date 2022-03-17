<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Compte extends Model
{
    use HasFactory;
    protected $fillable = ['intitule', 'id_admin'];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
