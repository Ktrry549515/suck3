@extends('layouts.app')

@section('content')

@include('layouts.menubar')

@php
$setting = DB::table('settings')->first();
$charge = $setting->shipping_charge;
$vat = $setting->vat;
@endphp

<link rel="stylesheet" type="text/css" href="{{  asset('public/frontend/styles/contact_styles.css') }}">
<link rel="stylesheet" type="text/css" href="{{  asset('public/frontend/styles/contact_responsive.css') }}">

<div class="contact_form">
    <div class="container">
        <div class="row">
            <div class="col-lg-7" style="border: 2px solid gray;padding:20px;border-radius:25px;">
                <div class="contact_form_container">
                    <div class="contact_form_title text-center">購物車產品</div>


                    <div class="cart_items">
                        <ul class="cart_list">

                            @foreach($cart as $row)

                            <li class="cart_item clearfix">

                                <div class="cart_item_info d-flex flex-md-row flex-column justify-content-between">

                                    <div class="cart_item_name cart_info_col">
                                        <div class="cart_item_title"><b>產品圖片
                                            </b></div>
                                        <div class="cart_item_text">
                                            <img src="{{ asset($row->options->image) }}" style="width:70px; width:70px;"
                                                alt=""></div>
                                    </div>

                                    <div class="cart_item_name cart_info_col">
                                        <div class="cart_item_title"><b>產品名稱</b></div>
                                        <div class="cart_item_text">{{ $row->name }}</div>
                                    </div>

                                    @if($row->options->color ==NULL)

                                    @else
                                    <div class="cart_item_color cart_info_col">
                                        <div class="cart_item_title"><b>顏色</b></div>
                                        <div class="cart_item_text">{{ $row->options->color }}</div>
                                    </div>
                                    @endif

                                    @if($row->options->size ==NULL)

                                    @else
                                    <div class="cart_item_color cart_info_col">
                                        <div class="cart_item_title"><b>尺寸</b></div>
                                        <div class="cart_item_text">{{ $row->options->size }}</div>
                                    </div>
                                    @endif


                                    <div class="cart_item_quantity cart_info_col">
                                        <div class="cart_item_title"><b>數量</b></div>
                                        <div class="cart_item_text">{{ $row->qty }}</div>
                                    </div>

                                    <div class="cart_item_price cart_info_col">
                                        <div class="cart_item_title"><b>價錢</b></div>
                                        <div class="cart_item_text">${{ $row->price }}</div>
                                    </div>

                                    <div class="cart_item_total cart_info_col">
                                        <div class="cart_item_title"><b>總計</b></div>
                                        <div class="cart_item_text">${{ $row->price* $row->qty }}</div>
                                    </div>

                                </div>
                            </li>

                            @endforeach

                        </ul>
                    </div>


                    <ul class="list-group col-lg-8" style="float: right;">
                        @if(Session::has('coupon'))

                        <li class="list-group-item">小計: <span
                                style="float: right;">${{ Session::get('coupon')['balance'] }}</span>
                        </li>
                        <li class="list-group-item">優惠券: ({{ Session::get('coupon')['name'] }})
                            <a href="{{ route('coupon.remove') }}" class="btn btn-danger btn-sm">x</a>
                            <span style="float: right;">${{ Session::get('coupon')['discount'] }}</span></li>

                        @else
                        <li class="list-group-item">小計: <span style="float: right;">${{ Cart::Subtotal() }}</span>
                        </li>
                        @endif

                        <li class="list-group-item">運費: <span style="float: right;">${{ $charge }}</span>
                        </li>
                        <li class="list-group-item">稅: <span style="float: right;">${{ $vat }}</span></li>


                        @if(Session::has('coupon'))
                        <li class="list-group-item">總計: <span
                                style="float: right;">${{ Session::get('coupon')['balance'] + $charge + $vat }}</span>
                        </li>
                        @else
                        <li class="list-group-item">總計: <span
                                style="float: right;">{{ Cart::Subtotal() + $charge + $vat }}</span></li>
                        @endif


                    </ul>

                </div>
            </div>






            <div class="col-lg-5" style="border: 2px solid gray;padding:20px;border-radius:25px;">
                <div class="contact_form_container">
                    <div class="contact_form_title text-center">送貨地址</div>

                    <form action="{{ route('payment.process') }}" id="contact_form" method="post">
                        @csrf

                        <div class="form-group">
                            <label for="exampleInputEmail1">全名</label>
                            <input type="text" class="form-control" aria-describedby="emailHelp" placeholder="輸入名稱"
                                name="name" required="">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">手機</label>
                            <input type="text" class="form-control" aria-describedby="emailHelp" placeholder="輸入手機"
                                name="phone" required="">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Email</label>
                            <input type="email" class="form-control" aria-describedby="emailHelp" placeholder="輸入Email"
                                name="email" required="">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">地址</label>
                            <input type="text" class="form-control" aria-describedby="emailHelp" placeholder="輸入地址"
                                name="address" required="">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">縣市</label>
                            <input type="text" class="form-control" aria-describedby="emailHelp" placeholder="輸入縣市"
                                name="city" required="">
                        </div>

                        <div class="contact_form_title text-center">付款方式</div>
                        <div class="form-group">
                            <ul class="logos_list">

                                <li><input type="radio" name="payment" value="stripe">
                                    <img src="{{ asset('public/frontend/images/mastercard.png') }}"
                                        style="widows: 100px; height:60px;">
                                </li>

                                <li><input type="radio" name="payment" value="paypal">
                                    <img src="{{ asset('public/frontend/images/paypal.png') }}"
                                        style="widows: 100px; height:60px;">
                                </li>

                                <li><input type="radio" name="payment" value="ideal">
                                    <img src="{{ asset('public/frontend/images/mollie.png') }}"
                                        style="widows: 100px; height:60px;">
                                </li>

                            </ul>
                        </div>

                        <div class="contact_form_button text-center">
                            <button type="submit" class="btn btn-info">付款去</button>
                        </div>
                    </form>

                </div>
            </div>

        </div>
    </div>
    <div class="panel"></div>
</div>

@endsection
