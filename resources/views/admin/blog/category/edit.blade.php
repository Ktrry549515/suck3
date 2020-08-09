@extends('admin.admin_layouts')

@section('admin_content')

<div class="sl-mainpanel">

    <div class="sl-pagebody">
        <div class="sl-page-title">
            <h5>部落格類別更新</h5>
        </div><!-- sl-page-title -->

        <div class="card pd-20 pd-sm-40">
            <h6 class="card-body-title">部落格類別更新

            </h6>


            <div class="table-wrapper">
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif


                <form method="post" action="{{  url('update/blog/category/'.$blogcatedit->id)  }}">
                    @csrf
                    <div class="modal-body pd-20">
                        <div class="form-group">
                            <label for="exampleInputEmail1">英文類別名稱</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                                value="{{ $blogcatedit->category_name_en }}" name="category_name_en">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">中文類別名稱</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                                value="{{ $blogcatedit->category_name_tw }}" name="category_name_tw">
                        </div>

                    </div>
                    <!--model body-->
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-info pd-x-20">更新</button>
                    </div>
                </form>
            </div><!-- sl-mainpanel -->




            @endsection
