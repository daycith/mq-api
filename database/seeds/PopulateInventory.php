<?php

use App\Inventory;
use App\Traits\JsonReader;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Log;

class PopulateInventory extends Seeder
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

            Inventory::query()->delete();
            $path = storage_path() . "/json/inventory-merqueo.json";
            $data = $this->readJson($path);

            if (isset($data->inventory)) {

                foreach ($data->inventory as $inv) {
                    $inventory = new Inventory();
                    $inventory->product_id = $inv->id;
                    $inventory->quantity = $inv->quantity;
                    $inventory->date = $inv->date;
                    $inventory->save();
                }
            }
        } catch (Exception $e) {
            Log::debug("Error populating inventory => " . $e->getMessage());
        }
    }
}
