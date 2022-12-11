<?php

namespace SlashEquip\ChargebeeSdk\Requests\Plans;

use Carbon\Carbon;
use Sammyjo20\Saloon\Constants\Saloon;
use Sammyjo20\Saloon\Http\SaloonRequest;
use Sammyjo20\Saloon\Http\SaloonResponse;
use Sammyjo20\Saloon\Traits\Plugins\CastsToDto;
use Sammyjo20\Saloon\Traits\Plugins\HasJsonBody;
use SlashEquip\PaddlePhpSdk\DTOs\Plans\ListPlans;
use SlashEquip\PaddlePhpSdk\Entities\Collections\PlanCollection;
use SlashEquip\PaddlePhpSdk\Paddle;
use SlashEquip\PaddlePhpSdk\PaddlePhpSdkHelper;

class ListPlansRequest extends SaloonRequest
{
    use HasJsonBody;
    use CastsToDto;

    protected ?string $connector = Paddle::class;

    protected ?string $method = Saloon::POST;

    public function __construct(
        protected ListPlans $data
    ) {
    }

    public function defineEndpoint(): string
    {
        return '/2.0/subscription/plans';
    }

    public function defaultData(): array
    {
        return PaddlePhpSdkHelper::excludeNullValues([
            'plan' => $this->data->planId,
        ]);
    }

    protected function castToDto(SaloonResponse $response): PlanCollection
    {
        return PlanCollection::fromArray($response->json('response'));
    }
}
