@extends('layouts.app')
@section('content')

@php
$order = DB::table('orders')->where('user_id',Auth::id())->orderBy('id','DESC')->limit(10)->get();
@endphp

<div class="contact_form">
    <div class="container">
        <div class="row">
            <div class="col-8 card">
                <table class="table table-response">
                    <thead>
                        <tr>
                            <th scope="col">付款方式</th>
                            <th scope="col">訂單編號</th>
                            <th scope="col">金額</th>
                            <th scope="col">日期 </th>
                            <th scope="col">狀態</th>
                            <th scope="col">狀態碼</th>
                            <th scope="col">功能 </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($order as $row)

                        <tr>
                            <td scope="col">{{ $row->payment_type }}</td>
                            <td scope="col">{{ $row->payment_id }}</td>
                            <td scope="col">{{ $row->total }}$ </td>
                            <td scope="col">{{ $row->date }}</td>
                            <td scope="col">

                                @if($row->status == 0)
                                <span class="badge badge-warning">待確定</span>
                                @elseif($row->status == 1)
                                <span class="badge badge-info">付款接受</span>
                                @elseif($row->status == 2)
                                <span class="badge badge-warning">處理中</span>
                                @elseif($row->status == 3)
                                <span class="badge badge-success">已交付</span>
                                @else
                                <span class="badge badge-danger">已取消</span>
                                @endif

                            </td>
                            <td scope="col">{{ $row->status_code }}</td>
                            <td scope="col">
                                <a href="" class="btn btn-sm btn-info">View</a>
                            </td>
                        </tr>
                        @endforeach

                    </tbody>

                </table>

            </div>

            <div class="col-4">
                <div class="card">
                    <img src="{{ asset('public/frontend/images/best_6.png') }}" class="card-img-top"
                        style="height: 90px; width:90px; margin-left:34%;">
                    <div class="card-body">
                        <h5 class="card-title text-center">{{ Auth::user()->name }}</h5>

                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><a href="{{ route('password.change') }}">更換密碼</a></li>
                        <li class="list-group-item">編輯個人資料</li>
                        <li class="list-group-item"> <a href="{{ route('success.orderlist') }}">返回訂單</a></li>
                    </ul>
                    <div class="card-body">
                        <a href="{{ route('user.logout') }}" class="btn btn-danger btn-sm btn-block">登出</a>
                    </div>

                </div>
            </div>

        </div>
    </div>

</div>








@endsection
