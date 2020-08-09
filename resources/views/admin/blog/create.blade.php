@extends('admin.admin_layouts')




@section('admin_content')
<!-- ########## START: MAIN PANEL ########## -->

{{--  部落格首頁  --}}
<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="index.html">Starlight</a>
        <span class="breadcrumb-item active">部落格部分</span>
    </nav>

    <div class="sl-pagebody">

        <div class="card pd-20 pd-sm-40">
            <h6 class="card-body-title">新增文章
                <a href="{{ route('all.blogpost') }}" class="btn btn-success btn-sm pull-right">所有文章</a>
            </h6>
            <p class="mg-b-20 mg-sm-b-30">新文章添加</p>

            <form action="{{ route('store.post') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-layout">
                    <div class="row mg-b-25">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="form-control-label">帖子標題 (ENGLISH): <span
                                        class="tx-danger">*</span></label>
                                <input class="form-control" type="text" name="post_title_en"
                                    placeholder="輸入英文帖子標題">
                            </div>
                        </div><!-- col-4 -->
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="form-control-label">帖子標題 (Taiwan): <span
                                        class="tx-danger">*</span></label>
                                <input class="form-control" type="product_code" name="post_title_tw"
                                    placeholder="輸入中文帖子標題">
                            </div>
                        </div><!-- col-4 -->

                        <div class="col-lg-4">
                            <div class="form-group mg-b-10-force">
                                <label class="form-control-label">部落格類別: <span
                                        class="tx-danger">*</span></label>
                                <select class="form-control select2" data-placeholder="Choose country"
                                    name="category_id">
                                    <option label="Choose Category"></option>

                                    @foreach($blogcategory as $row)
                                    <option value="{{ $row->id }}">{{ $row->category_name_en }}</option>
                                    @endforeach

                                </select>
                            </div>
                        </div><!-- col-4 -->

                        <div class="col-lg-12">
                            <div class="form-group">
                                <label class="form-control-label">產品詳情 (ENGLISH): <span
                                        class="tx-danger">*</span></label>
                                <textarea class="from-control" id="summernote" type="text" name="details_en">

                                </textarea>
                            </div>
                        </div><!-- col-4 -->

                        <div class="col-lg-12">
                            <div class="form-group">
                                <label class="form-control-label">產品詳情 (Taiwan): <span
                                        class="tx-danger">*</span></label>
                                <textarea class="from-control" id="summernote1" name="details_tw">

                                </textarea>
                            </div>
                        </div><!-- col-4 -->

                        <div class="col-lg-4">
                            <div class="form-group col-xl-12">
                                <label class="form-control-label">發布圖片: <span class="tx-danger">*</span></label>
                                <label class="custom-file  col-xl-12">
                                    <input type="file" id="file" class="custom-file-input  col-xl-12" name="post_image"
                                        onchange="readURL(this);" required="">
                                    <span class="custom-file-control"></span>
                                    <img src="" id="one">
                                </label>

                            </div>
                        </div><!-- col-4 -->
                    </div><!-- row -->

                </div><!-- end row -->

                <br><br>


                <div class="form-layout-footer">
                    <button class="btn btn-info mg-r-5" type="submit">提交</button>
                </div><!-- form-layout-footer -->
        </div><!-- form-layout -->
    </div><!-- card -->

    </form>

</div><!-- row -->
</div><!-- sl-mainpanel -->
<!-- ########## END: MAIN PANEL ########## -->

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

@endsection
