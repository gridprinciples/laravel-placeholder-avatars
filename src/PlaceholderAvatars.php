<?php

namespace GridPrinciples\PlaceholderAvatars;

use GridPrinciples\PlaceholderAvatars\Requests\GenerateAvatarRequest;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;

class PlaceholderAvatars
{
    public function route(
        string $uri,
        ?string $type = 'beam',
        ?string $name = null,
        ?int $size = null,
        ?bool $square = null,
        ?array $colors = null,
    ): \Illuminate\Routing\Route {
        $params = array_filter(compact('name', 'type', 'size', 'square', 'colors'), 'filled');

        $viewComponentClass = 'GridPrinciples\\PlaceholderAvatars\\View\\Components\\'.Str::studly($type);

        if (! class_exists($viewComponentClass)) {
            throw new \InvalidArgumentException("Unknown avatar type: {$type}");
        }

        return Route::get($uri, fn (GenerateAvatarRequest $request) => $this->serveSvg($viewComponentClass, [
            ...$request->validated(),
            ...$params,
        ]));
    }

    protected function serveSvg(string $component, array $params)
    {
        ksort($params);

        if ($cacheDriver = config('placeholder-avatars.cache')) {
            $cacheKey = 'placeholder-avatar.'.md5(serialize($params));
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
        unset($params['type']);

        return (new $component(...$params))->render()->render();
    }
}
