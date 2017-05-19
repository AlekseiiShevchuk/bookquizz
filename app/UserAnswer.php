<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class UserAnswer
 *
 * @package App
 * @property string $user
 * @property string $user_answer
 * @property string $quiz
*/
class UserAnswer extends Model
{
    protected $fillable = ['user_id', 'user_answer_id', 'quiz_id'];
    

    /**
     * Set to null if empty
     * @param $input
     */
    public function setUserIdAttribute($input)
    {
        $this->attributes['user_id'] = $input ? $input : null;
    }

    /**
     * Set to null if empty
     * @param $input
     */
    public function setUserAnswerIdAttribute($input)
    {
        $this->attributes['user_answer_id'] = $input ? $input : null;
    }

    /**
     * Set to null if empty
     * @param $input
     */
    public function setQuizIdAttribute($input)
    {
        $this->attributes['quiz_id'] = $input ? $input : null;
    }
    
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    
    public function user_answer()
    {
        return $this->belongsTo(PossibleAnswer::class, 'user_answer_id');
    }
    
    public function quiz()
    {
        return $this->belongsTo(Quiz::class, 'quiz_id');
    }
    
}
