@extends('admin.layouts.app')

@section('content')
    <style>
        .banner-editor .ck-editor__editable {
            min-height: 400px;
        }

        .page-editor .ck-editor__editable {
            min-height: 400px;
        }
    </style>

    <div class="main">

        <!-- Breadcrumb -->
        <nav aria-label="breadcrumb" class="mb-4">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('service.index') }}">Services</a></li>
                <li class="breadcrumb-item active" aria-current="page">Create Service</li>
            </ol>
        </nav>

        <div class="card-custom">
            <h4 class="mb-4">Create New Service</h4>

            <form method="POST" id="serviceForm" action="{{ route('service.update', $service->id) }}"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label class="form-label">Service Name <span class="text-danger">*</span></label>
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                            value="{{ $service->name }}">
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Status <span class="text-danger">*</span></label>
                        <select name="status" class="form-select @error('status') is-invalid @enderror">
                            <option value="1" @selected($service->status == 1)>Active</option>
                            <option value="0" @selected($service->status == 0)>Inactive</option>
                        </select>
                        @error('status')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>


                <button type="submit" class="btn btn-success">Update Service</button>
            </form>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        let bannerEditor, pageEditor;

        ClassicEditor.create(document.querySelector('#body_content'), {
                toolbar: [
                    'heading', '|',
                    'bold', 'italic', 'underline', 'strikethrough',
                    'link',
                    'bulletedList', 'numberedList',
                    'blockQuote',
                    'undo', 'redo'
                ]
            })
            .then(editor => {
                bannerEditor = editor;
                editor.ui.view.editable.element.style.height = '150px';
                editor.ui.view.editable.element.style.overflowY = 'auto';
            });

        ClassicEditor.create(document.querySelector('#page_content'), {
                toolbar: [
                    'heading', '|',
                    'bold', 'italic', 'underline', 'strikethrough',
                    'link',
                    'bulletedList', 'numberedList',
                    'blockQuote',
                    'undo', 'redo'
                ]
            })
            .then(editor => {
                pageEditor = editor;
                editor.ui.view.editable.element.style.height = '400px';
                editor.ui.view.editable.element.style.overflowY = 'auto';
            });
    </script>

    <script>
        $(document).ready(function() {
            $('#serviceForm').validate({
                ignore: [],

                rules: {
                    name: {
                        required: true,
                        maxlength: 255
                    },
                    heading: {
                        required: true,
                        maxlength: 255
                    },
                    page_title: {
                        required: true,
                        maxlength: 255
                    },
                    // meta_title: { required: true, maxlength: 255 },
                    // meta_description: { required: true, maxlength: 255 },
                    // meta_keywords: { required: true, maxlength: 255 },
                    body_content: {
                        required: true
                    },
                    page_content: {
                        required: true
                    },
                    status: {
                        required: true
                    }
                },

                messages: {
                    body_content: {
                        required: "Please enter paragraph content"
                    },
                    page_content: {
                        required: "Please enter page content"
                    }
                },

                errorClass: 'text-danger',
                errorElement: 'div',

                errorPlacement: function(error, element) {
                    if (element.attr("id") === "body_content") {
                        error.insertAfter($('.banner-editor .ck-editor'));
                    } else if (element.attr("id") === "page_content") {
                        error.insertAfter($('.page-editor .ck-editor'));
                    } else {
                        error.insertAfter(element);
                    }
                },

                highlight: function(element) {
                    $(element).addClass('is-invalid');
                },

                unhighlight: function(element) {
                    $(element).removeClass('is-invalid');
                },

                submitHandler: function(form) {
                    // Sync CKEditor → textarea
                    $('#body_content').val(bannerEditor.getData());
                    $('#page_content').val(pageEditor.getData());

                    // Extra safety: block empty HTML
                    if (!bannerEditor.getData().trim()) {
                        alert('Paragraph Content is required');
                        return false;
                    }

                    if (!pageEditor.getData().trim()) {
                        alert('Page Content is required');
                        return false;
                    }

                    form.submit();
                }
            });
        });
    </script>
@endsection
