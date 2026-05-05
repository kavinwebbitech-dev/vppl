@extends('admin.layouts.app')
@section('title', 'Notification | ' . config('app.name'))
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
            <li class="breadcrumb-item active" aria-current="page">Notifications List</li>
        </ol>
    </nav>

    <!-- Card for Table -->
    <div class="card-custom">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h4>Notifications List</h4>
        </div>

        <div class="table-responsive" style="overflow-x: auto;">
            <table class="table table-bordered table-striped no-wrap" id="notification" style="min-width: 1000px;">
                <thead class="text-nowrap">
                    <tr>
                        <th>Title</th>
                        <th>Message</th>
                        <th>Type</th>
                        <th>Is Read</th>
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
    var table = $('#notification').DataTable({
        processing: true,
        serverSide: true,
        ajax: '{{ route('notification.index') }}',
        columns: [
            { data: 'title', name: 'title' },
            { data: 'message', name: 'message' },
            { data: 'type', name: 'type' },
            { data: 'is_read', name: 'is_read', orderable: false, searchable: false },
            { data: 'created_at', name: 'created_at' },
            { data: 'action', name: 'action', orderable: false, searchable: false },
        ]
    });
});
</script>
@endsection
