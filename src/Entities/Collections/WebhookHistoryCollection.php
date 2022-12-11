<?php

namespace SlashEquip\PaddlePhpSdk\Entities\Collections;

use Illuminate\Support\Collection;
use SlashEquip\PaddlePhpSdk\Entities\WebhookHistory;

/**
 * @template TKey of array-key
 * @template TValue of \SlashEquip\PaddlePhpSdk\Entities\WebhookHistory
 */
class WebhookHistoryCollection extends Collection
{
    use WithNextPagination;
    use WithPaginationTotals;

    public function __construct($items = [])
    {
        parent::__construct($items);

        // Todo; lazy phpstan fix for 'uninitialized readonly property. Assign it in the constructor'
        $this->nextPagination = null;
        $this->paginationTotals = null;
    }

    /**
     * @param  array<array-key, array>  $data
     * @return self<array-key, WebhookHistory>
     */
    public static function fromArray(array $data): self
    {
        return self::make($data)->map(
            fn (array $item): WebhookHistory => WebhookHistory::fromArray($item)
        );
    }
}
