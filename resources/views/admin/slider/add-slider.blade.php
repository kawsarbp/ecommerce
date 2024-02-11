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
        <div class="col-sm-offset-2 col-sm-8">
            <h4 class="section-subtitle"><b>Slider</b> Create Form</h4>

            @include('message.message')
            <div class="panel">
                <div class="panel-content">

                    <div class="row">
                        <div class="col-md-12">
                            <form class="form-horizontal" method="POST" action="{{ route('slider.store') }}" enctype="multipart/form-data">
                                @csrf
                                <h5 class="mb-lg">Create your Slider</h5>
                                <div class="form-group">
                                    <label for="title" class="col-sm-2 control-label">Title</label>
                                    <div class="col-sm-10">
                                        <input type="text"  name="title" class="form-control" id="title" value="{{ old('title') }}" placeholder="Title">
                                        @error('title') <div class="text-danger">{{ $message }}</div> @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="sub_title" class="col-sm-2 control-label">Sub Title</label>
                                    <div class="col-sm-10">
                                        <input type="text"  name="sub_title" class="form-control" id="sub_title" value="{{ old('sub_title') }}" placeholder="Sub Title">
                                        @error('sub_title') <div class="text-danger">{{ $message }}</div> @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="url" class="col-sm-2 control-label">URL</label>
                                    <div class="col-sm-10">
                                        <input type="url"  name="url" class="form-control" id="url" value="{{ old('url') }}" placeholder="URL">
                                        @error('url') <div class="text-danger">{{ $message }}</div> @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="start_date" class="col-sm-2 control-label">Start Date</label>
                                    <div class="col-sm-10">
                                        <input type="date"  name="start_date" class="form-control" id="start_date" value="{{ old('start_date') }}" placeholder="YYYY-MM-DD">
                                        @error('start_date') <div class="text-danger">{{ $message }}</div> @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="end_date" class="col-sm-2 control-label">End Date</label>
                                    <div class="col-sm-10">
                                        <input type="date"  name="end_date" class="form-control" id="end_date" value="{{ old('end_date') }}" placeholder="YYYY-MM-DD">
                                        @error('end_date') <div class="text-danger">{{ $message }}</div> @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="photo" class="col-sm-2 control-label">Photo</label>
                                    <div class="col-sm-10">
                                        <input type="file"  name="photo" class="form-control" id="photo" value="{{ old('photo') }}">
                                        @error('photo') <div class="text-danger">{{ $message }}</div> @enderror
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-sm-offset-2 col-sm-10">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
