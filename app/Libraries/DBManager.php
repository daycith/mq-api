<?php

namespace App\Libraries;

use Illuminate\Support\Facades\App;
use DB;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Config;

class DBManager {

    public static function getDBCode($code){
        return "EC_".str_replace("EC_","",$code);
    }

    public static function setConnection($database) {
        $config = App::make('config');
        $connections = $config->get('database.connections');
        $defaultConnection = $connections[$config->get('database.default')];
        $newConnection = $defaultConnection;
        $database = self::getDBCode($database);
        $newConnection['database'] = $database;
        App::make('config')->set('database.connections.' . $database, $newConnection);
    }

    public static function setDefaultConnection() {
        Config::set('database.default', 'mysql');
    }
    
    public static function createDatabaseTables($dbName) {

        try {
            $dbName = self::getDBCode($dbName);
            self::setConnection($dbName);
            Artisan::call('migrate', ['--database' => $dbName, '--path' => 'database/migrations/company_db']);
            DB::disconnect($dbName);
            self::setDefaultConnection();
            return true;
        } catch (Exception $ex) {
            return false;
        }
    }

    public static function createDatabase($dbName, $populate = false) {
        
        $quotedDbName = preg_replace("/[^_a-zA-Z0-9]+/", "", $dbName);
        $quotedDbName = self::getDBCode($quotedDbName);
        try {

            $result = DB::statement("CREATE DATABASE $quotedDbName"
                            . " DEFAULT CHARACTER SET utf8"
                            . " DEFAULT COLLATE utf8_general_ci"
            );

            if ($result && $populate) {

                return self::createDatabaseTables($quotedDbName);
            } else {
                return $result;
            }
        } catch (Exception $ex) {
            return false;
        }
    }

    public static function deleteDatabase($dbName) {
        $quotedDbName = preg_replace("/[^_a-zA-Z0-9]+/", "", $dbName);
        $quotedDbName = self::getDBCode($quotedDbName);
        try {
            return DB::statement("DROP DATABASE IF EXISTS $quotedDbName");
        } catch (Exception $ex) {
            return false;
        }
    }
    
    public static function clearDBName($dbName) {
        return preg_replace("/[^_a-zA-Z0-9]+/", "", $dbName);
    }

    public static function checkDatabaseExists($dbName) {
        $quotedDbName = self::clearDBName($dbName);
        $quotedDbName = self::getDBCode($quotedDbName);
        try {

            $query = "SELECT SCHEMA_NAME FROM INFORMATION_SCHEMA.SCHEMATA WHERE SCHEMA_NAME =  ?";
            $result = DB::select($query, [$quotedDbName]);

            if (is_array($result) && count($result) > 0) {
                return true;
            } else {
                return false;
            }
        } catch (Exception $ex) {
            return true;
        }
    }

}
