<?php

declare(strict_types=1);

namespace Aybarsm\Filament\DataTable\Facades;

use Illuminate\Support\Facades\Facade;

class DataTable extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return 'filament-datatable';
    }
}
