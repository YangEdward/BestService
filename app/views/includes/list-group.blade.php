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
</ul>

