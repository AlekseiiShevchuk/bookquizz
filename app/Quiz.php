<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Quiz
 *
 * @package App
 * @property enum $type
 * @property string $question
 * @property text $description
 * @property string $book
*/
class Quiz extends Model
{
    protected $fillable = ['type', 'question', 'description', 'book_id'];
    protected $hidden = ['created_at', 'updated_at'];
    

    public static $enum_type = ["test" => "Test", "interview" => "Interview"];

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
    
    public function possibleAnswers() {
        return $this->hasMany(PossibleAnswer::class, 'quiz_id');
    }
}
