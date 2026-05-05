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
                <li class="breadcrumb-item active">Create Career</li>
            </ol>
        </nav>

        <div class="card-custom">
            <h4 class="mb-4">Create Career</h4>

            <form method="POST" id="careerForm" action="{{ route('careers.store') }}">
                @csrf

                <div class="row mb-3">

                    <div class="col-md-6">
                        <label class="form-label">Position <span class="text-danger">*</span></label>
                        <input type="text" name="position" class="form-control @error('position') is-invalid @enderror"
                            value="{{ old('position') }}">
                        @error('position')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Industry</label>
                        <input type="text" name="industry" class="form-control" value="{{ old('industry') }}">
                    </div>

                </div>

                <div class="row mb-3">

                    <div class="col-md-4">
                        <label class="form-label">Experience</label>
                        <input type="text" name="experience" class="form-control" value="{{ old('experience') }}">
                    </div>

                    <div class="col-md-4">
                        <label class="form-label">Salary</label>
                        <input type="text" name="salary" class="form-control" value="{{ old('salary') }}">
                    </div>

                    <div class="col-md-4">
                        <label class="form-label">Location</label>
                        <input type="text" name="location" class="form-control" value="{{ old('location') }}">
                    </div>

                </div>

                <div class="row mb-3">

                    <div class="col-md-4">
                        <label>Welding Types</label>
                        <input type="text" name="welding_types" class="form-control" value="{{ old('welding_types') }}">
                    </div>

                    <div class="col-md-4">
                        <label>Working Time</label>
                        <input type="text" name="working_time" class="form-control" value="{{ old('working_time') }}">
                    </div>

                    <div class="col-md-4">
                        <label>Benefits</label>
                        <input type="text" name="benefits" class="form-control" value="{{ old('benefits') }}">
                    </div>

                </div>

                <div class="row mb-3">

                    <div class="col-md-6">
                        <label>Skills</label>
                        <input type="text" name="skills" class="form-control" value="{{ old('skills') }}">
                    </div>

                    <div class="col-md-6">
                        <label>Education</label>
                        <input type="text" name="education" class="form-control" value="{{ old('education') }}">
                    </div>

                </div>

                <div class="row mb-3">

                    <div class="col-md-6 editor">
                        <label class="form-label">Description</label>
                        <textarea id="description" name="description" class="form-control" rows="5">{{ old('description') }}</textarea>
                    </div>

                    <div class="col-md-6 editor">
                        <label class="form-label">Roles & Responsibilities</label>
                        <textarea id="roles_responsibilities" name="roles_responsibilities" class="form-control" rows="5">{{ old('roles_responsibilities') }}</textarea>
                    </div>

                </div>

                <div class="mb-3">
                    <label class="form-label">Status</label>
                    <select name="status" class="form-select">
                        <option value="1">Active</option>
                        <option value="0">Inactive</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-success">Create Career</button>

            </form>
        </div>

    </div>
@endsection



@section('scripts')
    {{-- <script>
        let descEditor, roleEditor;

        ClassicEditor.create(document.querySelector('#description'))
            .then(editor => {
                descEditor = editor;
            });

        ClassicEditor.create(document.querySelector('#roles_responsibilities'))
            .then(editor => {
                roleEditor = editor;
            });
    </script> --}}

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
