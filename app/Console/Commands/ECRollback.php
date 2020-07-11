<?php

namespace App\Console\Commands;

use App\Libraries\DBManager;
use Illuminate\Support\Facades\Artisan;
use DB;
use App\Company;
use App\Libraries\Commands\BaseCommand;
use Illuminate\Console\Command;

class ECRollback extends BaseCommand
{

    protected $signature = 'ec_migrate:rollback {--step=} {--offset=} {--limit=}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = "Run Rollback for companies DB's";

    public function __construct()
    {
        parent::__construct();
    }


    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle() {
        $databases = $this->getDatabases();
        if (count($databases) > 0) {
            
            foreach ($databases as $database) {
                
                
                if (self::runRollback($database, $this->option("step"))) {
                    $this->info("Executed rollback for $database");
                } else {
                    $this->error("An error ocurred while trying to exeture rollback for $database");
                }
                
                
            }
            DBManager::setDefaultConnection();
        } else {
            $this->warn("Databases not found");
        }
    }

    public static function runRollback($dbName, $step = 1) {

        try {

            DBManager::setConnection($dbName);
            $options = ['--database' => $dbName, '--path' => 'database/migrations/company_db'];
            if ($step != null) {
                $step = (int)$step;
                if ($step > 0) {
                    $options['--step'] = $step;
                }
            }
            Artisan::call('migrate:rollback', $options);
            DB::disconnect($dbName);
            
            return true;
        } catch (Exception $ex) {
            return false;
        }
    }
} 