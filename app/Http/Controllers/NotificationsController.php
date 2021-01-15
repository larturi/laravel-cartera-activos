<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Log;

class NotificationsController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function index()
    {
        return auth()->user()->notifications->whereNull('read_at');
    }

    public function marcarLeida($notificationId)
    {
        $notification = auth()->user()->notifications->where('id', '=', $notificationId);
        
        $notification->markAsRead();

        return $notification;
    }

}
