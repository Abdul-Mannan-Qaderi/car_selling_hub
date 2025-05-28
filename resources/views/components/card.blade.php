@props(['color', 'bgColor'=>'white'])     <!--  we can define default values for variales in the method  -->

{{-- {{   dump($attributes)   }} --}}

<div {{$attributes
    ->merge(['lang'=>'Persian'])
    ->class("card card-text-$color card-bg-$bgColor")
    }}>
    <div {{
        $title
        ->attributes
        ->class("card-header")
    }}>{{ $title }}</div>



    @if($slot->isEmpty())
        <div>please provide some content</div>
    @else
        {{ $slot }}
    @endif
    <div>{{ $footer}}</div>
<div>
