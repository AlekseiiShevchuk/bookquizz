<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class PossibleAnswer
 *
 * @package App
 * @property string $text
 * @property string $quiz
 * @property tinyInteger $is_correct
*/
class PossibleAnswer extends Model
{
    protected $fillable = ['text', 'is_correct', 'quiz_id'];
    protected $hidden = ['created_at', 'updated_at'];
    

    /**
     * Set to null if empty
     * @param $input
     */
    public function setQuizIdAttribute($input)
    {
        $this->attributes['quiz_id'] = $input ? $input : null;
    }
    
    public function quiz()
    {
        return $this->belongsTo(Quiz::class, 'quiz_id');
    }
    
}
