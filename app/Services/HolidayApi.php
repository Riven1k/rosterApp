<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;

class HolidayApi
{
    public function isHoliday($date)
    {
        $year = substr($date, 0, 4);
        $country = 'MT';

        $cacheKey = "holidays_{$year}_{$country}";

        $holidays = Cache::remember($cacheKey, now()->addDays(7), function () use ($year, $country) {
            $response = Http::get("https://date.nager.at/api/v3/PublicHolidays/{$year}/{$country}");
            return $response->successful() ? $response->json() : [];
        });

        $match = collect($holidays)->firstWhere('date', $date);

        return $match ? $match['localName'] : null;
    }
}
