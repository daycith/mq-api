<?php

use App\Product;
use App\Traits\JsonReader;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Log;

class PopulateProducts extends Seeder
{
    use JsonReader;
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        try {

            Product::query()->delete();
            $path = storage_path() . "/json/orders-merqueo.json";
            $data = $this->readJson($path);
            $createdProducts = [];
            if (isset($data->orders)) {
                
                foreach ($data->orders as $order) {

                    foreach ($order->products as $_product) {
                        if(isset($createdProducts[$_product->id])){
                            continue;
                        }
                        $product = new Product();
                        $product->id = $_product->id;
                        $product->name = $_product->name;
                        $createdProducts[$_product->id] = 1;
                        $product->save();
                    }
                }
            }
        } catch (Exception $e) {
            Log::debug("Error populating products => ".$e->getMessage());
        }
    }
}
