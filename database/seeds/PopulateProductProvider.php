<?php

use App\Provider;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class PopulateProductProvider extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        try {

            DB::table("product_provider")->delete();
            $file = storage_path() . "/json/providers-merqueo.json";
            
            $data = json_decode(file_get_contents($file));
            
            if (isset($data->providers)) {
                $rows = [];
                $now = Carbon::now();
                foreach ($data->providers as $_provider) {
                    
                    foreach($_provider->products as $key=>$value){
                        
                        $rows[] = [
                            "provider_id" => $_provider->id,
                            "product_id" => $value->productId,
                            "created_at" => $now,
                            "updated_at" => $now,
                        ];
                    }
                    
                    
                }

                if(count($rows)){
                    DB::table("product_provider")->insert($rows);
                }
            }
        } catch (Exception $e) {
            Log::debug("Error populating product provider => " . $e->getMessage());
        }
    }
}
