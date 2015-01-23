<div id="webTab" class="row">

    <div class="col-md-2">
        @include('includes.list-group',array('belong' => 'web'))
    </div>

    <div id="webProduct" class="col-md-9">
        @include('includes.product',array('number' => '106','belong' => 'web'))
    </div>
</div>
@section('foot_script')
    <script>
        $("#webTab li").click(function(){
            var index = $(this).data('value');
            var url = 'http://localhost/style/'+index;
            var clickLi = $(this);
            jQuery.getJSON(url,function(){

            }).done(function(result){
                $("#webTab li").removeClass('active');//全部移除
                clickLi.addClass('active');//添加当前被点击的
                alert(result[2].descriptions);
            });
        });
    </script>
    @parent
@stop