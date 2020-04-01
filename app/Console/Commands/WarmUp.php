<?php

namespace App\Console\Commands;

use App\Console\Commands\Activities\CreateUpdateActivities;
use Illuminate\Console\Command;
use Illuminate\Database\Console\Migrations\FreshCommand;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Storage;

class WarmUp extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'warm-up';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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

	// Generamos cache
	//Artisan::call('config:cache');
	//Artisan::call('route:cache');
	//Artisan::call('view:cache');

	// Creamos el fichero de sqlite
	Storage::disk('database')->put('patinando.sqlite', '');

	// Generamos tablas
	Artisan::call('migrate:fresh', ['--database' => 'sqlite', '--force' => true]);

	// Generamos contenido
	Artisan::call('create-update:activities');

	return 0;
    }
}
