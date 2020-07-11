<?php

use App\Traits\JsonReader;
use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Log;

class PopulateUsers extends Seeder
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

            User::query()->delete();
            $path = storage_path() . "/json/orders-merqueo.json";
            $data = $this->readJson($path);
            $id = 1;
            
            if (isset($data->orders)) {
                foreach ($data->orders as $order) {
                    if (isset($order->user) && $order->user != null) {
                        $user = new User();
                        $user->id = $id;
                        $user->name = $order->user;

                        $user->save();
                        $id++;
                    }
                }
            }
        } catch (Exception $e) {
            Log::debug("Error populating users => " . $e->getMessage());
        }
    }
}
