<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\HasMedia\Interfaces\HasMedia;

/**
 * Class Book
 *
 * @package App
 * @property string $title
 * @property integer $book_code
 * @property string $author
 * @property text $description
 * @property string $front_cover
 * @property string $back_cover
 * @property string $extra_images
 */
class Book extends Model implements HasMedia
{
    use HasMediaTrait;

    protected $fillable = ['title', 'book_code', 'author', 'description', 'front_cover', 'back_cover', 'extra_images'];
    protected $hidden = ['created_at', 'updated_at'];


    /**
     * Set attribute to money format
     * @param $input
     */
    public function setBookCodeAttribute($input)
    {
        $this->attributes['book_code'] = $input ? $input : null;
    }

    public function quizzes()
    {
        return $this->hasMany(Quiz::class);
    }

}
