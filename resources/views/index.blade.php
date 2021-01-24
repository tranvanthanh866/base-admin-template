@extends('template')

@section('content')
<div class="row">
    <div class="col-xs-12">
        <div class="page-title-box">
            <h4 class="page-title">Dictionary </h4>
            <ol class="breadcrumb p-0 m-0">
                <li>
                    <a href="#">Dictionary</a>
                </li>
                <li class="active">
                    Find
                </li>
            </ol>
            <div class="clearfix"></div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="card-box">
            <div class="row">
                <div class="col-sm-8">
                    <form action="{{ route('home') }}">
                        <div class="form-group search-box">
                            <input value="{{ request()->get('q') }}" type="text" name="q" id="q" class="form-control product-search" placeholder="Search here...">
                            <button type="submit" class="btn btn-search"><i class="fa fa-search"></i></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@if(!empty($word))
<div class="row">
    <div class="col-lg-12">
        <div class="card-box">
            <div class="row">
                <div class="col-12">
                    <h1>Meaning of <b>{{ $word->name }}</b> in English</h1>
                    
                    <div class="entry">
                        <div class="entry-body">
                            {!! $viewWord->renderView(); !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@endif
@endsection