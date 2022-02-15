@extends('layouts.adminlte')

@section('head')
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="https://cdn.datatables.net/select/1.3.4/css/select.dataTables.min.css">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined|Material+Icons+Two+Tone|Material+Icons+Round|Material+Icons+Sharp">
@endsection

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            @if (session('success'))
                <div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    {{-- <h5><i class="icon fas fa-check"></i> Alert!</h5> --}}
                    {{ session('success') }}
                </div>
            @endif
            @if (session('warning'))
                <div class="alert alert-warning alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    {{-- <h5><i class="icon fas fa-check"></i> Alert!</h5> --}}
                    {{ session('warning') }}
                </div>
            @endif
            <div class="row mb-2">
                <div class="col-sm-6 d-flex align-items-center">
                    <h1 class="m-0">Users</h1>
                    @can('users create')
                        <a href="{{ route('admin.users.create') }}" class="material-icons-round">add</a>
                    @endcan
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Home</a></li>
                        <li class="breadcrumb-item active">Users</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="content pb-3">
        <div class="container-fluid">
            <div class="card m-0">
                <div class="card-body table-responsive">
                    <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th></th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Roles</th>
                                {{-- <th>Verified</th> --}}
                                <th>Created At</th>
                                <th class="d-print-none">Options</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr data-identifier="{{ $user->id }}">
                                    <td></td>
                                    <td>
                                        <div class="align-items-center d-flex">
                                            <span>
                                                {{ $user->name }}
                                            </span>
                                            <span class="material-icons-round ml-1 text-primary"
                                                title="Verified">{{ $user->email_verified_at ? 'verified' : '' }}</span>
                                        </div>
                                    </td>
                                    <td>{{ $user->email }}</td>
                                    <td>
                                        @foreach ($user->roles as $role)
                                            <span class="badge badge-secondary">{{ $role->name }}</span>
                                            <span>{{ $loop->last ? '' : '|' }}</span>
                                        @endforeach
                                    </td>
                                    {{-- <td>
                                        <span class="badge {{ $user->email_verified_at ? 'badge-success' : 'badge-danger' }}">{{ $user->email_verified_at ? 'YES' : 'NO' }}</span>
                                    </td> --}}
                                    <td>{{ $user->created_at->diffForHumans() }}</td>
                                    <td>
                                        <div class="d-flex flex-column flex-md-row justify-content-center"
                                            style="gap: 0.5rem">
                                            @can('users edit')
                                                <a href="{{ route('admin.users.edit', $user->id) }}"
                                                    class="btn btn-sm btn-secondary">Edit</a>
                                            @endcan
                                            @can('users read')
                                                <a href="{{ route('admin.users.show', $user->id) }}"
                                                    class="btn btn-sm btn-secondary">Show</a>
                                            @endcan
                                            @can('users delete')
                                                <span class="btn btn-sm btn-danger" id="deleteButton">Delete</span>
                                            @endcan
                                        </div>
                                    </td>
                                    <form action="{{ route('admin.users.destroy', $user->id) }}" method="post"
                                        id="destroy-{{ $user->id }}" style="display: none">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th></th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Roles</th>
                                <th>Created At</th>
                                <th class="d-print-none">Options</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <form action="{{ route('admin.users.bulkDelete') }}" id="deleteSelectedForm" method="POST" class="d-none">
        @csrf
        @method('DELETE')
        <input type="text" name="ids" id="ids">
    </form>
@endsection

@section('script')
    <script src="{{ asset('adminLte/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('adminlte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('adminlte/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('adminlte/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('adminlte/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('adminLte/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('adminlte/plugins/jszip/jszip.min.js') }}"></script>
    <script src="{{ asset('adminlte/plugins/pdfmake/pdfmake.min.js') }}"></script>
    <script src="{{ asset('adminlte/plugins/pdfmake/vfs_fonts.js') }}"></script>
    <script src="{{ asset('adminlte/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('adminlte/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('adminlte/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
    <script src="https://cdn.datatables.net/select/1.3.3/js/dataTables.select.min.js"></script>
    <script>
        $(document).ready(function() {
            const exportOption = [1, 2, 3, 4]
            $('#datatable').DataTable({
                dom: "<'row'<'col-sm-12 col-md-6'l><'col-sm-12 col-md-6'f>>" +
                    "<'row'<'col-sm-12'B>>" +
                    "<'row'<'col-sm-12'tr>>" +
                    "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
                buttons: [{
                    extend: 'copy',
                    className: 'btn btn-sm rounded-0 btn-secondary',
                    exportOptions: {
                        columns: exportOption
                    }
                }, {
                    extend: 'csv',
                    className: 'btn btn-sm rounded-0 btn-secondary',
                    exportOptions: {
                        columns: exportOption
                    }
                }, {
                    extend: 'excel',
                    className: 'btn btn-sm rounded-0 btn-secondary',
                    exportOptions: {
                        columns: exportOption
                    }
                }, {
                    extend: 'pdf',
                    className: 'btn btn-sm rounded-0 btn-secondary',
                    exportOptions: {
                        columns: exportOption
                    }
                }, {
                    extend: 'print',
                    className: 'btn btn-sm rounded-0 btn-secondary',
                    exportOptions: {
                        columns: exportOption
                    }
                }, {
                    extend: 'colvis',
                    className: 'btn btn-sm rounded-0 btn-secondary'
                }, {
                    text: 'Delete',
                    className: 'btn btn-sm rounded-0 btn-danger',
                    action: function() {
                        checkSelectedRows()
                    }
                }, ],
                select: {
                    style: 'multi',
                    selector: 'td:first-child'
                },
                columnDefs: [{
                    orderable: false,
                    className: 'select-checkbox',
                    targets: 0
                }, {
                    orderable: false,
                    targets: 3
                }],
                order: [
                    [1, 'asc']
                ]
            });
        });
    </script>
    <script>
        const checkSelectedRows = () => {
            const deleteSelectedForm = document.querySelector('#deleteSelectedForm');
            const ids = document.querySelector('#deleteSelectedForm input#ids');
            let selectedRowsArr = []
            let selectedRows = document.querySelectorAll('tr.selected');
            selectedRows.forEach(row => {
                selectedRowsArr.push(row.dataset.identifier);
            });

            @can('users delete')
            if (selectedRowsArr.length == 0) {
                swal({
                    title: "0 Data selected",
                    text: "Please select minimal 1 data!",
                    icon: "error",
                });

            } else {
                swal({
                    title: "Are you sure?",
                    text: "Once deleted, you will not be able to recover your datas!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                }).then((willDelete) => {
                    if (willDelete) {
                        ids.value = selectedRowsArr;
                        deleteSelectedForm.submit();
                    } else {
                        //
                    }
                })
            }
            @else
            swal({
                title: "Action denied",
                text: "You don't have permission to do this action!",
                icon: "error",
            });
            @endcan
        }
    </script>
    <script>
        // delete data
        const deleteButtons = document.querySelectorAll('#deleteButton');
        deleteButtons.forEach(button => {
            button.addEventListener('click', () => {
                swal({
                        title: "Are you sure?",
                        text: "Once deleted, you will not be able to recover this data!",
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                    })
                    .then((willDelete) => {
                        if (willDelete) {
                            let identifier = button.parentElement.parentElement.parentElement.dataset
                                .identifier;
                            document.querySelector(`#destroy-${identifier}`).submit()
                        } else {
                            // swal("Your data is safe!");
                        }
                    });
            })
        });
    </script>
@endsection
