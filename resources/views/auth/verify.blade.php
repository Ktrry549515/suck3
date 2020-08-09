@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('確認你的郵件地址') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('新的驗證鏈接已發送到您的電子郵件地址。') }}
                        </div>
                    @endif

                    {{ __('在繼續之前，請檢查您的電子郵件以獲取驗證鏈接。') }}
                    {{ __('如果您沒有收到電子郵件') }},
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
		                <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('點擊此處請求其他幫助') }}</button>.
	                </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
