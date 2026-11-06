<?php

namespace App\Console\Commands;

use App\Models\ExchangeRatesModel;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class GetDailyCurrencyValue extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'currency:get-value';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Convert USD and EUR to RSD';

    /**
     * Execute the console command.
     */
    public function handle()
    {

        foreach (ExchangeRatesModel::AVAILABLE_CURRENCIES as $currency) {
            $response = Http::get('https://kurs.resenje.org/api/v1/currencies/' . $currency . '/rates/today');
            $data = $response->json();

            $checkTable = ExchangeRatesModel::getCurrencyForToday($currency);
            if (is_null($checkTable)) {
                ExchangeRatesModel::create([
                    'currency' => $currency,
                    'value' => $data['exchange_middle']
                ]);
            }
        }
    }
}
