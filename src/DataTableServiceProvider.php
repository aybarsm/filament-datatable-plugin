<?php

declare(strict_types=1);

namespace Aybarsm\Filament\DataTable;

use Aybarsm\Filament\DataTable\Console\Commands\FilamentDataTableDoctorCommand;
use Aybarsm\Filament\DataTable\Support\DataTableDoctor;
use Illuminate\Support\ServiceProvider;

class DataTableServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->registerConfig();
        $this->registerBindings();
    }

    public function boot(): void
    {
        if ($this->app->runningInConsole()) {
            $this->bootPublishes();
            $this->bootCommands();
        }
    }

    protected function registerConfig(): void
    {
        $this->mergeConfigFrom(
            __DIR__ . '/../config/filament-datatable.php',
            'filament-datatable'
        );
    }

    protected function registerBindings(): void
    {
        $this->app->singleton(DataTable::class);
        $this->app->alias(DataTable::class, 'filament-datatable');
        $this->app->singleton(DataTableDoctor::class);
    }

    protected function bootPublishes(): void
    {
        $this->publishes([
            __DIR__ . '/../config/filament-datatable.php' => config_path('filament-datatable.php')
        ], 'filament-datatable-config');

        $this->publishesMigrations([
            __DIR__.'/../database/migrations' => database_path('migrations'),
        ], 'filament-datatable-migrations');
    }

    protected function bootCommands(): void
    {
        $this->commands([
            FilamentDataTableDoctorCommand::class,
        ]);
    }
}
