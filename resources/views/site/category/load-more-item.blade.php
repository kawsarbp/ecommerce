@if(!$products->isEmpty())

    @php($i = 0)
@foreach($products as $product)
    <div class="col-sm-4 col-md-3 wow fadeInUp">
        <div class="products">
            <div class="product">
                <div class="product-image">
                    <div class="image"><a
                            href="{{ route('product',$product->slug) }}"><img
                                src="{{ $product->thumbnail }}"
                                alt=""></a>
                    </div>

                    <div class="tag new"><span>new</span></div>
                </div>

                <div class="product-info text-left">
                    <h3 class="name"><a
                            href="{{ route('product',$product->slug) }}">{{ $product->name }}</a>
                    </h3>
                    <div class="rating rateit-small"></div>
                    <div class="description"></div>
                    <div class="product-price">
                        @php($price = false)
                        @if($product->special_start <= date('Y-m-d') && $product->special_end >= date('Y-m-d'))
                            @php($price = true)
                        @endif
                        <span
                            class="price">&#2547; {{ $price ? $product->special_price:$product->selling_price }} </span>
                        @if($price)
                            <span
                                class="price-before-discount">&#2547; {{ $product->selling_price }}</span>
                            <span class="price pull-right">&#2547;
                                                                        {{
                                                                            sprintf('%.2f',(($product->selling_price - $product->special_price)/$product->selling_price)*100)
                                                                        }}
                                                                        %off
                                                                    </span>
                        @endif
                    </div>
                </div>

                <div class="cart clearfix animate-effect">
                    <div class="action">
                        <ul class="list-unstyled">
                            <li class="add-cart-button btn-group">
                                <button class="btn btn-primary icon"
                                        data-toggle="dropdown"
                                        type="button"><i
                                        class="fa fa-shopping-cart"></i>
                                </button>
                                <button class="btn btn-primary cart-btn"
                                        type="button">Add to cart
                                </button>
                            </li>
                            <li class="lnk wishlist"><a class="add-to-cart"
                                                        href="detail.html"
                                                        title="Wishlist"> <i
                                        class="icon fa fa-heart"></i> </a>
                            </li>
                            <li class="lnk"><a class="add-to-cart"
                                               href="{{ route('product',$product->slug) }}"
                                               title="Compare"> <i
                                        class="fa fa-eye"></i> </a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @php($lastId = $product->id)
    @php($i++)
@endforeach
    @if($i > 3)
        <div class="text-center">
            <button id="loadMoreBtn" class="btn btn-info" type="button" data-id="{{ $lastId }}">Load More</button>
        </div>
    @endif
@else
    <h2 class="text-center text-danger">Data not found</h2>
@endif


