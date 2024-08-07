<?php

namespace GridPrinciples\PlaceholderAvatars;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Route;
use GridPrinciples\PlaceholderAvatars\Requests\GenerateAvatarRequest;

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
        ksort($params);

        if($cacheDriver = config('placeholder-avatars.cache')) {
            $cacheKey = 'placeholder-avatar.' . md5(serialize($params));
            $cacheTTL = now()->addWeek();

            $renderedAvatar = Cache::driver($cacheDriver === true ? null : $cacheDriver)
                ->remember($cacheKey, $cacheTTL, fn () => $this->renderAvatar($component, $params));
        } else {
            $renderedAvatar = $this->renderAvatar($component, $params);
        }

        $response = response($renderedAvatar)
            ->header('Content-Type', 'image/svg+xml');

        if (filled($params['name'] ?? null)) {
            $response->header('Cache-Control', 'public, max-age=604800, immutable');
        }

        return $response;
    }

    protected function renderAvatar(string $component, array $params)
    {
        return (new $component(...$params))->render()->render();
    }
}
