<?php

namespace Armcanada\LaravelHoneypot;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Armcanada\LaravelHoneypot\Skeleton\SkeletonClass
 */
class LaravelHoneypotFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'laravel-honeypot';
    }
}
