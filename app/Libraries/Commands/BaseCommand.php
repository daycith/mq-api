<?php

namespace App\Libraries\Commands;

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use App\Company;
use App\Libraries\DBManager;

class BaseCommand extends Command {

    /**
     * @param \Symfony\Component\Console\Input\InputInterface   $input
     * @param \Symfony\Component\Console\Output\OutputInterface $output
     *
     * @return int
     */
    public function run(InputInterface $input, OutputInterface $output) {
        return parent::run($input, $output);
    }

    protected function getDatabases() {
        $offset = $this->option('offset') ? $this->option('offset') : 0;
        $limit = $this->option('limit') ? $this->option('limit') : 50;
        $codes = Company::skip($offset)->take($limit)->orderBy('code')->orderBy('id')->get(["code"]);
        $databases = array();
        foreach ($codes as $item) {
            
            $databases[] = DBManager::getDBCode($item->code);
            
        }

        return $databases;
    }

}