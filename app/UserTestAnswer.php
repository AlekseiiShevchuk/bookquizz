<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class UserTestAnswer
 *
 * @package App
 * @property string $user
 * @property string $test_answer
 * @property string $test
*/
class UserTestAnswer extends Model
{
    protected $fillable = ['user_id', 'test_answer_id', 'test_id'];
    

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
    public function setTestAnswerIdAttribute($input)
    {
        $this->attributes['test_answer_id'] = $input ? $input : null;
    }

    /**
     * Set to null if empty
     * @param $input
     */
    public function setTestIdAttribute($input)
    {
        $this->attributes['test_id'] = $input ? $input : null;
    }
    
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    
    public function test_answer()
    {
        return $this->belongsTo(TestAnswer::class, 'test_answer_id');
    }
    
    public function test()
    {
        return $this->belongsTo(Test::class, 'test_id');
    }
    
}
