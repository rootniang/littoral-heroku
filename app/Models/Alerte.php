<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alerte extends Model
{
    use HasFactory;

    const   ID                      = "id";
    const   ID_PUB                   = "idPub";
    const   DESCRIPTION             = "description";
    protected $guarded = [] ; 

    public function publication()
    {
        return $this->belongsTo(Publication::class, Alerte::ID_PUB);
    }
}
