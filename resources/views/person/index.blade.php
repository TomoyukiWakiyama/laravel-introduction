@extends('layouts.helloapp')
@section('title', 'Peson.index')

@section('menubar')
    @parent
    インデックスページ
@endsection

@section('content')
    <table>
        <tr><th>Data</th></tr>
        @foreach ($items as $item)
            <tr>
                <td>{{$item->getData()}}</td>
                <td>
                    @if ($item->board != null)
                    <table>
                        @foreach ($item->boards as $obj)
                            <tr><td>{{$obj->getData()}}</td></tr>
                        @endforeach
                    </table>
                    @endif
                </td>
            </tr>
        @endforeach
    </table>
@endsection

@section('footer')
    copyright 2022 Tomoyuki.
@endsection