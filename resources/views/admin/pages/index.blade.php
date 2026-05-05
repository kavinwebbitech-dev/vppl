@extends('admin.layouts.app')
@section('title', 'Landing Page | ' . config('app.name'))
@section('content')
<style>
    #pages-table {
        font-size: 13.5px;
    }

    #pages-table th {
        padding: 10px 12px;
    }

    #pages-table td {
        padding: 8px 12px;
    }

    dialog {
        border: none;
        padding: 0;
        width: 350px;
        border-radius: .5rem;
        opacity: 0;
        transform: scale(0.8);
        transition: all .25s ease;
    }

    dialog[open] {
        opacity: 1;
        transform: scale(1);
    }

    dialog::backdrop {
        background: rgba(0,0,0,.35);
        animation: fadeIn .25s ease;
    }

    @keyframes fadeIn {
        from { opacity: 0; }
        to { opacity: 1; }
    }
</style>

<div class="main">
    <!-- Breadcrumb -->
    <nav aria-label="breadcrumb" class="mb-4 d-flex justify-content-between align-items-center">
        <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item">
                <a href="{{ route('admin.index') }}">Dashboard</a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">Pages</li>
        </ol>

        <a href="{{ asset('backend/sample.xlsx') }}"
            class="btn btn-sm btn-success" download>
            <i class="fa-solid fa-file-excel me-1"></i>
            Sample Excel
        </a>
    </nav>

    <!-- Card for Table -->
    <div class="card-custom">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h4>Landing Pages</h4>
            <div>
                <button id="deleteAllPages" class="btn btn-danger ms-2 delete" data-table-id="pages-table"
                                data-route="{{ route('pages.deleteAll')}}">
                    Delete All
                </button>
                <a href="{{ route('pages.create') }}" class="btn btn-success">Add New Page</a>
            </div>
        </div>


        <div class="table-responsive" style="overflow-x: auto;">
            <table class="table table-bordered table-striped no-wrap" id="pages-table" style="min-width: 1000px;">
                <thead class="text-nowrap">
                    <tr>
                        <th>Page ID</th>
                        <th>Name</th>
                        <th>Location</th>
                        <th>Url</th>
                        <th>Category</th>
                        <th>Status</th>
                        <th>Created At</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody></tbody>
            </table>
        </div>
    </div>
</div>

@endsection

@section('scripts')
<script>
$(function() {
    // Initialize DataTable
    var table = $('#pages-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: '{{ route('pages.index') }}',
        order: [[0, 'asc']],
        columns: [
            { data: 'page_code', name: 'page_code', orderable: true, searchable: true },
            { data: 'name', name: 'name' },
            { data: 'location', name: 'location' },
            { data: 'url_slug', name: 'url_slug' },
            { data: 'category', name: 'category' },
            { data: 'status', name: 'status', orderable: false, searchable: false },
            { data: 'created_at', name: 'created_at' },
            { data: 'action', name: 'action', orderable: false, searchable: false },
        ]
    });
});
</script>
@endsection
