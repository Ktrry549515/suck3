@extends('admin.admin_layouts')

@section('admin_content')

<div class="sl-mainpanel">

    <div class="sl-pagebody">
        <div class="sl-page-title">
            <h5>優惠券清單</h5>
        </div><!-- sl-page-title -->

        <div class="card pd-20 pd-sm-40">
            <h6 class="card-body-title">優惠券清單
                <a href="" class="btn btn-sm btn-warning" style="float: right;" data-toggle="modal"
                    data-target="#modaldemo3">新增</a>
            </h6>


            <div class="table-wrapper">
                <table id="datatable1" class="table display responsive nowrap">
                    <thead>
                        <tr>
                            <th class="wd-15p">編號</th>
                            <th class="wd-15p">優惠券代碼</th>
                            <th class="wd-15p">優惠百分比</th>
                            <th class="wd-20p">功能</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($coupon as $key=>$row)
                        <tr>
                            <td>{{  $key+1  }}</td>
                            <td>{{  $row->coupon  }}</td>
                            <td>{{  $row->discount  }}%</td>
                            <td> <a href="{{ URL::to('edit/coupon/'.$row->id) }}" class="btn btn-sm btn-info">編輯</a>
                                <a href="{{ URL::to('delete/coupon/'.$row->id) }}" class="btn btn-sm btn-danger"
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
                    <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">新增優惠券</h6>
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


                <form method="post" action="{{  route('store.coupon')  }}">
                    @csrf
                    <div class="modal-body pd-20">
                        <div class="form-group">
                            <label for="exampleInputEmail1">優惠券代碼</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                                placeholder="優惠券代碼" name="coupon">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">優惠券折扣 (%)</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                                placeholder="優惠券折扣" name="discount">
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
