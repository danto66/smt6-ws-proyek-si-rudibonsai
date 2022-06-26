<?php

namespace App\Http\Controllers\Admin;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Builder;

class ReportAdminController extends Controller
{
    const MONTH_JANUARY     = 1;
    const MONTH_FEBRUARY    = 2;
    const MONTH_MARCH       = 3;
    const MONTH_APRIL       = 4;
    const MONTH_MAY         = 5;
    const MONTH_JUNE        = 6;
    const MONTH_JULY        = 7;
    const MONTH_AUGUST      = 8;
    const MONTH_SEPTEMBER   = 9;
    const MONTH_OCTOBER     = 10;
    const MONTH_NOVEMBER    = 11;
    const MONTH_DECEMBER    = 12;

    const MONTH_JANUARY_LABEL     = 'January';
    const MONTH_FEBRUARY_LABEL    = 'February';
    const MONTH_MARCH_LABEL       = 'March';
    const MONTH_APRIL_LABEL       = 'April';
    const MONTH_MAY_LABEL         = 'May';
    const MONTH_JUNE_LABEL        = 'June';
    const MONTH_JULY_LABEL        = 'July';
    const MONTH_AUGUST_LABEL      = 'August';
    const MONTH_SEPTEMBER_LABEL   = 'September';
    const MONTH_OCTOBER_LABEL     = 'October';
    const MONTH_NOVEMBER_LABEL    = 'November';
    const MONTH_DECEMBER_LABEL    = 'December';

    public function index(Request $request)
    {
        $orders = Order::with(['orderDetails', 'orderDetails.product'])
            ->where('status', 'Selesai')
            ->when($request->input('month'), function (Builder $query) use ($request) {
                return $query->whereMonth('created_at', $request->input('month'));
            })
            ->when($request->input('year'), function (Builder $query) use ($request) {
                return $query->whereYear('created_at', $request->input('year'));
            })
            ->get()
            ->sortDesc();

        $years = $this->getYears();
        $months = $this->getMonths();

        return view('admin.report', compact('orders', 'years', 'months'));
    }

    private function getYears()
    {
        return Order::select('created_at')
            ->orderBy('created_at', 'DESC')
            ->get()
            ->map(function ($item) {
                $year = explode('-', $item->created_at);
                return $year[0];
            })->unique();
    }

    private function getMonths()
    {
        return [
            ['id' => static::MONTH_JANUARY,    'value' => static::MONTH_JANUARY_LABEL],
            ['id' => static::MONTH_FEBRUARY,   'value' => static::MONTH_FEBRUARY_LABEL],
            ['id' => static::MONTH_MARCH,      'value' => static::MONTH_MARCH_LABEL],
            ['id' => static::MONTH_APRIL,      'value' => static::MONTH_APRIL_LABEL],
            ['id' => static::MONTH_MAY,        'value' => static::MONTH_MAY_LABEL],
            ['id' => static::MONTH_JUNE,       'value' => static::MONTH_JUNE_LABEL],
            ['id' => static::MONTH_JULY,       'value' => static::MONTH_JULY_LABEL],
            ['id' => static::MONTH_AUGUST,     'value' => static::MONTH_AUGUST_LABEL],
            ['id' => static::MONTH_SEPTEMBER,  'value' => static::MONTH_SEPTEMBER_LABEL],
            ['id' => static::MONTH_OCTOBER,    'value' => static::MONTH_OCTOBER_LABEL],
            ['id' => static::MONTH_NOVEMBER,   'value' => static::MONTH_NOVEMBER_LABEL],
            ['id' => static::MONTH_DECEMBER,   'value' => static::MONTH_DECEMBER_LABEL]
        ];
    }
}
