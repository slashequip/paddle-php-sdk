<?php

namespace SlashEquip\PaddlePhpSdk\Plugins;

use Sammyjo20\Saloon\Http\SaloonRequest;
use Sammyjo20\Saloon\Http\SaloonResponse;
use Sammyjo20\Saloon\Traits\CollectsInterceptors;
use SlashEquip\PaddlePhpSdk\Exceptions\PaddleException;

/**
 * @mixin CollectsInterceptors
 */
trait CheckForErrorsInOkResponses
{
    /**
     * Always throw if there is something wrong with the request.
     *
     * @param  SaloonRequest  $request
     * @return void
     *
     * @throws \Sammyjo20\Saloon\Exceptions\SaloonInvalidConnectorException
     */
    public function bootCheckForErrorsInOkResponses(SaloonRequest $request): void
    {
        if (
            $this instanceof SaloonRequest
            && $this->traitExistsOnConnector(CheckForErrorsInOkResponses::class)
        ) {
            return;
        }

        $this->addResponseInterceptor(function (SaloonRequest $request, SaloonResponse $response) {
            if ($response->json('success', true)) {
                return $response;
            }

            throw new PaddleException(
                message: $response->json('error.message'),
                code: $response->json('error.code'),
            );
        });
    }
}
