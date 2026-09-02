<?php

declare(strict_types=1);

namespace Aybarsm\Filament\DataTable\Console\Commands;

use Aybarsm\Filament\DataTable\DataTable;
use Aybarsm\Filament\DataTable\DataTableServiceProvider;
use Aybarsm\Filament\DataTable\Support\ProviderDoctor;
use Illuminate\Console\Command;
use Symfony\Component\Console\Attribute\AsCommand;

#[AsCommand(name: 'filament-datatable:doctor')]
class FilamentDataTableDoctorCommand extends Command
{
    protected $signature = 'filament-datatable:doctor
    {--without-config-publish-prompt : Do not prompt to run pending migrations}
    {--without-migration-prompt : Do not prompt to run pending migrations}
    {--force : Overwrite any existing files}';

    protected $description = 'Diagnose, verify and install the Filament Data Table plugin files and requirements';

    protected $aliases = ['filament-datatable:install', 'install:filament-datatable'];

    protected ProviderDoctor $doctor;

    public function handle(DataTable $dt): void
    {

    }
    protected function woConfigPublishPrompt(): bool
    {
        return $this->option('without-config-publish-prompt');
    }
    protected function woMigrationPrompt(): bool
    {
        return $this->option('without-migration-prompt');
    }

    protected function overwrite(): bool
    {
        return $this->option('force');
    }

    protected function prepareCommand(): void
    {

    }
}
