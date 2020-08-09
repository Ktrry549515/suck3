@extends('admin.admin_layouts')




@section('admin_content')
<!-- ########## START: MAIN PANEL ########## -->

{{--  新增商品頁面  --}}
<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="index.html">Starlight</a>
        <span class="breadcrumb-item active">產品部分</span>
    </nav>

    <div class="sl-pagebody">

        <div class="card pd-20 pd-sm-40">
            <h6 class="card-body-title">新增商品
                <a href="{{ route('all.product') }}" class="btn btn-success btn-sm pull-right">全部商品</a>
            </h6>
            <p class="mg-b-20 mg-sm-b-30">新商品新增表單</p>

            <form action="{{ route('store.product') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-layout">
                    <div class="row mg-b-25">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="form-control-label">商品名稱: <span class="tx-danger">*</span></label>
                                <input class="form-control" type="text" name="product_name" placeholder="輸入商品名稱">
                            </div>
                        </div><!-- col-4 -->
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="form-control-label">商品代碼: <span class="tx-danger">*</span></label>
                                <input class="form-control" type="product_code" name="product_code"
                                    placeholder="輸入商品代碼">
                            </div>
                        </div><!-- col-4 -->
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="form-control-label">數量: <span class="tx-danger">*</span></label>
                                <input class="form-control" type="text" name="product_quantity" placeholder="輸入數量">
                            </div>
                        </div><!-- col-4 -->

                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="form-control-label">折扣價: <span class="tx-danger">*</span></label>
                                <input class="form-control" type="text" name="discount_price" placeholder="折扣碼">
                            </div>
                        </div><!-- col-4 -->

                        <div class="col-lg-4">
                            <div class="form-group mg-b-10-force">
                                <label class="form-control-label">類別: <span class="tx-danger">*</span></label>
                                <select class="form-control select2" data-placeholder="Choose country"
                                    name="category_id">
                                    <option label="Choose Category"></option>

                                    @foreach($category as $row)
                                    <option value="{{ $row->id }}">{{ $row->category_name }}</option>
                                    @endforeach

                                </select>
                            </div>
                        </div><!-- col-4 -->

                        <div class="col-lg-4">
                            <div class="form-group mg-b-10-force">
                                <label class="form-control-label">子類別: <span class="tx-danger">*</span></label>
                                <select class="form-control select2" data-placeholder="Choose country"
                                    name="subcategory_id">

                                </select>
                            </div>
                        </div><!-- col-4 -->

                        <div class="col-lg-4">
                            <div class="form-group mg-b-10-force">
                                <label class="form-control-label">品牌: <span class="tx-danger">*</span></label>
                                <select class="form-control select2" data-placeholder="Choose country" name="brand_id">
                                    <option label="Choose Brand"></option>

                                    @foreach($brand as $br)
                                    <option value="{{ $br->id }}">{{ $br->brand_name }}</option>
                                    @endforeach

                                </select>
                            </div>
                        </div><!-- col-4 -->

                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label">產品尺寸: <span class="tx-danger">*</span></label>
                                <input class="form-control" type="text" name="product_size" id="size"
                                    data-role="tagsinput">
                            </div>
                        </div><!-- col-4 -->

                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label">產品顏色: <span class="tx-danger">*</span></label>
                                <input class="form-control" type="text" name="product_color" id="color"
                                    data-role="tagsinput">
                            </div>
                        </div><!-- col-4 -->

                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label">售價: <span class="tx-danger">*</span></label>
                                <input class="form-control" type="text" name="selling_price" placeholder="售價">
                            </div>
                        </div><!-- col-4 -->

                        <div class="col-lg-12">
                            <div class="form-group">
                                <label class="form-control-label">產品詳情: <span class="tx-danger">*</span></label>
                                <textarea class="form-control" id="summernote" type="text" name="product_details">

                                </textarea>
                            </div>
                        </div><!-- col-4 -->

                        <div class="col-lg-12">
                            <div class="form-group">
                                <label class="form-control-label">影片連結: <span class="tx-danger">*</span></label>
                                <input class="form-control" name="video_link" placeholder="Video Link">
                            </div>
                        </div><!-- col-4 -->

                        <div class="col-lg-4">
                            <div class="form-group col-xl-12">
                                <label class="form-control-label">Image One (主縮圖): <span
                                        class="tx-danger">*</span></label>
                                <label class="custom-file  col-xl-12">
                                    <input type="file" id="file" class="custom-file-input  col-xl-12" name="image_one"
                                        onchange="readURL(this);" required="">
                                    <span class="custom-file-control"></span>
                                    <img src="" id="one">
                                </label>

                            </div>
                        </div><!-- col-4 -->

                        <div class="col-lg-4">
                            <div class="form-group col-xl-12">
                                <label class="form-control-label">Image Two (主縮圖): <span
                                        class="tx-danger">*</span></label>
                                <label class="custom-file col-xl-12">
                                    <input type="file" id="file" class="custom-file-input  col-xl-12" name="image_two"
                                        onchange="readURL2(this);" required="">
                                    <span class="custom-file-control"></span>
                                    <img src="" id="two">
                                </label>
                            </div>
                        </div><!-- col-4 -->

                        <div class="col-lg-4">
                            <div class="form-group col-xl-12">
                                <label class="form-control-label">Image Three (主縮圖): <span
                                        class="tx-danger">*</span></label>
                                <label class="custom-file col-xl-12">
                                    <input type="file" id="file" class="custom-file-input  col-xl-12" name="image_three"
                                        onchange="readURL3(this);" required="">
                                    <span class="custom-file-control"></span>
                                    <img src="" id="three">
                                </label>
                            </div>
                        </div><!-- col-4 -->

                    </div><!-- row -->

                    <hr>
                    <br>
                    <div class="row">
                        <div class="col-lg-4">
                            <label class="ckbox">
                                <input type="checkbox" name="main_slider" value="1">
                                <span>主滑塊</span>
                            </label>
                        </div><!-- col-4 -->

                        <div class="col-lg-4">
                            <label class="ckbox">
                                <input type="checkbox" name="hot_deal" value="1">
                                <span>熱賣</span>
                            </label>
                        </div><!-- col-4 -->


                        <div class="col-lg-4">
                            <label class="ckbox">
                                <input type="checkbox" name="best_rated" value="1">
                                <span>最受好評</span>
                            </label>
                        </div><!-- col-4 -->

                        <div class="col-lg-4">
                            <label class="ckbox">
                                <input type="checkbox" name="trend" value="1">
                                <span>潮流產品</span>
                            </label>
                        </div><!-- col-4 -->

                        <div class="col-lg-4">
                            <label class="ckbox">
                                <input type="checkbox" name="mid_slider" value="1">
                                <span>中滑塊</span>
                            </label>
                        </div><!-- col-4 -->

                        <div class="col-lg-4">
                            <label class="ckbox">
                                <input type="checkbox" name="hot_new" value="1">
                                <span>熱門新品</span>
                            </label>
                        </div><!-- col-4 -->

                        <div class="col-lg-4">
                            <label class="ckbox">
                                <input type="checkbox" name="buyone_getone" value="1">
                                <span>買一送一</span>
                            </label>
                        </div><!-- col-4 -->

                    </div><!-- end row -->

                    <br><br>


                    <div class="form-layout-footer">
                        <button class="btn btn-info mg-r-5">提交</button>
                        <button class="btn btn-secondary">取消</button>
                    </div><!-- form-layout-footer -->
                </div><!-- form-layout -->
        </div><!-- card -->

        </form>

    </div><!-- row -->
