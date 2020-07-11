<?php

namespace  App\Gateways;

class BaseGateway{
    
    const PER_PAGE = 50;

    protected $repository;

    public function __construct() 
    {
        
        
    }

    public function create($data){
        return $this->repository->create($data);
    }

    public function find($id){
        return $this->repository->find($id);
    }

    public function get($params = [], $perPage = 20, $page = 1) {

        if(isset($params['filters'])){
            $this->buildFilters($params['filters']);
        }

        if(isset($params['sort'])){
            $this->buildsort($params['sort']);
        }

        return $this->repository->paginate($perPage, ['*'], 'page', $page);
    }

    public function update($id, $data){
        $this->repository->update($data, $id);
        return $this->find($id);
    }

    public function delete($id){
        return $this->repository->delete($id);
    }

    protected function buildFilters($filters){

    }

    protected function buildsort($sort){

    }
}