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
                    <div class="table-responsive category-on-change">
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
                            @foreach($categories as $category)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $category->name }}</td>
                                    <td>
                                        <input type="checkbox" id="category-status" data-id="{{$category->id}}" {{ $category->status === 'active' ?'checked':'' }} data-toggle="toggle" data-on="Active" data-off="Inactive" data-size="mini">
                                    </td>
                                    <td>
                                        <a href="{{route('category.edit',base64_encode($category->id))}}"
                                           class="btn btn-info btn-sm"><i class="fa fa-edit"></i> Edit</a>
                                        <a href="{{route('category.delete',base64_encode($category->id))}}"
                                           class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
