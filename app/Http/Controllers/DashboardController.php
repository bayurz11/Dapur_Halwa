<?php

namespace App\Http\Controllers;

use App\Models\Visitor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $visitors = Visitor::select('latitude', 'longitude', 'city', 'country')
            ->whereNotNull('latitude')
            ->get();

        $markers = $visitors->map(function ($v) {
            return [
                'latLng' => [$v->latitude, $v->longitude],
                'name' => "{$v->city}, {$v->country}"
            ];
        });

        $totalVisitors = Visitor::count();
        $todayVisitors = Visitor::whereDate('created_at', now()->toDateString())->count();
        $user = Auth::user();

        return view('dashboard.index', compact('user', 'totalVisitors', 'todayVisitors', 'markers'));
    }
}
