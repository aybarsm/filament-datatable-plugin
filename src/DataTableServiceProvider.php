<?php

declare(strict_types=1);

namespace Aybarsm\Filament\DataTable;

use Aybarsm\Filament\DataTable\Concerns\HasProviderHelpers;
use Aybarsm\Filament\DataTable\Console\Commands\FilamentDataTableDoctorCommand;
use Aybarsm\Filament\DataTable\Support\ProviderDoctor;
use Illuminate\Support\ServiceProvider;

class DataTableServiceProvider extends ServiceProvider
{
    use HasProviderHelpers;

    public function __construct($app)
    {
        parent::__construct($app);
        $this->pathBaseDir = realpath(__DIR__ . '/../');
        $this->fileConfigName = 'filament-datatable.php';
    }

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
        $this->app->singleton(ProviderDoctor::class);
    }

    protected function bootPublishes(): void
    {
        $this->publishes([
            __DIR__ . "/../config/{$this->fileConfigName}" => config_path($this->fileConfigName)
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
