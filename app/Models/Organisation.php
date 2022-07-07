<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Organisation extends Model
{
    use HasFactory;

    const   ID                    = "id";
    const   NOM                   = "nom";
    const   TYPE                  = "type";

}
