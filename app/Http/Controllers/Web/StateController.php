<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Services\StateService;

class StateController extends Controller
{
    /**
     * State Service
     */
    protected $stateService;
    
    /**
     * StateController constuctor
     *
     * @param StateService $stateService
     */
    public function __construct(StateService $stateService)
    {
        $this->stateService = $stateService;
    }
    
    public function index()
    {
        $states = $this->stateService->stateList();
        $cities = $this->stateService->getAllCity();
        //dd($cities);
        return view('city', compact('states', 'cities'));
    } 
    
    public function addCity(Request $request)
    {
        try{
            $data = $request->all();
            $this->stateService->addCity($data);
            return response()->json(['status' => true, 'message' => "City added successfully."]);
        } catch (Exception $ex) {
            dd($ex->getMessage()->errors());
            return response()->json(['status' => false, 'message' => "Something wents wrong! please try again."]);            
        }
    }
    
    public function deleteCity($id)
    {
        dd($id);
    }
}
