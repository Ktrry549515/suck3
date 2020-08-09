@extends('admin.admin_layouts')




@section('admin_content')
<!-- ########## START: MAIN PANEL ########## -->

{{--  顯示首頁  --}}
<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="index.html">Starlight</a>
        <span class="breadcrumb-item active">產品部分</span>
    </nav>

    <div class="sl-pagebody">

        <div class="card pd-20 pd-sm-40">
            <h6 class="card-body-title">產品詳細信息頁面</h6>
            <div class="form-layout">
                <div class="row mg-b-25">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="form-control-label">產品名稱: <span class="tx-danger">*</span></label><br>
                            <strong>{{ $product->product_name }}</strong>
                        </div>
                    </div><!-- col-4 -->
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="form-control-label">產品代碼: <span class="tx-danger">*</span></label><br>
                            <strong>{{ $product->product_code }}</strong>
                        </div>
                    </div><!-- col-4 -->
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="form-control-label">數量: <span class="tx-danger">*</span></label><br>
                            <strong>{{ $product->product_quantity }}</strong>
                        </div>
                    </div><!-- col-4 -->

                    <div class="col-lg-4">
                        <div class="form-group mg-b-10-force">
                            <label class="form-control-label">類別: <span class="tx-danger">*</span></label><br>
                            <strong>{{ $product->category_name }}</strong>
                            </select>
                        </div>
                    </div><!-- col-4 -->

                    <div class="col-lg-4">
                        <div class="form-group mg-b-10-force">
                            <label class="form-control-label">子類別: <span class="tx-danger">*</span></label><br>
                            <strong>{{ $product->subcategory_name }}</strong>
                        </div>
                    </div><!-- col-4 -->

                    <div class="col-lg-4">
                        <div class="form-group mg-b-10-force">
                            <label class="form-control-label">品牌: <span class="tx-danger">*</span></label><br>
                            <strong>{{ $product->brand_name }}</strong>
                            </select>
                        </div>
                    </div><!-- col-4 -->

                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="form-control-label">產品尺寸: <span class="tx-danger">*</span></label><br>
                            <strong>{{ $product->product_size }}</strong>
                        </div>
                    </div><!-- col-4 -->

                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="form-control-label">產品顏色: <span class="tx-danger">*</span></label><br>
                            <strong>{{ $product->product_color }}</strong>
                        </div>
                    </div><!-- col-4 -->

                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="form-control-label">售價: <span class="tx-danger">*</span></label><br>
                            <strong>{{ $product->selling_price }}</strong>
                        </div>
                    </div><!-- col-4 -->

                    <div class="col-lg-12">
                        <div class="form-group">
                            <label class="form-control-label">產品詳情: <span class="tx-danger">*</span></label><br>
                            <p>{!! $product->product_details !!}</p>
                        </div>
                    </div><!-- col-4 -->

                    <div class="col-lg-12">
                        <div class="form-group">
                            <label class="form-control-label">影片連結: <span class="tx-danger">*</span></label><br>
                            <strong>{{ $product->video_link }}</strong>
                        </div>
                    </div><!-- col-4 -->

                    <div class="col-lg-4">
                        <div class="form-group col-xl-12">
                            <label class="form-control-label">Image One (主縮圖): <span class="tx-danger">*</span></label>
                            <label class="custom-file  col-xl-12">
                                <img src="{{  URL::to($product->image_one)  }}" style="height: 80px;" width="80px;">
                            </label>

                        </div>
                    </div><!-- col-4 -->

                    <div class="col-lg-4">
                        <div class="form-group col-xl-12">
                            <label class="form-control-label">Image Two (主縮圖): <span class="tx-danger">*</span></label>
                            <label class="custom-file col-xl-12">
                                <img src="{{  URL::to($product->image_two)  }}" style="height: 80px;" width="80px;">
                            </label>
                        </div>
                    </div><!-- col-4 -->

                    <div class="col-lg-4">
                        <div class="form-group col-xl-12">
                            <label class="form-control-label">Image Three (主縮圖): <span
                                    class="tx-danger">*</span></label>
                            <label class="custom-file col-xl-12">
                                <img src="{{  URL::to($product->image_three)  }}" style="height: 80px;" width="80px;">
                            </label>
                        </div>
                    </div><!-- col-4 -->

                </div><!-- row -->

                <hr>
                <br>
                <div class="row">
                    <div class="col-lg-4">
                        <label class="">
                            @if($product->main_slider==1)
                            <span class="badge badge-success">上架</span>
                            @else
                            <span class="badge badge-danger">下架</span>
                            @endif
                            <span>主滑塊</span>
                        </label>
                    </div><!-- col-4 -->

                    <div class="col-lg-4">
                        <label class="">
                            @if($product->hot_deal==1)
                            <span class="badge badge-success">上架</span>
                            @else
                            <span class="badge badge-danger">下架</span>
                            @endif
                            <span>熱賣</span>
                        </label>
                    </div><!-- col-4 -->


                    <div class="col-lg-4">
                        <label class="">
                            @if($product->best_rated==1)
                            <span class="badge badge-success">上架</span>
                            @else
                            <span class="badge badge-danger">下架</span>
                            @endif
                            <span>最受好評</span>
                        </label>
                    </div><!-- col-4 -->

                    <div class="col-lg-4">
                        <label class="">
                            @if($product->trend==1)
                            <span class="badge badge-success">上架</span>
                            @else
                            <span class="badge badge-danger">下架</span>
                            @endif
                            <span>潮流產品</span>
                        </label>
                    </div><!-- col-4 -->

                    <div class="col-lg-4">
                        <label class="">
                            @if($product->mid_slider==1)
                            <span class="badge badge-success">上架</span>
                            @else
                            <span class="badge badge-danger">下架</span>
                            @endif
                            <span>中滑塊</span>
                        </label>
                    </div><!-- col-4 -->

                    <div class="col-lg-4">
                        <label class="">
                            @if($product->hot_new==1)
                            <span class="badge badge-success">上架</span>
                            @else
                            <span class="badge badge-danger">下架</span>
                            @endif
                            <span>熱門新品</span>
                        </label>
                    </div><!-- col-4 -->

                </div><!-- end row -->




            </div><!-- form-layout-footer -->
        </div><!-- form-layout -->
    </div><!-- card -->



</div><!-- row -->
</div><!-- sl-mainpanel -->
<!-- ########## END: MAIN PANEL ########## -->

@endsection
