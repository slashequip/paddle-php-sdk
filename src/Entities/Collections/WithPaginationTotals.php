<?php

namespace SlashEquip\PaddlePhpSdk\Entities\Collections;

use SlashEquip\PaddlePhpSdk\Entities\Pagination\PaginationTotals;

trait WithPaginationTotals
{
    public readonly ?PaginationTotals $paginationTotals;

    public function setPaginationTotals(PaginationTotals $totals): static
    {
        $this->paginationTotals = $totals; // @phpstan-ignore-line

        return $this;
    }
}
