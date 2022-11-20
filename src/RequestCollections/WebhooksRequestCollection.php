<?php

namespace SlashEquip\PaddlePhpSdk;

use GuzzleHttp\Exception\GuzzleException;
use ReflectionException;
use Sammyjo20\Saloon\Exceptions\SaloonException;
use Sammyjo20\Saloon\Http\RequestCollection;
use SlashEquip\ChargebeeSdk\Requests\Plans\GetWebhookHistoryRequest;
use SlashEquip\PaddlePhpSdk\DTOs\Collections\WebhookHistoryCollection;
use SlashEquip\PaddlePhpSdk\DTOs\Requests\GetWebhookHistory;

class WebhooksRequestCollection extends RequestCollection
{
    /**
     * @throws ReflectionException
     * @throws GuzzleException
     * @throws SaloonException
     */
    public function getHistory(GetWebhookHistory $dto): WebhookHistoryCollection
    {
        return $this->connector
            ->request(new GetWebhookHistoryRequest($dto))
            ->send()
            ->dto();
    }
}