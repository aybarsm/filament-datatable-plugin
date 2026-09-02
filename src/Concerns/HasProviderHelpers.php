<?php

declare(strict_types=1);

namespace Aybarsm\Filament\DataTable\Concerns;

use function Illuminate\Filesystem\join_paths;

trait HasProviderHelpers
{
    public readonly string $pathBaseDir;
    public readonly string $fileConfigName;
    public function pathBaseDir(): string
    {
        return $this->pathBaseDir ?? realpath(__DIR__ . '/../../');
    }

    public function pathSourceDir(): string
    {
        return join_paths($this->pathBaseDir(), 'src');
    }

    public function pathConfigDir(): string
    {
        return join_paths($this->pathBaseDir(), 'config');
    }

    public function pathConfigFile(): string
    {
        return join_paths($this->pathConfigDir(),  $this->fileConfigName);
    }

    public function pathDatabaseDir(): string
    {
        return join_paths($this->pathBaseDir(), 'database');
    }

    public function pathDatabaseMigrations(): string
    {
        return join_paths($this->pathDatabaseDir(), 'migrations');
    }
}
