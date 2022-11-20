<?php

namespace SlashEquip\PaddlePhpSdk\DTOs\Collections;

use Illuminate\Support\Collection;
use SlashEquip\PaddlePhpSdk\DTOs\WebhookField;

/**
 * @template TKey of array-key
 * @template TValue of \SlashEquip\PaddlePhpSdk\DTOs\WebhookField
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
