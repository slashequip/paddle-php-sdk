<?php

namespace SlashEquip\PaddlePhpSdk;

use Sammyjo20\Saloon\Http\SaloonRequest;
use Sammyjo20\Saloon\Interfaces\AuthenticatorInterface;

class PaddleAuthenticator implements AuthenticatorInterface
{
    public function __construct(
        protected string $vendorId,
        protected string $vendorAuthCode,
    ) {
    }

    public function set(SaloonRequest $request): void
    {
        $request->addData("vendor_id", $this->vendorId);
        $request->addData("vendor_auth_code", $this->vendorAuthCode);
    }

}