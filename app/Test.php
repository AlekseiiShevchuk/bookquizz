<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Test
 *
 * @package App
 * @property string $title
 * @property text $description
 * @property string $book
*/
class Test extends Model
{
    protected $fillable = ['title', 'description', 'book_id'];
    

    /**
     * Set to null if empty
     * @param $input
     */
    public function setBookIdAttribute($input)
    {
        $this->attributes['book_id'] = $input ? $input : null;
    }
    
    public function book()
    {
        return $this->belongsTo(Book::class, 'book_id')->withTrashed();
    }
    
    public function testAnswer() {
        return $this->hasMany(TestAnswer::class, 'test_id');
    }
}
