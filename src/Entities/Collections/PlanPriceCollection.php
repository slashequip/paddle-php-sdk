<?php

namespace SlashEquip\PaddlePhpSdk\Entities\Collections;

use Illuminate\Support\Collection;
use SlashEquip\PaddlePhpSdk\Entities\Plan;
use SlashEquip\PaddlePhpSdk\Entities\PlanPrice;
use SlashEquip\PaddlePhpSdk\Enums\Currency;

/**
 * @template TKey of array-key
 * @template TValue of \SlashEquip\PaddlePhpSdk\Entities\PlanPrice
 */
class PlanPriceCollection extends Collection
{
    /**
     * @param  array<array-key, array>  $data
     * @return self<array-key, PlanPrice>
     */
    public static function fromArray(array $data): self
    {
        return self::make($data)->map(
            fn (string $price, string $currency): PlanPrice => new PlanPrice(Currency::from($currency), floatval($price))
        );
    }
}
