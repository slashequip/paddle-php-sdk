<?php

namespace SlashEquip\PaddlePhpSdk\Entities\Collections;

use Illuminate\Support\Collection;
use SlashEquip\PaddlePhpSdk\Entities\Plan;

/**
 * @template TKey of array-key
 * @template TValue of \SlashEquip\PaddlePhpSdk\Entities\Plan
 */
class PlanCollection extends Collection
{
    public function __construct($items = [])
    {
        parent::__construct($items);
    }

    /**
     * @param  array<array-key, array>  $data
     * @return self<array-key, Plan>
     */
    public static function fromArray(array $data): self
    {
        return self::make($data)->map(
            fn (array $item): Plan => Plan::fromArray($item)
        );
    }
}
