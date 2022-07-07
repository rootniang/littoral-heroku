<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Publication;

class Article extends Model
{
    use HasFactory;

    const   ID                    = "id";
    const   ID_PUBLICATION        = "idPub";
    const   DESCRIPTION           = "description";
    protected $fillable = [
        'idPub',
        'description',
    ];

    public function publication()
    {
        return $this->belongsTo(Publication::class, Article::ID_PUBLICATION);
    }
}
