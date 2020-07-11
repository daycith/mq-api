<?php

namespace App\Gateways;

use App\Repositories\Criterias\Products\AvailableProductsCriteria;
use App\Repositories\Criterias\Products\NewInventoryCriteria;
use App\Repositories\Criterias\Products\OrderProductsCriteria;
use App\Repositories\Criterias\Products\ProductsToShipCriteria;
use App\Repositories\Criterias\Products\TopSellersCriteria;
use App\Repositories\OrdersRepository;
use App\Repositories\ProductsRepository;


class ProductsGateway extends BaseGateway
{

    protected $repository, $ordersRepository;

    public function __construct(ProductsRepository $repository, OrdersRepository $ordersRepository)
    {
        $this->repository = $repository;
        $this->ordersRepository = $ordersRepository;
    }

    public function getAvailableProducts($params = [], $perPage = 20, $page = 1)
    {
        $date = isset($params["date"]) ? $params["date"] : null;

        $this->repository->pushCriteria(new AvailableProductsCriteria($date));
        //return $this->repository->paginate($perPage, ['*'], "page", $page);
        return ["data" => $this->repository->all()];
    }

    public function getOrderProducts($orderId, $date, $params = [], $perPage = 20, $page = 1)
    {
        
        $this->ordersRepository->findOrFail($orderId);
        
        $this->repository->pushCriteria(new OrderProductsCriteria($orderId, true, $date), "availableCriteria");
        $available =  $this->repository->all();

        $this->repository->removeCriteria("availableCriteria");

        $this->repository->pushCriteria(new OrderProductsCriteria($orderId, false, $date), "UnavailableCriteria",$date);
        $needToBeProvided =  $this->repository->all();

        return ["data" => [
            "toBeShipped" => $available,
            "needToBeProvided" => $needToBeProvided
        ]];
    }

    public function getNewInventory($date)
    {
        $this->repository->pushCriteria(new NewInventoryCriteria($date));
        return ["data" => $this->repository->all()];
    }

    public function getTopSeller($params = [], $perPage = 20, $page = 1)
    {
        $date = isset($params["date"]) ? $params["date"] : null;
        $order = isset($params["order"]) ? $params["order"] : "asc";
        $this->repository->pushCriteria(new TopSellersCriteria($date, $order));
        return ["data" => $this->repository->all()];
    }


    public function getProductsToShip($params = [], $perPage = 20, $page = 1)
    {
        $date = isset($params["date"]) ? $params["date"] : null;
        $this->repository->pushCriteria(new ProductsToShipCriteria($date));
        return ["data" => $this->repository->all()];
    }
}
