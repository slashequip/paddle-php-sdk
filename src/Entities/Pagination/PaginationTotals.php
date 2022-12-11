<?php

namespace SlashEquip\PaddlePhpSdk\Entities\Pagination;

class PaginationTotals
{
    public function __construct(
        public readonly ?int $totalPages = null,
        public readonly ?int $totalRecords = null,
    ) {
    }
}
