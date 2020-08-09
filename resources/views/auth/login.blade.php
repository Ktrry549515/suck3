@extends('layouts.app')

@section('content')

<link rel="stylesheet" type="text/css" href="{{  asset('public/frontend/styles/contact_styles.css') }}">
<link rel="stylesheet" type="text/css" href="{{  asset('public/frontend/styles/contact_responsive.css') }}">

<div class="contact_form">
    <div class="container">
        <div class="row">
            <div class="col-lg-5 offset-lg-1" style="border: 2px solid gray;padding:20px;border-radius:25px;">
                <div class="contact_form_container">
                    <div class="contact_form_title text-center">登入</div>

                    <form action="{{ route('login') }}" id="contact_form" method="post">
                        @csrf

                        <div class="form-group">
                            <label for="exampleInputEmail1">Email 或者電話</label>
                            <input type="text" class="form-control @error('email') is-invalid @enderror" name="email"
                                value="{{ old('email') }}" aria-describedby="emailHelp" required="">

                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror

                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">密碼</label>
                            <input type="password" class="form-control @error('password') is-invalid @enderror"
                                aria-describedby="emailHelp" name="password" required="">

                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror

                        </div>

                        <div class="contact_form_button">
                            <button type="submit" class="btn btn-info">登錄</button>
                        </div>
                    </form>
                    <br>

                    <a href="{{ route('password.request') }}">我忘記了我的密碼</a> <br><br>


                </div>
            </div>

            <div class="col-lg-5 offset-lg-1" style="border: 2px solid gray;padding:20px;border-radius:25px;">
                <div class="contact_form_container">
                    <div class="contact_form_title text-center">註冊</div>

                    <form action="{{ route('register') }}" id="contact_form" method="post">
                        @csrf

                        <div class="form-group">
                            <label for="exampleInputEmail1">全名</label>
                            <input type="text" class="form-control" aria-describedby="emailHelp" placeholder="輸入姓名"
                                name="name" required="">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">手機</label>
                            <input type="text" class="form-control @error('phone') is-invalid @enderror" name="phone"
                                value="{{ old('phone') }}" aria-describedby="emailHelp" placeholder="輸入手機" required="">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Email</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                                value="{{ old('email') }}" aria-describedby="emailHelp" placeholder="輸入Email"
                                required="">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">密碼</label>
                            <input type="password" class="form-control" aria-describedby="emailHelp" placeholder="輸入密碼"
                                name="password" required="">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">確認密碼</label>
                            <input type="password" class="form-control" aria-describedby="emailHelp" placeholder="確認密碼"
                                name="password_confirmation" required="">
                        </div>


                        <div class="contact_form_button">
                            <button type="submit" class="btn btn-info">註冊</button>
                        </div>
                    </form>

                </div>
            </div>

        </div>
    </div>
    <div class="panel"></div>
</div>

@endsection
