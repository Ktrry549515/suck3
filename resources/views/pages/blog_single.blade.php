@extends('layouts.app')

@section('content')

<!-- Single Blog Post -->

@foreach($posts as $row)

<div class="single_post">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2">
                <div class="single_post_title">

                    @if(Session()->get('lang') == 'taiwan')
                    {{ $row->post_title_en }}
                    @else
                    {{ $row->post_title_tw }}
                    @endif

                </div>


                <div class="single_post_text">
                    <p>
                        @if(Session()->get('lang') == 'taiwan')
                        {!! $row->details_en !!}
                        @else
                        {!! $row->details_tw !!}
                        @endif
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

@endforeach

@endsection
