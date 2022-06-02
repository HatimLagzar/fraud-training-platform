<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;

class Question extends Model
{
    use HasFactory;

    public const TABLE = 'questions';
    public const ID_COLUMN = 'id';
    public const CONTENT_COLUMN = 'content';
    public const CONTENT_FR_COLUMN = 'content_fr';
    public const CONTENT_ES_COLUMN = 'content_es';
    public const CONTENT_IT_COLUMN = 'content_it';
    public const CONTENT_DE_COLUMN = 'content_de';

    protected $table = self::TABLE;
    protected $fillable = [
        self::CONTENT_COLUMN,
        self::CONTENT_FR_COLUMN,
        self::CONTENT_ES_COLUMN,
        self::CONTENT_IT_COLUMN,
        self::CONTENT_DE_COLUMN,
    ];

    private ?Collection $replies = null;

    public function getId(): int
    {
        return $this->getAttribute(self::ID_COLUMN);
    }

    public function getContentByLocale(): string
    {
        switch (App::getLocale()) {
            case 'fr':
                return $this->getContentFR();
            case 'es':
                return $this->getContentES();
            case 'it':
                return $this->getContentIT();
            case 'de':
                return $this->getContentDE();
            default:
                return $this->getContent();
        }
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

    /**
     * @return null|Collection|Reply[]
     */
    public function getReplies(): ?Collection
    {
        return $this->replies;
    }

    /**
     * @param  Collection|Reply[]|null  $replies
     *
     * @return $this
     */
    public function setReplies(?Collection $replies): self
    {
        $this->replies = $replies;

        return $this;
    }
}
