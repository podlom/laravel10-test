<?php

declare(strict_types=1);

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class DateDifferenceRequest extends FormRequest
{
    public function authorize()
    {
        return true; // Дозволяємо всім використовувати цей запит
    }

    public function rules()
    {
        return [
            'date' => [
                'nullable',
                'string',
                'regex:/^\d{4}-\d{2}-\d{2}$/',
                function ($attribute, $value, $fail) {
                    if (!strtotime($value)) {
                        $fail('Невірний формат дати або дата не існує.');
                    }
                    $date = \Carbon\Carbon::parse($value);
                    $now = \Carbon\Carbon::now();
                    if ($date > $now) {
                        $fail('Дата повинна бути в минулому або сьогодні.');
                    }
                },
            ],
        ];
    }

    public function messages()
    {
        return [
            'date.regex' => 'Дата повинна бути у форматі YYYY-MM-DD.',
        ];
    }
}
