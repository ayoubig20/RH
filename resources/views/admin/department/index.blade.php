@extends('layouts.admin')

@section('title', 'Employees')

@section('wrapper')
    <!--start page wrapper -->
    <div class="page-wrapper">
        <div class="page-content">
            <!--breadcrumb-->
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3">Tables</div>
                <div class="ps-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">
                            <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Data Table</li>
                        </ol>
                    </nav>
                </div>
                <div class="ms-auto">
                    <div class="btn-group">
                        <button type="button" class="btn btn-primary">Settings</button>
                        <button type="button"
                            class="btn btn-primary split-bg-primary dropdown-toggle dropdown-toggle-split"
                            data-bs-toggle="dropdown"> <span class="visually-hidden">Toggle Dropdown</span>
                        </button>
                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-lg-end"> <a class="dropdown-item"
                                href="javascript:;">Action</a>
                            <a class="dropdown-item" href="javascript:;">Another action</a>
                            <a class="dropdown-item" href="javascript:;">Something else here</a>
                            <div class="dropdown-divider"></div> <a class="dropdown-item" href="javascript:;">Separated
                                link</a>
                        </div>
                    </div>
                </div>
            </div>
            <!--end breadcrumb-->

            <div class="col">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                @if (session()->has('Add'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert" id="success-alert">
                        <strong>{{ session()->get('Add') }}</strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <script>
                        // Set a timer to hide the success message after 5 seconds
                        setTimeout(function() {
                            $('#success-alert').alert('close');
                        }, 2000);
                    </script>
                @endif
                <div id="notification"></div>


                @if (session()->has('delete'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>{{ session()->get('delete') }}</strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif

                @if (session()->has('edit'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>{{ session()->get('edit') }}</strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">add
                    Departement</button>
                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">add Departement</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">

                                <form action="{{ route('admin.department.store') }}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <input type="hidden" name="id" id="id" value="">
                                        <label for="name">Name departement:</label>
                                        <input type="text" id="name" name="name" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="description">Description:</label>
                                        <textarea name="description" id="description" cols="30" rows="10" class="form-control"></textarea>
                                    </div>
                                    {{-- <button type="submit" class="btn btn-success">Submit</button> --}}

                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Save</button>
                                    </div>

                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead class=" text-primary">
                            <th>#</th>
                            <th>department name</th>
                            <th>description</th>
                            <th>Action</th>

                        </thead>
                        <tbody>
                            <?php $i = 0; ?>
                            @foreach ($viewData['departments'] as $department)
                                <?php $i++; ?>

                                <tr>
                                    <td>{{ $i }}</td>
                                    <td>{{ $department->getName() }}</td>
                                    <td>{{ $department->getDescription() }}</td>
                                    <td>
                                        <div class="d-flex flex-row">
                                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                                data-bs-target="#editDepartment{{ $department->getId() }}">
                                                <i class="bx bxs-edit"></i> Edit
                                            </button>
                                            <div class="modal fade" id="editDepartment{{ $department->getId() }}"
                                                tabindex="-1" aria-labelledby="editDepartment{{ $department->getId() }}"
                                                aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title"
                                                                id="editDepartment{{ $department->getId() }}">Edit
                                                                Department</h5>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <form
                                                            action="{{ route('admin.department.update', $department->getId()) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('PUT')
                                                            <div class="modal-body">
                                                                <div class="form-group">
                                                                    <label for="name">Name:</label>
                                                                    <input type="text" class="form-control"
                                                                        id="name" name="name"
                                                                        value="{{ $department->getName() }}" required>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="description">Description:</label>
                                                                    <textarea class="form-control" id="description" name="description">{{ $department->getDescription() }}</textarea>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-bs-dismiss="modal">Cancel</button>
                                                                <button type="submit" class="btn btn-primary">Save
                                                                    changes</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>


                                            <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                                data-bs-target="#deleteDepartement">
                                                <i class="bx bxs-trash"></i> Delete
                                            </button>
                                            <div class="modal fade" id="deleteDepartement" tabindex="-1"
                                                aria-labelledby="deleteDepartement" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="deleteDepartement">
                                                                Confirm Delete Departement</h5>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p>Are you sure you want to delete this Departement?</p>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">Cancel</button>
                                                            <form
                                                                action="{{ route('admin.department.destroy', $department->getId()) }}"
                                                                method="POST">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit"
                                                                    class="btn btn-danger">Delete</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>


                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                   
                </div>
            </div>
        </div>
        <script>
            // Reset form function
            function resetForm() {
                document.getElementById("department-form").reset();
            }
        
            // Show notification function
            function showNotification(message, type) {
                // Get the notification element
                var notification = document.getElementById("notification");
        
                // Set the message and type
                notification.innerHTML = message;
                notification.classList.add(type);
        
                // Show the notification for 3 seconds
                setTimeout(function(){
                    notification.innerHTML = "";
                    notification.classList.remove(type);
                }, 3000);
            }
        
            // Trigger reset form and show notification after clicking Cancel button
            $("#exampleModal .btn-secondary").click(function(){
                resetForm();
                showNotification("Form has been reset.", "alert-success");
            });
        
            // Trigger show notification after clicking Delete or Update button
            $("#exampleModal .btn-danger, #exampleModal .btn-primary").click(function(){
                showNotification("Action has been performed.", "alert-info");
            });
        </script>
        
    @endsection
