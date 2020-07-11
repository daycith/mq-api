<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ApiController extends Controller
{
    protected $gateway = null;
    protected const RESPONSE_ITEM= "item";

    protected function creationRules(){
        return [];
    }

    protected function creationErrorsMessages(){
        return [];
    }

    protected function updateRules(){
        return [];
    }

    protected function updateErrorsMessages(){
        return [];
    }

    protected function validateCreate($request){
        $rules = $this->creationRules();

        if(count($rules)){
            $this->validate($request, $rules, $this->creationErrorsMessages());
            
        }

        return true;
    }

    protected function validateUpdate($request){
        $rules = $this->updateRules();

        if(count($rules)){
            $this->validate($request, $rules, $this->updateErrorsMessages());
            
        }

        return true;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request){

        $items = $this->gateway->get($request->all());
        return response()->json($items, Response::HTTP_OK);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $item = $this->gateway->find($id);

        if($item != null){
            return response()->json([$this::RESPONSE_ITEM => $item], Response::HTTP_OK);
        }
        return response()->json([], Response::HTTP_NOT_FOUND);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){

        $this->validateCreate($request);

        $item = $this->gateway->create($request->all());
        if($item != null){
            return response()->json([$this::RESPONSE_ITEM => $item], Response::HTTP_CREATED);
        }

        return response()->json([], Response::HTTP_UNPROCESSABLE_ENTITY);
    }
    

    public function update($id, Request $request){
        $this->validateUpdate($request);
        $item = $this->gateway->update($id, $request->all());
        if($item != null){
            return response()->json($item,Response::HTTP_OK);
        }
        return response()->json([], Response::HTTP_NOT_FOUND);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if($this->gateway->delete($id)){
            return response()->json([],Response::HTTP_NO_CONTENT);
        }else{
            return response()->json([],Response::HTTP_NOT_FOUND);
        }
    }
 
}
