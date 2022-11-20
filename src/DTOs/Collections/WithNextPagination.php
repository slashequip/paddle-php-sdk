<?php

namespace SlashEquip\PaddlePhpSdk\DTOs\Collections;

use SlashEquip\PaddlePhpSdk\DTOs\Pagination\Pagination;

trait WithNextPagination
{
    public readonly ?Pagination $nextPagination;

    public function setNextPagination(?Pagination $pagination): static
    {
        $this->nextPagination = $pagination;

        return $this;
    }
}