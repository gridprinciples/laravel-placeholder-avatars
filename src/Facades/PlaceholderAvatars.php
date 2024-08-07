<?php

namespace GridPrinciples\PlaceholderAvatars\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \GridPrinciples\PlaceholderAvatars\PlaceholderAvatars
 */
class PlaceholderAvatars extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return \GridPrinciples\PlaceholderAvatars\PlaceholderAvatars::class;
    }
}
