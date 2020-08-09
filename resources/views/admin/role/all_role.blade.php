@extends('admin.admin_layouts')

@section('admin_content')

{{--  管理使用者頁面  --}}

<div class="sl-mainpanel">

    <div class="sl-pagebody">
        <div class="sl-page-title">
            <h5>管理員列表</h5>
        </div><!-- sl-page-title -->

        <div class="card pd-20 pd-sm-40">
            <h6 class="card-body-title">管理員清單
                <a href="{{ route('create.admin') }}" class="btn btn-sm btn-warning" style="float: right;">新增</a>
            </h6>


            <div class="table-wrapper">
                <table id="datatable1" class="table display responsive nowrap">
                    <thead>
                        <tr>
                            <th class="wd-15p">姓名</th>
                            <th class="wd-15p">手機</th>
                            <th class="wd-20p">權限</th>
                            <th class="wd-20p">功能</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach($user as $row)
                        <tr>
                            <td>{{  $row->name  }}</td>
                            <td>{{  $row->phone  }}</td>
                            <td>

                                @if($row->category == 1)
                                <span class="badge btn-danger">類別</span>
                                @else
                                @endif

                                @if($row->coupon == 1)
                                <span class="badge btn-info">優惠券</span>
                                @else
                                @endif

                                @if($row->product == 1)
                                <span class="badge btn-warning">產品</span>
                                @else
                                @endif

                                @if($row->blog == 1)
                                <span class="badge btn-primary">部落格</span>
                                @else
                                @endif

                                @if($row->order == 1)
                                <span class="badge btn-success">訂購</span>
                                @else
                                @endif

                                @if($row->other == 1)
                                <span class="badge btn-danger">其他</span>
                                @else
                                @endif

                                @if($row->report == 1)
                                <span class="badge btn-info">報告</span>
                                @else
                                @endif

                                @if($row->role == 1)
                                <span class="badge btn-warning">角色</span>
                                @else
                                @endif

                                @if($row->return == 1)
                                <span class="badge btn-primary">返回</span>
                                @else
                                @endif

                                @if($row->contact == 1)
                                <span class="badge btn-success">聯繫</span>
                                @else
                                @endif

                                @if($row->comment == 1)
                                <span class="badge btn-danger">評論</span>
                                @else
                                @endif

                                @if($row->setting == 1)
                                <span class="badge btn-info">設定</span>
                                @else
                                @endif

                                @if($row->stock == 1)
                                <span class="badge btn-info">庫存</span>
                                @else
                                @endif

                            </td>

                            <td> <a href="{{ URL::to('edit/admin/'.$row->id) }}" class="btn btn-sm btn-info">編輯</a>
                                <a href="{{ URL::to('delete/admin/'.$row->id) }}" class="btn btn-sm btn-danger">刪除</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div><!-- table-wrapper -->
        </div><!-- card -->

    </div><!-- sl-mainpanel -->

    @endsection
