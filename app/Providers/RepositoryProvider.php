<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Repositories\Interfaces\{
    AuthInterface,
    LanguageInterface,
    TranslationInterface,
    TagInterface
};

use App\Repositories\Classes\{
    AuthClass,
    LanguageClass,
    TranslationClass,
    TagClass
};


class RepositoryProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(AuthInterface::class,AuthClass::class);
        $this->app->bind(LanguageInterface::class,LanguageClass::class);
        $this->app->bind(TranslationInterface::class,TranslationClass::class);
        $this->app->bind(TagInterface::class,TagClass::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
