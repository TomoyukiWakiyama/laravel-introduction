@extends('layouts.helloapp')

@section('title', 'Person.delete')

@section('menubar')
    @parent
    削除ページ
@endsection

@section('content')
    <form action="/person/del" method="POST">
        <table>
            @csrf
            <!-- これでURLパラメータの?id=* から情報をとっている..? -->
            <!-- URLでid指定で記載することで、普通ならフォームを使って送信しているものをURL直打ちして送っている -->
            <!-- つまり、inputフォームにIDを入力しているのと同じ -->
            <input type="hidden" name="id" value="{{$form->id}}">
            <tr>
                <th>name:</th>
                <td>{{$form->name}}</td>
            </tr>
            <tr>
                <th>mail:</th>
                <td>{{$form->mail}}</td>
            </tr>
            <tr>
                <th>age:</th>
                <td>{{$form->age}}</td>
            </tr>
            <tr>
                <th></th>
                <td><input type="submit" value="delete"></td>
            </tr>
        </table>
    </form>
@endsection

@section('footer')
    copyright 2022 Tomoyuki.
@endsection