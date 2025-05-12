<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use Illuminate\Http\Request;
use Illuminate\View\View;

class DashboardAdminController extends Controller
{
    public function index():View
    {
        $notifications = Notification::all();
        return  view("",compact("notifications"));
    }

}
