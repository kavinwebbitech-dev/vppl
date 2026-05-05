<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Models\Page;
use Illuminate\Container\Attributes\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Yajra\DataTables\Facades\DataTables;

class ServiceController extends Controller
{
    // public function index(Request $request)
    // {
    //     if ($request->ajax()) {
    //         $pages = Page::where('status', 1)->pluck('category');
    //         $services = Service::pluck('name');

    //         $categories = $pages->merge($services)->unique()->values();
    //         // dd($categories);


    //         return DataTables::of($categories)
    //             ->addIndexColumn()
    //             ->filter(function ($categories) {
    //                 if (request()->has('search') && $search = request('search')['value']) {
    //                     $query->where(function ($q) use ($search) {
    //                         $q->Where('title', 'like', "%{$search}%")
    //                             ->orWhere('name', 'like', "%{$search}%")
    //                             ->orWhere('paragraph', 'like', "%{$search}%")
    //                             ->orWhere('body_content', 'like', "%{$search}%")
    //                             ->orWhere('meta_title', 'like', "%{$search}%")
    //                             ->orWhere('meta_description', 'like', "%{$search}%")
    //                             ->orWhere('created_at', 'like', "%{$search}%");
    //                     });
    //                 }
    //             })
    //             ->editColumn('status', function ($row) {
    //                 return $row->status
    //                     ? '<span class="badge bg-success">Active</span>'
    //                     : '<span class="badge bg-danger">Inactive</span>';
    //             })
    //             ->editColumn('created_at', function ($row) {
    //                 return $row->created_at->format('Y-m-d H:i:s');
    //             })
    //             ->editColumn('image', function ($row) {
    //                 if (!$row->image) {
    //                     return '-';
    //                 }

    //                 $url = asset($row->image);

    //                 return '<img src="' . $url . '" 
    //                     style="width:50px;height:50px;object-fit:cover;border-radius:50%;border:1px solid #ddd;">';
    //             })

    //             ->editColumn('paragraph', function ($row) {
    //                 $original = $row->paragraph ?? '';
    //                 $limit = 30;
    //                 $short = Str::limit($original, $limit);
    //                 if (strlen($original) <= $limit) {
    //                     return '<span>' . e($original) . '</span>';
    //                 }
    //                 return '
    //                     <span>' . e($short) . '</span>
    //                     <a href="javascript:void(0)"
    //                     class="text-primary viewMessage ms-1"
    //                     data-message="' . e($original) . '">
    //                         <i class="fa fa-eye"></i>
    //                     </a>';
    //             })
    //             ->addColumn('action', function ($row) {
    //                 return '
    //                     <div class="d-flex gap-1">
    //                         <a href="' . route('service.edit', $row->id) . '" class="btn btn-sm btn-primary" title="Edit">
    //                             <i class="fa fa-edit"></i>
    //                         </a>
    //                         <button data-id="' . $row->id . '"
    //                             data-table-id="service-table"
    //                             data-route="' . route('service.destory', $row->id) . '" 
    //                             class="btn btn-sm btn-danger delete" title="Delete">
    //                             <i class="fa fa-trash"></i>
    //                         </button>
    //                     </div>
    //                 ';
    //             })
    //             ->rawColumns(['status', 'action', 'created_at', 'paragraph', 'image'])
    //             ->make(true);
    //     }
    //     return view('admin.services.index');
    // }



    // public function index(Request $request)
    // {
    //     if ($request->ajax()) {

    //         $pages = Page::where('status', 1)->pluck('category');
    //         $services = Service::pluck('name');

    //         $categories = $pages->merge($services)
    //             ->unique()
    //             ->values()
    //             ->map(function ($item, $key) {
    //                 return [
    //                     'id'         => $key + 1, // temporary id
    //                     'name'       => $item,
    //                     'url_slug'   => Str::slug($item),
    //                     'status'     => 1,
    //                     'created_at' => now(),
    //                 ];
    //             });

    //         return DataTables::of($categories)

    //             ->addIndexColumn()

    //             ->editColumn('status', function ($row) {
    //                 return $row['status']
    //                     ? '<span class="badge bg-success">Active</span>'
    //                     : '<span class="badge bg-danger">Inactive</span>';
    //             })

    //             ->editColumn('created_at', function ($row) {
    //                 return \Carbon\Carbon::parse($row['created_at'])
    //                     ->format('Y-m-d H:i:s');
    //             })

    //             ->addColumn('action', function ($row) {

    //                 return '
    //                 <div class="d-flex gap-1">
    //                     <a href="' . route('service.edit', $row['id']) . '" 
    //                        class="btn btn-sm btn-primary" title="Edit">
    //                         <i class="fa fa-edit"></i>
    //                     </a>
    //                     <button data-id="' . $row['id'] . '"
    //                         data-table-id="service-table"
    //                         data-route="' . route('service.destory', $row['id']) . '" 
    //                         class="btn btn-sm btn-danger delete" title="Delete">
    //                         <i class="fa fa-trash"></i>
    //                     </button>
    //                 </div>
    //             ';
    //             })

