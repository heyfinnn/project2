@extends('dashboard.layouts.app')
@section('title', 'Manage Task')
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
                        <button type="button" class="btn btn-primary mb-3 add-btn" data-toggle="modal" data-target="#addTaskModal">Add Task</button>
                        <table id="tasksTable" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Task Name</th>
                                    <th>Description</th>
                                    <th>Due Date</th>
                                    <th>Status</th>
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
<!-- Add Task Modal -->
<div class="modal fade" id="addTaskModal" tabindex="-1" role="dialog" aria-labelledby="addTaskModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addTaskModalLabel">Add Task</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form id="addTaskForm">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="task_name">Task Name</label>
                        <input type="text" class="form-control" id="task_name" name="task_name" required>
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea class="form-control" id="description" name="description" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="due_date">Due Date</label>
                        <input type="date" class="form-control" id="due_date" name="due_date" required>
                    </div>
                    <div class="form-group">
                        <label for="status">Status</label>
                        <select class="form-control" id="status" name="status" required>
                            <option value="pending">Pending</option>
                            <option value="in progress">In Progress</option>
                            <option value="completed">Completed</option>
                        </select>
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

<!-- Edit Task Modal -->
<div class="modal fade" id="editTaskModal" tabindex="-1" role="dialog" aria-labelledby="editTaskModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editTaskModalLabel">Edit Task</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form id="editTaskForm">
                <div class="modal-body">
                    <input type="hidden" id="edit_task_id">
                    <div class="form-group">
                        <label for="edit_task_name">Task Name</label>
                        <input type="text" class="form-control" id="edit_task_name" name="task_name" required>
                    </div>
                    <div class="form-group">
                        <label for="edit_description">Description</label>
                        <textarea class="form-control" id="edit_description" name="description" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="edit_due_date">Due Date</label>
                        <input type="date" class="form-control" id="edit_due_date" name="due_date" required>
                    </div>
                    <div class="form-group">
                        <label for="edit_status">Status</label>
                        <select class="form-control" id="edit_status" name="status" required>
                            <option value="pending">Pending</option>
                            <option value="in progress">In Progress</option>
                            <option value="completed">Completed</option>
                        </select>
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

<!-- Delete Task Modal -->
<div class="modal fade" id="deleteTaskModal" tabindex="-1" role="dialog" aria-labelledby="deleteTaskModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteTaskModalLabel">Delete Task</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to delete this task?</p>
                <input type="hidden" id="delete_task_id">
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
    var table = $('#tasksTable').DataTable({
        ajax: {
            url: '{{ route('tasks.getTasks') }}',
            dataSrc: ''
        },
        columns: [
            { 
                data: null, 
                render: function (data, type, row, meta) {
                    return meta.row + 1; // Iteration number
                }
            },
            { data: 'task_name' },
            { data: 'description' },
            { data: 'due_date' },
            { data: 'status' },
            {
                data: null,
                render: function(data, type, row) {
                    return `
                        <button class="btn btn-sm btn-primary edit-btn" data-id="${data.task_id}" data-task_name="${data.task_name}" data-description="${data.description}" data-due_date="${data.due_date}" data-status="${data.status}">Edit</button>
                        <button class="btn btn-sm btn-danger delete-btn" data-id="${data.task_id}">Delete</button>
                    `;
                }
            }
        ]
    });

    // Show Add Task Modal
    $('#addTaskModal').on('show.bs.modal', function() {
        $('#addTaskForm')[0].reset(); // Reset form when modal shows
    });

    // Add Task
    $('#addTaskForm').submit(function(e) {
        e.preventDefault();
        $.ajax({
            url: '{{ route('tasks.store') }}',
            method: 'POST',
            data: $(this).serialize(),
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response) {
                $('#addTaskModal').modal('hide');
                table.ajax.reload();
            }
        });
    });

    // Show Edit Task Modal
    $('#tasksTable').on('click', '.edit-btn', function() {
        $('#edit_task_id').val($(this).data('id'));
        $('#edit_task_name').val($(this).data('task_name'));
        $('#edit_description').val($(this).data('description'));
        $('#edit_due_date').val($(this).data('due_date'));
        $('#edit_status').val($(this).data('status'));
        $('#editTaskModal').modal('show');
    });

    // Edit Task
    $('#editTaskForm').submit(function(e) {
        e.preventDefault();
        var task_id = $('#edit_task_id').val();
        $.ajax({
            url: '/tasks/' + task_id,
            method: 'PUT',
            data: $(this).serialize(),
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response) {
                $('#editTaskModal').modal('hide');
                table.ajax.reload();
            }
        });
    });

    // Show Delete Task Modal
    $('#tasksTable').on('click', '.delete-btn', function() {
        var task_id = $(this).data('id');
        $('#delete_task_id').val(task_id);
        $('#deleteTaskModal').modal('show');
    });

    // Delete Task
    $('#confirmDelete').click(function() {
        var task_id = $('#delete_task_id').val();
        $.ajax({
            url: '/tasks/' + task_id,
            method: 'DELETE',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response) {
                $('#deleteTaskModal').modal('hide');
                table.ajax.reload();
            }
        });
    });
});
</script>
@endpush