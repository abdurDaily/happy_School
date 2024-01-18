@extends('layouts.admin_master')
@section('page_title', 'Admin - Dashboard')
@section('admin_main_content')










    <div class="container-xxl flex-grow-1 container-p-y">

        <div class="row">
            <div class="col-lg-8 mb-4 order-0">
                <div class="card">
                    <div class="d-flex align-items-end row">
                        <div class="col-sm-7">
                            <div class="card-body">
                                <h5 class="card-title text-primary"> <span style="color:rgb(5, 26, 26);">Welcome</span>
                                    {{ Auth::guard('admin')->user()->name }} 🎉</h5>
                                <p class="mb-4">{{ Auth::guard('admin')->user()->employee_about }}</p>

                                <a href="" class="btn btn-sm btn-outline-primary">View Website</a>
                            </div>
                        </div>
                        <div class="col-sm-5 text-center text-sm-left">
                            <div class="card-body pb-0 px-0 px-md-4">
                                <img style="padding: 0 0 20px 0;" src="{{ Auth::guard('admin')->user()->employee_image }}"
                                    height="140" alt="View Badge User"
                                    data-app-dark-img="illustrations/man-with-laptop-dark.png"
                                    data-app-light-img="illustrations/man-with-laptop-light.png">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 order-1">
                <div class="row">
                    <div class="col-lg-6 col-md-12 col-6 mb-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="card-title d-flex align-items-start justify-content-between">
                                    <div class="avatar flex-shrink-0">
                                        <span style="font-size:25px;"><i class="fa-solid fa-graduation-cap"></i></span>
                                    </div>
                                    <div class="dropdown">
                                        <button class="btn p-0" type="button" id="cardOpt3" data-bs-toggle="dropdown"
                                            aria-haspopup="true" aria-expanded="false">
                                            <i class="bx bx-dots-vertical-rounded"></i>
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt3">
                                            <a class="dropdown-item" href="javascript:void(0);">View More</a>
                                            <a class="dropdown-item" href="javascript:void(0);">Delete</a>
                                        </div>
                                    </div>
                                </div>
                                <span class="fw-medium d-block mb-1">Total Student's</span>
                                <h3 class="card-title mb-2" style="color: rgb(11, 253, 47);">{{ $admissioncount }}</h3>
                                {{-- <small class="text-success fw-medium"><i class="bx bx-up-arrow-alt"></i> +72.80%</small> --}}
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6 col-md-12 col-6 mb-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="card-title d-flex align-items-start justify-content-between">
                                    <div class="avatar flex-shrink-0">
                                        <span style="font-size:25px;"><i class="fa-solid fa-graduation-cap"></i></span>
                                    </div>
                                    <div class="dropdown">
                                        <button class="btn p-0" type="button" id="cardOpt3" data-bs-toggle="dropdown"
                                            aria-haspopup="true" aria-expanded="false">
                                            <i class="bx bx-dots-vertical-rounded"></i>
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt3">
                                            <a class="dropdown-item" href="javascript:void(0);">View More</a>
                                            <a class="dropdown-item" href="javascript:void(0);">Delete</a>
                                        </div>
                                    </div>
                                </div>
                                <span class="fw-medium d-block mb-1">Total Staff</span>
                                <h3 class="card-title mb-2" style="color: rgb(11, 253, 47);">{{ $adminCount }}</h3>
                                {{-- <small class="text-success fw-medium"><i class="bx bx-up-arrow-alt"></i> +72.80%</small> --}}
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>




        <div class="row">
            <!-- NOTICE START-->
            <div class="col-md-6 col-lg-4 col-xl-4 order-0 mb-4">
                <div class="card h-100">
                    <div class="card-header d-flex align-items-center justify-content-between pb-0">
                        <div class="card-title mb-0">
                            <h5 class="m-0 me-2">Latest Notice's</h5>
                            <small class="text-muted">42.82k Total Sales</small>
                        </div>
                        <div class="dropdown">
                            <button class="btn p-0" type="button" id="orederStatistics" data-bs-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                <i class="bx bx-dots-vertical-rounded"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="orederStatistics">
                                {{-- <a class="dropdown-item" href="javascript:void(0);">Select All</a> --}}
                                <a class="dropdown-item" href="{{ route('admin.notice.create') }}">Add Notice</a>
                                <a class="dropdown-item" href="{{ route('admin.notice.show') }}">All Notice</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-3" style="position: relative;">
                            <table class="table table-hover table-striped mt-3">
                                <tr>
                                    <td>SN.</td>
                                    <td>Title</td>
                                    <td align="right">PDF</td>
                                </tr>

                                @forelse ($notice as $key=>$noticeData)
                                    <tr>
                                        <td>{{ ++$key }}</td>
                                        <td>{{ Str::limit($noticeData->notice_title, 10, '...') }}</td>
                                        <td align="right">
                                            <a target="_blank" href="{{ $noticeData->notice_image }}">Download</a>
                                        </td>
                                    </tr>
                                @empty
                                @endforelse
                            </table>

                        </div>
                        <div class="notice-paginate card shadow ">
                           <span> {{ $notice->links() }}</span>

                           @push('additional_css')
                               <style>
                                .pagination{
                                    margin: 0;
                                    padding: 5px
                                }
                               </style>
                           @endpush
                        </div>
                    </div>
                </div>
            </div>
            <!--/ NOTICE END -->

            <!-- ROUTINE START -->
            <div class="col-md-6 col-lg-4 col-xl-4 order-0 mb-4">
                <div class="card h-100">
                    <div class="card-header d-flex align-items-center justify-content-between pb-0">
                        <div class="card-title mb-0">
                            <h5 class="m-0 me-2">Latest Routine's</h5>
                            <small class="text-muted">42.82k Total Sales</small>
                        </div>
                        <div class="dropdown">
                            <button class="btn p-0" type="button" id="orederStatistics" data-bs-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                <i class="bx bx-dots-vertical-rounded"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="orederStatistics">
                                <a class="dropdown-item" href="{{ route('admin.routine.create') }}">Create Routine</a>
                                <a class="dropdown-item" href="{{ route('admin.routine.list') }}">Routine List</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-3" style="position: relative;">
                            <table class="table table-hover table-striped mt-3">
                                <tr>
                                    <td>SN.</td>
                                    <td>Title</td>
                                    <td align="right">PDF</td>
                                </tr>

                                @forelse ($routine as $key=>$routineData)
                                    <tr>
                                        <td>{{ ++$key }}</td>
                                        <td>{{ Str::limit($routineData->routine_title, 10, '...') }}</td>
                                        <td align="right">
                                            <a target="_blank" href="{{ $routineData->routine_image }}">Download</a>
                                        </td>
                                    </tr>
                                @empty
                                @endforelse
                            </table>

                        </div>
                        <div class="notice-paginate card shadow ">
                           <span> {{ $routine->links() }}</span>

                           @push('additional_css')
                               <style>
                                .pagination{
                                    margin: 0;
                                    padding: 5px
                                }
                               </style>
                           @endpush
                        </div>
                    </div>
                </div>
            </div>
            <!--/ ROUTINE END -->

            <!-- Transactions -->
            <div class="col-md-6 col-lg-4 order-2 mb-4">
                <div class="card h-100">

                    <div class="card-body pb-0">


                        <div class="event-count d-flex justify-content-between align-items-center pb-3">
                            <h5 class="card-title">News &amp; Updates <span>| Today</span></h5>
                            <button type="button" class="btn btn-primary position-relative">
                                events
                                <span
                                    class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                    {{ $eventCount }}
                                    <span class="visually-hidden">unread messages</span>
                                </span>
                            </button>
                        </div>

                        <div class="news pb-3">

                            @forelse ($newEvent as $eventData)
                                <div class="post-item clearfix ">
                                    <div class="row pb-3">
                                        <div class="col-4 py-0">
                                            <img class="img-fluid" src="{{ $eventData->event_img }}" alt="">
                                        </div>
                                        <div class="col-8 p-0">
                                            <h5><a
                                                    href="{{ route('admin.event.edit', $eventData->id) }}">{{ Str::limit($eventData->event_title, 100, '...') }}</a>
                                            </h5>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <h6>No Resent Event Found!</h6>
                            @endforelse


                            <div class="row card w-100 mb-3">
                                <div class="col-12">
                                    {{ $newEvent->links() }}
                                </div>
                            </div>

                            <div class="event-btn d-flex justify-content-between">
                                <a href="{{ route('admin.event.create') }}" style="width: 48%;"
                                    class="btn btn-primary ">Add Event
                                </a>
                                <a href="{{ route('admin.event.list') }}" style="width: 48%;"
                                    class="btn btn-primary ">All Event's
                                    List</a>


                            </div>




                        </div><!-- End sidebar recent posts-->

                        
                    </div>
                </div>
            </div>
            <!--/ Transactions -->
        </div>

    </div>







@endsection


@push('additional_css')
    <style>
        .text-muted {
            display: none;
        }
    </style>
@endpush
