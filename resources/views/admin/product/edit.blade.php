@extends('admin.layouts.app')
@section('style')
<link rel="stylesheet" href="{{ url('public/assets/plugins/summernote/summernote-bs4.min.css') }}">
@endsection
@section('content')

    <div class="content-wrapper"> 
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-left">
                            <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ url('admin/product/list') }}">Product List</a></li>
                            <li class="breadcrumb-item active">Edit Product</li>
                        </ol>
                    </div>
                    <div class="col-sm-6" style="text-align: right">
                        <a href="{{ url('admin/product/list') }}" class="btn btn-primary">Back</a>
                    </div>
                </div>
            </div>
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
                                    <div class="row">
                                        <!-- Title -->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Title <span style="color:red">*</span> </label>
                                                <input type="text" class="form-control" name="title" id="" value="{{ old('title',$product->title) }}" placeholder="Enter Product Title" required>
                                            </div>
                                        </div>

                                        <!-- SKU -->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>SKU <span style="color:red">*</span> </label>
                                                <input type="text" class="form-control" name="sku" id="" value="{{ old('sku',$product->sku) }}" placeholder="Enter Product SKU" required>
                                            </div>
                                        </div>

                                        <!-- Category -->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Category <span style="color:red">*</span> </label>
                                                <select class="form-control" name="category_id" id="ChangeCategory" required>
                                                    <option value="">Select</option>
                                                        @foreach($getCategory as $category)
                                                            <option {{ ($product->category_id == $category->id)? 'selected' : ''}} value="{{ $category->id }}">{{ $category->name }}</option>
                                                        @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <!-- Sub Category -->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Sub Category <span style="color:red">*</span> </label>
                                                <select class="form-control" name="sub_category_id" id="getSubCategory" required>
                                                    <option value="">Select</option>
                                                        @foreach($getSubCategory as $subcategory)
                                                            <option {{ ($product->sub_category_id == $subcategory->id)? 'selected' : ''}} value="{{ $subcategory->id }}">{{ $subcategory->name }}</option>
                                                        @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <!-- Brand -->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Brand <span style="color:red">*</span> </label>
                                                <select class="form-control" name="brand_id" id="">
                                                    <option value="">Select</option>
                                                        @foreach($getBrand as $brand)
                                                            <option {{ ($product->brand_id == $brand->id)? 'selected' : ''}} value="{{ $brand->id }}">{{ $brand->name }}</option>
                                                        @endforeach
                                                </select>
                                            </div>
                                        </div>

                                    </div>

                                    <!-- Color -->
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Color</label>
                                                @foreach($getColor as $color)
                                                    @php
                                                        $checked = '';
                                                    @endphp

                                                    @foreach($product->getColor as $pcolor)
                                                        @if($pcolor->color_id == $color->id)
                                                            @php
                                                                $checked = 'checked';
                                                            @endphp
                                                        @endif
                                                    @endforeach
                                                    <div>
                                                        <label><input {{ $checked }} type="checkbox" name="color_id[]" value="{{ $color->id }}"> {{ $color->name }}</label>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>

                                    <hr>

                                    <!-- Price -->
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Price ($)<span style="color:red">*</span> </label>
                                                <input type="text" class="form-control" name="price" id="" value="{{ !empty($product->price) ? $product->price: '' }}" placeholder="Enter Product Price" required>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>OLD Price ($)<span style="color:red">*</span> </label>
                                                <input type="text" class="form-control" name="old_price" id="" value="{{ !empty($product->old_price) ? $product->old_price: '' }}" placeholder="Enter Product OLD Price" required>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <!-- Size -->
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Size</label>
                                                <table class="table table-striped">
                                                    <thead>
                                                        <tr>
                                                            <th>Name</th>
                                                            <th>Price ($)</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="AppendSize">
                                                        <tr>
                                                            <td>
                                                                <input type="text" name="size[100][name]" placeholder="Name" class="form-control">
                                                            </td>
                                                            <td>
                                                                <input type="text" name="size[100][price]" placeholder="Price" class="form-control">
                                                            </td>
                                                            <td style="width: 200px">
                                                                <button type="button" class="btn btn-primary AddSize">Add</button>
                                                            </td>
                                                        </tr>
                                                        @php
                                                            $i_s = 1;
                                                        @endphp
                                                        @foreach($product->getSize as $size)
                                                        <tr id="DeleteSize{{$i_s}}">
                                                            <td>
                                                                <input type="text" value="{{ $size->name }}" name="size[{{$i_s}}][name]" placeholder="Name" class="form-control">
                                                            </td>
                                                            <td>
                                                                <input type="text" value="{{ $size->price }}" name="size[{{$i_s}}][price]" placeholder="Price" class="form-control">
                                                            </td>
                                                            <td style="width: 200px">
                                                            <button type="button" id="{{$i_s}}" class="btn btn-danger DeleteSize">Delete</button>
                                                            </td>
                                                        </tr>
                                                        @php
                                                            $i_s++;
                                                        @endphp
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>

                                    <hr>

                                    <!-- Image -->
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Image <span style="color:red"></span> </label>
                                                <input type="file" name="image[]" multiple accept="image/*" style="padding: 3px;" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    @if(!empty($product->getImage->count()))
                                        <div class="row" id="sortable">
                                            @foreach($product->getImage as $image)
                                                <div class="col-md-1 sortable_image" id="{{ $image->id }}" style="text-align: center;">
                                                    <img style="width: 100%; height: 100px;" src="{{ $image->getLogo() }}">
                                                    <a onclick="return confirm('Are you sure! you want to delete this item?');" href="{{ url('admin/product/image_delete/'.$image->id) }}" style="margin-top: 10px;" class="btn btn-danger btn-sm">Delete</a>
                                                </div>
                                            @endforeach
                                        </div>
                                    @endif

                                    <hr>

                                    <!-- Short Description -->
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Short Description <span style="color:red">*</span> </label>
                                                <textarea id="" class="form-control" name="short_description" placeholder="Enter Product Short Description" style="height: 190px;">{{ $product->short_description }}</textarea>
                                            </div>
                                        </div>
                                    <!-- </div> -->

                                    <!-- Description -->
                                    <!-- <div class="row"> -->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Description <span style="color:red">*</span> </label>
                                                <textarea id="" class="form-control editor" name="description" placeholder="Enter Product Description">{{ $product->description }}</textarea>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Additiona Information -->
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Additiona Information <span style="color:red">*</span> </label>
                                                <textarea id="" class="form-control editor" name="additiona_information" placeholder="Enter Product Additiona Information">{{ $product->additiona_information }}</textarea>
                                            </div>
                                        </div>
                                    <!-- </div> -->

                                    <!-- Shipping Return -->
                                    <!-- <div class="row"> -->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Shipping Return <span style="color:red">*</span> </label>
                                                <textarea id="" class="form-control editor" name="shipping_return" placeholder="Enter Product Shipping Return">{{ $product->shipping_return }}</textarea>
                                            </div>
                                        </div>
                                    </div>

                                    <hr>

                                    <!-- Status -->
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Status <span style="color:red">*</span> </label>
                                                <select name="status" id="" class="form-control" required>
                                                    <option {{ ($product->status == 0) ? 'selected' : '' }} value="0">Active</option>
                                                    <option {{ ($product->status == 1) ? 'selected' : '' }} value="1">In Active</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">update</button>
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
    <script src="{{ url('public/sortable/jquery-ui.js') }}"></script>

    <!-- <script src="{{ url('public/tinymce/tinymce-jquery.min.js') }}"></script> -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/@tinymce/tinymce-jquery@1/dist/tinymce-jquery.min.js"></script> -->
  

    <script src="{{ url('public/assets/plugins/summernote/summernote-bs4.min.js') }}"></script>

    <script type="text/javascript">

        $('.editor').summernote({
            height: 100
        });

        // $('.editor').tinymce({
        //     height: 200,
        //     menubar: false,
        //     plugins: [
        //     'a11ychecker','advlist','advcode','advtable','autolink','checklist','export',
        //     'lists','link','image','charmap','preview','anchor','searchreplace','visualblocks',
        //     'powerpaste','fullscreen','formatpainter','insertdatetime','media','table','help','wordcount'
        //     ],
        //     toolbar: 'undo redo | a11ycheck casechange blocks | bold italic backcolor | alignleft aligncenter alignright alignjustify | bullist numlist checklist outdent indent | removeformat | code table help'
        // });

        var i = 101;
        $('body').delegate('.AddSize', 'click', function() {
            var html = '<tr id = "DeleteSize'+i+'">\n\
                            <td>\n\
                                <input type="text" name="size['+i+'][name]" placeholder="Name" class="form-control">\n\
                            </td>\n\
                            <td>\n\
                                <input type="text" name="size['+i+'][price]" placeholder="Price" class="form-control">\n\
                            </td>\n\
                            <td>\n\
                                <button type="button" id="'+i+'" class="btn btn-danger DeleteSize">Delete</button>\n\
                            </td>\n\
                        </tr>';
            i++;
            $('#AppendSize').append(html);
        });

        $('body').delegate('.DeleteSize','click', function() { 
            var id = $(this).attr('id'); 
            $('#DeleteSize'+id).remove();
        });

        $('body').delegate('#ChangeCategory', 'change', function(e) { 
            var id = $(this).val();
            $.ajax({
                type: "POST",
                url: "{{ url('admin/get_sub_category') }}",
                data: {
                    "id" : id,
                    "_token": "{{ csrf_token() }}"
                },
                dataType: "json",
                success: function(data) {
                    $('#getSubCategory').html(data.html);
                },
                error: function (data) {
                }
            });
        });


        $(document).ready(function() { 
            $( "#sortable" ).sortable({
                update : function(event, ui) {
                    var photo_id = new Array();
                    $('.sortable_image').each(function() {
                        var id = $(this).attr('id');
                        // console.log(id);
                        photo_id.push(id);
                    });
                    $.ajax({
                        type: "POST",
                        url: "{{ url('admin/product_image_sortable') }}",
                        data: {
                            "photo_id" : photo_id,
                            "_token": "{{ csrf_token() }}"
                        },
                        dataType: "json",
                        success: function(data) {
                            
                        },
                        error: function (data) {
                        }
                    });
                }
            });
        });

    </script>

@endsection