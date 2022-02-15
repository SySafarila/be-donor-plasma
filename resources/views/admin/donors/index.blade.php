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
                    <h1 class="m-0">Donors</h1>
                    @can('donors create')
                        <a href="{{ route('admin.permissions.create') }}" class="material-icons-round">add</a>
                    @endcan
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Home</a></li>
                        <li class="breadcrumb-item active">Donors</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="content pb-3">
        <div class="container-fluid">
            <div class="card m-0">
                <div class="card-body table-responsive">
                    <div class="mb-3">
                        <a href="{{ route('admin.donors.index') }}" class="btn btn-sm btn-primary">All</a>
                        <a href="{{ route('admin.donors.index', ['status' => 'accepted']) }}" class="btn btn-sm btn-success">Accepted</a>
                        <a href="{{ route('admin.donors.index', ['status' => 'rejected']) }}" class="btn btn-sm btn-danger">Rejected</a>
                    </div>
                    <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th class="text-capitalize"></th>
                                <th class="text-capitalize">Full Name</th>
                                <th class="text-capitalize">Gender</th>
                                {{-- <th class="text-capitalize">Birth Place</th> --}}
                                <th class="text-capitalize">Birth Date</th>
                                {{-- <th class="text-capitalize">mobile</th> --}}
                                <th class="text-capitalize">blood Type</th>
                                <th class="text-capitalize">rhesus</th>
                                <th class="text-capitalize">status</th>
                                {{-- <th class="text-capitalize">height</th> --}}
                                {{-- <th class="text-capitalize">weight</th> --}}
                                {{-- <th class="text-capitalize">Created At</th> --}}
                                <th class="d-print-none">Options</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($donors as $donor)
                                <tr data-identifier="{{ $donor->id }}">
                                    <td></td>
                                    <td class="text-capitalize">{{ $donor->fullName }}</td>
                                    <td>{{ $donor->gender == 'rhesus-plus' ? 'Male' : 'Female' }}</td>
                                    {{-- <td>{{ $donor->placeBirth }}</td> --}}
                                    <td>{{ \Carbon\Carbon::parse($donor->dateBirth)->format('d F Y') }}</td>
                                    {{-- <td>{{ $donor->mobile }}</td> --}}
                                    <td class="text-capitalize">{{ explode('-', $donor->bloodType)[2] }}</td>
                                    <td>{{ $donor->rhesus == 'rhesus-plus' ? '+' : '-' }}</td>
                                    <td>{{ $donor->status ? 'Accepted' : 'Rejected' }}</td>
                                    {{-- <td>{{ $donor->height }}cm</td> --}}
                                    {{-- <td>{{ $donor->weight }}kg</td> --}}
                                    {{-- <td>{{ $donor->created_at->diffForHumans() }}</td> --}}
                                    <td>
                                        <div class="d-flex flex-column flex-md-row justify-content-center"
                                            style="gap: 0.5rem">
                                            @if ($donor->status)
                                                @can('donors reject')
                                                    <a href="{{ route('admin.donors.show', ['donor' => $donor->id, 'status' => false]) }}"
                                                        class="btn btn-sm btn-outline-danger">Reject</a>
                                                @endcan

                                            @else
                                                @can('donors accept')
                                                    <a href="{{ route('admin.donors.show', ['donor' => $donor->id, 'status' => true]) }}"
                                                        class="btn btn-sm btn-outline-success">Accept</a>
                                                @endcan
                                            @endif
                                            @can('donors read')
                                                <button type="button" class="btn btn-sm btn-secondary" data-toggle="modal"
                                                    data-target="#donor-{{ $donor->id }}">
                                                    Detail
                                                </button>
                                            @endcan
                                            @can('donors delete')
                                                <span class="btn btn-sm btn-danger" id="deleteButton">Delete</span>
                                            @endcan
                                        </div>
                                    </td>
                                    <form action="{{ route('admin.donors.destroy', $donor->id) }}" method="post"
                                        id="destroy-{{ $donor->id }}" style="display: none">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th class="text-capitalize"></th>
                                <th class="text-capitalize">Full Name</th>
                                <th class="text-capitalize">Gender</th>
                                {{-- <th class="text-capitalize">Birth Place</th> --}}
                                <th class="text-capitalize">Birth Date</th>
                                {{-- <th class="text-capitalize">mobile</th> --}}
                                <th class="text-capitalize">blood Type</th>
                                <th class="text-capitalize">rhesus</th>
                                <th class="text-capitalize">status</th>
                                {{-- <th class="text-capitalize">height</th> --}}
                                {{-- <th class="text-capitalize">weight</th> --}}
                                {{-- <th class="text-capitalize">Created At</th> --}}
                                <th class="d-print-none">Options</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
    @foreach ($donors as $donor)
        <!-- Modal -->
        <div class="modal fade" id="donor-{{ $donor->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title text-capitalize" id="exampleModalLabel">{{ $donor->fullName }} Detail</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <table class="table table-striped">
                            <tr>
                                <td>Created At</td>
                                <td>{{ $donor->created_at->diffForHumans() }}</td>
                            </tr>
                            <tr>
                                <td class="text-capitalize">Full Name</td>
                                <td>{{ $donor->fullName }}</td>
                            </tr>
                            <tr>
                                <td>Gender</td>
                                <td>{{ $donor->gender == 'rhesus-plus' ? 'Male' : 'Female' }}</td>
                            </tr>
                            <tr>
                                <td>Birth Place</td>
                                <td>{{ $donor->placeBirth }}</td>
                            </tr>
                            <tr>
                                <td>Birth Date</td>
                                <td>{{ \Carbon\Carbon::parse($donor->dateBirth)->format('d F Y') }}</td>
                            </tr>
                            <tr>
                                <td>Mobile</td>
                                <td>{{ $donor->mobile }}</td>
                            </tr>
                            <tr>
                                <td>Email</td>
                                <td>{{ $donor->email }}</td>
                            </tr>
                            <tr>
                                <td>Blood Type</td>
                                <td class="text-capitalize">{{ explode('-', $donor->bloodType)[2] }}</td>
                            </tr>
                            <tr>
                                <td>Rhesus</td>
                                <td>{{ $donor->rhesus == 'rhesus-plus' ? '+' : '-' }}</td>
                            </tr>
                            <tr>
                                <td>height</td>
                                <td>{{ $donor->height }}cm</td>
                            </tr>
                            <tr>
                                <td>Weight</td>
                                <td>{{ $donor->weight }}kg</td>
                            </tr>
                            <tr>
                                <td>Positive Date</td>
                                <td>{{ \Carbon\Carbon::parse($donor->positiveDate)->format('d F Y') }}</td>
                            </tr>
                            <tr>
                                <td>Negative Date</td>
                                <td>{{ \Carbon\Carbon::parse($donor->negativeDate)->format('d F Y') }}</td>
                            </tr>
                            <tr>
                                <td>Status</td>
                                <td>{{ $donor->status ? 'Accepted' : 'Rejected' }}</td>
                            </tr>
                            <tr>
                                <td>Positive Image</td>
                                <td>
                                    <img src="{{ asset('storage/positives/' . $donor->positiveImage) }}"
                                        alt="{{ $donor->positiveImage }}"
                                        style="max-width: 10rem;max-height: 10rem;object-fit: contain;">
                                </td>
                            </tr>
                            <tr>
                                <td>Negative Image</td>
                                <td>
                                    <img src="{{ asset('storage/negatives/' . $donor->negativeImage) }}"
                                        alt="{{ $donor->negativeImage }}"
                                        style="max-width: 10rem;max-height: 10rem;object-fit: contain;">
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        {{-- <button type="button" class="btn btn-primary">Save changes</button> --}}
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    <form action="{{ route('admin.donors.bulkDelete') }}" id="deleteSelectedForm" method="POST" class="d-none">
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
            const exportOption = [1, 2]
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
                    targets: 7
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

            @can('donors delete')
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
