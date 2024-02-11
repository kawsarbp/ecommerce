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
            <h4 class="section-subtitle"><b>Sub Category</b> Create Form</h4>

            @include('message.message')
            <div class="panel">
                <div class="panel-content">

                    <div class="row">
                        <div class="col-md-12">
                            <form class="form-horizontal" method="POST" action="{{ route('subcategory.store') }}">
                                @csrf
                                <h5 class="mb-lg">Sub Category Add Form</h5>
                                <div class="form-group">
                                    <label for="category_id" class="col-sm-3 control-label">Category Name</label>
                                    <div class="col-sm-9">
                                        <select  name="category" id="category_id" class="form-control">
                                            <option value="">Select Category</option>
                                            @foreach($categories as $category)
                                            <option  value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endforeach
                                        </select>

                                        @error('category') <div class="text-danger">{{ $message }}</div> @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="brand_name" class="col-sm-3 control-label">Sub Category Name</label>
                                    <div class="col-sm-9">
                                        <input type="text"  name="name" class="form-control" id="name" value="{{ old('name') }}" placeholder="Sub Category Name">
                                        @error('name') <div class="text-danger">{{ $message }}</div> @enderror
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-sm-offset-3 col-sm-9">
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
