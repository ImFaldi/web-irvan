@extends('layouts.dashboard')

@section('title', 'Admin Dashboard')

@section('content')
    <div class="container-fluid">
        <div class="row">

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-6 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                    Total User</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalUser }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-calendar fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-6 col-md-6 mb-4">
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                    Total Report</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalReport }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xl-6 col-md-6 mb-4">
                <div class="card shadow h-100 py-2">
                    <div class="row">
                        <div class="col-6">
                            <h4 class="dropdown-header">
                                History
                            </h4>
                        </div>
                        {{-- button add user --}}
                        <div class="col-6">
                            <button type="button" class="btn btn-primary float-right mr-2" data-toggle="modal"
                                data-target="#add-user">
                                Add User
                            </button>
                        </div>
                    </div>
                    {{-- newest history --}}
                    <div class="card-body">
                        <span class="font-weight-bold">Newest History</span>
                        @foreach ($users as $user)
                            @if ($date == $user->created_at->format('Y-m-d'))
                                <p class="text-left">
                                </p>
                                <div class="d-flex align-items-center">
                                    <i class="fas fa-user-circle fa-2x ml-3"></i>
                                    <div class="d-flex flex-column">
                                        <h6 class="ml-3 mb-1 text-sm text-dark">{{ $user->name }}</h5>
                                            <span class="ml-3 text-xs">{{ $user->role }}</span>
                                    </div>
                                </div>
                                <hr>
                            @endif
                        @endforeach
                        {{-- yesterday history --}}
                        <span class="font-weight-bold">Yesterday History</span>
                        @foreach ($users as $user)
                            @if ($yesterday == $user->created_at->format('Y-m-d'))
                                <p class="text-left">
                                </p>
                                <div class="d-flex align-items-center">
                                    <i class="fas fa-user-circle fa-2x ml-3"></i>
                                    <div class="d-flex flex-column">
                                        <h6 class="ml-3 mb-1 text-sm text-dark">{{ $user->name }}</h5>
                                            <span class="ml-3 text-xs">{{ $user->role }}</span>
                                    </div>
                                </div>
                                <hr>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="col-xl-6 col-md-6 mb-4">
                <div class="card shadow h-100 py-2">
                    <div class="row">
                        <div class="col-6">
                            <h4 class="dropdown-header">
                                Report
                            </h4>
                        </div>
                    </div>
                    <div class="card-body p-3 pb-0">
                        <div class="col-sm-12">
                            @if (session('approve'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <strong>Success</strong> {{ session('approve') }}.
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif
                            @if (session('reject'))
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <strong>Success</strong> {{ session('reject') }}.
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times; </span>
                                    </button>
                                </div>
                            @endif
                            <table class="table table-bordered dataTable" id="dataTable" width="100%" cellspacing="0"
                                role="grid" aria-describedby="dataTable_info" style="width: 100%;">
                                <thead>
                                    <tr role="row">
                                        <th class="sorting sorting_asc" tabindex="0" aria-controls="dataTable"
                                            rowspan="1" colspan="1" aria-sort="ascending"
                                            aria-label="Name: activate to sort column descending" style="width: 68px;">Title
                                            Report
                                        </th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                            colspan="1" aria-label="Position: activate to sort column ascending"
                                            style="width: 111px;">Status
                                        </th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                            colspan="1" aria-label="Office: activate to sort column ascending"
                                            style="width: 51px;">Reported At
                                        </th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                            colspan="1" aria-label="Age: activate to sort column ascending"
                                            style="width: 24px;">Action
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($reports as $report)
                                        @if ($report->status == 'pending')
                                            <tr role="row" class="odd">
                                                <td class="sorting_1">{{ $report->title }}</td>
                                                <td><span
                                                        class="badge badge-{{ $report->status == 'pending' ? 'warning' : ($report->status == 'approved' ? 'success' : 'danger') }}">{{ $report->status }}</span>
                                                <td>{{ $report->created_at->format('d M Y') }}</td>
                                                <td>
                                                    <button type="button" class="btn btn-primary" data-toggle="modal"
                                                        data-target="#detail-report-{{ $report->id }}">
                                                        Detail
                                                </td>
                                            </tr>
                                        @endif

                                        {{-- modal detail report --}}
                                        <div class="modal fade" id="detail-report-{{ $report->id }}" tabindex="-1"
                                            aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLongTitle">Detail Report
                                                        </h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <h6 class="mb-1 text-dark font-weight-bold text-sm">Title :
                                                            <span
                                                                class="text-dark font-weight-normal">{{ $report->title }}</span>
                                                            @foreach ($users as $user)
                                                                @if ($user->id == $report->user_id)
                                                                    <h6
                                                                        class="mb-1 text-dark font-weight-bold text-sm mt-4">
                                                                        Name
                                                                        Reporter : <span
                                                                            class="text-dark font-weight-normal">{{ $user->name }}</span>
                                                                @endif
                                                            @endforeach
                                                            <h6 class="mb-1 text-dark font-weight-bold text-sm mt-4">
                                                                Description : <br>
                                                                <span
                                                                    class="text-dark font-weight-normal">{{ $report->description }}</span>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <a href="{{ route('admin.reject', $report->id) }}"
                                                            class="btn btn-danger">Reject</a>
                                                        <a href="{{ route('admin.approve', $report->id) }}"
                                                            class="btn btn-success">Approve</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="add-user" tabindex="-1" role="dialog" aria-labelledby="add-userTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Register</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="user" method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="form-group">
                            <input type="varchar" class="form-control form-control-user" id="exampleInputEmail"
                                aria-describedby="emailHelp" placeholder="Enter Name..." name="name">
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-control form-control-user" id="exampleInputEmail"
                                aria-describedby="emailHelp" placeholder="Enter Email Address..." name="email">
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control form-control-user" id="exampleInputPassword"
                                placeholder="Enter Password..." name="password">
                        </div>
                        <div class="form-group">
                            <select class="form-control" name="role" style="border-radius: 40px; height: 50px;">
                                <option value="admin">Admin</option>
                                <option value="petugas">Petugas</option>
                                <option value="user">User</option>
                            </select>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Register</button>
                </div>
                </form>
            </div>
        </div>
    </div>

@endsection
