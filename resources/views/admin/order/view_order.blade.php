@extends('admin.admin_layouts')

@section('admin_content')

{{--  訂單詳細信息頁面  --}}


<div class="sl-mainpanel">
    <div class="sl-pagebody">

        <div class="card pd-20 pd-sm-40">
            <h6 class="card-body-title">訂單詳細信息</h6>


            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header"><strong>訂單</strong>詳細信息</div>
                        <div class="card-body">
                            <table class="table">
                                <tr>
                                    <th>名稱:</th>
                                    <th>{{ $order->name }}</th>
                                </tr>

                                <tr>
                                    <th>手機:</th>
                                    <th>{{ $order->phone }}</th>
                                </tr>

                                <tr>
                                    <th>付款方式:</th>
                                    <th>{{ $order->payment_type }}</th>
                                </tr>

                                <tr>
                                    <th>付款編號:</th>
                                    <th>{{ $order->payment_id }}</th>
                                </tr>

                                <tr>
                                    <th>總計:</th>
                                    <th>{{ $order->total }} $</th>
                                </tr>

                                <tr>
                                    <th>月:</th>
                                    <th>{{ $order->month }}</th>
                                </tr>

                                <tr>
                                    <th>日期:</th>
                                    <th>{{ $order->date }}</th>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header"><strong>運費</strong> 明細</div>
                        <div class="card-body">
                            <table class="table">
                                <tr>
                                    <th>名稱:</th>
                                    <th>{{ $shipping->ship_name }}</th>
                                </tr>

                                <tr>
                                    <th>手機:</th>
                                    <th>{{ $shipping->ship_phone }}</th>
                                </tr>

                                <tr>
                                    <th>Email:</th>
                                    <th>{{ $shipping->ship_email }}</th>
                                </tr>

                                <tr>
                                    <th>地址:</th>
                                    <th>{{ $shipping->ship_address }}</th>
                                </tr>

                                <tr>
                                    <th>縣市:</th>
                                    <th>{{ $shipping->ship_city }}</th>
                                </tr>

                                <tr>
                                    <th>狀態:</th>
                                    <th>
                                        @if($order->status == 0)
                                        <span class="badge badge-warning">待確定</span>
                                        @elseif($order->status == 1)
                                        <span class="badge badge-info">付款接受</span>
                                        @elseif($order->status == 2)
                                        <span class="badge badge-warning">處理中</span>
                                        @elseif($order->status == 3)
                                        <span class="badge badge-success">已交付</span>
                                        @else
                                        <span class="badge badge-danger">取消</span>
                                        @endif
                                    </th>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>


                <div class="row col-lg-12">

                    <div class="card pd-20 pd-sm-40 col-lg-12">
                        <h6 class="card-body-title">產品詳情</h6>
                        <div class="table-wrapper">
                            <table class="table display responsive nowrap">
                                <thead>
                                    <tr>
                                        <th class="wd-15p">產品編號</th>
                                        <th class="wd-15p">產品名稱</th>
                                        <th class="wd-15p">圖片</th>
                                        <th class="wd-15p">顏色</th>
                                        <th class="wd-15p">尺寸</th>
                                        <th class="wd-15p">數量</th>
                                        <th class="wd-15p">單價</th>
                                        <th class="wd-20p">總計</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($details as $row)
                                    <tr>
                                        <td>{{  $row->product_code  }}</td>
                                        <td>{{  $row->product_name  }}</td>
                                        <td><img src="{{ URL::to($row->image_one) }}" height="50px;" width="50px;"
                                                alt=""></td>
                                        <td>{{  $row->color  }}</td>
                                        <td>{{  $row->size  }}</td>
                                        <td>{{  $row->quantity  }}</td>
                                        <td>{{  $row->singleprice  }}</td>
                                        <td>{{  $row->totalprice  }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div><!-- table-wrapper -->
                    </div><!-- card -->

                </div>
            </div>

            @if($order->status ==0)
            <a href="{{ url('admin/payment/accept/'.$order->id) }}" class="btn btn-info">接受付款</a>
            <a href="{{ url('admin/payment/cancel/'.$order->id) }}" class="btn btn-danger">取消訂單</a>
            @elseif($order->status ==1)
            <a href="{{ url('admin/delevery/process/'.$order->id) }}" class="btn btn-info">流程交付</a>
            @elseif($order->status ==2)
            <a href="{{ url('admin/delevery/done/'.$order->id) }}" class="btn btn-success">交貨完成</a>
            @elseif($order->status ==4)
            <strong class="text-danger text-center">此訂單已取消</strong>
            @else
            <strong class="text-success text-center">該產品已成功交付</strong>

            @endif





        </div>
    </div>
</div>

@endsection
