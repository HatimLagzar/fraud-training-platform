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
    public const CONTENT_FR_COLUMN = 'content_fr';
    public const CONTENT_ES_COLUMN = 'content_es';
    public const CONTENT_IT_COLUMN = 'content_it';
    public const CONTENT_DE_COLUMN = 'content_de';
    public const IS_CORRECT_COLUMN = 'is_correct';

    protected $table = self::TABLE;
    protected $fillable = [
        self::QUESTION_ID_COLUMN,
        self::CONTENT_COLUMN,
        self::CONTENT_FR_COLUMN,
        self::CONTENT_ES_COLUMN,
        self::CONTENT_IT_COLUMN,
        self::CONTENT_DE_COLUMN,
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

    public function getContentFR(): string
    {
        return $this->getAttribute(self::CONTENT_FR_COLUMN);
    }

    public function getContentES(): string
    {
        return $this->getAttribute(self::CONTENT_ES_COLUMN);
    }

    public function getContentIT(): string
    {
        return $this->getAttribute(self::CONTENT_IT_COLUMN);
    }

    public function getContentDE(): string
    {
        return $this->getAttribute(self::CONTENT_DE_COLUMN);
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
