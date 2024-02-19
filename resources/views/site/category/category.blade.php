@php use function PHPUnit\Framework\isEmpty; @endphp
@extends('site.inc.layouts')
@section('content')

    <div class="body-content outer-top-xs">
        <div class='container'>
            <div class='row'>
                <div class='col-md-12'>
                    <div class="search-result-container ">
                        <div id="myTabContent" class="tab-content category-list">
                            <div class="tab-pane active " id="grid-container">
                                <div class="category-product">
                                    @csrf
                                    <input type="hidden" value="{{$subSlug}}" name="slug">
                                    <div class="row" id="get-items">

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>



<script>

    var token = $('input[name="_token"]').val();
    var slug = $('input[name="slug"]').val();
    load_more('', token)
    function load_more(id = "", token) {
        $.ajax({
            url: '{{route('loadMore')}}',
            method: 'POST',
            data: {id: id, _token: token,slug:slug},
            success: function (result) {
                $("#loadMoreBtn").remove();
                $("#get-items").append(result);
            }
        });
    }

    $('body').on("click","#loadMoreBtn",function (){
        var id = $(this).data('id');
        $("#loadMoreBtn").html('Loading...');
        load_more(id,token);
    });

</script>


@endsection
