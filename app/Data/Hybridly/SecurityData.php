<?php

namespace App\Data\Hybridly;

use Spatie\LaravelData\Data;

class SecurityData extends Data
{
    public function __construct(
        public readonly bool $is_authenticated,
        public readonly string $url,
        public readonly ?string $current_route,
    ) {
    }
}
