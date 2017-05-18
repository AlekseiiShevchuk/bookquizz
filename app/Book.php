<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\HasMedia\Interfaces\HasMedia;

/**
 * Class Book
 *
 * @package App
 * @property integer $book_code
 * @property string $author
 * @property string $title
 * @property text $description
 * @property string $images
*/
class Book extends Model implements HasMedia
{
    use SoftDeletes, HasMediaTrait;

    protected $fillable = ['book_code', 'author', 'title', 'description', 'images'];
    

    /**
     * Set attribute to money format
     * @param $input
     */
    public function setBookCodeAttribute($input)
    {
        $this->attributes['book_code'] = $input ? $input : null;
    }
    
    public function interview() {
        return $this->hasMany(Interview::class, 'book_id');
    }
}
