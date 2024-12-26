<?php

namespace App\Data\Hybridly;

use Spatie\LaravelData\Data;

class FlashBagData extends Data
{
    public function __construct(
        public readonly ?FlashData $success,
        public readonly ?FlashData $info,
        public readonly ?FlashData $warning,
        public readonly ?FlashData $error,
    ) {
    }
}
