<?php

namespace SlashEquip\PaddlePhpSdk\Entities;

class WebhookField
{
    public function __construct(
        public readonly string $name,
        public readonly string|int $value,
    ) {
    }
}
