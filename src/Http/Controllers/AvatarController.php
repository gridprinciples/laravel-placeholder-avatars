<?php

namespace GridPrinciples\PlaceholderAvatars\Http\Controllers;

use GridPrinciples\PlaceholderAvatars\Requests\GenerateAvatarRequest;
use GridPrinciples\PlaceholderAvatars\View\Components\Beam;

class AvatarController
{
    public function serveBeam(GenerateAvatarRequest $request)
    {
        return $this->serveAvatar(Beam::class, $request->validated());
    }

    protected function serveAvatar(string $component, array $params)
    {
        $response = response((new $component(...$params))->render())
            ->header('Content-Type', 'image/svg+xml');

        $onlySizeWasPassed = count($params) === 1 && array_key_exists('size', $params);

        if (! empty($params) && ! $onlySizeWasPassed) {
            $response->header('Cache-Control', 'public, max-age=604800, immutable');
        }

        return $response;

    }
}
