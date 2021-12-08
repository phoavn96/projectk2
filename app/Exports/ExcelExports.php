<?php

namespace App\Exports;

use App\Order;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
class ExcelExports implements FromCollection,WithHeadings,WithColumnWidths
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Order::all();
    }
    public function columnWidths(): array
    {
        return [
            'A' => 2,
            'B' => 17.71,
            'C'=> 9.57,
            'D'=> 42.86,
            'E'=>16.86,
            'F'=>23.29,
            'G'=>11,
            'H'=>14.29,
            'I'=>14.14,
            'J'=>11.29,
            'K'=>8.43,
            'L'=>12.43,
            'M'=>25.43,
            'N'=>11.43,
        ];
    }
    public function headings(): array
    {
        return [
            'id',
            'shipping_name',
            'account_id',
            'shipping_address',
            'shipping_phone',
            'shipping_email',
            'total_money',
            'shipping_status',
            'shipping_notes',
            'order_status',
            'code',
            'reducemoney',
            'created_at',
            'updated_at',
        ];
    }
}
