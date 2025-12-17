@extends('admin.master')
@section('body')
    <div class="container-fluid p-4">
        <div class="pl-body px-2">

            <!-- Filter Card -->
            <div class="card pl-card border border-primary p-1 mb-4">
                <div class="pl-header"></div>
                <form>
                    <div class="row g-3 align-items-end">
                        <div class="col-4 col-md-4 col-lg-2">
                            <label for="data-source" class="form-label">Data Source</label>
                            <select id="data-source" class="form-select form-select-sm">
                                <option selected>LIVE DATA</option>
                                <option>PREVIOUS DATA</option>
                            </select>
                        </div>
                        <div class="col-4 col-md-4 col-lg-2">
                            <label for="fromDate" class="form-label">From Date:</label>
                            <input type="text" id="fromDate" name="fromDate" class="form-control"
                                value="2025-09-08T00:00" />
                        </div>

                        <div class="col-4 col-md-4 col-lg-1">
                            <label for="from-time" class="form-label">Time</label>
                            <input type="time" id="from-time" class="form-control form-control-sm" value="00:00">
                        </div>
                        <div class="col-4 col-md-4 col-lg-2">
                            <label for="toDate" class="form-label">To Date:</label>
                            <input type="text" id="toDate" name="toDate" class="form-control"
                                value="2025-09-15T00:00" />
                        </div>
                        <div class="col-4 col-md-4 col-lg-1">
                            <label for="to-time" class="form-label">Time</label>
                            <input type="time" id="to-time" class="form-control form-control-sm" value="23:59">
                        </div>
                        <div class="col-4 col-md-4 col-lg-2">
                            <a type="submit" class="btn btn-primary w-100 btn-sm">Get P&L</a>
                        </div>
                        <div class="col-4 col-md-4 col-lg-2">
                            <a type="reset" class="btn btn-secondary w-100 btn-sm">Reset</a>
                        </div>
                    </div>
                </form>
            </div>

            <!-- Table + Controls Card -->
            <div class="card pl-card p-1">
                <div class="pl-header text-center bg-primary text-white py-1 rounded">Profit & Loss Table</div>

                <!-- Table Controls -->
                <div class="row mb-3 d-flex flex-nowrap align-items-center">
                    <div class="col-6 d-flex align-items-center">
                        <label class="me-2 mb-0" for="show-entries">Show</label>
                        <select id="show-entries" class="form-select w-auto ">
                            <option>10</option>
                            <option>25</option>
                            <option>50</option>
                            <option>100</option>
                        </select>
                        <span class="ms-2">entries</span>
                    </div>
                    <div class="col-6 d-flex justify-content-end align-items-center">
                        <label class="me-2 mb-0" for="search">Search:</label>
                        <input type="search" id="search"
                            class="form-control w-auto form-control-sm border border-primary" style="min-width: 120px;">
                    </div>
                </div>
                <!-- Table -->
                <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>User Name</th>
                                <th>Profit/Loss</th>
                                <th>Downline Profit/Loss</th>
                                <th>Commission</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td colspan="4" class="text-center text-white">No data!</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <!-- Pagination -->
                <div class="d-flex justify-content-between align-items-center mt-3">
                    <div>Showing 1 to 10 of 0 entries</div>
                    <nav>
                        <ul class="pagination pagination-sm mb-0">
                            <li class="page-item disabled"><a class="page-link" href="#">First</a></li>
                            <li class="page-item disabled"><a class="page-link" href="#">Previous</a></li>
                            <li class="page-item disabled"><a class="page-link" href="#">Next</a></li>
                            <li class="page-item disabled"><a class="page-link" href="#">Last</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
@endsection
