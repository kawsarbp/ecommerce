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
        <div class="col-md-12">
            <div class="panel">
                <div class="panel-content">
                    @include('message.message')
                    <div class="table-responsive slider-on-change">
                        <table id="basic-table" class="data-table table table-striped nowrap table-hover"
                               cellspacing="0" width="100%">
                            <thead>
                            <tr>
                                <th>Serial No</th>
                                <th>Title</th>
                                <th>Sub Title</th>
                                <th>Date</th>
                                <th>Url</th>
                                <th>Image</th>
                                <th>Status</th>
                                <th>action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($sliders as $slider)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $slider->title }}</td>
                                    <td>{{ substr($slider->sub_title,0,15) }}...</td>
                                    <td>{{ date('d M,Y',strtotime($slider->start_date)) .' - '. date('d M,Y',strtotime($slider->end_date)) }}</td>
                                    <td>
                                        <a href="{{ $slider->url }}" target="_blank" class="btn btn-primary btn-sm">Click
                                            Here</a>
                                    </td>
                                    <td>
                                        <?php
                                        $images = json_decode($slider->photo);
                                        if (is_array($images) || is_object($images)) {
                                        foreach ($images as $file) {
                                            ?>
                                        <img src="{{ asset('uploads/slider/'.$file) }}" style="width: 50px;" alt="">
                                        <?php }
                                        } ?>
                                    </td>
                                    <td>
                                        <input type="checkbox" id="slider-status" data-id="{{$slider->id}}"
                                               {{ $slider->status === 'active' ?'checked':'' }} data-toggle="toggle"
                                               data-on="Active" data-off="Inactive" data-size="mini">
                                    </td>
                                    <td>
                                        <a href="# {{--{{route('slider.edit',base64_encode($slider->id))}}--}}"
                                           class="btn btn-info btn-sm"><i class="fa fa-edit"></i> Edit</a>
                                        <a href="{{route('slider.delete',base64_encode($slider->id))}}"
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
