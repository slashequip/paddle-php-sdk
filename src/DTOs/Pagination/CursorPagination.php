<?php

namespace SlashEquip\PaddlePhpSdk\DTOs\Pagination;

use Carbon\CarbonInterface;

class CursorPagination implements Pagination
{
    public function __construct(
        public readonly int $page = 1,
        public readonly int $perPage = 10,
        public readonly ?CarbonInterface $queryHead = null,
        public readonly ?CarbonInterface $queryTail = null,
    ) {
    }
}
