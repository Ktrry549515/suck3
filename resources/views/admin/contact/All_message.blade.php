@extends('admin.admin_layouts')

@section('admin_content')

<div class="sl-mainpanel">

    <div class="sl-pagebody">
        <div class="sl-page-title">
            <h5>訊息</h5>

        </div><!-- sl-page-title -->

        <div class="card pd-20 pd-sm-40">
            <h6 class="card-body-title">訊息</h6>


            <div class="table-wrapper">
                <table id="datatable1" class="table display responsive nowrap">
                    <thead>
                        <tr>
                            <th class="wd-15p">姓名</th>
                            <th class="wd-15p">手機</th>
                            <th class="wd-15p">Email</th>
                            <th class="wd-20p">訊息</th>
                            <th class="wd-20p">功能</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($message as $row)
                        <tr>
                            <td>{{  $row->name  }}</td>
                            <td>{{  $row->phone  }}</td>
                            <td>{{  $row->email  }}</td>
                            <td>{{  $row->message  }}</td>

                            <td> <a href=""
                                    class="btn btn-sm btn-info">顯示</a>

                        </tr>
                        @endforeach
                    </tbody>

                </table>
            </div><!-- table-wrapper -->
        </div><!-- card -->

    </div><!-- sl-mainpanel -->

    @endsection
