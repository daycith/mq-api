<?php

namespace App\Http\Controllers;

use \App\Gateways\ProductsGateway as Gateway;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ApiProductsController extends ApiController
{

    const DATE= "2019-03-01";

    public function __construct(Gateway $gateway)
    {

        $this->gateway = $gateway;
    }

    public function getAvailableProducts(Request $request)
    {
        $params = $request->all();
        $params["date"] = static::DATE;
        $items = $this->gateway->getAvailableProducts($params);
        return response()->json($items, Response::HTTP_OK);
    }

    public function getOrderProducts(Request $request)
    {
        $params = $request->all();
        
        if(!isset($params["order_id"])){
            return response()->json("order_id is required",Response::HTTP_UNPROCESSABLE_ENTITY);
        }
        $orderId = $params["order_id"];
        $items = $this->gateway->getOrderProducts($orderId, static::DATE);
        return response()->json($items, Response::HTTP_OK);
    }

    public function getNewInventory(Request $request){
        $date = static::DATE;
        $items = $this->gateway->getNewInventory($date);
        return response()->json($items, Response::HTTP_OK);
    }

    public function getBestSeller(Request $request)
    {
        $params = $request->all();
        $params["date"] = static::DATE;
        $params["order"] = "desc";
        $items = $this->gateway->getTopSeller($params);
        return response()->json($items, Response::HTTP_OK);
    }

    public function getLeastSold(Request $request)
    {
        $params = $request->all();
        $params["date"] = static::DATE;
        $params["order"] = "asc";
        $items = $this->gateway->getTopSeller($params);
        return response()->json($items, Response::HTTP_OK);
    }

    public function getProductsToShip(Request $request)
    {
        $params = $request->all();
        $params["date"] = static::DATE;
        $items = $this->gateway->getProductsToShip($params);
        return response()->json($items, Response::HTTP_OK);
    }
}
