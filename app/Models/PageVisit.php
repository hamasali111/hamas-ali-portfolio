<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class PageVisit extends Model
{
    protected $fillable = ['visited_on', 'page', 'hits'];

    protected $casts = ['visited_on' => 'date'];

    public static function record(string $page = '/'): void
    {
        $today = Carbon::today()->toDateString();
        $row   = static::whereDate('visited_on', $today)->where('page', $page)->first();

        if ($row) {
            $row->increment('hits');
        } else {
            static::create(['visited_on' => $today, 'page' => $page, 'hits' => 1]);
        }
    }

    public static function last30Days(): array
    {
        $rows = static::whereDate('visited_on', '>=', Carbon::today()->subDays(29))
            ->where('page', '/')
            ->orderBy('visited_on')
            ->get(['visited_on', 'hits'])
            ->mapWithKeys(fn($r) => [Carbon::parse($r->visited_on)->toDateString() => $r->hits])
            ->toArray();

        $labels = [];
        $data   = [];

        for ($i = 29; $i >= 0; $i--) {
            $date     = Carbon::today()->subDays($i)->toDateString();
            $labels[] = Carbon::today()->subDays($i)->format('M j');
            $data[]   = $rows[$date] ?? 0;
        }

        return compact('labels', 'data');
    }

    public static function totalToday(): int
    {
        return (int) (static::whereDate('visited_on', Carbon::today()->toDateString())
            ->where('page', '/')
            ->value('hits') ?? 0);
    }

    public static function totalAllTime(): int
    {
        return (int) static::where('page', '/')->sum('hits');
    }
}
