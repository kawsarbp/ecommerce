<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Load More with AJAX</title>
    <link rel="stylesheet" href="{{asset('site/assets/css/bootstrap.min.css')}}">
    <script src="{{asset('site/assets/js/jquery-1.11.1.min.js')}}"></script>
</head>
<body>

<div class="container my-5">
    <h2 class="text-center">Load More with AJAX</h2>
    @csrf
    <div id="get-subcategory"></div>
</div>

<script>
    var token = $('input[name="_token"]').val();
    load_more('', token)
    function load_more(id = "", token) {
        $.ajax({
            url: '{{route('loadMore')}}',
            method: 'POST',
            data: {id: id, _token: token},
            success: function (result) {
                $("#loadMoreBtn").remove();
                $("#get-subcategory").append(result);
            }
        });
    }
    $('body').on("click","#loadMoreBtn",function (){
        var id = $(this).data('id');
        $("#loadMoreBtn").html('Loading');
        load_more(id,token);
    });
</script>
</body>
</html>
