<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    public const TABLE = 'posts';
    public const ID_COLUMN = 'id';
    public const TITLE_COLUMN = 'title';
    public const DESCRIPTION_COLUMN = 'description';
    public const TITLE_FR_COLUMN = 'title_fr';
    public const DESCRIPTION_FR_COLUMN = 'description_fr';
    public const TITLE_ES_COLUMN = 'title_es';
    public const DESCRIPTION_ES_COLUMN = 'description_es';
    public const TITLE_DE_COLUMN = 'title_de';
    public const DESCRIPTION_DE_COLUMN = 'description_de';
    public const TITLE_IT_COLUMN = 'title_it';
    public const DESCRIPTION_IT_COLUMN = 'description_it';
    public const THUMBNAIL_FILE_NAME_COLUMN = 'thumbnail_file_name';
    public const COUNTRY_ID_COLUMN = 'country_id';

    protected $table = self::TABLE;
    protected $fillable = [
        self::TITLE_COLUMN,
        self::DESCRIPTION_COLUMN,
        self::TITLE_FR_COLUMN,
        self::DESCRIPTION_FR_COLUMN,
        self::TITLE_ES_COLUMN,
        self::DESCRIPTION_ES_COLUMN,
        self::TITLE_DE_COLUMN,
        self::DESCRIPTION_DE_COLUMN,
        self::TITLE_IT_COLUMN,
        self::DESCRIPTION_IT_COLUMN,
        self::THUMBNAIL_FILE_NAME_COLUMN,
        self::COUNTRY_ID_COLUMN,
    ];

    public function getId(): int
    {
        return $this->getAttribute(self::ID_COLUMN);
    }

    public function getTitleEN(): string
    {
        return $this->getAttribute(self::TITLE_COLUMN);
    }

    public function getTitleFR(): string
    {
        return $this->getAttribute(self::TITLE_FR_COLUMN);
    }

    public function getTitleES(): string
    {
        return $this->getAttribute(self::TITLE_ES_COLUMN);
    }

    public function getTitleDE(): string
    {
        return $this->getAttribute(self::TITLE_DE_COLUMN);
    }

    public function getTitleIT(): string
    {
        return $this->getAttribute(self::TITLE_IT_COLUMN);
    }

    public function getThumbnailFileName(): string
    {
        return $this->getAttribute(self::THUMBNAIL_FILE_NAME_COLUMN);
    }

    public function getContentEN(): string
    {
        return $this->getAttribute(self::DESCRIPTION_COLUMN);
    }

    public function getContentFR(): string
    {
        return $this->getAttribute(self::DESCRIPTION_FR_COLUMN);
    }

    public function getContentES(): string
    {
        return $this->getAttribute(self::DESCRIPTION_ES_COLUMN);
    }

    public function getContentDE(): string
    {
        return $this->getAttribute(self::DESCRIPTION_DE_COLUMN);
    }

    public function getContentIT(): string
    {
        return $this->getAttribute(self::DESCRIPTION_IT_COLUMN);
    }

    public function getCountryId(): ?int
    {
        return $this->getAttribute(self::COUNTRY_ID_COLUMN);
    }
}
