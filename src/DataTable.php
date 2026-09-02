<?php

declare(strict_types=1);

namespace Aybarsm\Filament\DataTable;

use Aybarsm\Filament\DataTable\Concerns\HasProviderHelpers;
use Aybarsm\Filament\DataTable\Support\ProviderDoctor;

class DataTable
{
    public static function doctor(): ProviderDoctor
    {
        return new ProviderDoctor();
    }

}
