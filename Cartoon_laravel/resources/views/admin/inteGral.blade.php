@extends('layouts.master')
@section('content')
    <div class="result_wrap" style="padding: 30px;">
        <div class="result_content">
            <table class="table table-hover">
                <tr>
                    <th>ID</th>
                    <th>邮箱</th>
                    <th>积分</th>
                    <th>在线时间</th>
                    <th>操作</th>
                </tr>
                @foreach($inted as $k)
                    <tr>
                        <td class="tc">{{$k->id}}</td>
                        <td>{{$k->email}}</td>
                        <td>{{$k->gral}}</td>
                        <td>{{$k->time}}</td>
                        <td>
                            <a href="integral-delete/{{$k->id}}">删除</a>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
@endsection