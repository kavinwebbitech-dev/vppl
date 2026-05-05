<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>@yield('title', config('app.name'))</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('asset/images/fav-icon.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('asset/images/fav-icon.png') }}">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">

    <!-- Bootstrap 5.3 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">

    <!-- Chart JS -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <!-- Toastr CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet">

    <!-- jQuery (required for Toastr) -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <!-- Toastr JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="{{ asset('backend/js/custom_script.js') }}"></script>

    <link rel="stylesheet"href="https://cdn.datatables.net/1.13.8/css/jquery.dataTables.min.css">

    <script>
        toastr.options = {
            closeButton: true,
            progressBar: true,
            positionClass: "toast-top-right",
            timeOut: "3000",
            extendedTimeOut: "1000",
            showDuration: "300",
            hideDuration: "300",
            showMethod: "slideDown",
            hideMethod: "fadeOut"
        };
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #f8fafc, #eef2ff);
            color: #0f172a;
            overflow-x: hidden;
        }

        .vpp-ft-logo {
            width: 100px;
            height: auto;
            filter: brightness(0) invert(1);
            transition: transform 0.3s ease;
        }

        /* Sidebar */
        .sidebar {
            width: 260px;
            height: 100vh;
            background: linear-gradient(180deg, #17a2b8, #0284c7);
            position: fixed;
            left: 0;
            top: 0;
            padding: 25px 20px;
            box-shadow: 5px 0 25px rgba(0, 0, 0, 0.15);
        }

        .sidebar h2 {
            font-weight: 700;
            color: #fff;
            margin-bottom: 40px;
        }

        .sidebar a {
            display: flex;
            align-items: center;
            gap: 15px;
            color: #e0e7ff;
            text-decoration: none;
            padding: 12px 15px;
            border-radius: 12px;
            margin-bottom: 10px;
            transition: all 0.3s ease;
        }

        .sidebar a:hover,
        .sidebar a.active {
            background: rgba(255, 255, 255, 0.2);
            color: #fff;
            transform: translateX(5px);
        }

        /* Header */
        .header {
            margin-left: 260px;
            height: 75px;
            background: #ffffff;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 30px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.08);
        }

        .header .search input {
            background: #f1f5f9;
            border: none;
            padding: 10px 18px;
            border-radius: 30px;
            width: 260px;
            outline: none;
        }

        /* Main Content */
        .main {
            margin-left: 260px;
            padding: 35px;
        }

        .card-custom {
            background: #ffffff;
            border-radius: 22px;
            padding: 25px;
            box-shadow: 0 20px 40px rgba(79, 70, 229, 0.12);
            transition: transform 0.3s ease;
        }

        .card-custom:hover {
            transform: translateY(-6px);
        }

        .icon-box {
            width: 55px;
            height: 55px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 16px;
            font-size: 22px;
            background: linear-gradient(180deg, #17a2b8, #0284c7);
            color: #fff;
            box-shadow: 0 10px 25px rgba(99, 102, 241, 0.4);
        }

        h6 {
            color: #64748b;
            font-weight: 500;
        }

        h3 {
            font-weight: 700;
        }

        /* Footer */
        .footer {
            margin-left: 260px;
            padding: 18px;
            background: #ffffff;
            text-align: center;
            font-size: 14px;
            color: #64748b;
            box-shadow: 0 -10px 20px rgba(0, 0, 0, 0.05);
        }

        /* SIDEBAR */
        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            width: 265px;
            height: 100vh;
            overflow-y: auto;
            overflow-x: hidden;
        }

        .main-content {
            margin-left: 260px;
            padding: 20px;
        }

        a {
            text-decoration: none !important;
        }
    </style>
</head>

<body>
    @if (session('success'))
        <script>
            toastr.success("{{ session('success') }}");
        </script>
    @endif

    @if (session('error'))
        <script>
            toastr.error("{{ session('error') }}");
        </script>
    @endif

    @if (session('info'))
        <script>
            toastr.info("{{ session('info') }}");
        </script>
    @endif
    @php
        if (auth()->user()->role == 'admin') {
            $notifications = \App\Models\Notification::where('is_read', 0)->get();
        } else {
            $notifications = \App\Models\Notification::where('user_id', auth()->user()->id)
                ->where('is_read', 0)
                ->get();
        }
    @endphp
    @include('admin.layouts.sidebar')

    @include('admin.layouts.header')
    @yield('content')
    <!-- Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.8/js/jquery.dataTables.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.21.0/jquery.validate.min.js"
        integrity="sha512-KFHXdr2oObHKI9w4Hv1XPKc898mE4kgYx58oqsc/JqqdLMDI4YjOLzom+EMlW8HFUd0QfjfAvxSL6sEq/a42fQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>

    @yield('scripts')
    <script>
        $(document).ready(function() {
            $('#menuSearch').on('keyup', function() {
                let value = $(this).val().toLowerCase();

                $('.sidebar a').filter(function() {
                    $(this).toggle(
                        $(this).text().toLowerCase().indexOf(value) > -1
                    );
                });
            });
        });
        $(document).on('keydown', function(e) {
            if (e.key === "Escape") $('#menuSearch').val('').trigger('keyup');
        });
    </script>

    <!-- Footer -->
    <div class="footer">
        {{ $setting['footer_text'] ?? '' }}
    </div>
    <!-- Delete Confirmation Dialog -->
    <dialog id="deleteDialog" class="p-0 border-0">
        <div class="card border-0 shadow-sm">
            <div class="card-header bg-danger text-white d-flex justify-content-between align-items-center">
                <span id="delete-title">Delete</span>
                <button type="button" class="btn-close btn-close-white" id="cancelDelete"></button>
            </div>
            <div class="card-body">
                <p class="mb-0">Are you sure you want to delete this data?</p>
            </div>
            <div class="card-footer d-flex justify-content-end gap-2 bg-light">
                <button id="cancelDeleteFooter" class="btn btn-sm btn-secondary">Cancel</button>
                <button id="confirmDelete" class="btn btn-sm btn-danger">Delete</button>
            </div>
        </div>
    </dialog>

    <dialog id="messageDialog" class="p-0 border-0 messageDialog">
        <div class="card shadow-sm modal-lg">
            <div class="card-body" id="fullMessage">
                <!-- Message loads here -->
            </div>
        </div>
    </dialog>

    <!-- Modal -->
    <div class="modal fade" id="form-model" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="model-title"></h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div id="model-body">

                </div>
            </div>
        </div>
    </div>
</body>

</html>
