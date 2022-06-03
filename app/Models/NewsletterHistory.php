<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NewsletterHistory extends Model
{
    use HasFactory;

    public const TABLE = 'newsletter_history';

    public const ID_COLUMN = 'id';
    public const USER_ID_COLUMN = 'user_id';
    public const POST_ID_COLUMN = 'post_id';
    public const CREATED_AT_COLUMN = 'created_at';
    public const UPDATED_AT_COLUMN = 'updated_at';

    protected $table = self::TABLE;

    protected $fillable = [
        self::USER_ID_COLUMN,
        self::POST_ID_COLUMN,
    ];

    public function getId(): int
    {
        return $this->getAttribute(self::ID_COLUMN);
    }

    public function getUserId(): int
    {
        return $this->getAttribute(self::USER_ID_COLUMN);
    }

    public function getPostId(): int
    {
        return $this->getAttribute(self::POST_ID_COLUMN);
    }
}
