@extends('template')

@section('content')
<div class="row">
    <div class="col-xs-12">
        <div class="page-title-box">
            <h4 class="page-title">Words </h4>
            <ol class="breadcrumb p-0 m-0">
                <li>
                    <a href="#">Dictionary</a>
                </li>
                <li>
                    <a href="#">Words </a>
                </li>
                <li class="active">
                    Lists
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
                    <form>
                        <div class="form-group search-box">
                            <input type="text" id="search-input" class="form-control product-search" placeholder="Search here...">
                            <button type="submit" class="btn btn-search"><i class="fa fa-search"></i></button>
                        </div>
                    </form>
                </div>
                <div class="col-sm-4">
                     <a href="#custom-modal" class="btn btn-success btn-rounded btn-md waves-effect waves-light m-b-30" data-animation="fadein" data-plugin="custommodal"
                                            data-overlaySpeed="200" data-overlayColor="#36404a"><i class="md md-add"></i> Add New Agent</a>
                </div>
            </div>

            <div class="table-responsive">
                <table class="table table-hover mails m-0 table table-actions-bar">
                    <thead>
                        <tr>
                            <th style="width: 140px;">
                                <div class="checkbox checkbox-primary checkbox-single m-r-15 m-l-5">
                                    <input id="action-checkbox" type="checkbox">
                                    <label for="action-checkbox"></label>
                                </div>
                                <div class="btn-group dropdown m-l-10">
                                    <button type="button" class="btn btn-default btn-xs dropdown-toggle waves-effect waves-light" data-toggle="dropdown" aria-expanded="false"><i class="caret"></i></button>
                                    <ul class="dropdown-menu" role="menu">
                                        <li><a href="#">Action</a></li>
                                        <li><a href="#">Another action</a></li>
                                        <li><a href="#">Something else here</a></li>
                                        <li class="divider"></li>
                                        <li><a href="#">Separated link</a></li>
                                    </ul>
                                </div>
                            </th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Contact No.</th>
                            <th>Listed Properties</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        <tr class="active">
                            <td>
                                <div class="checkbox checkbox-primary m-r-15 m-l-5">
                                    <input id="checkbox2" type="checkbox" checked="">
                                    <label for="checkbox2"></label>
                                </div>
                            </td>

                            <td>
                                Tomaslau
                            </td>

                            <td>
                                <a href="#">tomaslau@email.com</a>
                            </td>

                            <td>
                                987-654-3210
                            </td>
                            <td>
                                256
                            </td>
                            <td>
                                <a href="#" class="table-action-btn h3"><i class="mdi mdi-pencil-box-outline text-success"></i></a>
                                <a href="#" class="table-action-btn h3"><i class="mdi mdi-close-box-outline text-danger"></i></a>
                            </td>
                        </tr>


                    </tbody>
                </table>
            </div> <!-- end table responsive -->
        </div> <!-- end card-box -->

        <div class="text-right">
            <ul class="pagination pagination-split m-t-0">
                <li class="disabled">
                    <a href="#"><i class="fa fa-angle-left"></i></a>
                </li>
                <li>
                    <a href="#">1</a>
                </li>
                <li class="active">
                    <a href="#">2</a>
                </li>
                <li>
                    <a href="#">3</a>
                </li>
                <li>
                    <a href="#">4</a>
                </li>
                <li>
                    <a href="#">5</a>
                </li>
                <li>
                    <a href="#"><i class="fa fa-angle-right"></i></a>
                </li>
            </ul>
        </div>

    </div> <!-- end col -->


</div>
@endsection