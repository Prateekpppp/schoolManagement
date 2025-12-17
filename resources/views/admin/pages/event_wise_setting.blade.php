@extends('admin.master')

@section('body')
<div class="container-fluid p-4">
    <div class="row">
        <!-- Table with event settings -->
        <div class="col-12">
            <div class="card-header bg-primary text-white p-2">
                <h4 class="mb-0">Event General Settings</h4>
            </div>
            <div class="p-3 rounded shadow">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover">
                        <thead>
                            <tr>
                                <th>Name</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Soccer</td>
                            </tr>
                            <tr>
                                <td>Tennis</td>
                            </tr>
                            <tr>
                                <td>Horse Racing</td>
                            </tr>
                            <tr>
                                <td>Cricket</td>
                            </tr>
                            <tr>
                                <td>Greyhound Racing</td>
                            </tr>
                            <tr>
                                <td>Kabaddi</td>
                            </tr>
                            <tr>
                                <td>Basketball</td>
                            </tr>
                            <tr>
                                <td>Politics</td>
                            </tr>
                            <tr>
                                <td>Virtual Sports</td>
                            </tr>
                            <tr>
                                <td>Binary</td>
                            </tr>
                            <tr>
                                <td>Lottery</td>
                            </tr>
                            <tr>
                                <td>Casino</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
