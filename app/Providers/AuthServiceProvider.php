<?php

namespace App\Providers;

use App\Models\Deck;
use App\Policies\DeckPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    protected $policies = [
        Deck::class => DeckPolicy::class,
    ];

    public function boot(): void
    {
        $this->registerPolicies();
    }
}
