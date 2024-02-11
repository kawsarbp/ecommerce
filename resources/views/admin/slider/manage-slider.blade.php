@extends('admin.inc.layouts')
@section('content')
    <div class="content-header">
        <!-- leftside content header -->
        <div class="leftside-content-header">
            <ul class="breadcrumbs">
                <li><i class="fa fa-home" aria-hidden="true"></i><a href="#">Dashboard</a></li>
            </ul>
        </div>
    </div>
    <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
    <div class="row animated fadeInUp">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <div class="panel">
                <div class="panel-content">
                    @include('message.message')
                    <div class="table-responsive">
                        <table id="basic-table" class="data-table table table-striped nowrap table-hover"
                               cellspacing="0" width="100%">
                            <thead>
                            <tr>
                                <th>Serial No</th>
                                <th>Brand Name</th>
                                <th>Status</th>
                                <th>action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>sdfs</td>
                                <td>sdfs</td>
                                <td>sdfs</td>
                                <td>sdfs</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
