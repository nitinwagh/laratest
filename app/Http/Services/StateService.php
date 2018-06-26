<?php
namespace App\Http\Services;

use App\Models\State;
use App\Models\City;

/**
 * State Service
 */
class StateService {
    
    /**
     * List of all states
     *
     * @return array
     */
    public function stateList()
    {
        return State::get()->pluck('name', 'id');
    }
    
    /**
     * Lisr of all cities
     *
     * @return collection
     */
    public function getAllCity()
    {
        return City::get();
    }
    
    /**
     * Add City
     *
     * @param type $data
     * @return boolean
     */
    public function addCity($data)
    {
        $city = new City();
        $city->name = $data['city'];
        $city->state_id = $data['state'];
        return $city->save();
    }
    
    public function updateCity($id, $data)
    {
        $city = City::find($id);
        $city->name = $data['city'];
        $city->state_id = $data['state'];
        $city->active = $data['active'];
        return $city->save();
    }
    
    public function deleteCity($id)
    {
        $city = City::find($id);        
        $city->active = 0;
        return $city->save();
    }
}

