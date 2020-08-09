@extends('admin.admin_layouts')

@section('admin_content')


{{--  全部商品 首頁  --}}
<div class="sl-mainpanel">

    <div class="sl-pagebody">
        <div class="sl-page-title">
            <h5>商品列表</h5>
        </div><!-- sl-page-title -->

        <div class="card pd-20 pd-sm-40">
            <h6 class="card-body-title">商品列表
                <a href="{{ route('add.product') }}" class="btn btn-sm btn-warning" style="float: right;">新增</a>
            </h6>


            <div class="table-wrapper">
                <table id="datatable1" class="table display responsive nowrap">
                    <thead>
                        <tr>
                            <th class="wd-15p">產品代碼</th>
                            <th class="wd-15p">產品名稱</th>
                            <th class="wd-15p">圖片</th>
                            <th class="wd-15p">類別</th>
                            <th class="wd-15p">品牌</th>
                            <th class="wd-15p">數量</th>
                            <th class="wd-15p">數量</th>
                            <th class="wd-20p">功能</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($product as $row)
                        <tr>
                            <td>{{  $row->product_code  }}</td>
                            <td>{{  $row->product_name  }}</td>
                            <td><img src="{{ URL::to($row->image_one) }}" height="50px;" width="50px;" alt=""></td>
                            <td>{{  $row->category_name  }}</td>
                            <td>{{  $row->brand_name  }}</td>
                            <td>{{  $row->product_quantity  }}</td>
                            <td>

                                @if($row->status ==1)
                                <span class="badge badge-success">上架</span>
                                @else
                                <span class="badge badge-danger">下架</span>
                                @endif

                            </td>

                            <td> <a href="{{ URL::to('edit/product/'.$row->id) }}" class="btn btn-sm btn-info"><i
                                        class="fa fa-edit" title="編輯"></i></a>

                                <a href="{{ URL::to('delete/product/'.$row->id) }}" class="btn btn-sm btn-danger"
                                    id="delete"><i class="fa fa-trash" title="刪除"></i></a>

                                <a href="{{ URL::to('view/product/'.$row->id) }}" class="btn btn-sm btn-warning"><i
                                        class="fa fa-eye" title="顯示"></i></a>



                                @if($row->status ==1)
                                <a href="{{ URL::to('inactive/product/'.$row->id) }}" class="btn btn-sm btn-danger"
                                    title="下架"><i class="fa fa-thumbs-down"></i></a>
                                @else
                                <a href="{{ URL::to('active/product/'.$row->id) }}" class="btn btn-sm btn-info"><i
                                        class="fa fa-thumbs-up" title="上架"></i></a>
                                @endif


                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div><!-- table-wrapper -->
        </div><!-- card -->

    </div><!-- sl-mainpanel -->




    @endsection
