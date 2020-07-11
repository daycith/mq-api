<?php

namespace App\Console\Commands;

use App\Libraries\DBManager;
use Illuminate\Support\Facades\Artisan;
use DB;
use App\Company;
use App\Libraries\Commands\BaseCommand;
use Illuminate\Console\Command;

class ECMigrations extends BaseCommand
{

    protected $signature = "ec_migrate {--offset=} {--limit=}posts";

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = "Run Migration for companies DB's";

    public function __construct()
    {
        parent::__construct();
    }


    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        
       $databases = $this->getDatabases();
       if(count($databases) > 0){
           foreach($databases as $database){
               if(static::runMigrations($database)){
                   $this->info("Executed migrations for $database");
               }else{
                   $this->error("An error ocurred while trying to execute migrations for $database");
               }
               DB::disconnect($database);
           }
       }else{
           $this->warn("Databases not found");
       }
    }

    public static function runMigrations($dbName) {

        try {

            DBManager::setConnection($dbName);
            Artisan::call('migrate', ['--database' => $dbName, '--path' => 'database/migrations/company_db']);
            DB::disconnect($dbName);
            DBManager::setDefaultConnection();
            return true;
        } catch (Exception $ex) {
            return false;
        }
    }
} 