<form id="EnquiryForm" action="{{ route('enquiry.data.store') }}" method="POST">
    @csrf

    <div class="card shadow-sm border-0">
        <div class="card-body">
            <div class="row g-3">

                <!-- Name -->
                <div class="col-md-6">
                    <label class="form-label">Name</label>
                    <input type="text" name="name" class="form-control">
                </div>

                <!-- Email -->
                <div class="col-md-6">
                    <label class="form-label">Email</label>
                    <input type="email" name="email" class="form-control">
                </div>

                <!-- Mobile -->
                <div class="col-md-6">
                    <label class="form-label">Mobile</label>
                    <input type="number" name="phone" class="form-control">
                </div>

                <!-- Status -->
                <div class="col-md-6">
                    <label class="form-label">Status</label>
                    <select name="status" class="form-select">
                        <option value="pending" selected>Pending</option>
                        <option value="enquired">Enquired</option>
                        <option value="processing">Processing</option>
                        <option value="cancelled">Cancelled</option>
                    </select>
                </div>
                <!-- Subject -->
                <div class="col-md-12">
                    <label class="form-label">Subject</label>

                    <select name="subject" class="form-control">
                        <option value="">Select Subject</option>

                        <option value="General Enquiry" {{ old('subject') == 'General Enquiry' ? 'selected' : '' }}>
                            General Enquiry
                        </option>

                        <option value="Technical Support" {{ old('subject') == 'Technical Support' ? 'selected' : '' }}>
                            Technical Support
                        </option>

                        <option value="Project Quotation" {{ old('subject') == 'Project Quotation' ? 'selected' : '' }}>
                            Project Quotation
                        </option>

                        <option value="Career Inquiry" {{ old('subject') == 'Career Inquiry' ? 'selected' : '' }}>
                            Career Inquiry
                        </option>
                    </select>
                </div>

                <!-- Message (Full Width) -->
                <div class="col-12">
                    <label class="form-label">Message</label>
                    <textarea name="message" class="form-control" rows="3"></textarea>
                </div>

            </div>
        </div>
        <input type="hidden" name="type" value="admin">
        <div class="card-footer d-flex justify-content-between">
            <button type="button" data-bs-dismiss="modal" class="btn btn-secondary closeModal">
                Close
            </button>

            <button type="submit" class="btn btn-primary">
                Create
            </button>
        </div>
    </div>
</form>

<script>
    $(document).ready(function() {

        $('#EnquiryForm').validate({
            rules: {
                name: {
                    required: true,
                    minlength: 3
                },
                email: {
                    required: true,
                    email: true
                },
                phone: {
                    required: true,
                    digits: true,
                    minlength: 10,
                    maxlength: 10
                },
                message: {
                    required: true,
                    minlength: 5
                },
                subject: {
                    required: true,
                    minlength: 5
                }

            },

            messages: {
                status: {
                    required: "Please select enquiry status"
                }
            },

            errorElement: 'span',
            errorClass: 'text-danger small',

            highlight: function(element) {
                $(element).addClass('is-invalid');
            },

            unhighlight: function(element) {
                $(element).removeClass('is-invalid');
            }
        });

    });
</script>
