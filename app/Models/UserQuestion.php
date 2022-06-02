<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserQuestion extends Model
{
    use HasFactory;

    public const TABLE = 'users_questions';
    public const ID_COLUMN = 'id';
    public const USER_ID_COLUMN = 'user_id';
    public const QUESTION_ID_COLUMN = 'question_id';
    public const REPLY_ID_COLUMN = 'reply_id';

    protected $table = self::TABLE;
    protected $fillable = [
        self::USER_ID_COLUMN,
        self::QUESTION_ID_COLUMN,
        self::REPLY_ID_COLUMN,
    ];

    public function getId(): int
    {
        return $this->getAttribute(self::ID_COLUMN);
    }

    public function getUserId(): int
    {
        return $this->getAttribute(self::USER_ID_COLUMN);
    }

    public function getQuestionId(): int
    {
        return $this->getAttribute(self::QUESTION_ID_COLUMN);
    }

    public function getReplyId(): int
    {
        return $this->getAttribute(self::REPLY_ID_COLUMN);
    }
}
