<?php

declare(strict_types=1);

namespace Aybarsm\Filament\DataTable\Support;
class DataTableDoctor
{
    public readonly string $basePath;
    public function __construct()
    {
        $this->basePath = __DIR__ . '/..';
    }
}
