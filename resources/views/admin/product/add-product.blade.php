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
            <h4 class="section-subtitle"><b>Product</b> Create Form</h4>

            @include('message.message')
            <div class="panel">
                <div class="panel-content">

                    <div class="row">
                        <div class="col-md-12">
                            <form class="form-horizontal" method="POST" action="{{ route('product.store') }}"
                                  enctype="multipart/form-data">
                                @csrf
                                <h5 class="mb-lg">Create your Product</h5>

                                <div class="form-group">
                                    <div class="col-md-6">
                                        <label for="category" class="control-label">Category</label>
                                        <select name="category" id="category" class="form-control mySelectPicker">
                                            <option value="">Select</option>
                                            @foreach($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('category')
                                        <div class="text-danger">{{ $message }}</div> @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label for="subcategory" class="control-label">Sub Category</label>
                                        <select name="subcategory" id="subcategory" class="form-control mySelectPicker">
                                            <option value="">Select</option>
                                            @foreach($subcategories as $subcategory)
                                                <option value="{{ $subcategory->id }}">{{ $subcategory->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('subcategory')
                                        <div class="text-danger">{{ $message }}</div> @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label for="brand" class="control-label">Brand</label>
                                        <select name="brand" id="brand" class="form-control mySelectPicker">
                                            <option value="">Select</option>
                                            @foreach($brands as $brand)
                                                <option value="{{ $brand->id }}">{{ $brand->brand_name }}</option>
                                            @endforeach
                                        </select>
                                        @error('brand')
                                        <div class="text-danger">{{ $message }}</div> @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label for="name" class="control-label">Product name</label>
                                        <input type="text" name="name" value="{{ old('name') }}" id="name"
                                               placeholder="Enter product Name" class="form-control">
                                        @error('name')
                                        <div class="text-danger">{{ $message }}</div> @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label for="buying_price" class="control-label">Buying price</label>
                                        <input type="number" name="buying_price" value="{{ old('buying_price') }}"
                                               id="buying_price" placeholder="0.00" class="form-control">
                                        @error('buying_price')
                                        <div class="text-danger">{{ $message }}</div> @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label for="selling_price" class="control-label">Selling price</label>
                                        <input type="number" name="selling_price" value="{{ old('selling_price') }}"
                                               id="selling_price" placeholder="0.00" class="form-control">
                                        @error('selling_price')
                                        <div class="text-danger">{{ $message }}</div> @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label for="model" class="control-label">Product model</label>
                                        <input type="text" name="model" value="{{ old('model') }}" id="model"
                                               placeholder="Enter product model" class="form-control">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="special_price" class="control-label">Special Price</label>
                                        <input type="number" name="special_price" value="{{ old('special_price') }}"
                                               id="special_price" placeholder="0.00" class="form-control">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="special_start" class="control-label">Special Start</label>
                                        <input type="text" name="special_start" value="{{ old('special_start') }}"
                                               id="special_start" placeholder="DD-MM-YYYY"
                                               class="form-control datepicker">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="special_end" class="control-label">Special End</label>
                                        <input type="text" name="special_end" value="{{ old('special_end') }}"
                                               id="special_end" placeholder="DD-MM-YYYY"
                                               class="form-control datepicker">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="quantity" class="control-label">Product Quantity</label>
                                        <input type="number" name="quantity" value="{{ old('quantity') }}" id="quantity"
                                               placeholder="Enter Quantity" class="form-control">
                                        @error('quantity')
                                        <div class="text-danger">{{ $message }}</div> @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label for="video_url" class="control-label">Video URL</label>
                                        <input type="url" name="video_url" value="{{ old('video_url') }}" id="video_url"
                                               placeholder="Video URL" class="form-control">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="thumbnail" class="control-label">Thumbnail</label>
                                        <input type="file" name="thumbnail" id="thumbnail" class="form-control">
                                        @error('thumbnail')
                                        <div class="text-danger">{{ $message }}</div> @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label for="gallery" class="control-label">Gallery</label>
                                        <input type="file" name="gallery[]" multiple id="gallery" class="form-control">
                                        @error('gallery')
                                        <div class="text-danger">{{ $message }}</div> @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label for="warranty" class="control-label">Warranty</label>
                                        <div>
                                            <div class="radio radio-custom radio-inline radio-danger">
                                                <input type="radio" id="no" name="warranty"
                                                       value="0" checked>
                                                <label for="no">NO</label>
                                            </div>

                                            <div class="radio radio-custom radio-inline radio-primary">
                                                <input type="radio" id="yes" name="warranty"
                                                       value="1">
                                                <label for="yes">YES</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="warranty_duration" class="control-label">Warranty Duration</label>
                                        <input type="text" name="warranty_duration" value="{{ old('warranty_duration') }}" id="warranty_duration"
                                               placeholder="Warranty Duration" class="form-control">
                                    </div>
                                    <div class="col-md-12">
                                        <label for="warranty_conditions" class="control-label">Warranty Conditions</label>
                                        <textarea  name="warranty_conditions" id="warranty_conditions" cols="20" rows="10" class="form-control summernote">{{ old('warranty_conditions') }}</textarea>
                                    </div>
                                    <div class="col-md-12">
                                        <label for="description" class="control-label">Description</label>
                                        <textarea  name="description" id="description" cols="10" rows="3" class="form-control summernote">{{ old('description') }}</textarea>
                                        @error('description') <div class="text-danger">{{ $message }}</div> @enderror
                                    </div>
                                    <div class="col-md-12">
                                        <label for="long_description" class="control-label">Long Description</label>
                                        <textarea  name="long_description" id="long_description" cols="10" rows="5" class="form-control summernote">{{ old('long_description') }}</textarea>
                                    </div>
                                    <div class="col-md-12 text-center">
                                        <label for="status" class="control-label">Post Publish ? </label>
                                        <div>
                                            <div class="radio radio-custom radio-inline radio-primary">
                                                <input type="radio" id="active" name="status"
                                                       value="active" checked>
                                                <label for="active">Publish</label>
                                            </div>
                                            <div class="radio radio-custom radio-inline radio-info">
                                                <input type="radio" id="inactive" name="status"
                                                       value="inactive" >
                                                <label for="inactive">Draft</label>
                                            </div>
                                        </div>
                                        <div>@error('status')<div class="text-danger">{{ $message }}</div> @enderror</div>
                                    </div>

                                </div>

                                <div class="form-group">
                                    <div class="col-md-12 text-right">
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
