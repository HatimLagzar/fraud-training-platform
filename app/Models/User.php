<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    public const TABLE = 'users';
    public const ID_COLUMN = 'id';
    public const NAME_COLUMN = 'name';
    public const EMAIL_COLUMN = 'email';
    public const EMAIL_VERIFIED_AT_COLUMN = 'email_verified_at';
    public const PASSWORD_COLUMN = 'password';
    public const TYPE_COLUMN = 'type';
    public const REMEMBER_TOKEN_COLUMN = 'remember_token';
    public const CREATED_AT_COLUMN = 'created_at';
    public const UPDATED_AT_COLUMN = 'updated_at';

    public const ADMIN_TYPE = 1;
    public const NORMAL_TYPE = 2;

    protected $table = self::TABLE;

    protected $fillable = [
        self::NAME_COLUMN,
        self::EMAIL_COLUMN,
        self::EMAIL_VERIFIED_AT_COLUMN,
        self::PASSWORD_COLUMN,
        self::TYPE_COLUMN,
        self::REMEMBER_TOKEN_COLUMN,
        self::CREATED_AT_COLUMN,
        self::UPDATED_AT_COLUMN,
    ];

    protected $hidden = [
        self::PASSWORD_COLUMN,
        self::REMEMBER_TOKEN_COLUMN,
    ];

    protected $casts = [
        self::EMAIL_VERIFIED_AT_COLUMN => 'datetime',
    ];
}
