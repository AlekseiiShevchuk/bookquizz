<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class UserInterviewAnswer
 *
 * @package App
 * @property string $user
 * @property string $interview_answer
 * @property string $interview
*/
class UserInterviewAnswer extends Model
{
    protected $fillable = ['user_id', 'interview_answer_id', 'interview_id'];
    

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
    public function setInterviewAnswerIdAttribute($input)
    {
        $this->attributes['interview_answer_id'] = $input ? $input : null;
    }

    /**
     * Set to null if empty
     * @param $input
     */
    public function setInterviewIdAttribute($input)
    {
        $this->attributes['interview_id'] = $input ? $input : null;
    }
    
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    
    public function interview_answer()
    {
        return $this->belongsTo(InterviewAnswer::class, 'interview_answer_id');
    }
    
    public function interview()
    {
        return $this->belongsTo(Interview::class, 'interview_id');
    }
    
}
