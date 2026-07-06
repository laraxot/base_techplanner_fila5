<?php

declare(strict_types=1);

namespace Modules\Xot\Traits;

use Spatie\SchemalessAttributes\SchemalessAttributes;

trait HasSchemalessAttributes
{
    public function getSchemalessAttributes(
        string $column
    ): SchemalessAttributes {
        return SchemalessAttributes::createForModel(
            $this,
            $column
        );
    }
}
