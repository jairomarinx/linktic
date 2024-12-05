<?php

namespace App\Http\Controllers;
use App\Models\Order;
use App\Models\Product;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class ExcelController extends Controller
{
    public function export_products()
    {

        $data = Product::all();

        $csvHeader = ['id', 'name', 'price','description'];

    $csvContent = '';
    $file = fopen('php://temp', 'r+');
    fputcsv($file, $csvHeader);

    foreach ($data as $item) {
        fputcsv($file, [
            $item->id,
            $item->name,
            $item->price,
            $item->description,
        ]);
    }

    rewind($file);
    $csvContent = stream_get_contents($file);
    fclose($file);


    return Response::make($csvContent, 200, [
        'Content-Type' => 'text/csv',
        'Content-Disposition' => 'attachment; filename="products.csv"',
    ]);



        
    }
    public function export_orders()
    {
        $data = Order::all();

        $csvHeader = ['id', 'customer', 'product_id','total'];

    $csvContent = '';
    $file = fopen('php://temp', 'r+');
    fputcsv($file, $csvHeader);

    foreach ($data as $item) {
        fputcsv($file, [
            $item->id,
            $item->customer,
            $item->product_id,
            $item->total,
        ]);
    }

    rewind($file);
    $csvContent = stream_get_contents($file);
    fclose($file);


    return Response::make($csvContent, 200, [
        'Content-Type' => 'text/csv',
        'Content-Disposition' => 'attachment; filename="orders.csv"',
    ]);

    }
}
