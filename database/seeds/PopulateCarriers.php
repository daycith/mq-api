<?php

use App\Carrier;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Log;

class PopulateCarriers extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        try {

            Carrier::query()->delete();
            $now = Carbon::now();
            Carrier::insert([
                ["id"=> 1,"name" => "Transportista 1", "created_at"=>$now, "updated_at"=> $now],
                ["id"=> 2,"name" => "Transportista 2","created_at"=>$now, "updated_at"=> $now],
                ["id"=> 3,"name" => "Transportista 3","created_at"=>$now, "updated_at"=> $now],
                ["id"=> 4,"name" => "Transportista 4","created_at"=>$now, "updated_at"=> $now],
                ["id"=> 5,"name" => "Transportista 5","created_at"=>$now, "updated_at"=> $now],
                ]);
        } catch (Exception $e) {
            Log::debug("Error populating carriers => " . $e->getMessage());
        }
    }
}
