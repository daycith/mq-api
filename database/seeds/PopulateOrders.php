<?php

use App\Carrier;
use App\Order;
use App\OrderItem;
use App\Traits\JsonReader;
use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Log;

class PopulateOrders extends Seeder
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

            Order::query()->delete();
            OrderItem::query()->delete();
            $path = storage_path() . "/json/orders-merqueo.json";
            $data = $this->readJson($path);

            if (isset($data->orders)) {

                $usersNames = [];
                foreach ($data->orders as $order) {
                    if (isset($order->user)) {
                        $usersNames[] = $order->user;
                    }
                }

                $_users = User::whereIn("name", $usersNames)->get();
                $users = [];
                foreach ($_users as $_user) {
                    $key = (string) strtolower(trim($_user->name));
                    $users[$key] = $_user->id;
                }

                $carriers = Carrier::get(["id"]);
                $totalCarriers = count($carriers);
                foreach ($data->orders as $_order) {
                    $order = new Order();
                    $order->id = $order->id;
                    $key = (string) strtolower(trim($_order->user));
                    $order->user_id = $users[$key];

                    $order->priority = $_order->priority;
                    $order->delivery_date = $_order->deliveryDate;
                    $order->id = $_order->id;
                    $order->carrier_id = $carriers[rand(0,$totalCarriers-1)]->id;
                    $order->save();

                    if (isset($_order->products)) {

                        foreach ($_order->products as $_product) {
                            $orderItem = new OrderItem();

                            $orderItem->product_id = $_product->id;
                            $orderItem->order_id = $order->id;
                            $orderItem->quantity = $_product->quantity;
                            $orderItem->save();
                        }
                    }
                }
            }
        } catch (Exception $e) {
            Log::debug("Error populating orders => " . $e->getMessage());
        }
    }
}
