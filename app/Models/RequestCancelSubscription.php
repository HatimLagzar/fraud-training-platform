<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RequestCancelSubscription extends Model
{
    use HasFactory;

    public const TABLE = 'cancel_subscription_requests';
    public const ID_COLUMN = 'id';
    public const USER_ID_COLUMN = 'user_id';
    public const CREATED_AT_COLUMN = 'created_at';
    public const UPDATED_AT_COLUMN = 'updated_at';

    protected $table = self::TABLE;
    protected $fillable = [
        self::USER_ID_COLUMN
    ];

    protected $casts = [
        self::CREATED_AT_COLUMN => 'datetime',
        self::UPDATED_AT_COLUMN => 'datetime',
    ];
}
