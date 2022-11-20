<?php

namespace SlashEquip\PaddlePhpSdk\DTOs\Collections;

use Illuminate\Support\Collection;
use SlashEquip\PaddlePhpSdk\DTOs\WebhookHistory;

/**
 * @template TKey of array-key
 * @template TValue of \SlashEquip\PaddlePhpSdk\DTOs\WebhookHistory
 */
class WebhookHistoryCollection extends Collection
{
    use WithNextPagination;
    use WithPaginationTotals;

    /**
     * @param array<array-key, array> $data
     *
     * @return self<array-key, WebhookHistory>
     */
    public static function fromArray(array $data): self
    {
        return self::make($data)->map(
            fn (array $item): WebhookHistory => WebhookHistory::fromArray($item)
        );
    }
}