<?php

namespace App\Models;

use App\Models\Publication;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Document extends Model
{
    use HasFactory;

    const   ID                    = "id";
    const   ID_PUB                = "idPub";
    const   CHEMIN                = "chemin";
    const   TYPE                  = "type";
    protected $guarded = [] ;

    public function publication()
    {
        return $this->belongsTo(Publication::class, 'idPub');
    }

    protected $fillable = [
        self::ID_PUB,
        self::CHEMIN,
    ];

}
