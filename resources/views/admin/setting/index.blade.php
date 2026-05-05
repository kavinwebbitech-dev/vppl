@extends('admin.layouts.app')
@section('title', 'Settings | ' . config('app.name'))
@section('content')
<div class="main">

    <div class="card-custom">
        <h4 class="mb-4">Settings</h4>

        <!-- Tabs -->
        <ul class="nav nav-tabs mb-4" id="settingsTab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active"
                        id="profile-tab"
                        data-bs-toggle="tab"
                        data-bs-target="#profile"
                        type="button">
                    User Profile
                </button>
            </li>

            {{-- <li class="nav-item" role="presentation">
                <button class="nav-link"
                        id="common-tab"
                        data-bs-toggle="tab"
                        data-bs-target="#common"
                        type="button">
                     Settings
                </button>
            </li> --}}
        </ul>

        <!-- Tab Content -->
        <div class="tab-content">

            <!-- ================= PROFILE SETTINGS ================= -->
            <div class="tab-pane fade show active" id="profile">

                <form method="POST" action="{{ route('setting.profile.update') }}" enctype="multipart/form-data">
                    @csrf

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label class="form-label">Name</label>
                            <input type="text"
                                   name="name"
                                   class="form-control"
                                   value="{{ auth()->user()->name }}">
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Email</label>
                            <input type="email"
                                   name="email"
                                   class="form-control"
                                   value="{{ auth()->user()->email }}" readonly>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label class="form-label">Profile Image</label>
                            
                            <input type="file" name="profile_image" class="form-control">
                            @if(auth()->user()->profile_image)
                                <!-- Clickable Image -->
                                <div class="mt-2">
                                    <img src="{{ asset(auth()->user()->profile_image) }}"
                                        alt="Profile Image"
                                        width="80"
                                        height="80"
                                        class="rounded-circle border"
                                        style="cursor:pointer"
                                        data-bs-toggle="modal"
                                        data-bs-target="#profileImageModal">
                                </div>
                            @endif
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">New Password</label>
                            <input type="password" name="password" class="form-control">
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary">
                        Update Profile
                    </button>
                </form>

            </div>

            <!-- ================= COMMON SETTINGS ================= -->
            <div class="tab-pane fade" id="common">

                <form method="POST" action="{{ route('setting.settings.update') }}" enctype="multipart/form-data">
                    @csrf

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label class="form-label">Site Name</label>
                            <input type="text"
                                   name="site_name"
                                   class="form-control"
                                   value="{{ $setting['site_name'] ?? '' }}">
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Admin Email</label>
                            <input type="email"
                                   name="admin_email"
                                   class="form-control"
                                   value="{{ $setting['admin_email'] ?? '' }}">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label class="form-label">Logo</label>
                            <input type="file" name="logo" class="form-control">
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Favicon</label>
                            <input type="file" name="favicon" class="form-control">
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Footer Text</label>
                        <textarea name="footer_text" class="form-control" rows="3">{{ $setting['footer_text'] ?? '' }}</textarea>
                    </div>

                    <button type="submit" class="btn btn-success">
                        Save Settings
                    </button>

                </form>

            </div>

        </div>
    </div>

</div>
@endsection
