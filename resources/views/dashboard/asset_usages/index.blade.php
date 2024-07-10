@extends('dashboard.layouts.app')
@section('title', 'Manage Users')
@section('content')

<!-- row -->

<div class="row">
    <div class="col-xl-12">
         @if ($message = Session::get('success'))
            <div class="alert alert-primary alert-dismissible fade show">
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
                        <h4 class="card-title">Users</h4>
                    </div>
                    <div class="card-body">
                    <button class="btn btn-primary mb-3 add-btn" data-toggle="modal" data-target="#addAssetUsageModal">Add Asset Usage</button>
                        <table id="assetUsagesTable" >
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Asset Name</th>
                                    <th>Asset Type</th>
                                    <th>Employee Name</th>
                                    <th>Use Date</th>
                                    <th>Return Date</th>
                                    <th>Purpose</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                    </div>
                </div>
            <!--  -->

            </div>
        </div>  
    </div>
</div>

<!-- Add Asset Usage Modal -->
<div class="modal fade" id="addAssetUsageModal" tabindex="-1" aria-labelledby="addAssetUsageModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addAssetUsageModalLabel">Add Asset Usage</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form id="addAssetUsageForm">
                    @csrf
                    <div class="form-group">
                        <label for="asset_id">Asset</label>
                        <select class="form-control" id="asset_id" name="asset_id" required>
                            @foreach ($assets as $asset)
                                <option value="{{ $asset->asset_id }}">{{ $asset->asset_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="employee_id">Employee</label>
                        <select class="form-control" id="employee_id" name="employee_id" required>
                            @foreach ($employees as $employee)
                                <option value="{{ $employee->employee_id }}">{{ $employee->first_name }} {{ $employee->last_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="use_date">Use Date</label>
                        <input type="date" class="form-control" id="use_date" name="use_date" required>
                    </div>
                    <div class="form-group">
                        <label for="return_date">Return Date</label>
                        <input type="date" class="form-control" id="return_date" name="return_date">
                    </div>
                    <div class="form-group">
                        <label for="purpose">Purpose</label>
                        <textarea class="form-control" id="purpose" name="purpose" rows="3"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Add Asset Usage</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Edit Asset Usage Modal -->
<div class="modal fade" id="editAssetUsageModal" tabindex="-1" aria-labelledby="editAssetUsageModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editAssetUsageModalLabel">Edit Asset Usage</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </button>
            </div>
            <div class="modal-body">
                <form id="editAssetUsageForm">
                    @csrf
                    @method('PUT')
                    <input type="hidden" id="edit_usage_id" name="usage_id">
                    <div class="form-group">
                        <label for="edit_asset_id">Asset</label>
                        <select class="form-control" id="edit_asset_id" name="asset_id" required>
                            @foreach ($assets as $asset)
                                <option value="{{ $asset->asset_id }}">{{ $asset->asset_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="edit_employee_id">Employee</label>
                        <select class="form-control" id="edit_employee_id" name="employee_id" required>
                            @foreach ($employees as $employee)
                                <option value="{{ $employee->employee_id }}">{{ $employee->first_name }} {{ $employee->last_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="edit_use_date">Use Date</label>
                        <input type="date" class="form-control" id="edit_use_date" name="use_date" required>
                    </div>
                    <div class="form-group">
                        <label for="edit_return_date">Return Date</label>
                        <input type="date" class="form-control" id="edit_return_date" name="return_date">
                    </div>
                    <div class="form-group">
                        <label for="edit_purpose">Purpose</label>
                        <textarea class="form-control" id="edit_purpose" name="purpose" rows="3"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Update Asset Usage</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Delete Asset Usage Modal -->
<div class="modal fade" id="deleteAssetUsageModal" tabindex="-1" aria-labelledby="deleteAssetUsageModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteAssetUsageModalLabel">Delete Asset Usage</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </button>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to delete this asset usage?</p>
                <form id="deleteAssetUsageForm">
                    @csrf
                    @method('DELETE')
                    <input type="hidden" id="delete_usage_id" name="usage_id">
                    <button type="submit" class="btn btn-danger">Delete Asset Usage</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection

@push('scripts')
<script>
$(document).ready(function() {
    var table = $('#assetUsagesTable').DataTable({
        ajax: {
            url: '{{ route('asset_usages.getAssetUsages') }}',
            dataSrc: ''
        },
        columns: [
            { data: 'usage_id' },
            { data: 'asset.asset_name' },
            { data: 'asset.asset_type' },
            { data: 'employee.first_name', render: function(data, type, row) {
                return data + ' ' + row.employee.last_name;
            }},
            { data: 'use_date' },
            { data: 'return_date' },
            { data: 'purpose' },
            { data: null, render: function (data, type, row) {
                return `
                    <button class="btn btn-sm btn-primary edit-btn" data-id="${data.usage_id}" data-asset_id="${data.asset_id}" data-employee_id="${data.employee_id}" data-use_date="${data.use_date}" data-return_date="${data.return_date}" data-purpose="${data.purpose}">Edit</button>
                    <button class="btn btn-sm btn-danger delete-btn" data-id="${data.usage_id}">Delete</button>
                `;
            }}
        ]
    });
     // Show Add Asset Usage Modal
     $('#addAssetUsageModal').on('show.bs.modal', function (e) {
        $('#addAssetUsageForm')[0].reset(); // Reset form when modal shows
    });
    // Add Asset Usage
    $('#addAssetUsageForm').submit(function(e) {
        e.preventDefault();
        $.ajax({
            url: '{{ route('asset_usages.store') }}',
            method: 'POST',
            data: $(this).serialize(),
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response) {
                $('#addAssetUsageModal').modal('hide');
                $('#addAssetUsageForm')[0].reset();
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

    // Edit Asset Usage
    $('#assetUsagesTable').on('click', '.edit-btn', function() {
        $('#edit_usage_id').val($(this).data('id'));
        $('#edit_asset_id').val($(this).data('asset_id'));
        $('#edit_employee_id').val($(this).data('employee_id'));
        $('#edit_use_date').val($(this).data('use_date'));
        $('#edit_return_date').val($(this).data('return_date'));
        $('#edit_purpose').val($(this).data('purpose'));
        $('#editAssetUsageModal').modal('show');
    });

    $('#editAssetUsageForm').submit(function(e) {
        e.preventDefault();
        var usage_id = $('#edit_usage_id').val();
        $.ajax({
            url: '/asset_usages/' + usage_id,
            method: 'PUT',
            data: $(this).serialize(),
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response) {
                $('#editAssetUsageModal').modal('hide');
                $('#editAssetUsageForm')[0].reset();
                table.ajax.reload();
            }
        });
    });

    // Delete Asset Usage
    $('#assetUsagesTable').on('click', '.delete-btn', function() {
        var usage_id = $(this).data('id');
        // console.log('Delete button clicked ' + usage_id);
        $('#delete_usage_id').val(usage_id);
        $('#deleteAssetUsageModal').modal('show');
    });
    $(document).on('click', '.add-btn', function() {
        // var usage_id = $(this).data('id');
        console.log('Delete button clicked ' );
        // $('#delete_usage_id').val(usage_id);
        $('#addAssetUsageModal').modal('show');
    });
    $('#deleteAssetUsageForm').submit(function(e) {
        e.preventDefault();
        var usage_id = $('#delete_usage_id').val();
        // console.log('Submited button clicked ' + usage_id);
        $.ajax({
            url: '/asset_usages/' + usage_id,
            method: 'DELETE',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response) {
                $('#deleteAssetUsageModal').modal('hide');
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
});
</script>
@endpush