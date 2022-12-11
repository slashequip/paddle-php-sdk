<?php

namespace SlashEquip\PaddlePhpSdk\Entities;

use SlashEquip\PaddlePhpSdk\Enums\Currency;

class PlanPrice
{
    public function __construct(
        public readonly Currency $currency,
        public readonly float $price,
    ) {
    }
}
