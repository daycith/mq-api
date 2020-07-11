<?php

namespace App\Http\Controllers;

use \App\Gateways\ProductsGateway as Gateway;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ApiProductsController extends ApiController
{

    public function __construct(Gateway $gateway)
    {

        $this->gateway = $gateway;
    }

    public function getAvailableProducts(Request $request)
    {
        $params = $request->all();
        $params["date"] = "2019-03-01";
        $items = $this->gateway->getAvailableProducts($params);
        return response()->json($items, Response::HTTP_OK);
    }

    public function getOrderProducts(Request $request)
    {
        $params = $request->all();
        $orderId = $params["order_id"];
        $items = $this->gateway->getOrderProducts($orderId);
        return response()->json($items, Response::HTTP_OK);
    }

    public function getNewInventory(Request $request){
        $date = "2019-03-01";
        $items = $this->gateway->getNewInventory($date = "2019-03-01");
        return response()->json($items, Response::HTTP_OK);
    }

    public function getBestSeller(Request $request)
    {
        $params = $request->all();
        $params["date"] = "2019-03-01";
        $params["order"] = "desc";
        $items = $this->gateway->getTopSeller($params);
        return response()->json($items, Response::HTTP_OK);
    }

    public function getLeastSold(Request $request)
    {
        $params = $request->all();
        $params["date"] = "2019-03-01";
        $params["order"] = "asc";
        $items = $this->gateway->getTopSeller($params);
        return response()->json($items, Response::HTTP_OK);
    }

    public function getProductsToShip(Request $request)
    {
        $params = $request->all();
        $items = $this->gateway->getProductsToShip($params);
        return response()->json($items, Response::HTTP_OK);
    }
}
