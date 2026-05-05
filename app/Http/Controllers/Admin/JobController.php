<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Job;
use Yajra\DataTables\Facades\DataTables;

class JobController extends Controller
{

    public function index(Request $request)
    {

        if ($request->ajax()) {

            $data = Job::latest()->get();

            return DataTables::of($data)

                ->addIndexColumn()

                ->addColumn('resume', function ($row) {
                    if ($row->resume) {
                        return '<a href="' . url('public/resume/' . $row->resume) . '" target="_blank" class="btn btn-sm" style="background-color:#17a2b8;color:#fff;">
                                    Download
                                </a>';
                    }
                    return '-';
                })

                ->addColumn('action', function ($row) {
                    return '
                        <button class="btn btn-sm btn-danger deleteJob" data-id="' . $row->id . '">
                            Delete
                        </button>
                    ';
                })

                ->editColumn('created_at', function ($row) {
                    return $row->created_at->format('d-m-Y');
                })

                ->rawColumns(['resume', 'action'])

                ->make(true);
        }

        return view('admin.jobs.index');
    }

    public function destroy($id)
    {
        $job = Job::findOrFail($id);

        if ($job->resume && file_exists(public_path('resume/' . $job->resume))) {
            unlink(public_path('resume/' . $job->resume));
        }

        $job->delete();

        return response()->json(['success' => true]);
    }
}
