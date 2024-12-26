<?php

namespace App\Data\Hybridly;

use Spatie\LaravelData\Data;

class FlashData extends Data
{
    public function __construct(
        public readonly string $title,
        public readonly ?string $description,
    ) {
    }
}
