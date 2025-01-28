<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Show the Admin Dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function dashboard()
    {
        return view('admin.dashboard');
    }


    /**
     * Show the Inventory Management.
     *
     * @return \Illuminate\View\View
     */
    public function inventoryManagement()
    {
        return view('admin.inventory-management');
    }

    /**
     * Show the Category Management.
     *
     * @return \Illuminate\View\View
     */
    public function categoryManagement()
    {
        return view('admin.category-management');
    }

    /**
     * Show the Categororder Management.
     *
     * @return \Illuminate\View\View
     */
    public function ordersManagement()
    {
        return view('admin.orders-management');
    }
}
