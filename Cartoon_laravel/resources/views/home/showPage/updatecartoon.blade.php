@extends('layouts.index')

@section('style')
     <link rel="stylesheet" href="{{url('/css/home/showpage/updatecartoon.css')}}">
     <script src="{{url('/js/common/jquery-1.8.3.min.js')}}"></script>
@endsection


@section('content')
     <div class="update_main">
          {{-- 开始流 --}}
          <div id='main'>
               <div class='date_module'>

                    <ul class='ul_main'>

                    </ul>
               </div>
          </div>
          {{-- 关闭流 --}}
     </div>
@endsection


@section('bottom')

@show

@section('script')
     <script src="{{"/js/home/showpage/updatecartoon.js"}}"></script>
@endsection
