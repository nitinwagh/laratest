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
     * List of all cities
     *
     * @return \Illuminate\Database\Eloquent\Collection
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

    /**
     * Update city
     *
     * @param type $data
     * @return boolean
     */
    public function updateCity($data)
    {
        $city = City::find($data['rId']);
        $city->name = $data['ecity'];
        $city->state_id = $data['estate'];
        $city->active = isset($data['active']) ? 1 : 0;
        return $city->save();
    }

    /**
     * Delete city
     *
     * @param type $id
     * @return boolean
     */
    public function deleteCity($id)
    {
        $city = City::find($id);        
        $city->active = 0;
        return $city->save();
    }
}

