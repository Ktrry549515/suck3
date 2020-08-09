@extends('admin.admin_layouts')




@section('admin_content')

@php
$blogcategory=DB::table('post_category')->get();

@endphp

<!-- ########## START: MAIN PANEL ########## -->

{{--  部落格 編輯  --}}
<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="index.html">Starlight</a>
        <span class="breadcrumb-item active">部落格部分</span>
    </nav>

    <div class="sl-pagebody">

        <div class="card pd-20 pd-sm-40">
            <h6 class="card-body-title">發布更新
                <a href="{{ route('add.blogpost') }}" class="btn btn-success btn-sm pull-right">所有文章</a>
            </h6>

            <form action="{{ url('update/post/'.$post->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-layout">
                    <div class="row mg-b-25">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="form-control-label">帖子標題 (ENGLISH): <span
                                        class="tx-danger">*</span></label>
                                <input class="form-control" type="text" name="post_title_en"
                                    value="{{ $post->post_title_en }}">
                            </div>
                        </div><!-- col-4 -->
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="form-control-label">帖子標題 (Taiwan): <span
                                        class="tx-danger">*</span></label>
                                <input class="form-control" type="product_code" name="post_title_tw"
                                    value="{{ $post->post_title_tw }}">
                            </div>
                        </div><!-- col-4 -->

                        <div class="col-lg-4">
                            <div class="form-group mg-b-10-force">
                                <label class="form-control-label">部落格分類: <span
                                        class="tx-danger">*</span></label>
                                <select class="form-control select2" data-placeholder="Choose country"
                                    name="category_id">
                                    <option label="Choose Category"></option>

                                    @foreach($blogcategory as $row)
                                    <option value="{{ $row->id }}" <?php 
                                        if ($row->id == $post->category_id){
                                            echo "selected";}?>>{{ $row->category_name_en }}</option>
                                    @endforeach

                                </select>
                            </div>
                        </div><!-- col-4 -->

                        <div class="col-lg-12">
                            <div class="form-group">
                                <label class="form-control-label">產品詳情 (ENGLISH): <span
                                        class="tx-danger">*</span></label>
                                <textarea class="from-control" id="summernote" type="text" name="details_en">
                                   {!! $post->details_en !!}
                                </textarea>
                            </div>
                        </div><!-- col-4 -->

                        <div class="col-lg-12">
                            <div class="form-group">
                                <label class="form-control-label">產品詳情 (Taiwan): <span
                                        class="tx-danger">*</span></label>
                                <textarea class="from-control" id="summernote1" name="details_tw">
                                    {!! $post->details_tw !!}
                                </textarea>
                            </div>
                        </div><!-- col-4 -->

                        <div class="col-lg-4">
                            <div class="form-group col-xl-12">
                                <label class="form-control-label">發布圖片: <span class="tx-danger">*</span></label>
                                <label class="custom-file  col-xl-12">
                                    <input type="file" id="file" class="custom-file-input  col-xl-12" name="post_image"
                                        onchange="readURL(this);">
                                    <span class="custom-file-control"></span>
                                    <img src="" id="one">
                                </label>

                            </div>
                        </div><!-- col-4 -->

                        <div class="col-lg-4">
                            <div class="form-group col-xl-12">
                                <label class="form-control-label">舊文章圖片: <span
                                        class="tx-danger">*</span></label>
                                <label class="custom-file">
                                    <img src="{{ URL::to($post->post_image) }}" style="height: 80px;" width="130px;">
                                    <input type="hidden" name="old_image" value="{{ $post->post_image }}">
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
