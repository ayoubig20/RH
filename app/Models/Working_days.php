<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Working_days extends Model
{
    use HasFactory;
    protected $fillable = [
        'year',
        'month',
        'working_days',
        'holidays',
        'sundays',
    ];
    public static function isHoliday(Carbon $date)
    {
        // Get the holidays for the date's year and month
        $holidays = DB::table('holidays')
            ->whereIn('primary_type', ['National holiday', 'Government Holiday'])
            ->whereYear('date', $date->year)
            ->whereMonth('date', $date->month)
            ->get()
            ->pluck('date');

        // Check if the date is a holiday
        return $holidays->contains($date->toDateString());
    }
    public static function getWorkingDaysInMonth($year, $month)
    {
        // Get the number of days in the month
        $daysInMonth = Carbon::createFromDate($year, $month, 1)->daysInMonth;

        // Initialize the counter for working days
        $workingDays = 0;

        // Loop through all days of the month
        for ($day = 1; $day <= $daysInMonth; $day++) {
            // Create a Carbon object from the date
            $date = Carbon::createFromDate($year, $month, $day);

            // Check if the current day is a weekday (excluding Sunday) or Saturday, or holiday
            if (($date->isWeekday() || $date->isSaturday() || $date->isSunday()) && !self::isHoliday($date)) {
                $workingDays++;
            }
        }

        return $workingDays;
    }


    public static function initializeWorkingDaysTable()
    {
        // Get the current year
        $currentYear = Carbon::now()->year;

        // Check if the working_days table is already populated for the current year
        if (!DB::table('working_days')->where('year', $currentYear)->exists()) {
            // Populate the working_days table with data for the current year
            for ($month = 1; $month <= 12; $month++) {
                $workingDays = self::getWorkingDaysInMonth($currentYear, $month);

                // Get the distinct holidays and Sundays in the month
                $holidays = DB::table('holidays')
                    ->whereIn('primary_type', ['National holiday', 'Government Holiday'])
                    ->whereYear('date', $currentYear)
                    ->whereMonth('date', $month)
                    ->distinct()
                    ->get(['date', 'name']);

                $holidays = $holidays->map(function ($holiday) {
                    return [
                        'date' => Carbon::parse($holiday->date),
                        'name' => $holiday->name,
                    ];
                });

                $nonWorkingDays = collect();

                // Loop through all days of the month and add any non-working days to the collection
                for ($day = 1; $day <= Carbon::createFromDate($currentYear, $month, 1)->daysInMonth; $day++) {
                    $date = Carbon::createFromDate($currentYear, $month, $day);

                    if ($date->isSunday()) {
                        $nonWorkingDays->push($date);
                    } else {
                        // Check if the day is a holiday
                        $holiday = $holidays->first(function ($holiday) use ($date) {
                            return $holiday['date']->equalTo($date);
                        });

                        if ($holiday) {
                            // Check if the holiday falls on a weekday
                            if (!$holiday['date']->isWeekend()) {
                                $nonWorkingDays->push($date);
                            }
                        }
                    }
                }

                // Subtract the number of non-working days from the working days count
                $workingDays -= $nonWorkingDays->count();

                DB::table('working_days')->insert([
                    'year' => $currentYear,
                    'month' => $month,
                    'working_days' => $workingDays,
                    'holidays' => $holidays->map(function ($holiday) {
                        return $holiday['date']->toDateString() . ':' . $holiday['name'];
                    })->implode(','),
                    'sundays' => $nonWorkingDays->filter(function ($date) {
                        return $date->isSunday();
                    })->map(function ($date) {
                        return $date->toDateString();
                    })->implode(','),
                ]);
            }
        }
    }
}
