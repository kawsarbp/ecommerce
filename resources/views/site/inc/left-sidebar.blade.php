@php use function PHPUnit\Framework\isEmpty; @endphp
<!-- ================================== TOP NAVIGATION ================================== -->
<div class="side-menu animate-dropdown outer-bottom-xs">
    <div class="head"><i class="icon fa fa-align-justify fa-fw"></i> Categories</div>
    <nav class="yamm megamenu-horizontal">
        <ul class="nav">

            @foreach($categories as $category)
                <li class="dropdown menu-item"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><i
                            class="icon fa fa-shopping-bag" aria-hidden="true"></i>{{ $category->name }}</a>
                    <ul class="dropdown-menu mega-menu">
                        <li class="yamm-content">
                            <div class="row">
                                @if($category->subcategory->isEmpty())
                                    <h5 class="text-center">No Subcategory Available</h5>
                                @else
                                    @foreach($category['subcategory'] as $subcat)
                                        <div class="col-sm-4 col-md-3">
                                            <a href="{{ route('category',$subcat->slug) }}">{{ $subcat->name }}</a>
                                        </div>
                                    @endforeach
                                @endif

                            </div>
                        </li>
                    </ul>
                </li>
            @endforeach

        </ul>
        <!-- /.nav -->
    </nav>
    <!-- /.megamenu-horizontal -->
</div>
<!-- /.side-menu -->
<!-- ================================== TOP NAVIGATION : END ================================== -->
