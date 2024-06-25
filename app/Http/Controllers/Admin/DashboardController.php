<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\OrderModel;
use App\Models\User;
use App\Models\ProductModel;

class DashboardController extends Controller
{
    public function dashboard(Request $request){
        $data['TotalOrder'] = OrderModel::getTotalOrder();
        $data['NewOrder'] = OrderModel::getNewOrder();
        $data['TotalAmount'] = OrderModel::getTotalAmount();
        $data['TodayPayment'] = OrderModel::getTodayPayment();
        $data['UserRegistrations'] = User::getUserRegistrations();
        $data['TotalProduct'] = ProductModel::getTotalProduct();

        $data['LatestOrders'] = OrderModel::getLatestOrders();

        if ($request->year) {
            $year = $request->year;
        } else {
            $year = date('Y');
        }
        
        $getTotalUserRegistrationsMonth = '';
        $getTotalOrderMonth = '';
        $getTotalAmountMonth = '';

        $totalAmount = 0;

        for ($month=1; $month <= 12 ; $month++) { 
            $startDate = new \DateTime("$year-$month-01");
            $endDate = new \DateTime("$year-$month-01"); 
            $endDate->modify('last day of this month');

            $start_date = $startDate->format('Y-m-d');
            $end_date = $endDate->format('Y-m-d');
            
            $UserRegistrations = User::getTotalUserRegistrationsMonth($start_date, $end_date);
            $getTotalUserRegistrationsMonth .= $UserRegistrations.',';

            $OrderMonth = OrderModel::getTotalOrderMonth($start_date, $end_date);
            $getTotalOrderMonth .= $OrderMonth.',';

            $AmountMonth = OrderModel::getTotalAmountMonth($start_date, $end_date);
            $getTotalAmountMonth .= $AmountMonth.',';

            $totalAmount = $totalAmount + $AmountMonth;
        }
        $data['getTotalUserRegistrationsMonth'] = rtrim($getTotalUserRegistrationsMonth, ",");
        $data['getTotalOrderMonth'] = rtrim($getTotalOrderMonth, ",");
        $data['getTotalAmountMonth'] = rtrim($getTotalAmountMonth, ",");
        $data['totalAmount'] = $totalAmount;
        $data['year'] = $year;

        $data['header_title'] = "Dashboard";
        return view('admin.dashboard', $data);
    }
}
