@extends('dashboard.layouts.app')
@section('title', 'Manage Employees')
@section('content')

<!-- row -->

<div class="row">
    <div class="col-xl-12">
    @if ($message = Session::get('success'))
            <div class="alert alert-success alert-dismissible fade show">
                <svg viewbox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="me-2"><circle cx="12" cy="12" r="10"></circle><path d="M8 14s1.5 2 4 2 4-2 4-2"></path><line x1="9" y1="9" x2="9.01" y2="9"></line><line x1="15" y1="9" x2="15.01" y2="9"></line></svg>
                <strong>{{ auth()->user()->name }}</strong> {{ $message }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="btn-close">
                </button>
            </div>
            @elseif ($message = Session::get('danger'))
            <div class="alert alert-danger alert-dismissible fade show">
                <svg viewbox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="me-2"><circle cx="12" cy="12" r="10"></circle><path d="M8 14s1.5 2 4 2 4-2 4-2"></path><line x1="9" y1="9" x2="9.01" y2="9"></line><line x1="15" y1="9" x2="15.01" y2="9"></line></svg>
                <strong>{{ auth()->user()->name }}</strong> {{ $message }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="btn-close">
                </button>
            </div>
        @else
            <div class="alert alert-primary alert-dismissible fade show">
                <svg viewbox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="me-2"><circle cx="12" cy="12" r="10"></circle><path d="M8 14s1.5 2 4 2 4-2 4-2"></path><line x1="9" y1="9" x2="9.01" y2="9"></line><line x1="15" y1="9" x2="15.01" y2="9"></line></svg>
                <strong>Hi {{ auth()->user()->name }}, </strong>kamu berhasil login!
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="btn-close">
                </button>
            </div>    
        @endif   
        <div class="row">
            <div class="col-xl-12">
                <!--  -->
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">@yield('title')</h4>
                    </div>
                    <div class="card-body">
                        <button id="add-employee" class="btn btn-primary mb-3 add-btn"  data-toggle="modal" data-target="#addEmployeeModal">Add Employee</button>
                        <table id="employeesTable" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Position</th>
                                    <th>Department</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
                <!--  -->
            </div>
        </div>  
    </div>
</div>

<!-- Add Employee Modal -->
<div class="modal fade" id="addEmployeeModal" tabindex="-1" aria-labelledby="addEmployeeModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addEmployeeModalLabel">Add Employee</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form id="addEmployeeForm">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="first_name">First Name</label>
                        <input type="text" class="form-control" id="first_name" name="first_name" required>
                    </div>
                    <div class="form-group">
                        <label for="last_name">Last Name</label>
                        <input type="text" class="form-control" id="last_name" name="last_name" required>
                    </div>
                    <div class="form-group">
                        <label for="position">Position</label>
                        <input type="text" class="form-control" id="position" name="position" required>
                    </div>
                    <div class="form-group">
                        <label for="department">Department</label>
                        <input type="text" class="form-control" id="department" name="department" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Edit Employee Modal -->
<div class="modal fade" id="editEmployeeModal" tabindex="-1" role="dialog" aria-labelledby="editEmployeeModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editEmployeeModalLabel">Edit Employee</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form id="editEmployeeForm">
                <div class="modal-body">
                    <input type="hidden" id="edit_employee_id">
                    <div class="form-group">
                        <label for="edit_first_name">First Name</label>
                        <input type="text" class="form-control" id="edit_first_name" name="first_name" required>
                    </div>
                    <div class="form-group">
                        <label for="edit_last_name">Last Name</label>
                        <input type="text" class="form-control" id="edit_last_name" name="last_name" required>
                    </div>
                    <div class="form-group">
                        <label for="edit_position">Position</label>
                        <input type="text" class="form-control" id="edit_position" name="position" required>
                    </div>
                    <div class="form-group">
                        <label for="edit_department">Department</label>
                        <input type="text" class="form-control" id="edit_department" name="department" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Delete Employee Modal -->
<div class="modal fade" id="deleteEmployeeModal" tabindex="-1" role="dialog" aria-labelledby="deleteEmployeeModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteEmployeeModalLabel">Delete Employee</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to delete this employee?</p>
                <input type="hidden" id="delete_employee_id">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-danger" id="confirmDelete">Delete</button>
            </div>
        </div>
    </div>
</div>

@endsection

@push('scripts')
<script>
$(document).ready(function() {
    var table = $('#employeesTable').DataTable({
        ajax: {
            url: '{{ route('employees.getEmployees') }}',
            dataSrc: ''
        },
        columns: [
            { data: 'employee_id' },
            { data: 'first_name' },
            { data: 'last_name' },
            { data: 'position' },
            { data: 'department' },
            {
                data: null,
                render: function(data, type, row) {
                    return `
                        <button class="btn btn-sm btn-primary edit-btn" data-id="${data.employee_id}" data-first_name="${data.first_name}" data-last_name="${data.last_name}" data-position="${data.position}" data-department="${data.department}">Edit</button>
                        <button class="btn btn-sm btn-danger delete-btn" data-id="${data.employee_id}">Delete</button>
                    `;
                }
            }
        ]
    });

    // Show Add Employee Modal
    $('#addEmployeeModal').on('show.bs.modal', function() {
        console.log("tabukak lah");
        $('#addEmployeeForm')[0].reset(); // Reset form when modal shows
    });

    // Add Employee
    $('#addEmployeeForm').submit(function(e) {
        e.preventDefault();
        $.ajax({
            url: '{{ route('employees.store') }}',
            method: 'POST',
            data: $(this).serialize(),
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response) {
                $('#addEmployeeModal').modal('hide');
                table.ajax.reload();
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.error('AJAX Error:', textStatus, errorThrown);
                
                // Extract detailed error information
                let errorMessage = 'An error occurred: ' + textStatus;
                
                if (jqXHR.responseJSON && jqXHR.responseJSON.message) {
                    errorMessage += '\nDetails: ' + jqXHR.responseJSON.message;
                } else if (jqXHR.responseText) {
                    errorMessage += '\nDetails: ' + jqXHR.responseText;
                }

                alert(errorMessage);
            }
        });
    });

    // Edit Employee
    $('#employeesTable').on('click', '.edit-btn', function() {
        $('#edit_employee_id').val($(this).data('id'));
        $('#edit_first_name').val($(this).data('first_name'));
        $('#edit_last_name').val($(this).data('last_name'));
        $('#edit_position').val($(this).data('position'));
        $('#edit_department').val($(this).data('department'));
        $('#editEmployeeModal').modal('show');
    });

    $('#editEmployeeForm').submit(function(e) {
        e.preventDefault();
        var employee_id = $('#edit_employee_id').val();
        $.ajax({
            url: '/employees/' + employee_id,
            method: 'PUT',
            data: $(this).serialize(),
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response) {
                $('#editEmployeeModal').modal('hide');
                table.ajax.reload();
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.error('AJAX Error:', textStatus, errorThrown);
                
                // Extract detailed error information
                let errorMessage = 'An error occurred: ' + textStatus;
                
                if (jqXHR.responseJSON && jqXHR.responseJSON.message) {
                    errorMessage += '\nDetails: ' + jqXHR.responseJSON.message;
                } else if (jqXHR.responseText) {
                    errorMessage += '\nDetails: ' + jqXHR.responseText;
                }

                alert(errorMessage);
            }
        });
    });

    // Delete Employee
    $('#employeesTable').on('click', '.delete-btn', function() {
        var employee_id = $(this).data('id');
        $('#delete_employee_id').val(employee_id);
        $('#deleteEmployeeModal').modal('show');
    });

    $('#confirmDelete').click(function() {
        var employee_id = $('#delete_employee_id').val();
        $.ajax({
            url: '/employees/' + employee_id,
            method: 'DELETE',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response) {
                $('#deleteEmployeeModal').modal('hide');
                table.ajax.reload();
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.error('AJAX Error:', textStatus, errorThrown);
                
                // Extract detailed error information
                let errorMessage = 'An error occurred: ' + textStatus;
                
                if (jqXHR.responseJSON && jqXHR.responseJSON.message) {
                    errorMessage += '\nDetails: ' + jqXHR.responseJSON.message;
                } else if (jqXHR.responseText) {
                    errorMessage += '\nDetails: ' + jqXHR.responseText;
                }

                alert(errorMessage);
            }
        });
    });
    $('#add-employee').click(function() {
        console.log("mare e petek lah cok");
        // $('#addEmployeeModal').show();
    });
});
</script>
@endpush