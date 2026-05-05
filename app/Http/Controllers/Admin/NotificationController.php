<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Notification;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class NotificationController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            if(auth()->user()->role == "admin"){
                $pages = Notification::latest();
            }else{
                $pages = Notification::where('user_id',auth()->user()->id)->latest();
            }
            return DataTables::of($pages)
                ->addIndexColumn()
                ->filter(function ($query) {
                    if (request()->has('search') && $search = request('search')['value']) {
                        $query->where(function ($q) use ($search) {
                            $q->Where('title', 'like', "%{$search}%")
                            ->orWhere('message', 'like', "%{$search}%")
                            ->orWhere('type', 'like', "%{$search}%")
                            ->orWhere('is_read', 'like', "%{$search}%")
                            ->orWhere('created_at', 'like', "%{$search}%");
                        });
                    }
                })
                ->editColumn('is_read', function ($row) {
                     if ($row->is_read == 1) {
                        $status = '<span class="badge bg-success">Read</span>';
                    }else{
                        $status = '<span class="badge bg-secondary">Unread</span>';
                    };
                    return $status;
                })
                ->editColumn('created_at', function ($row) {
                    return $row->created_at->format('Y-m-d H:i:s');
                })
                ->editColumn('message', function ($row) {
                    $original = $row->message ?? '';
                    $limit = 12;
                    $short = \Illuminate\Support\Str::limit($original, $limit);

                    if (strlen($original) <= $limit) {
                        return '<span>'.e($original).'</span>';
                    }

                    return '
                        <span>'.e($short).'</span>
                        <a href="javascript:void(0)"
                        class="text-primary viewMessage ms-1"
                        data-message="'.e($original).'">
                            <i class="fa fa-eye"></i>
                        </a>
                    ';
                })

                ->addColumn('action', function ($row) {
                    if(auth()->user()->role == "admin"){
                        return '
                            <div class="d-flex gap-1">
                                <button
                                    class="btn btn-sm btn-danger delete"
                                    data-id="'.$row->id.'"
                                    data-table-id="notification"
                                    data-route="'.route('notification.destroy', $row->id).'"
                                    title="Delete">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </div>
                        ';
                    }
                    else{
                        return '-';
                    }
                })
                ->rawColumns(['action','created_at','message','is_read'])
                ->make(true);
        }
        Notification::where('is_read', false)->update([
            'is_read' => true,
            'read_at' => now()
        ]);
        return view('admin.notifications.index');
    }

    public function destroy($id)
    {
        Notification::findOrFail($id)->delete();
        return response()->json(['success' => true]);
    }
}
