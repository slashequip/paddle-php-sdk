<?php

namespace SlashEquip\ChargebeeSdk\Requests\Plans;

use Carbon\Carbon;
use Sammyjo20\Saloon\Constants\Saloon;
use Sammyjo20\Saloon\Http\SaloonRequest;
use Sammyjo20\Saloon\Http\SaloonResponse;
use Sammyjo20\Saloon\Traits\Plugins\CastsToDto;
use Sammyjo20\Saloon\Traits\Plugins\HasJsonBody;
use SlashEquip\PaddlePhpSdk\Entities\Collections\WebhookHistoryCollection;
use SlashEquip\PaddlePhpSdk\Entities\Pagination\CursorPagination;
use SlashEquip\PaddlePhpSdk\Entities\Pagination\PaginationTotals;
use SlashEquip\PaddlePhpSdk\DTOs\Webhooks\GetWebhookHistory;
use SlashEquip\PaddlePhpSdk\Paddle;
use SlashEquip\PaddlePhpSdk\PaddlePhpSdkHelper;

class GetWebhookHistoryRequest extends SaloonRequest
{
    use HasJsonBody;
    use CastsToDto;

    protected ?string $connector = Paddle::class;

    protected ?string $method = Saloon::POST;

    public function __construct(
        protected GetWebhookHistory $data
    ) {
    }

    public function defineEndpoint(): string
    {
        return '/2.0/alert/webhooks';
    }

    public function defaultData(): array
    {
        return PaddlePhpSdkHelper::excludeNullValues([
            'page' => $this->data->pagination?->page,
            'alerts_per_page' => $this->data->pagination?->perPage,
            'query_head' => $this->data->pagination?->queryHead->toDateTimeString(),
            'query_tail' => $this->data->pagination?->queryHead->toDateTimeString(),
        ]);
    }

    protected function castToDto(SaloonResponse $response): WebhookHistoryCollection
    {
        if ($response->json('response.current_page') < $response->json('response.total_pages')) {
            $pagination = new CursorPagination(
                page: $response->json('response.current_page') + 1,
                perPage: $response->json('response.alerts_per_page'),
                queryHead: Carbon::parse($response->json('response.query_head')),
                queryTail: Carbon::parse($response->json('response.query_tail')),
            );
        }

        $totals = new PaginationTotals(
            totalPages: $response->json('response.total_pages'),
            totalRecords: $response->json('response.total_records'),
        );

        return WebhookHistoryCollection::fromArray($response->json('response.data'))
            ->setNextPagination($pagination ?? null)
            ->setPaginationTotals($totals);
    }
}
