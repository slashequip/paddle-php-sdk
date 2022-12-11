<?php

namespace SlashEquip\PaddlePhpSdk\Entities;

use Carbon\Carbon;
use Carbon\CarbonInterface;
use SlashEquip\PaddlePhpSdk\Entities\Collections\WebhookFieldCollection;

class WebhookHistory
{
    public function __construct(
        public readonly int $id,
        public readonly int $alertId,
        public readonly string $alertName,
        public readonly string $status,
        public readonly CarbonInterface $createdAt,
        public readonly CarbonInterface $updatedAt,
        public readonly int $attempts,
        public readonly WebhookFieldCollection $fields,
    ) {
    }

    public static function fromArray(array $data): WebhookHistory
    {
        return new WebhookHistory(
            id: data_get($data, 'id'),
            alertId: data_get($data, 'alert_id'),
            alertName: data_get($data, 'alert_name'),
            status: data_get($data, 'status'),
            createdAt: Carbon::parse(data_get($data, 'created_at')),
            updatedAt: Carbon::parse(data_get($data, 'updated_at')),
            attempts: data_get($data, 'attempts'),
            fields: WebhookFieldCollection::fromArray(data_get($data, 'fields')),
        );
    }
}
