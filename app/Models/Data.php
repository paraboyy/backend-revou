<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Data extends Model
{
    protected $table = 'datasuper';
    protected $fillable = ['Order_Date', 'Ship_Date', 'Ship_Mode', 'Segment', 'City', 'Region', 'Category', 'Sub_Category', 'Quantity', 'Sales', 'Discount', 'Profit'];

    public function getAllData()
    {
        return self::all();
    }

    public function getTotalSalesBySegment()
    {
        $segments = $this->select('Segment', \DB::raw('SUM(Sales) AS total_sales'))
            ->groupBy('Segment')
            ->get();

        return $segments;
    }
    public function getTotalSalesByShipmode()
    {
        $shipmode = $this->select('Ship_Mode', \DB::raw('SUM(Sales) AS total_sales'))
            ->groupBy('Ship_Mode')
            ->get();

        return $shipmode;
    }
}
