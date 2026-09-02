<?php

declare(strict_types=1);

namespace Aybarsm\Filament\DataTable\Models;

use Illuminate\Database\Eloquent\Model;

class DataTable extends Model
{
    protected function casts(): array
    {
        return [
            'owner_type' => 'string',
            'owner_id' => 'int',
            'name' => 'string',
            'slug' => 'string',
        ];
    }
}
