@extends('admin.admin_layouts')



{{--  seo  --}}

@section('admin_content')
<!-- ########## START: MAIN PANEL ########## -->
<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="index.html">Starlight</a>
        <span class="breadcrumb-item active">Seo設置部分</span>
    </nav>

    <div class="sl-pagebody">

        <div class="card pd-20 pd-sm-40">
            <h6 class="card-body-title">Seo設置</h6>

            <form action="{{ route('update.seo') }}" method="post">
                @csrf

                <div class="form-layout">
                    <div class="row mg-b-25">

                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="form-control-label">原標題:
                                    <span class="tx-danger">*</span></label>
                                <input class="form-control" type="text" name="meta_title"
                                    value="{{ $seo->meta_title }}">
                            </div>
                        </div><!-- col-4 -->

                        <div class=" col-lg-6">
                            <div class="form-group">
                                <label class="form-control-label">原作者:
                                    <span class="tx-danger">*</span></label>
                                <input class="form-control" type="text" name="meta_author"
                                    value="{{ $seo->meta_author }}">
                            </div>
                        </div><!-- col-4 -->

                        <div class="col-lg-12">
                            <div class="form-group">
                                <label class="form-control-label">原標記:
                                    <span class="tx-danger">*</span></label>
                                <textarea class="form-control" type="text" name="meta_tag" value="{{ $seo->meta_tag }}">
                                </textarea>
                            </div>
                        </div><!-- col-4 -->

                        <div class="col-lg-12">
                            <div class="form-group">

                                <label class="form-control-label">原描述:
                                    <span class="tx-danger">*</span></label>

                                <textarea class="form-control" name="meta_description">
                                    {{ $seo->meta_description }}
                                </textarea>

                            </div>
                        </div><!-- col-4 -->

                        <div class="col-lg-12">
                            <div class="form-group">

                                <label class="form-control-label">Google 分析:
                                    <span class="tx-danger">*</span></label>

                                <textarea class="form-control" name="google_analytics">
                                    {{ $seo->google_analytics }}
                                </textarea>

                            </div>
                        </div><!-- col-4 -->

                        <div class="col-lg-12">
                            <div class="form-group">

                                <label class="form-control-label">Bing 分析:
                                    <span class="tx-danger">*</span></label>

                                <textarea class="form-control" name="bing_analytics">
                                    {{ $seo->bing_analytics }}
                                </textarea>
                                <input type="hidden" name="id" value="{{ $seo->id }}">

                            </div>
                        </div><!-- col-4 -->

                    </div><!-- row -->

                </div><!-- end row -->

                <br><br>


                <div class="form-layout-footer">
                    <button class="btn btn-info mg-r-5" type="submit">提交表格</button>
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
