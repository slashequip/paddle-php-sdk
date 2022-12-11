<?php

namespace SlashEquip\PaddlePhpSdk\Entities\Collections;

use SlashEquip\PaddlePhpSdk\Entities\Pagination\Pagination;

trait WithNextPagination
{
    public readonly ?Pagination $nextPagination;

    public function setNextPagination(?Pagination $pagination): static
    {
        $this->nextPagination = $pagination; // @phpstan-ignore-line

        return $this;
    }
}
