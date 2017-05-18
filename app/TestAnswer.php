<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class TestAnswer
 *
 * @package App
 * @property string $text
 * @property string $test
 * @property tinyInteger $is_correct
*/
class TestAnswer extends Model
{
    protected $fillable = ['text', 'is_correct', 'test_id'];
    

    /**
     * Set to null if empty
     * @param $input
     */
    public function setTestIdAttribute($input)
    {
        $this->attributes['test_id'] = $input ? $input : null;
    }
    
    public function test()
    {
        return $this->belongsTo(Test::class, 'test_id');
    }
    
}
