<ul class="list-group">
    <?php
        $hh = $$belong;
        $length = count($hh);
    ?>
    @for($i = 0; $i < $length;$i++)
            <?php $component = $hh[$i];?>
        @if($i===0)
            <li class="list-group-item list-group-item-info active" data-value="{{$component->id}}">
        @else
            <li class="list-group-item list-group-item-info" data-value="{{$component->id}}">
        @endif
                <span class="badge">{{$component->numbers}}</span>
                <i class="fa {{$component->icon}}"> {{$component->chinese_name}}</i>
            </li>
    @endfor
    {{--<li class="list-group-item list-group-item-info">
        <span class="badge">2</span>
        <i class="fa fa-list"> ListView</i>
    </li>
    <li class="list-group-item list-group-item-info">
        <span class="badge">2</span>
        <i class="fa fa-file"> File</i>
    </li>
    <li class="list-group-item list-group-item-info">
        <span class="badge">8</span>
        <i class="fa fa-table"> GirdView</i>
    </li>
    <li class="list-group-item list-group-item-info">
        <span class="badge">6</span>
        <i class="fa fa-bar-chart"> Chart</i>
    </li>--}}
</ul>

