<?php

namespace SlashEquip\PaddlePhpSdk\DTOs;

class WebhookField
{
    public function __construct(
        public readonly string $name,
        public readonly string|int $value,
    ) {}
}