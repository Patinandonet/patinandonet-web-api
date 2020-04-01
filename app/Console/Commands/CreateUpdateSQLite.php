<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

abstract class CreateUpdateSQLite extends Command
{
    /**
     * Create a new command instance.
     *
     * @return void
     */
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
        $class = $this->getSQLiteClass();

        $objects = $this->getObjectsDict();
        foreach ($objects as $id => $object) {
            Log::info("Creating / updating object $class -> $id: " . json_encode($object));
            $obj = $class::updateOrCreate(
                ['id' => $id],
                $object
            );
            if (is_null($obj)) {
                Log::warning("Creating / updating failed");
                return 1;
            }
            Log::info("Done");
        }

        return 0;
    }

    /**
     * Devuelve la clase que va a generar los objetos
     *
     * @return string
     */
    abstract protected function getSQLiteClass(): string;

    /**
     * Devuelve el listado de objetos a generar
     *
     * @return array
     */
    abstract protected function getObjectsDict(): array;
}
