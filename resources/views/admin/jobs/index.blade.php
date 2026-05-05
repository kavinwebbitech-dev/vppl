@extends('admin.layouts.app')
@section('title', 'Job Applications | ' . config('app.name'))

@section('content')

    <style>
        #jobs-table {
            font-size: 13.5px;
        }

        #jobs-table th {
            padding: 10px 12px;
        }

        #jobs-table td {
            padding: 8px 12px;
        }
    </style>

    <div class="main">

        <!-- Breadcrumb -->
        <nav aria-label="breadcrumb" class="mb-4">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{ route('admin.index') }}">Dashboard</a>
                </li>

                <li class="breadcrumb-item active" aria-current="page">
                    Job Applications
                </li>
            </ol>
        </nav>

        <!-- Card -->
        <div class="card-custom">

            <div class="d-flex justify-content-between align-items-center mb-3">
                <h4>Job Applications</h4>
            </div>

            <div class="table-responsive" style="overflow-x:auto;">
                <table class="table table-bordered table-striped no-wrap" id="jobs-table" style="min-width:1000px;">

                    <thead class="text-nowrap">
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Subject</th>
                            <th>Message</th>
                            <th>Resume</th>
                            <th>Date</th>
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

            $('#jobs-table').DataTable({

                processing: true,
                serverSide: true,

                ajax: "{{ route('jobs.index') }}",

                columns: [

                    {
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex',
                        orderable: false,
                        searchable: false,
                        className: 'text-center'
                    },

                    {
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'email',
                        name: 'email'
                    },
                    {
                        data: 'phone',
                        name: 'phone'
                    },
                    {
                        data: 'subject',
                        name: 'subject'
                    },
                    {
                        data: 'message',
                        name: 'message'
                    },
                    {
                        data: 'resume',
                        name: 'resume'
                    },
                    {
                        data: 'created_at',
                        name: 'created_at'
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false
                    }

                ]

            });

        });
        $(document).on('click', '.deleteJob', function() {

            let id = $(this).data('id');

            if (confirm('Are you sure you want to delete this job?')) {

                $.ajax({
                    url: "{{ route('jobs.destroy', ':id') }}".replace(':id', id),
                    type: "POST", // ✅ matches your route
                    data: {
                        _token: "{{ csrf_token() }}"
                    },
                    success: function(response) {
                        $('#jobs-table').DataTable().ajax.reload();
                        alert('Deleted successfully');
                    }
                });

            }

        });
    </script>

@endsection
