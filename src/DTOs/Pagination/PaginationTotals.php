<?php

namespace SlashEquip\PaddlePhpSdk\DTOs\Pagination;

class PaginationTotals
{
    public function __construct(
        public readonly ?int $totalPages = null,
        public readonly ?int $totalRecords = null,
    ) {
    }
}