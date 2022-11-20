<?php

namespace SlashEquip\PaddlePhpSdk\DTOs\Requests;

use SlashEquip\PaddlePhpSdk\DTOs\Pagination\CursorPagination;

class GetWebhookHistory
{
    public function __construct(
        public readonly ?CursorPagination $pagination = null,
    )
    {
    }
}

