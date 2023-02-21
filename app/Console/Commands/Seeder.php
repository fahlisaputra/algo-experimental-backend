<?php
/*
Seeder Artisan Command
Author: Muhammad Fahli Saputra <saputra@fahli.net>
Updated at: June 27, 2022 17:28 UTC+8
*/

namespace App\Console\Commands;

use App\Models\Course;
use App\Models\CourseData;
use App\Models\Module;
use App\Models\ModuleData;
use App\Models\AuthToken;
use App\Models\User;
use Illuminate\Console\Command;

class Seeder extends Command
{
    /**
     * Put your model here to seed automatically.
     * Make sure your model has getter with name seedData() publicly visible
     * @return model
     */
    private function seedModels()
    {
        $models = [
            User::class,
            AuthToken::class,
            Course::class,
            Module::class,
            ModuleData::class,
            CourseData::class,
        ];

        return $models;
    }

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'fahli:seed {--migrate}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Init data.';

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
     * @return int
     */
    public function handle()
    {
        $this->newLine();
        $this->info('== Fahli Environment ==');
        $this->line('Author: Muhammad Fahli Saputra <saputra@fahli.net>');
        $this->line('Please wait while we initialize your environment. This may take a while.');
        $this->newLine();
        if ($this->option('migrate')) {
            $this->line('Migrating database...');
            $this->call('migrate:fresh');
            $this->newLine();
        }
        foreach ($this->seedModels() as $model) {
            $this->line('Seeding ' . $model);
            $model::seedData();
            if ($model::count() == 0) {
                $model::seedData()->each(function ($item) use ($model) {
                    $model::create([
                        'name' => $item
                    ]);
                });
            }
        }
        $this->info("Seeding completed.");
        return true;
    }
}
