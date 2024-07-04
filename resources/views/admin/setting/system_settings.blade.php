@extends('admin.layouts.app')
@section('style')
@endsection
@section('content')

    <div class="content-wrapper"> 
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-left">
                            <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}"><i class="fa fa-home"></i></a></li>
                            <li class="breadcrumb-item active">System Settings</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-primary">
                            <form action="" method="post" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>Website Name <span style="color:red"> </span> </label>
                                        <input type="text" class="form-control" name="website_name" id="" value="{{ $getRecord->website_name }}">
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Website Logo <span style="color:red"> </span> </label>
                                                <input type="file" class="form-control" name="logo" id="">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <br>
                                                @if(!empty($getRecord->getLogo()))
                                                    <img src="{{ $getRecord->getLogo() }}" alt="" style="width: 200px;">
                                                @endif
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Favicon <span style="color:red"> </span> </label>
                                                <input type="file" class="form-control" name="favicon" id="">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <br>
                                                @if(!empty($getRecord->getFavicon()))
                                                    <img src="{{ $getRecord->getFavicon() }}" alt="" style="width: 50px;">
                                                @endif
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Footer Payment Icon <span style="color:red"> </span> </label>
                                                <input type="file" class="form-control" name="footer_icon" id="">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <br>
                                                @if(!empty($getRecord->getFooterIcon()))
                                                    <img src="{{ $getRecord->getFooterIcon() }}" alt="" style="width: 200px;">
                                                @endif
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label>Footer Description <span style="color:red"> </span> </label>
                                        <textarea class="form-control" name="footer_description" id="">{{ $getRecord->footer_description }}</textarea>
                                    </div>

                                    <hr class="mt-5 mb-5">

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Office Address <span style="color:red"> </span> </label>
                                                <textarea class="form-control" name="office_address" id="">{{ $getRecord->office_address }}</textarea>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Short Description <span style="color:red"> </span> </label>
                                                <textarea class="form-control" name="short_description" id="">{{ $getRecord->short_description }}</textarea>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Working Day <span style="color:red"> </span> </label>
                                                <input type="text" class="form-control" name="office_day" id="" value="{{ $getRecord->office_day }}">
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Working Time <span style="color:red"> </span> </label>
                                                <input type="text" class="form-control" name="office_time" id="" value="{{ $getRecord->office_time }}">
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Weekend <span style="color:red"> </span> </label>
                                                <input type="text" class="form-control" name="office_weekend" id="" value="{{ $getRecord->office_weekend }}">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Phone <span style="color:red"> </span> </label>
                                                <input type="text" class="form-control" name="phone" id="" value="{{ $getRecord->phone }}">
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Mobile <span style="color:red"> </span> </label>
                                                <input type="text" class="form-control" name="mobile" id="" value="{{ $getRecord->mobile }}">
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Email <span style="color:red"> </span> </label>
                                                <input type="text" class="form-control" name="email" id="" value="{{ $getRecord->email }}">
                                            </div>
                                        </div>
                                    </div>

                                    <hr class="mt-5 mb-5">

                                    <!-- Social Icon/ Links -->

                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Facebook Link<span style="color:red"> </span> </label>
                                                <input type="text" class="form-control" name="facebook_link" id="" value="{{ $getRecord->facebook_link }}">
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Twitter Link<span style="color:red"> </span> </label>
                                                <input type="text" class="form-control" name="twitter_link" id="" value="{{ $getRecord->twitter_link }}">
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Instagram Link<span style="color:red"> </span> </label>
                                                <input type="text" class="form-control" name="instagram_link" id="" value="{{ $getRecord->instagram_link }}">
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Youtube Link<span style="color:red"> </span> </label>
                                                <input type="text" class="form-control" name="youtube_link" id="" value="{{ $getRecord->youtube_link }}">
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Pinterest Link<span style="color:red"> </span> </label>
                                                <input type="text" class="form-control" name="pinterest_link" id="" value="{{ $getRecord->pinterest_link }}">
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Social Icon/ Links End -->
                                    
                                </div>

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-outline-dark">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- /.content -->
    </div>


@endsection

@section('script')
@endsection