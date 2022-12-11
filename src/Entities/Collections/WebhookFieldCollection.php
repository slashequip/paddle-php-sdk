<?php

namespace SlashEquip\PaddlePhpSdk\Entities\Collections;

use Illuminate\Support\Collection;
use SlashEquip\PaddlePhpSdk\Entities\WebhookField;

/**
 * @template TKey of array-key
 * @template TValue of \SlashEquip\PaddlePhpSdk\Entities\WebhookField
 */
class WebhookFieldCollection extends Collection
{
    /**
     * @param  array<array-key, string|int>  $data
     * @return self<array-key, WebhookField>
     */
    public static function fromArray(array $data): self
    {
        return self::make($data)->map(
            fn (string|int $value, string $key): WebhookField => new WebhookField(name: $key, value: $value)
        );
    }

    public function firstByFieldName(string $name): ?WebhookField
    {
        return $this->first(fn (WebhookField $field): bool => $field->name === $name);
    }
}
