<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Data;

class OlahDataController extends Controller
{
    #FUNGSI MENGAMBIL SEMUA DATA
    public function index()
    {
        $data = Data::all();
        return response()->json($data);
    }

    #FUNGSI HITUNG TOTAL CUSTOMER
    public function getTotalCustomers()
    {
        $totalCustomers = Data::count();

        return response()->json([
            'total_customers' => $totalCustomers
        ]);
    }

    #FUNGSI HITUNG TOTAL SALES
    public function getTotalSales(Request $request)
    {
        $totalSales = Data::sum('Sales');

        return response()->json([
            'success' => true,
            'total_sales' => $totalSales,
        ]);
    }

    #FUNGSI HITUNG TOTAL QUANTITY
    public function getTotalQuantity(Request $request)
    {
        $totalQuantity = Data::sum('Quantity');

        return response()->json([
            'success' => true,
            'total_quantity' => $totalQuantity,
        ]);
    }

    #FUNGSI HITUNG TOTAL PROFIT
    public function getTotalProfit(Request $request)
    {
        $totalProfit = Data::sum('Profit');

        return response()->json([
            'success' => true,
            'total_profit' => $totalProfit,
        ]);
    }

    #FUNGSI UNTUK GRAFIK PERTAHUN BERDASARKAN SALES
    public function getTotalSalesPerYear(Request $request)
    {
        // Query untuk menghitung total penjualan per tahun
        $totalSalesPerYear = Data::selectRaw('YEAR(Order_Date) AS year, SUM(Sales) AS total_sales')
                                  ->groupBy('year')
                                  ->get();

        return response()->json(['total_sales_per_year' => $totalSalesPerYear]);
    }

    #FUNGSI TOTAL SALES BERDASARKAN SEGMENT
    public function getTotalSalesBySegment()
    {
        $sales = new data();
        $segments = $sales->getTotalSalesBySegment();

        return response()->json($segments);
    }
    
    #FUNGSI TOTAL SALES BERDASARKAN SHIPMODE
    public function getTotalSalesByShipmode()
    {
        $sales = new data();
        $shipmode = $sales->getTotalSalesByShipmode();

        return response()->json($shipmode);
    }
}