</div><!-- sl-mainpanel -->
<!-- ########## END: MAIN PANEL ########## -->

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/bootstrap.tagsinput/0.8.0/bootstrap-tagsinput.min.js"></script>

<script type="text/javascript">
    $(document).ready(function () {
        $('select[name="category_id"]').on('change', function () {
            var category_id = $(this).val();
            if (category_id) {

                $.ajax({
                    url: "{{ url('/get/subcategory/') }}/" + category_id,
                    type: "GET",
                    dataType: "json",
                    success: function (data) {
                        var d = $('select[name="subcategory_id"]').empty();
                        $.each(data, function (key, value) {

                            $('select[name="subcategory_id"]').append(
                                '<option value="' + value.id + '">' + value
                                .subcategory_name + '</option>');

                        });
                    },
                });

            } else {
                alert('danger');
            }

        });
    });

</script>

<script type="text/javascript">
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#one')
                    .attr('src', e.target.result)
                    .width(80)
                    .height(80);
            };
            reader.readAsDataURL(input.files[0]);
        }
    }

</script>

<script type="text/javascript">
    function readURL2(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#two')
                    .attr('src', e.target.result)
                    .width(80)
                    .height(80);
            };
            reader.readAsDataURL(input.files[0]);
        }
    }

</script>

<script type="text/javascript">
    function readURL3(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#three')
                    .attr('src', e.target.result)
                    .width(80)
                    .height(80);
            };
            reader.readAsDataURL(input.files[0]);
        }
    }

</script>


@endsection
