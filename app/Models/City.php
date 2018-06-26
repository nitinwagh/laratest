<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    /**
     *
     * @var string 
     */
    protected $table = "cities";
    
    /**
     * State of city
     *
     * @return collection
     */
    public function state()
    {
        return $this->hasOne(State::class, 'id', 'state_id')->select('name');
    }
}
