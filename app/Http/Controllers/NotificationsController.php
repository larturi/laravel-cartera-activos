<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class NotificationsController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function index()
    {
        Log::info(auth()->user()->notifications);
        return auth()->user()->notifications;
    }

}
