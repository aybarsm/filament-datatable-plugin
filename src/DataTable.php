<?php

declare(strict_types=1);

namespace Aybarsm\Filament\DataTable;

use Aybarsm\Filament\DataTable\Concerns\HasProviderHelpers;
use Aybarsm\Filament\DataTable\Support\Provider;

class DataTable
{
    public static function doctor(): Provider
    {
        return new Provider();
    }

}
