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
     * StateController constructor
     *
     * @param StateService $stateService
     */
    public function __construct(StateService $stateService)
    {
        $this->stateService = $stateService;
    }

    /**
     * Home page
     *
     * @return \Illuminate\Support\Facades\View
     */
    public function index()
    {
        $states = $this->stateService->stateList();
        $cities = $this->stateService->getAllCity();
        return view('city', compact('states', 'cities'));
    } 

    /**
     * Add city
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function addCity(Request $request)
    {
        try{
            $data = $request->all();
            $this->stateService->addCity($data);
            return response()->json(['status' => true, 'message' => "City added successfully."]);
        } catch (Exception $ex) {
            return response()->json(['status' => false, 'message' => "Something wents wrong! please try again."]);            
        }
    }

    /**
     * Update city
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function editCity(Request $request)
    {
        try {
            $data = $request->all();
            $this->stateService->updateCity($data);
            return response()->json(['status' => true, 'message' => "City updated successfully."]);
        } catch (Exception $ex) {
            return response()->json(['status' => false, 'message' => "Something wents wrong! please try again."]);
        }
    }

    /**
     * Delete city
     *
     * @param type $id
     * @return \Illuminate\Support\Facades\View
     */
    public function deleteCity($id)
    {
        $this->stateService->deleteCity($id);
        return redirect()->route('home');
    }
}
