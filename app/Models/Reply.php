<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
    use HasFactory;

    public const TABLE = 'replies';
    public const ID_COLUMN = 'id';
    public const QUESTION_ID_COLUMN = 'question_id';
    public const CONTENT_COLUMN = 'content';
    public const IS_CORRECT_COLUMN = 'is_correct';

    protected $table = self::TABLE;
    protected $fillable = [
        self::QUESTION_ID_COLUMN,
        self::CONTENT_COLUMN,
        self::IS_CORRECT_COLUMN,
    ];

    public function getId(): int
    {
        return $this->getAttribute(self::ID_COLUMN);
    }

    public function getContent(): string
    {
        return $this->getAttribute(self::CONTENT_COLUMN);
    }

    public function getQuestionId(): int
    {
        return $this->getAttribute(self::QUESTION_ID_COLUMN);
    }

    public function isCorrect(): bool
    {
        return $this->getAttribute(self::IS_CORRECT_COLUMN);
    }
}
