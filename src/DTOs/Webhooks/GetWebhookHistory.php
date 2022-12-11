<?php

namespace SlashEquip\PaddlePhpSdk\DTOs\Webhooks;

use SlashEquip\PaddlePhpSdk\Entities\Pagination\CursorPagination;

class GetWebhookHistory
{
    public function __construct(
        public readonly ?CursorPagination $pagination = null,
    ) {
    }
}
