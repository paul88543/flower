{{-- Part of flower project. --}}

@extends('_global.html')

{{--@section('banner')--}}
    {{--@parent --}}{{-- 繼承原本版型的內容 --}}
    {{--<h1>Banner In Sakura</h1>--}}
{{--@stop --}}{{-- 裡面都用stop --}}

@section('content')
    <div class="container">
        <h1>Edit Sakura</h1>

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

            <label>Location</label>
            <input type="text" name="location" value="{{ $sakura->location or '' }}"/>
            <br/>

        <button class="btn btn-dark">Submit</button>
        </form>

        <br/>
        <a href="{{ $router->route('sakuras') }}">
            Back to Sakura List
        </a>
        |
        <a href="{{ $router->route('sakura') }}">
            Cancel
        </a>

    </div>
@stop

