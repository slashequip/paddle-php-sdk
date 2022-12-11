<?php

namespace SlashEquip\PaddlePhpSdk;

use GuzzleHttp\Exception\GuzzleException;
use ReflectionException;
use Sammyjo20\Saloon\Exceptions\SaloonException;
use Sammyjo20\Saloon\Http\RequestCollection;
use SlashEquip\ChargebeeSdk\Requests\Plans\ListPlansRequest;
use SlashEquip\PaddlePhpSdk\DTOs\Plans\ListPlans;
use SlashEquip\PaddlePhpSdk\Entities\Collections\PlanCollection;

class SubscriptionsRequestCollection extends RequestCollection
{
    /**
     * @throws ReflectionException
     * @throws GuzzleException
     * @throws SaloonException
     */
    public function listPlans(ListPlans $dto): PlanCollection
    {
        return $this->connector
            ->request(new ListPlansRequest($dto))
            ->send()
            ->dto();
    }
}
