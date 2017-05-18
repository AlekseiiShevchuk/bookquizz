<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class InterviewAnswer
 *
 * @package App
 * @property string $text
 * @property string $interview
*/
class InterviewAnswer extends Model
{
    protected $fillable = ['text', 'interview_id'];
    

    /**
     * Set to null if empty
     * @param $input
     */
    public function setInterviewIdAttribute($input)
    {
        $this->attributes['interview_id'] = $input ? $input : null;
    }
    
    public function interview()
    {
        return $this->belongsTo(Interview::class, 'interview_id');
    }
    
}
