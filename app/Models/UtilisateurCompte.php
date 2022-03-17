<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Compte;

class UtilisateurCompte extends Model
{
    use HasFactory;
    protected $fillable = ['editeur', 'id_compte', 'id_utilisateur'];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function compte()
    {
        return $this->belongsTo(Compte::class);
    }
}
