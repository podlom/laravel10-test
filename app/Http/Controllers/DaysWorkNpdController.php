<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\DateDifferenceRequest;
use Carbon\Carbon;

class DaysWorkNpdController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \App\Http\Requests\DateDifferenceRequest  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function __invoke(DateDifferenceRequest $request)
    {
        $inputDate = $request->input('date', '2023-02-06');

        $targetDate = Carbon::parse($inputDate);
        $currentDate = Carbon::now();

        $diff = $currentDate->diff($targetDate);

        return response()->json([
            'date' => $inputDate,
            'difference' => [
                'years' => $diff->y,
                'months' => $diff->m,
                'days' => $diff->d,
            ],
            'current_date' => $currentDate->format('Y-m-d'),
        ]);
    }
}
