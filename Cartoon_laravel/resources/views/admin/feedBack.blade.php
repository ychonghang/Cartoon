@extends('layouts.master')
@section('content')
            <div class="result_wrap" style="padding: 30px;">
                <div class="result_content">
                    <table class="table table-hover">
                        <tr>
                            <th>ID</th>
                            <th>用户名称</th>
                            <th>用户反馈</th>
                            <th>回复反馈</th>
                            <th>操作</th>
                        </tr>
                        @foreach($feed as $k)
                            <tr>
                                <td class="tc">{{$k->id}}</td>
                                <td>{{$k->name}}</td>
                                <td>{{$k->back}}</td>
                                <td>{{$k->reply}}</td>
                                <td>
                                    <a href="feedback-feed/{{$k->id}}">回复</a>
                                    <a href="feedback-delete/{{$k->id}}">删除</a>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
@endsection