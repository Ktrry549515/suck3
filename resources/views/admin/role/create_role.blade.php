@extends('admin.admin_layouts')




@section('admin_content')
<!-- ########## START: MAIN PANEL ########## -->

{{--  管理使用者頁面  --}}

<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="index.html">Starlight</a>
        <span class="breadcrumb-item active">管理員部分</span>
    </nav>

    <div class="sl-pagebody">

        <div class="card pd-20 pd-sm-40">
            <h6 class="card-body-title">新管理員</h6>
            <p class="mg-b-20 mg-sm-b-30">添加新管理員</p>

            <form action="{{ route('store.admin') }}" method="post">
                @csrf
                <div class="form-layout">
                    <div class="row mg-b-25">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="form-control-label">名稱: <span class="tx-danger">*</span></label>
                                <input class="form-control" type="text" name="name" placeholder="輸入使用者名稱" required="">
                            </div>
                        </div><!-- col-4 -->
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="form-control-label">手機: <span class="tx-danger">*</span></label>
                                <input class="form-control" type="product_code" name="phone" placeholder="輸入手機"
                                    required="">
                            </div>
                        </div><!-- col-4 -->
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="form-control-label">Email: <span class="tx-danger">*</span></label>
                                <input class="form-control" type="email" name="email" placeholder="輸入Email" required="">
                            </div>
                        </div><!-- col-4 -->

                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="form-control-label">密碼: <span class="tx-danger">*</span></label>
                                <input class="form-control" type="password" name="password" placeholder="輸入密碼"
                                    required="">
                            </div>
                        </div><!-- col-4 -->

                    </div><!-- row -->

                    <hr>
                    <br>
                    <div class="row">
                        <div class="col-lg-4">
                            <label class="ckbox">
                                <input type="checkbox" name="Category" value="1">
                                <span>類別</span>
                            </label>
                        </div><!-- col-4 -->

                        <div class="col-lg-4">
                            <label class="ckbox">
                                <input type="checkbox" name="coupon" value="1">
                                <span>優惠券</span>
                            </label>
                        </div><!-- col-4 -->


                        <div class="col-lg-4">
                            <label class="ckbox">
                                <input type="checkbox" name="product" value="1">
                                <span>產品</span>
                            </label>
                        </div><!-- col-4 -->

                        <div class="col-lg-4">
                            <label class="ckbox">
                                <input type="checkbox" name="blog" value="1">
                                <span>部落格</span>
                            </label>
                        </div><!-- col-4 -->

                        <div class="col-lg-4">
                            <label class="ckbox">
                                <input type="checkbox" name="order" value=" 1">
                                <span>訂購</span>
                            </label>
                        </div><!-- col-4 -->

                        <div class="col-lg-4">
                            <label class="ckbox">
                                <input type="checkbox" name="other" value="1">
                                <span>其他</span>
                            </label>
                        </div><!-- col-4 -->

                        <div class="col-lg-4">
                            <label class="ckbox">
                                <input type="checkbox" name="report" value="1">
                                <span>報告</span>
                            </label>
                        </div><!-- col-4 -->

                        <div class="col-lg-4">
                            <label class="ckbox">
                                <input type="checkbox" name="role" value="1">
                                <span>角色</span>
                            </label>
                        </div><!-- col-4 -->

                        <div class="col-lg-4">
                            <label class="ckbox">
                                <input type="checkbox" name="return" value="1">
                                <span>返回</span>
                            </label>
                        </div><!-- col-4 -->

                        <div class="col-lg-4">
                            <label class="ckbox">
                                <input type="checkbox" name="contact" value="1">
                                <span>聯繫</span>
                            </label>
                        </div><!-- col-4 -->

                        <div class="col-lg-4">
                            <label class="ckbox">
                                <input type="checkbox" name="comment" value="1">
                                <span>評論</span>
                            </label>
                        </div><!-- col-4 -->

                        <div class="col-lg-4">
                            <label class="ckbox">
                                <input type="checkbox" name="setting" value="1">
                                <span>設定</span>
                            </label>
                        </div><!-- col-4 -->

                        <div class="col-lg-4">
                            <label class="ckbox">
                                <input type="checkbox" name="stock" value="1">
                                <span>庫存</span>
                            </label>
                        </div><!-- col-4 -->

                    </div><!-- end row -->

                    <br><br>


                    <div class="form-layout-footer">
                        <button type="submit" class="btn btn-info mg-r-5">提交</button>
                    </div><!-- form-layout-footer -->
                </div><!-- form-layout -->
        </div><!-- card -->

        </form>

    </div><!-- row -->
</div><!-- sl-mainpanel -->
<!-- ########## END: MAIN PANEL ########## -->


@endsection
