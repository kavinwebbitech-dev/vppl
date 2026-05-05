<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Job;
use App\Models\Enquiry;
use App\Models\Page;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class AdminController extends Controller
{
    public function index()
    {
        $dailyEnquiries = Enquiry::selectRaw('DATE(created_at) as date, COUNT(*) as total')
            ->whereDate('created_at', '>=', Carbon::now()->subDays(6))
            ->groupBy('date')
            ->orderBy('date')
            ->get();

        $labels = $dailyEnquiries->pluck('date')->map(fn($d) => Carbon::parse($d)->format('d M'));
        $data   = $dailyEnquiries->pluck('total');
        return view('admin.index', [
            'totalEnquiries' => Enquiry::count(),
            'totalServices'  => Service::where('status',1)->count(),
            'totaljobs'   => Job::count(),
            'totalPages'     => Page::where('status',1)->count(),
            'labels' => $labels,
            'data' => $data,
            'todayCount' => Enquiry::whereDate('created_at', today())->count(),
            'monthCount' => Enquiry::whereMonth('created_at', now()->month)->count(),
            'totalCount' => Enquiry::count(),
        ]);
    }
}
