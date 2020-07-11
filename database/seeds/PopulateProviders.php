<?php

use App\Provider;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Log;

class PopulateProviders extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        try {

            Provider::query()->delete();
            $file = storage_path() . "/json/providers-merqueo.json";
            //  Log::debug("file ".$file);
            $data = json_decode(file_get_contents($file));
            //  Log::debug("json ".json_encode($data));
            if (isset($data->providers)) {

                foreach ($data->providers as $_provider) {
                    $provider = new Provider();
                    unset($_provider->products);
                    $provider->fill((array) $_provider);
                    // Log::debug("provider ".json_encode($provider));
                    $provider->save();
                }
            }
        } catch (Exception $e) {
            Log::debug("Error populating providers => " . $e->getMessage());
        }
    }
}
