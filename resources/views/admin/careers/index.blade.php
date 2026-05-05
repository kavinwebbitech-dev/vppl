@extends('admin.layouts.app')
@section('title', 'Careers | ' . config('app.name'))
@section('content')
    <style>
        #career-table {
            font-size: 13.5px;
        }

        #career-table th {
            padding: 10px 12px;
        }

        #career-table td {
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
            background: rgba(0, 0, 0, .35);
            animation: fadeIn .25s ease;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
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
                    Careers List
                </li>
            </ol>
        </nav>

        <!-- Card Layout -->
        <div class="card-custom">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h4>Careers</h4>
                <div>
                    <a href="{{ route('careers.create') }}" class="btn btn-success">
                        Add Job
                    </a>
                </div>
            </div>

            <div class="table-responsive" style="overflow-x: auto;">
                <table class="table table-bordered table-striped no-wrap" id="career-table" style="min-width: 900px;">
                    <thead class="text-nowrap">
                        <tr>
                            <th>ID</th>
                            <th>Position</th>
                            {{-- <th>Experience</th> --}}
                            {{-- <th>Salary</th> --}}
                            <th>Status</th>
                            <th width="10%">Action</th>
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
        $('#career-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('careers.index') }}",

            columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex',
                    orderable: false,
                    searchable: false
                },
                {
                    data: 'position',
                    name: 'position'
                },
                // {
                //     data: 'experience',
                //     name: 'experience'
                // },
                // {
                //     data: 'salary',
                //     name: 'salary'
                // },
                {
                    data: 'status', // ✅ ADD THIS
                    name: 'status'
                },
                {
                    data: 'action',
                    name: 'action',
                    orderable: false,
                    searchable: false
                }
            ]
        });

        $(document).on('click', '.deleteCareer', function() {
            let id = $(this).data('id');

            if (confirm('Delete?')) {
                $.post("{{ url('admin/careers/delete') }}/" + id, {
                    _token: '{{ csrf_token() }}'
                }, function() {
                    $('#career-table').DataTable().ajax.reload();
                });
            }
        });
    </script>

@endsection
