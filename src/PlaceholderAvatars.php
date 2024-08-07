<?php

namespace GridPrinciples\PlaceholderAvatars;

use GridPrinciples\PlaceholderAvatars\Requests\GenerateAvatarRequest;
use Illuminate\Support\Facades\Route;

class PlaceholderAvatars
{
    public function route(
        string $uri,
        ?string $name = null,
        ?int $size = null,
        ?bool $square = null,
        ?array $colors = null,
    ): \Illuminate\Routing\Route {
        $params = array_filter(compact('name', 'size', 'square', 'colors'), 'filled');

        return Route::get($uri, fn (GenerateAvatarRequest $request) => $this->serveSvg(View\Components\Beam::class, [
            ...$request->validated(),
            ...$params,
        ]));
    }

    protected function serveSvg(string $component, array $params)
    {
        $response = response((new $component(...$params))->render())
            ->header('Content-Type', 'image/svg+xml');

        if (filled($params['name'] ?? null)) {
            $response->header('Cache-Control', 'public, max-age=604800, immutable');
        }

        return $response;
    }
}
