<?php

declare(strict_types=1);

namespace Aybarsm\Filament\DataTable\Models;

use Illuminate\Database\Eloquent\Model;

class DataTableCell extends Model
{
    protected function casts(): array
    {
        return [
            'data_table_id' => 'int',
            'pos_x' => 'int',
            'pos_y' => 'int',
        ];
    }
}
