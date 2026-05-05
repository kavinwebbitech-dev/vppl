<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Enquiry;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class EnquiryController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $pages = Enquiry::latest();
            return DataTables::of($pages)
                ->addIndexColumn()
                ->filter(function ($query) {
                    if (request()->has('search') && $search = request('search')['value']) {
                        $query->where(function ($q) use ($search) {
                            $q->Where('name', 'like', "%{$search}%")
                                ->orWhere('phone', 'like', "%{$search}%")
                                ->orWhere('email', 'like', "%{$search}%")
                                ->orWhere('message', 'like', "%{$search}%")
                                ->orWhere('type', 'like', "%{$search}%")
                                ->orWhere('status', 'like', "%{$search}%")
                                ->orWhere('created_at', 'like', "%{$search}%");
                        });
                    }
                })
                ->editColumn('status', function ($row) {
                    return match ($row->status) {
                        'pending' => '<span class="badge bg-warning">Pending</span>',
                        'enquired' => '<span class="badge bg-primary">Enquired</span>',
                        'processing' => '<span class="badge bg-info">Processing</span>',
                        'cancelled' => '<span class="badge bg-danger">Cancelled</span>',
                        default => '<span class="badge bg-secondary">Unknown</span>',
                    };
                })
                ->editColumn('created_at', function ($row) {
                    return $row->created_at->format('Y-m-d H:i:s');
                })
                ->editColumn('message', function ($row) {
                    $original = $row->message ?? '';
                    $limit = 12;
                    $short = \Illuminate\Support\Str::limit($original, $limit);

                    // If message length is within limit → show full message
                    if (strlen($original) <= $limit) {
                        return '<span>' . e($original) . '</span>';
                    }

                    // If message is longer → show short + eye icon
                    return '
                        <span>' . e($short) . '</span>
                        <a href="javascript:void(0)"
                        class="text-primary viewMessage ms-1"
                        data-message="' . e($original) . '">
                            <i class="fa fa-eye"></i>
                        </a>
                    ';
                })

                ->addColumn('action', function ($row) {
                    return '
                        <div class="d-flex gap-1">
                            <a href="javascript:void(0);" data-title="Edit Enquiry"
                                data-route="' . route('enquiry.edit', $row->id) . '" class="btn btn-sm btn-primary common_model" title="Edit">
                                <i class="fa fa-edit"></i>
                            </a>
                            <button
                                class="btn btn-sm btn-danger delete"
                                data-id="' . $row->id . '"
                                data-table-id="enquiry"
                                data-route="' . route('enquiry.destory', $row->id) . '"
                                title="Delete">
                                <i class="fa fa-trash"></i>
                            </button>
                        </div>
                    ';
                })
                ->rawColumns(['status', 'action', 'created_at', 'message'])
                ->make(true);
        }
        return view('admin.enquiry.index');
    }

    public function create()
    {
        $html = view('admin.enquiry.create')->render();

        return response()->json([
            'html' => $html
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|digits_between:7,15',
            'message' => [
                'required',
                'min:5',
                'max:1000',
                'not_regex:/<[^>]*>/'
            ],
            'subject' => [
                'required',
                'min:5',
                'max:1000',
                'not_regex:/<[^>]*>/'
            ],
        ]);

        Enquiry::create([
            'name'    => $validated['name'],
            'email'   => $validated['email'],
            'phone'   => $validated['phone'],
            'message' => $validated['message'],
            'subject' => $validated['subject'],
            'type' => $request->type,
        ]);
        storeNotification(
            'New Enquiry Added',
            'You have added a new enquiry',
            'enquiry',
            1
        );
        return back()->with('success', 'Enquiry has been submitted successfully!');
    }

    public function edit($id)
    {
        $enquiry = Enquiry::find($id);
        if (!$enquiry) {
            return response()->json(['success' => false, 'error' => 'Enquiry Not Found !!!']);
        }
        $html = view('admin.enquiry.edit', compact('enquiry'))->render();

        return response()->json([
            'success' => true,
            'html' => $html
        ]);
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|digits_between:7,15',
            'message' => [
                'required',
                'min:5',
                'max:1000',
                'not_regex:/<[^>]*>/'
            ],
            'subject' => [
                'required',
                'min:5',
                'max:1000',
                'not_regex:/<[^>]*>/'
            ],
            'status' => 'required|in:pending,enquired,processing,cancelled',
        ]);

        $enquiry = Enquiry::findOrFail($id);

        $enquiry->update([
            'name'    => $validated['name'],
            'email'   => $validated['email'],
            'phone'   => $validated['phone'],
            'message' => $validated['message'],
            'subject' => $validated['subject'],
            'status'  => $validated['status'],
        ]);

        return back()->with('success', 'Enquiry updated successfully!');
    }

    public function destroy($id)
    {
        Enquiry::findOrFail($id)->delete();
        return response()->json(['success' => true]);
    }
}
