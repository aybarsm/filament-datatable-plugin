<?php

declare(strict_types=1);

namespace Aybarsm\Filament\DataTable;

use Filament\Contracts\Plugin;
use Filament\Panel;
class DataTablePlugin implements Plugin
{

    public function getId(): string
    {
        return 'datatable';
    }

    public function register(Panel $panel): void
    {
        // TODO: Implement register() method.
    }

    public function boot(Panel $panel): void
    {
        // TODO: Implement boot() method.
    }
}
