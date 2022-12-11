<?php

namespace SlashEquip\PaddlePhpSdk\DTOs\Plans;

class ListPlans
{
    public function __construct(
        public readonly int $planId,
    ) {
    }
}
