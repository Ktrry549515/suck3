@extends('admin.admin_layouts')

@section('admin_content')

{{--  本月報告頁面  --}}

<div class="sl-mainpanel">

    <div class="sl-pagebody">
        <div class="sl-page-title">
            <h5>本月報告</h5>

        </div><!-- sl-page-title -->

        <div class="card pd-20 pd-sm-40">
            <h6 class="card-body-title">本月報告</h6>


            <div class="table-wrapper">
                <table id="datatable1" class="table display responsive nowrap">
                    <thead>
                        <tr>
                            <th class="wd-15p">付款方式</th>
                            <th class="wd-15p">交易編號</th>
                            <th class="wd-15p">小計</th>
                            <th class="wd-20p">運費</th>
                            <th class="wd-20p">總計</th>
                            <th class="wd-20p">日期</th>
                            <th class="wd-20p">狀態</th>
                            <th class="wd-20p">功能</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($order as $row)
                        <tr>
                            <td>{{  $row->payment_type  }}</td>
                            <td>{{  $row->blnc_transection  }}</td>
                            <td>{{  $row->subtotal  }}$</td>
                            <td>{{  $row->shipping  }}$</td>
                            <td>{{  $row->total  }}$</td>
                            <td>{{  $row->date  }}</td>

                            <td>
                                @if($row->status == 0)
                                <span class="badge badge-warning">待確定</span>
                                @elseif($row->status == 1)
                                <span class="badge badge-info">付款接受</span>
                                @elseif($row->status == 2)
                                <span class="badge badge-warning">處理中</span>
                                @elseif($row->status == 3)
                                <span class="badge badge-success">已交付</span>
                                @else
                                <span class="badge badge-danger">取消</span>
                                @endif
                            </td>

                            <td> <a href="{{ URL::to('admin/view/order/'.$row->id) }}"
                                    class="btn btn-sm btn-info">顯示</a>

                        </tr>
                        @endforeach
                    </tbody>

                </table>
            </div><!-- table-wrapper -->
        </div><!-- card -->

    </div><!-- sl-mainpanel -->

    @endsection
