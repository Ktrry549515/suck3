@extends('admin.admin_layouts')

@section('admin_content')

{{--  Brand 品牌首頁  --}}
<div class="sl-mainpanel">

    <div class="sl-pagebody">
        <div class="sl-page-title">
            <h5>品牌清單</h5>
        </div><!-- sl-page-title -->

        <div class="card pd-20 pd-sm-40">
            <h6 class="card-body-title">品牌清單
                <a href="" class="btn btn-sm btn-warning" style="float: right;" data-toggle="modal"
                    data-target="#modaldemo3">新增</a>
            </h6>


            <div class="table-wrapper">
                <table id="datatable1" class="table display responsive nowrap">
                    <thead>
                        <tr>
                            <th class="wd-15p">編號</th>
                            <th class="wd-15p">品牌名稱</th>
                            <th class="wd-15p">品牌圖示</th>
                            <th class="wd-20p">功能</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($brand as $key=>$row)
                        <tr>
                            <td>{{  $key+1  }}</td>
                            <td>{{  $row->brand_name  }}</td>
                            <td><img src="{{ URL::to($row->brand_logo) }}" height="70px;" width="80px;" alt=""></td>
                            <td> <a href="{{ URL::to('edit/brand/'.$row->id) }}" class="btn btn-sm btn-info">編輯</a>
                                <a href="{{ URL::to('delete/brand/'.$row->id) }}" class="btn btn-sm btn-danger"
                                    id="delete">刪除</a></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div><!-- table-wrapper -->
        </div><!-- card -->

    </div><!-- sl-mainpanel -->

    <!-- LARGE MODAL -->
    <div id="modaldemo3" class="modal fade">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content tx-size-sm">
                <div class="modal-header pd-x-20">
                    <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">新增品牌</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif


                <form method="post" action="{{  route('store.brand')  }}" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body pd-20">
                        <div class="form-group">
                            <label for="exampleInputEmail1">品牌名稱</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                                placeholder="品牌" name="brand_name">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">品牌圖示</label>
                            <input type="file" class="form-control" aria-describedby="emailHelp"
                                placeholder="品牌圖示" name="brand_logo">
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-info pd-x-20">提交</button>
                            <button type="button" class="btn btn-secondary pd-x-20" data-dismiss="modal">取消</button>
                        </div>
                </form>
            </div>
        </div><!-- modal-dialog -->
    </div><!-- modal -->



    @endsection
