<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Interview
 *
 * @package App
 * @property string $title
 * @property text $description
 * @property string $book
*/
class Interview extends Model
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
        return $this->belongsTo(Book::class, 'book_id');
    }
    
    public function interviewAnswer() {
        return $this->hasMany(InterviewAnswer::class, 'interview_id');
    }
}
