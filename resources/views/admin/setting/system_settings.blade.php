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
        <!--  -->
        <!-- /.content -->
    </div>


@endsection

@section('script')
@endsection