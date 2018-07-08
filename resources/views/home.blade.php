@extends('layouts.app')

@section('content')

    <div class="content ">

        @for ($i = 1; $i < 5; $i++)
            <div id="draggable{{$i}}" class="ui-widget-content draggable squeres" style="
                @if(isset($allPositions[$i]))
                    margin-top:{{$allPositions[$i]['positionX']}}px;
                    left:{{$allPositions[$i]['positionY']}}px;
                    position:absolute;
                @endif
                "
                 data-id="{{$i}}">
                <p>square {{$i}}</p>
            </div>
        @endfor
    </div>

@endsection

