<?php

namespace prospeak\lbtcapi;

use Illuminate\Support\ServiceProvider;

class LbtcApiServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/config/lbtcapi.php' => config_path('lbtcapi.php'),
        ]);
        $this->app->make('Prospeak\Lbtcapi\Wallet\WalletBalance');
        $this->app->make('Prospeak\Lbtcapi\Wallet\WalletTransactions');
        $this->app->make('Prospeak\Lbtcapi\Wallet\WalletFees');
        $this->app->make('Prospeak\Lbtcapi\Account\Myself');
        $this->app->make('Prospeak\Lbtcapi\Account\Notification');
        $this->app->make('Prospeak\Lbtcapi\Account\TradesCancelled');
        $this->app->make('Prospeak\Lbtcapi\Account\TradesClosed');
        $this->app->make('Prospeak\Lbtcapi\Account\TradesOpen');
        $this->app->make('Prospeak\Lbtcapi\Account\TradesReleased');
        $this->app->make('Prospeak\Lbtcapi\Ads\AdsAll');
        $this->app->make('Prospeak\Lbtcapi\Market\MarketAll');
        $this->app->make('Prospeak\Lbtcapi\Trades\TradesAll');
        $this->loadMigrationsFrom(__DIR__ . '/migrations');
        $this->publishes([
            __DIR__ . '/migrations/' => database_path('migrations')
        ], 'migrations');
    }
}
