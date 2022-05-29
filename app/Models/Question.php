<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    public const TABLE = 'questions';
    public const ID_COLUMN = 'id';
    public const CONTENT_COLUMN = 'content';

    protected $table = self::TABLE;
    protected $fillable = [
        self::CONTENT_COLUMN
    ];

    private ?Collection $replies = null;

    public function getId(): int
    {
        return $this->getAttribute(self::ID_COLUMN);
    }

    public function getContent(): string
    {
        return $this->getAttribute(self::CONTENT_COLUMN);
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
