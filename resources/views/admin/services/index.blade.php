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
        <nav aria-label="breadcrumb" class="mb-4">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Services List</li>
            </ol>
        </nav>

        <!-- Card for Table -->
        <div class="card-custom">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h4>Services List</h4>
                <div>
                    {{-- <button id="deleteAllPages" class="btn btn-danger ms-2">
                        Delete All
                    </button> --}}
                    <a href="{{ route('service.create') }}" class="btn btn-success">Add Service</a>
                </div>
            </div>

            <div class="table-responsive" style="overflow-x: auto;">
                <table class="table table-bordered table-striped no-wrap" id="service-table" style="min-width: 1000px;">
                    <thead class="text-nowrap">
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            {{-- <th>Image</th>
                            <th>Title</th> --}}
                            <th>Slug</th>
                            <th>Status</th>
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
            var table = $('#service-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{ route('service.index') }}',
                columns: [
                    {
                        data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false,
                        searchable: false, className: 'text-center'
                    },
                    { data: 'name', name: 'name' },
                    // { data: 'image', name: 'image' },
                    // { data: 'title', name: 'title' },
                    { data: 'url_slug', name: 'url_slug' },
                    { data: 'status', name: 'status', orderable: false, searchable: false },
                    { data: 'action', name: 'action', orderable: false, searchable: false },
                ]
            });
        });
    </script>
@endsection
