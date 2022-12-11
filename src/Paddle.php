<?php

namespace SlashEquip\PaddlePhpSdk;

use Sammyjo20\Saloon\Http\SaloonConnector;
use Sammyjo20\Saloon\Interfaces\AuthenticatorInterface;
use Sammyjo20\Saloon\Traits\Plugins\AcceptsJson;
use Sammyjo20\Saloon\Traits\Plugins\AlwaysThrowsOnErrors;
use SlashEquip\PaddlePhpSdk\Plugins\CheckForErrorsInOkResponses;

class Paddle extends SaloonConnector
{
    use AcceptsJson;
    use CheckForErrorsInOkResponses;
    use AlwaysThrowsOnErrors;

    public function __construct(
        protected string $vendorId,
        protected string $vendorAuthCode,
        protected bool $sandbox = false,
    ) {
    }

    public function defineBaseUrl(): string
    {
        return $this->sandbox
            ? 'https://sandbox-vendors.paddle.com/api/'
            : 'https://vendors.paddle.com/api/';
    }

    public function defaultAuth(): ?AuthenticatorInterface
    {
        return new PaddleAuthenticator($this->vendorId, $this->vendorAuthCode);
    }

    public function subscriptions(): SubscriptionsRequestCollection
    {
        return new SubscriptionsRequestCollection($this);
    }

    public function webhooks(): WebhooksRequestCollection
    {
        return new WebhooksRequestCollection($this);
    }
}