    //             ->rawColumns(['status', 'action'])
    //             ->make(true);
    //     }

    //     return view('admin.services.index');
    // }

    public function index(Request $request)
    {
        // Sync pages categories into services
        $categories = Page::where('status', 1)
            ->distinct()
            ->pluck('category');

        foreach ($categories as $category) {
            Service::firstOrCreate(
                ['name' => $category],
                [
                    'url_slug' => Str::slug($category),
                    'status'   => 1,
                ]
            );
        }

        if ($request->ajax()) {

            $services = Service::latest();

            return DataTables::of($services)

                ->addIndexColumn()

                ->editColumn('status', function ($row) {
                    return $row->status
                        ? '<span class="badge bg-success">Active</span>'
                        : '<span class="badge bg-danger">Inactive</span>';
                })

                ->editColumn('created_at', function ($row) {
                    return $row->created_at->format('Y-m-d H:i:s');
                })

                ->addColumn('action', function ($row) {
                    return '
                    <div class="d-flex gap-1">
                        <a href="' . route('service.edit', $row->id) . '" 
                           class="btn btn-sm btn-primary" title="Edit">
                            <i class="fa fa-edit"></i>
                        </a>
                        <button data-id="' . $row->id . '"
                            data-table-id="service-table"
                            data-route="' . route('service.destory', $row->id) . '" 
                            class="btn btn-sm btn-danger delete" title="Delete">
                            <i class="fa fa-trash"></i>
                        </button>
                    </div>
                ';
                })

                ->rawColumns(['status', 'action'])
                ->make(true);
        }

        return view('admin.services.index');
    }

    public function create()
    {

        return view('admin.services.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'         => 'required|string|max:255',
            // 'heading'      => 'required|string|max:255',
            // 'page_title'   => 'required|string|max:255',
            // 'image'        => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'status'       => 'required|boolean',
        ]);

        $imagePath = null;

        if ($request->hasFile('image')) {
            $image = $request->file('image');

            $filename = time() . '_' . $image->getClientOriginalName();
            $destination = public_path('backend/uploads/services');

            // create folder if not exists
            if (!File::exists($destination)) {
                File::makeDirectory($destination, 0755, true);
            }

            $image->move($destination, $filename);
            $imagePath = 'backend/uploads/services/' . $filename;
        }

        Service::create([
            'name'         => $request->name,
            'url_slug'     => Str::slug($request->name),
            'title'        => $request->heading,
            'page_title'   => $request->page_title,
            'image'        => $imagePath,
            'status'       => $request->status,
        ]);
        storeNotification(
            'New Service Created ' . $request->name,
            'You have received a new Service Create update',
            'service',
            1
        );
        return redirect()
            ->route('service.index')
            ->with('success', 'Service created successfully');
    }

    public function edit($id)
    {
        $service = Service::findOrFail($id);
        return view('admin.services.edit', compact('service'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name'         => 'required|string|max:255',
            // 'heading'      => 'required|string|max:255',
            // 'page_title'   => 'required|string|max:255',
            'status'       => 'required|boolean',
        ]);
        $service = Service::find($id);
        $imagePath = null;
        if ($request->hasFile('image')) {

            if ($service->image) {
                $imagePath = public_path($service->image);
                if (File::exists($imagePath)) {
                    unlink($imagePath);
                }
            }

            $image = $request->file('image');
            $filename = time() . '_' . $image->getClientOriginalName();
            $destination = public_path('backend/uploads/services');

            if (!File::exists($destination)) {
                File::makeDirectory($destination, 0755, true);
            }

            $image->move($destination, $filename);
            $imagePath = 'backend/uploads/services/' . $filename;
        }

        $service->update([
            'name'         => $request->name,
            'url_slug'  => Str::slug($request->name),
            'title'        => $request->heading,
            'page_title'   => $request->page_title,
            'image'        => $imagePath,
            'status'       => $request->status
        ]);
        storeNotification(
            'Some Service Updated ' . $request->name,
            'You have received a new Service updated',
            'service',
            1
        );
        return redirect()
            ->route('service.index')
            ->with('success', 'Service updated successfully');
    }

    public function destroy($id)
    {
        $service = Service::findOrFail($id);

        if ($service->image) {
            $imagePath = public_path($service->image);

            if (File::exists($imagePath)) {
                unlink($imagePath);
            }
        }

        $service->delete();
        storeNotification(
            'Some Service Deleted ' . $service->name,
            'You have received a new Service Deleted',
            'service',
            1
        );
        return response()->json([
            'status' => true,
            'message' => 'Service deleted successfully',
        ]);
    }
}
