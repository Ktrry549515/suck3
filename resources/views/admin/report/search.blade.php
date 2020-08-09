@extends('admin.admin_layouts')

@section('admin_content')

<div class="sl-mainpanel">

    <div class="sl-pagebody">
        <div class="sl-page-title">
            <h5>搜索報告</h5>
        </div><!-- sl-page-title -->

        <div class="row">

            <div class="col-lg-4">
                <div class="card pd-20 pd-sm-40">

                    <div class="table-wrapper">

                        <form method="post" action="{{ route('search.by.date') }}">
                            @csrf

                            <div class="modal-body pd-20">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">按日期搜索</label>
                                    <input type="date" class="form-control" id="exampleInputEmail1"
                                        aria-describedby="emailHelp" name="date">
                                </div>

                            </div>
                            <!--model body-->
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-info pd-x-20">提交</button>
                            </div>
                        </form>
                    </div><!-- sl-mainpanel -->
                </div>
            </div>

            <div class="col-lg-4">
                <div class="card pd-20 pd-sm-40">

                    <div class="table-wrapper">

                        <form method="post" action="{{ route('search.by.month') }}">
                            @csrf

                            <div class="modal-body pd-20">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">按月搜索</label>
                                    <select name="month" class="form-control">
                                        <option value="january">一月</option>
                                        <option value="February">二月</option>
                                        <option value="March">三月</option>
                                        <option value="April">四月</option>
                                        <option value="May">五月</option>
                                        <option value="June">六月</option>
                                        <option value="July">七月</option>
                                        <option value="August">八月</option>
                                        <option value="September">九月</option>
                                        <option value="October">十月</option>
                                        <option value="November">十一月</option>
                                        <option value="December">十二月</option>
                                    </select>
                                </div>

                            </div>
                            <!--model body-->
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-info pd-x-20">提交</button>
                            </div>
                        </form>
                    </div><!-- sl-mainpanel -->
                </div>
            </div>


            <div class="col-lg-4">
                <div class="card pd-20 pd-sm-40">

                    <div class="table-wrapper">

                        <form method="post" action="{{ route('search.by.year') }}">
                            @csrf

                            <div class="modal-body pd-20">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">按年搜索</label>
                                    <select name="year" class="form-control">
                                        <option value="2018">2018</option>
                                        <option value="2019">2019</option>
                                        <option value="2020">2020</option>
                                        <option value="2021">2021</option>
                                        <option value="2022">2022</option>
                                        <option value="2023">2023</option>
                                        <option value="2024">2024</option>
                                        <option value="2025">2025</option>
                                        <option value="2026">2026</option>
                                    </select>
                                </div>

                            </div>
                            <!--model body-->
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-info pd-x-20">提交</button>
                            </div>
                        </form>
                    </div><!-- sl-mainpanel -->
                </div>
            </div>


        </div>
    </div>
</div>


@endsection
