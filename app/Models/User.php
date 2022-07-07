<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    const   ID                    = "id";
    const   IDORG                 = "idOrg";
    const   PRENOM                = "prenom";
    const   NOM                   = "nom";
    const   DATE_NAISSANCE        = "datenaissance";
    const   EMAIL                 = "email";
    const   PASSWORD              = "password";
    const   DELETED_AT            = "deleted_at";
    const   NUMERO_TELEPHONE      = "numero_telephone";
    const   ACTIFYN               = "actifYN";
    const   POSTE                 = "poste";
    const   CREATED_AT            = "created_at";
    const   UPDATED_AT            = "updated_at";
    const   EMAIL_VERIFIED_AT     = "email_verified_at";
    const   STATUS                = "status";


    protected $fillable = [
        self::IDORG,
        self::EMAIL,
        self::PASSWORD,
        self::PRENOM,
        self::NOM,
        self::DATE_NAISSANCE,
        self::STATUS,
        self::NUMERO_TELEPHONE,
        self::DELETED_AT

    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
