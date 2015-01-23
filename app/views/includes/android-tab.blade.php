<div id="androidTab" class="row">

    <div class="col-md-2">
        @include('includes.list-group',array('belong' => 'android'))
    </div>

    <div class="col-md-9">
        @include('includes.product',array('belong' => 'android','number'=>'200'))
    </div>

</div>
@section('foot_script')
    <script>
        $("#androidTab li").click(function(){
            var index = $(this).data('value');
            var url = 'http://localhost/style/'+index;
            var clickLi = $(this);
            jQuery.getJSON(url,function(){
            }).done(function(result){
                $("#androidTab li").removeClass('active');//全部移除
                clickLi.addClass('active');//添加当前被点击的
                $("#android_products div").remove(".col-md-3");
                var board = document.getElementById("android_products");
                for(var i=0; i < result.length;i++){
                    var e2 = document.createElement("div");
                    e2.setAttribute("class", "col-md-3");
                    var pp = document.createElement( "p" );
                    pp.innerHTML = result[i].descriptions;
                    e2.appendChild(pp);
                    board.appendChild(e2)
                }
            });
        });
    </script>
    @parent
@stop