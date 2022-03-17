<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\{Compte, User};

class Invitation extends Model
{
    use HasFactory;

    protected $fillable = ['id_admin', 'id_invite', 'id_compte'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function compte()
    {
        return $this->belongsTo(Compte::class);
    }
}
