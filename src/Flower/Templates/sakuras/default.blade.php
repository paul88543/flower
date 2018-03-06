{{-- Part of flower project. --}}
@extends('_global.html')

@section('content')
    <div class="container">
        <table class="table-bordered">
            <h2>Sakuras</h2>

            <tbody>
            @foreach ($sakuras as $sakura)
                <tr>
                    <td>
                        {{ $sakura->id }}
                    </td>
                    <td>
                        <a href="{{ $router->route('sakura',['id' => $sakura->id]) }}">
                            {{ $sakura->title }}
                        </a>
                    </td>
                    <td>
                        {{ $sakura->age }}
                    </td>
                    <td>
                        {{ $sakura->height }}
                    </td>
                    <td>
                        {{ $sakura->location }}
                    </td>
                </tr>
            @endforeach

            </tbody>
        </table>
    </div>

@stop
