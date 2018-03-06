{{-- Part of flower project. --}}

<h1>This is Olive Template of yoo</h1>

<a href="{{ $router->route('sakura', ['location'=> 'Japan', 'age'=> 25, 'height'=> 171, 'color'=> 'yellow']) }}">
    To Sakura
</a>

<pre>
    {{--基本的route--}}
    {{ $router->route('sakura') }}

    {{--加入參數--}}
    {{ $router->route('sakura', ['id'=> 4]) }}
    {{--/03-Project/flower/www/dev.php/flower/sakura?id=4--}}

    {{--加入參數的另一種方式--}}
    {{ $router->to('sakura')->id(123)->page(4)->addVar('foo', 'boo') }}
    {{--/03-Project/flower/www/dev.php/flower/sakura?id=123&page=4&foo=boo--}}

    {{--預先設定的Route 放在a Tag 的 href中會變成#，開發模式會變成警告視窗--}}
    {{--@route('sakura_no_exists')--}}
</pre>
