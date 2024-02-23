<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Artisan;
use Illuminate\Support\Facades\DB;

class SeedCompany1Database extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'db:seed-company1';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Seed company 1 database';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        DB::connection('company1')->beginTransaction();

        Artisan::call('db:seed', [
            '--class' => 'ClientSeeder',
            '--class' => 'CompaniesSeeder',
            '--class' => 'LocationSeeder',
            '--class' => 'OrdersSeeder',
            '--class' => 'PermissionsSeeder',
            '--class' => 'RoleSeeder',
            '--class' => 'TrucksSeeder',
            '--class' => 'UserSeeder',
        ]);

        DB::connection('company1')->commit();

        $this->info('Company 1 database seeded successfully.');
    }
}
