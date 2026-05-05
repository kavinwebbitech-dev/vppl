@extends('admin.layouts.app')

@section('content')
    <style>
        .editor .ck-editor__editable {
            min-height: 200px;
        }
    </style>

    <div class="main">

        <!-- Breadcrumb -->
        <nav aria-label="breadcrumb" class="mb-4">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{ route('admin.index') }}">Dashboard</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="{{ route('careers.index') }}">Careers</a>
                </li>
                <li class="breadcrumb-item active">Edit Career</li>
            </ol>
        </nav>

        <div class="card-custom">
            <h4 class="mb-4">Edit Career</h4>

            <form method="POST" id="careerForm" action="{{ route('careers.update', $career->id) }}">
                @csrf
                @method('PUT')

                <div class="row mb-3">

                    <div class="col-md-6">
                        <label class="form-label">Position <span class="text-danger">*</span></label>
                        <input type="text" name="position" class="form-control @error('position') is-invalid @enderror"
                            value="{{ old('position', $career->position) }}">
                        @error('position')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Industry</label>
                        <input type="text" name="industry" class="form-control"
                            value="{{ old('industry', $career->industry) }}">
                    </div>

                </div>

                <div class="row mb-3">

                    <div class="col-md-4">
                        <label class="form-label">Experience</label>
                        <input type="text" name="experience" class="form-control"
                            value="{{ old('experience', $career->experience) }}">
                    </div>

                    <div class="col-md-4">
                        <label class="form-label">Salary</label>
                        <input type="text" name="salary" class="form-control"
                            value="{{ old('salary', $career->salary) }}">
                    </div>

                    <div class="col-md-4">
                        <label class="form-label">Location</label>
                        <input type="text" name="location" class="form-control"
                            value="{{ old('location', $career->location) }}">
                    </div>

                </div>

                <div class="row mb-3">

                    <div class="col-md-4">
                        <label>Welding Types</label>
                        <input type="text" name="welding_types" class="form-control"
                            value="{{ old('welding_types', $career->welding_types) }}">
                    </div>

                    <div class="col-md-4">
                        <label>Working Time</label>
                        <input type="text" name="working_time" class="form-control"
                            value="{{ old('working_time', $career->working_time) }}">
                    </div>

                    <div class="col-md-4">
                        <label>Benefits</label>
                        <input type="text" name="benefits" class="form-control"
                            value="{{ old('benefits', $career->benefits) }}">
                    </div>

                </div>

                <div class="row mb-3">

                    <div class="col-md-6">
                        <label>Skills</label>
                        <input type="text" name="skills" class="form-control"
                            value="{{ old('skills', $career->skills) }}">
                    </div>

                    <div class="col-md-6">
                        <label>Education</label>
                        <input type="text" name="education" class="form-control"
                            value="{{ old('education', $career->education) }}">
                    </div>

                </div>

                <div class="row mb-3">

                    <div class="col-md-6 editor">
                        <label class="form-label">Description</label>
                        <textarea id="description" name="description" rows="5" class="form-control">
                        {{ old('description', $career->description) }}
                        </textarea>
                    </div>

                    <div class="col-md-6 editor">
                        <label class="form-label">Roles & Responsibilities</label>
                        <textarea id="roles_responsibilities" name="roles_responsibilities" rows="5" class="form-control">
                        {{ old('roles_responsibilities', $career->roles_responsibilities) }}
                        </textarea>
                    </div>

                </div>

                <div class="mb-3">
                    <label class="form-label">Status</label>
                    <select name="status" class="form-select">
                        <option value="1" {{ $career->status == 1 ? 'selected' : '' }}>Active</option>
                        <option value="0" {{ $career->status == 0 ? 'selected' : '' }}>Inactive</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-primary">Update Career</button>

            </form>
        </div>

    </div>
@endsection


@section('scripts')

    <script>
        $(document).ready(function() {

            $.validator.addMethod("ckrequired", function(value, element) {
                let data = '';

                if (element.id === "description") {
                    data = descEditor.getData();
                }

                data = data.replace(/<[^>]*>/gi, '').trim();

                return data.length > 0;
            }, "Required field");

            $('#careerForm').validate({

                ignore: [],

                rules: {
                    position: {
                        required: true
                    },
                    description: {
                        ckrequired: true
                    }
                },

                errorClass: 'text-danger',

                submitHandler: function(form) {

                    $('#description').val(descEditor.getData());
                    $('#roles_responsibilities').val(roleEditor.getData());

                    form.submit();
                }
            });

        });
    </script>
@endsection
