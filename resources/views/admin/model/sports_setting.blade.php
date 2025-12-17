@extends('admin.model.master')

@section('title', 'Modal Title')

@section('form')
    <form action="#" method="POST">
        <div class="table-responsive">
            <table class="table table-bordered align-middle text-center">
                <thead class="table-light">
                    <tr>
                        <th>Sr.No.</th>
                        <th>Sport Name</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Cricket</td>
                        <td>
                            <input class="form-check-input" type="checkbox" name="cricket">
                            <a type="button" class="btn btn-sm btn-danger ms-2">✖</a>
                        </td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Tennis</td>
                        <td>
                            <input class="form-check-input" type="checkbox" name="tennis">
                            <a type="button" class="btn btn-sm btn-danger ms-2">✖</a>
                        </td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>Casino</td>
                        <td>
                            <input class="form-check-input" type="checkbox" name="casino">
                            <a type="button" class="btn btn-sm btn-danger ms-2">✖</a>
                        </td>
                    </tr>
                    <tr>
                        <td>4</td>
                        <td>Soccer</td>
                        <td>
                            <input class="form-check-input" type="checkbox" name="soccer">
                            <a type="button" class="btn btn-sm btn-danger ms-2">✖</a>
                        </td>
                    </tr>
                    <tr>
                        <td>5</td>
                        <td>Horse Racing</td>
                        <td>
                            <input class="form-check-input" type="checkbox" name="horse_racing">
                            <a type="button" class="btn btn-sm btn-danger ms-2">✖</a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </form>
@endsection
