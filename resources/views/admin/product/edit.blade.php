@extends('admin.admin_layouts')




@section('admin_content')

@php
$category = DB::table('categories')->get();
$brand = DB::table('brands')->get();
$subcategory = DB::table('subcategories')->get();
@endphp

<!-- ########## START: MAIN PANEL ########## -->

{{--  編輯產品 更新 頁  --}}
<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="index.html">Starlight</a>
        <span class="breadcrumb-item active">產品部分</span>
    </nav>

    <div class="sl-pagebody">

        <div class="card pd-20 pd-sm-40">
            <h6 class="card-body-title">更新產品
                <a href="{{ route('all.product') }}" class="btn btn-success btn-sm pull-right">全部商品</a>
            </h6>
            <p class="mg-b-20 mg-sm-b-30">從更新產品</p>

            <form method="post" action="{{ url('update/product/withoutphoto/'.$product->id) }}"
                enctype="multipart/form-data">
                @csrf
                <div class="form-layout">
                    <div class="row mg-b-25">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="form-control-label">產品名稱: <span class="tx-danger">*</span></label>
                                <input class="form-control" type="text" name="product_name"
                                    value="{{ $product->product_name }}">
                            </div>
                        </div><!-- col-4 -->
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="form-control-label">產品代碼: <span class="tx-danger">*</span></label>
                                <input class="form-control" type="product_code" name="product_code"
                                    value="{{ $product->product_code }}">
                            </div>
                        </div><!-- col-4 -->

                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="form-control-label">數量: <span class="tx-danger">*</span></label>
                                <input class="form-control" type="text" name="product_quantity"
                                    value="{{ $product->product_quantity }}">
                            </div>
                        </div><!-- col-4 -->

                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="form-control-label">折扣價:
                                    <span class="tx-danger">*</span></label>
                                <input class="form-control" type="text" name="discount_price"
                                    value="{{ $product->discount_price }}">
                            </div>
                        </div><!-- col-4 -->

                        <div class="col-lg-4">
                            <div class="form-group mg-b-10-force">
                                <label class="form-control-label">類別: <span class="tx-danger">*</span></label>
                                <select class="form-control select2" data-placeholder="Choose country"
                                    name="category_id" value="{{ $product->category_id }}">
                                    <option label="Choose Category"></option>

                                    @foreach($category as $row)
                                    <option value="{{ $row->id }}"
                                        <?php if ($row->id == $product->category_id){echo "selected";} ?>>
                                        {{ $row->category_name }}</option>
                                    @endforeach

                                </select>
                            </div>
                        </div><!-- col-4 -->

                        <div class="col-lg-4">
                            <div class="form-group mg-b-10-force">
                                <label class="form-control-label">子類別: <span class="tx-danger">*</span></label>
                                <select class="form-control select2" name="subcategory_id">

                                    @foreach($subcategory as $row)
                                    <option value="{{ $row->id }}"
                                        <?php if ($row->id == $product->subcategory_id){echo "selected";} ?>>
                                        {{ $row->subcategory_name }}</option>
                                    @endforeach

                                </select>
                            </div>
                        </div><!-- col-4 -->

                        <div class="col-lg-4">
                            <div class="form-group mg-b-10-force">
                                <label class="form-control-label">品牌: <span class="tx-danger">*</span></label>
                                <select class="form-control select2" name="brand_id">
                                    <option disabled label="Choose brand"></option>

                                    @foreach($brand as $br)
                                    <option value="{{ $br->id }}"
                                        <?php if ($br->id == $product->brand_id){echo "selected";} ?>>
                                        {{ $br->brand_name }}</option>
                                    @endforeach

                                </select>
                            </div>
                        </div><!-- col-4 -->

                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label">產品尺寸: <span class="tx-danger">*</span></label>
                                <input class="form-control" type="text" name="product_size" id="size"
                                    data-role="tagsinput" value="{{ $product->product_size }}">
                            </div>
                        </div><!-- col-4 -->

                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label">產品顏色: <span class="tx-danger">*</span></label>
                                <input class="form-control" type="text" name="product_color" id="color"
                                    data-role="tagsinput" value="{{ $product->product_color }}">
                            </div>
                        </div><!-- col-4 -->

                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label">售價: <span class="tx-danger">*</span></label>
                                <input class="form-control" type="text" name="selling_price" placeholder="Selling Price"
                                    value="{{ $product->selling_price }}">
                            </div>
                        </div><!-- col-4 -->

                        <div class="col-lg-12">
                            <div class="form-group">
                                <label class="form-control-label">產品詳情: <span class="tx-danger">*</span></label>
                                <textarea class="from-control" id="summernote" type="text" name="product_details">
                                  {{  $product->product_details }}
                                </textarea>
                            </div>
                        </div><!-- col-4 -->

                        <div class="col-lg-12">
                            <div class="form-group">
                                <label class="form-control-label">影片連結: <span class="tx-danger">*</span></label>
                                <input class="form-control" name="video_link" value="{{  $product->video_link }}">
                            </div>
                        </div><!-- col-4 -->



                    </div><!-- row -->

                    <hr>
                    <br>
                    <div class="row">
                        <div class="col-lg-4">
                            <label class="ckbox">
                                <input type="checkbox" name="main_slider" value="1"
                                    <?php if($product->main_slider == 1){ echo "checked"; } ?>>
                                <span>主滑塊</span>
                            </label>
                        </div><!-- col-4 -->

                        <div class="col-lg-4">
                            <label class="ckbox">
                                <input type="checkbox" name="hot_deal" value="1"
                                    <?php if($product->hot_deal == 1){ echo "checked"; } ?>>
                                <span>熱賣</span>
                            </label>
                        </div><!-- col-4 -->


                        <div class="col-lg-4">
                            <label class="ckbox">
                                <input type="checkbox" name="best_rated" value="1"
                                    <?php if($product->best_rated == 1){ echo "checked"; } ?>>
                                <span>最受好評</span>
                            </label>
                        </div><!-- col-4 -->

                        <div class="col-lg-4">
                            <label class="ckbox">
                                <input type="checkbox" name="trend" value="1"
                                    <?php if($product->trend == 1){ echo "checked"; } ?>>
                                <span>潮流產品</span>
                            </label>
                        </div><!-- col-4 -->

                        <div class="col-lg-4">
                            <label class="ckbox">
                                <input type="checkbox" name="mid_slider" value="1"
                                    <?php if($product->mid_slider == 1){ echo "checked"; } ?>>
                                <span>中滑塊</span>
                            </label>
                        </div><!-- col-4 -->

                        <div class="col-lg-4">
                            <label class="ckbox">
                                <input type="checkbox" name="hot_new" value="1"
                                    <?php if($product->hot_new == 1){ echo "checked"; } ?>>
                                <span>熱門新品</span>
                            </label>
                        </div><!-- col-4 -->

                        <div class="col-lg-4">
                            <label class="ckbox">
                                <input type="checkbox" name="buyone_getone" value="1"
                                    <?php if($product->buyone_getone == 1){ echo "checked"; } ?>>
                                <span>買一送一</span>
                            </label>
                        </div><!-- col-4 -->

                    </div><!-- end row -->

                    <br><br>


                    <div class="form-layout-footer">
                        <button class="btn btn-info mg-r-5">更新產品</button>

                    </div><!-- form-layout-footer -->
                </div><!-- form-layout -->
        </div><!-- card -->

        </form>

    </div><!-- row -->

    <div class="sl-pagebody">

        <div class="card pd-20 pd-sm-40">
            <h6 class="card-body-title">更新圖片</h6>
            <form action="{{  url('update/product/photo/'.$product->id)  }}" method="post"
                enctype="multipart/form-data">
                @csrf

                <div class="row">
                    <div class="col-lg-6 col-sm-6">
                        <label class="form-control-label">Image One (主縮圖): <span class="tx-danger">*</span></label><br>
                        <label class="custom-file">
                            <input type="file" id="file" class="custom-file-input" name="image_one"
                                onchange="readURL(this);"><br>
                            <span class="custom-file-control"></span>
                            <input type="hidden" name="old_one" value="{{  $product->image_one  }}">
                            <img src="" id="one"><br><br>
                        </label>
                    </div>
                    <div class="col-lg-6 col-sm-6">
                        <img src="{{ URL::to($product->image_one) }}" style="width:80px;" height="80px;">
                    </div>
                </div><!-- col-4 -->



                <div class="row">
                    <div class="col-lg-6 col-sm-6">
                        <label class="form-control-label">Image Two (主縮圖): <span class="tx-danger">*</span></label><br>
                        <label class="custom-file">
                            <input type="file" id="file" class="custom-file-input" name="image_two"
                                onchange="readURL2(this);"><br>
                            <span class="custom-file-control"></span>
                            <input type="hidden" name="old_two" value="{{  $product->image_two  }}">
                            <img src="" id="two"><br><br>
                        </label>
                    </div>
                    <div class="col-lg-6 col-sm-6">
                        <img src="{{ URL::to($product->image_two) }}" style="width:80px;" height="80px;">
                    </div>
                </div><!-- col-4 -->



                <div class="row">
                    <div class="col-lg-6 col-sm-6">
                        <label class="form-control-label">Image Three (主縮圖): <span
                                class="tx-danger">*</span></label><br>
                        <label class="custom-file ">
                            <input type="file" id="file" class="custom-file-input" name="image_three"
                                onchange="readURL3(this);"><br>
                            <span class="custom-file-control"></span>
                            <input type="hidden" name="old_three" value="{{  $product->image_three  }}">
                            <img src="" id="three"><br><br>
                        </label>
                    </div>
                    <div class="col-lg-6 col-sm-6">
                        <img src="{{ URL::to($product->image_three) }}" style="width:80px;" height="80px;">
                    </div>
                </div><!-- col-4 -->



                <button type="submit" class="btn btn-sm btn-warning">更新照片</button>
            </form>
        </div>
    </div>

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
                                '<option value="' + value.id + '">' +
                                value
                                .subcategory_name + '</option>');

                        });
                    },
                });

            } else {
                alert('Danger');
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
