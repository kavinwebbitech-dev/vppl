@extends('admin.layouts.app')
@section('title', 'Sitemap | ' . config('app.name'))
@section('content')
    <div class="main">
        <div class="card-custom">
            <h4 class="mb-4">Sitemap & Robots Management</h4>

            <div class="row g-4">
                <!-- Sitemap Column -->
                <div class="col-lg-6 col-md-12">
                    <div class="border rounded p-4 h-100">
                        <h5 class="mb-3">
                            <i class="fa-solid fa-sitemap text-primary me-1"></i>
                            Sitemap
                        </h5>

                        <p class="text-muted">Download the current sitemap.xml file:</p>

                        <a href="{{ route('sitemap.sitemap.download') }}" class="btn btn-primary mb-4">
                            <i class="fa-solid fa-download"></i> Download Sitemap
                        </a>

                        <hr>

                        <!-- Bulk Upload Sitemap -->
                        <form action="{{ route('pages.bulk.upload') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <label class="form-label fw-semibold">
                                Bulk Upload Sitemap (XLSX only)
                            </label>

                            <input
                                type="file"
                                name="sitemap_file"
                                class="form-control mb-2"
                                accept=".xlsx"
                                required
                            >

                            <small class="text-muted d-block mb-3">
                                Upload an Excel (.xlsx) file containing URLs.
                            </small>

                            <button type="submit" class="btn btn-success" id="submitBtn">
                                <i class="fa-solid fa-cloud-arrow-up"></i> Upload Sitemap
                            </button>
                        </form>
                    </div>
                </div>

                <!-- Robots.txt Column -->
                <div class="col-lg-6 col-md-12">
                    <div class="border rounded p-4 h-100">
                        <h5 class="mb-3">
                            <i class="fa-solid fa-robot text-success me-1"></i>
                            Robots.txt
                        </h5>

                        <form action="{{ route('sitemap.robots.upload') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <label class="form-label fw-semibold">
                                Upload Robots.txt
                            </label>

                            <input
                                type="file"
                                name="robots_file"
                                accept=".txt"
                                class="form-control mb-3"
                                required
                            >

                            <button type="submit" class="btn btn-success mb-3">
                                <i class="fa-solid fa-upload"></i> Upload Robots.txt
                            </button>
                        </form>

                        @if(file_exists(public_path('robots.txt')))
                            <a href="{{ asset('robots.txt') }}" class="btn btn-primary" download>
                                <i class="fa-solid fa-download"></i> Download Robots.txt
                            </a>
                        @else
                            <span class="text-muted">No robots.txt file found.</span>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $('form').on('submit', function () {
            $('#submitBtn')
                .prop('disabled', true)
                .text('Uploading...');
        });
    </script>
@endsection
