{{-- Part of flower project. --}}
@extends('_global.html')

@section('content')
    <div class="container">
        <h2>Sakuras</h2>

        <a href="{{ $router->route('sakura', ['layout' => 'edit']) }}">
            Create
        </a>

        <table class="table table-bordered">
            <tbody>
            @foreach ($sakuras as $sakura)
                <tr>
                    <td>
                        {{ $sakura->id }}
                    </td>
                    <td>
                        <a href="{{ $sakura->viewlink }}">
                            {{ $sakura->title }}
                        </a>

                        (<a href="{{ $sakura->editlink }}">
                            編輯
                        </a>)
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
                    <td>
                        {{ $sakura->date }}
                    </td>
                </tr>
            @endforeach

            </tbody>
        </table>
    </div>

@stop
