<?php

declare(strict_types=1);


namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Carbon\Carbon;


class DaysSinceWarController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function __invoke(Request $request)
    {
        // Define the starting date
        $startDate = Carbon::create(2022, 2, 24);

        // Get the current date
        $currentDate = Carbon::now();

        // Calculate the difference in days
        $daysSince = $startDate->diffInDays($currentDate);

        return response()->json([
            'message' => 'Days since war start February 24, 2022',
            'days' => $daysSince,
        ]);
    }
}
