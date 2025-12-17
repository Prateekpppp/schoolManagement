@extends('admin.master')

@section('body')
    <div class="container-fluid p-4">
        <div class="card-header bg-primary text-white p-2">
            <h4 class="mb-0">Betting Sports</h4>
        </div>
        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>S.N.</th>
                        <th>Sport Name</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Soccer</td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Tennis</td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>Cricket</td>
                    </tr>
                    <tr>
                        <td>4</td>
                        <td>Casino</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection
