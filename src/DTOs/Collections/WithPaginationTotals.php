<?php

namespace SlashEquip\PaddlePhpSdk\DTOs\Collections;

use SlashEquip\PaddlePhpSdk\DTOs\Pagination\PaginationTotals;

trait WithPaginationTotals
{
    public readonly ?PaginationTotals $paginationTotals;

    public function setPaginationTotals(PaginationTotals $totals): static
    {
        $this->paginationTotals = $totals; // @phpstan-ignore-line

        return $this;
    }
}
