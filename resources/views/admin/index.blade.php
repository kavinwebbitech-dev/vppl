@extends('admin.layouts.app')
@section('title', 'Dashboard | ' . config('app.name'))
@section('content')
<!-- Main Content -->
<div class="main">

    <!-- Stats -->
    <div class="row g-4 mb-4">
        <div class="col-md-3">
            <a href="{{ route('enquiry.index') }}" class="text-decoration-none text-dark">
                <div class="card-custom">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6>Total Enquiries</h6>
                            <h3>{{ $totalEnquiries }}</h3>
                        </div>
                        <div class="icon-box">
                            <i class="fa-solid fa-palette"></i>
                        </div>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-md-3">
            <a href="{{ route('service.index')}}" class="text-decoration-none text-dark">
                <div class="card-custom">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6>Total Services</h6>
                            <h3>{{ $totalServices }}</h3>
                        </div>
                        <div class="icon-box">
                            <i class="fa-solid fa-folder-open"></i>
                        </div>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-md-3">
            <a href="{{ route('jobs.index')}}" class="text-decoration-none text-dark">
                <div class="card-custom">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6>Total Jobs</h6>
                            <h3>{{ $totaljobs }}</h3>
                        </div>
                        <div class="icon-box">
                            <i class="fa-solid fa-user-group"></i>
                        </div>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-md-3">
            <a href="{{ route('pages.index')}}" class="text-decoration-none text-dark">
                <div class="card-custom">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6>Total Pages</h6>
                            <h3>{{ $totalPages }}</h3>
                        </div>
                        <div class="icon-box">
                            <i class="fa-solid fa-dollar-sign"></i>
                        </div>
                    </div>
                </div>
            </a>
        </div>
    </div>

    <!-- Chart -->
    <div class="row g-3">
        <!-- Chart Section -->
        <div class="col-md-8">
            <div class="card-custom h-100">
                <h5 class="mb-3">Enquiries Overview</h5>
                <canvas id="enquiryChart"></canvas>
            </div>
        </div>

        <!-- Right Summary Section -->
        <div class="col-md-4">
            <div class="row g-3">
                <!-- Summary Card 1 -->
                <div class="col-12">
                    <div class="card-custom">
                        <h5>Today / Month</h5>
                        <ul class="list-unstyled mt-3">
                            <li class="mb-2">📅 Today: <strong>{{ $todayCount }}</strong></li>
                            <li class="mb-2">📆 This Month: <strong>{{ $monthCount }}</strong></li>
                        </ul>
                    </div>
                </div>

                <!-- Summary Card 2 -->
                <div class="col-12">
                    <div class="card-custom">
                        <h5>Total Website Visits</h5>
                        <ul class="list-unstyled mt-3">
                            <li class="mb-2">📊 Total: <strong>{{ $setting['website_visits'] ?? '' }}</strong></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    const ctx = document.getElementById('enquiryChart').getContext('2d');

    new Chart(ctx, {
        type: 'line', // change to 'bar' if needed
        data: {
            labels: @json($labels),
            datasets: [{
                label: 'Total Enquiries',
                data: @json($data),
                borderWidth: 2,
                fill: true,
                tension: 0.4
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: { display: true }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: { stepSize: 1 }
                }
            }
        }
    });
</script>
@endsection
