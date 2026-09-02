<?php

declare(strict_types=1);

namespace Aybarsm\Filament\DataTable\Support;
use Aybarsm\Filament\DataTable\DataTable;
use Aybarsm\Filament\DataTable\DataTableServiceProvider;
use Illuminate\Support\Facades\File;
use Symfony\Component\Finder\Finder;
use Symfony\Component\Finder\SplFileInfo;
use function Illuminate\Filesystem\join_paths;

class ProviderDoctor
{
    public CONST array META = [
        'regex.migration' => '/^\d{4}_\d{2}_\d{2}_\d{6}_([a-zA-Z0-9_-]+)\.php$/'
    ];

    public function provider(): DataTableServiceProvider
    {
        return app()->getProvider(DataTableServiceProvider::class);
    }
    public function configPublished(): bool
    {
        return File::exists($this->provider()->pathConfigFile());
    }

    public static function fileNamesDatabaseMigrations(Finder $finder): array
    {
        $ret = [];
        foreach($finder as $file) {
            $ret[] = preg_replace(static::META['regex.migration'], '$1', $file->getFilename());
        }
        return $ret;
    }

    public function filesSourceDatabaseMigrations(): Finder
    {
        return Finder::create()
            ->files()
            ->in($this->provider()->pathDatabaseMigrations())
            ->depth('==0')
            ->name(static::META['regex.migration']);
    }

    public function fileNamesSourceDatabaseMigrations(): array
    {
        return static::fileNamesDatabaseMigrations($this->filesSourceDatabaseMigrations());
    }
    public function filesDestinationDatabaseMigrations()
    {
        return Finder::create()
            ->files()
            ->in(app()->databasePath('migrations'))
            ->depth('==0')
            ->name(static::META['regex.migration']);
    }
    public function fileNamesDestinationDatabaseMigrations(): array
    {
        return static::fileNamesDatabaseMigrations($this->filesDestinationDatabaseMigrations());
    }

    public function fileNamesDatabaseMigrationsPublished(): array
    {
        return array_values(array_intersect(
            $this->fileNamesDestinationDatabaseMigrations(),
            $this->fileNamesSourceDatabaseMigrations()
        ));
    }

    public function fileNamesDatabaseMigrationsMissing(): array
    {
        return array_values(array_diff(
            $this->fileNamesSourceDatabaseMigrations(),
            $this->fileNamesDestinationDatabaseMigrations(),
        ));
    }
}
