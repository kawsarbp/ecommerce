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
                    <div class="table-responsive product-on-change">
                        <table id="basic-table" class="data-table table table-striped nowrap table-hover"
                               cellspacing="0" width="100%">
                            <thead>
                            <tr>
                                <th>Serial No</th>
                                <th>Mame</th>
                                <th>Model</th>
                                <th>Buying</th>
                                <th>Selling</th>
                                <th>Special</th>
                                <th>Special Price Date</th>
                                <th>Quantity</th>
                                <th>Thumbnail</th>
                                <th>Gallery</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($products as $product)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ substr($product->name,0,15) }}...</td>
                                    <td>{{ $product->model }}</td>
                                    <td><input type="text" class="form-control" value="{{ $product->buying_price }}"></td>
                                    <td>{{ $product->selling_price }}</td>
                                    <td>{{ $product->special_price }}</td>
                                    <td>{{ date('d, M-Y',strtotime($product->special_start)) .' - '.  date('d, M-Y',strtotime($product->special_end))   }}</td>
                                    <td>{{ $product->quantity }}</td>
                                    <td><img style="width: 50px;" src="{{asset('uploads/thumbnail').'/'.$product->thumbnail}}" alt=""></td>
                                    <td>

                                            <?php
                                            $images = json_decode($product->gallery);
                                        if (is_array($images) || is_object($images)) {
                                        foreach ($images as $file) {
                                            ?>
                                        <img src="{{ asset('uploads/gallery/'.$file) }}" style="width: 50px;" alt="">
                                        <?php }
                                        } ?>
                                    </td>

                                    <td>
                                        <input type="checkbox" id="product-status" data-id="{{$product->id}}"
                                               {{ $product->status === 'active' ?'checked':'' }} data-toggle="toggle"
                                               data-on="Active" data-off="Inactive" data-size="mini">
                                    </td>
                                    <td>
                                        <a href="# {{route('product.edit',base64_encode($product->id))}}"
                                           class="btn btn-info btn-sm"><i class="fa fa-edit"></i> Edit</a>
                                        <a href="{{route('product.delete',base64_encode($product->id))}}"
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
