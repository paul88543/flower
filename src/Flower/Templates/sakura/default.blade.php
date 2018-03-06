{{-- Part of flower project. --}}

@extends('_global.html')

{{--@section('banner')--}}
    {{--@parent --}}{{-- 繼承原本版型的內容 --}}
    {{--<h1>Banner In Sakura</h1>--}}
{{--@stop --}}{{-- 裡面都用stop --}}

@section('content')
    <div class="container">
        {{--0226--}}
        <h1>Hello Sakura Default:</h1>
        {{--{{ $foo ?? 'aa' }}--}}

        {{--<hr/>--}}
        {{--0306--}}
        {{ show($sakura) }}

        <form action="{{ $router->route('sakura') }}" method="post">
            <input type="hidden" name="id" value="{{ $sakura->id or '' }}"/>
            <br/>

            <label>Title</label>
            <input type="text" name="title" value="{{ $sakura->title or '' }}"/>
            <br/>

            <label>Age</label>
            <input type="text" name="age" value="{{ $sakura->age or '' }}"/>
            <br/>

            <label>Height</label>
            <input type="text" name="height" value="{{ $sakura->height or '' }}"/>
            <br/>

        <button>Submit</button>
        </form>
        <br/>
        <a class="btn btn-primary" href=" {{ $router->route('sakuras') }}">
            Back to List
        </a>

        {{--@foreach($info as $key => $value)--}}
            {{--<p>--}}
                {{--{{ ucfirst($key) }}: {{ $value }}--}}
            {{--</p>--}}
        {{--@endforeach--}}

        {{--<p>Location: {{ $location }}</p>--}}
        {{--<p>Age: {{ $age }}</p>--}}
        {{--<p>Height: {{ $height }}</p>--}}

        {{--0227--}}
        {{--<a href="{{ $router->route('olive') }}">--}}
            {{--To Olive--}}
        {{--</a>--}}

        {{--<form action="{{ $router->route('sakura') }}" method="post">--}}
            {{--<label for="input-location">Location</label>--}}
            {{--<input id="input-location" type="text" name="location" />--}}

            {{--PATCH|PUT大多數時候都要大寫--}}
            {{--<input type="text" name="_method" value="PATCH" />--}}

            {{--<button>Submit</button>--}}
        {{--</form>--}}

    </div>
@stop

