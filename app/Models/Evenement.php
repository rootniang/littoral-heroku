<?php

namespace App\Models;

use App\Models\Publication;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Evenement extends Model
{
    use HasFactory;

    const   ID                    = "id";
    const   ID_PUB                = "idPub";
    const   DATE_EVENEMENT        = "date_evenement";
    const   TITRE                 = "titre";
    protected $guarded = [] ; 

    public function publication()
    {
        return $this->belongsTo(Publication::class, 'idPub');
    }
}
