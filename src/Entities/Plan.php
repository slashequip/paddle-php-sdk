<?php

namespace SlashEquip\PaddlePhpSdk\Entities;

use SlashEquip\PaddlePhpSdk\Entities\Collections\PlanPriceCollection;
use SlashEquip\PaddlePhpSdk\Enums\RecurringCycle;

class Plan
{
    public function __construct(
        public readonly int $id,
        public readonly string $name,
        public readonly RecurringCycle $billingType,
        public readonly int $billingPeriod,
        public readonly PlanPriceCollection $initialPrice,
        public readonly PlanPriceCollection $recurringPrice,
        public readonly int $trialDays,
    ) {
    }

    public static function fromArray(array $data): Plan
    {
        return new Plan(
            id: data_get($data, 'id'),
            name: data_get($data, 'name'),
            billingType: RecurringCycle::from(data_get($data, 'billing_type')),
            billingPeriod: data_get($data, 'billing_period'),
            initialPrice: PlanPriceCollection::fromArray(data_get($data, 'initial_price')),
            recurringPrice: PlanPriceCollection::fromArray(data_get($data, 'recurring_price')),
            trialDays: data_get($data, 'trial_days'),
        );
    }
}
