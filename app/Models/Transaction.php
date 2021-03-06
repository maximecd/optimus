<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\{Compte, User, Categorie};

class Transaction extends Model
{
    use HasFactory;
    protected $fillable = [
        'intitule',
        'description',
        'date',
        'montant',
        'sens_transaction',
        'id_compte',
        'id_user',
        'id_categorie',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function compte()
    {
        return $this->belongsTo(Compte::class);
    }
    public function categorie()
    {
        return $this->belongsTo(Categorie::class);
    }
}
