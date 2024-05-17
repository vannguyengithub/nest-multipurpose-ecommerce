@extends('admin.admin_dashboard');
@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<div class="page-content">
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Product Edit</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Edit Product</li>
                </ol>
            </nav>
        </div>

    </div>
    <!--end breadcrumb-->
    <div class="card">
        <div class="card-body p-4">
            <h5 class="card-title">Edit Product</h5>
            <hr/>
            <form id="myForm" method="post" action="{{ route('update.product') }}">
                @csrf
                <input type="hidden" name="id" value="{{ $products->id }}">
                <div class="form-body mt-4">
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="border border-3 p-4 rounded">
                                <div class="form-group mb-3">
                                    <label for="inputProductTitle" class="form-label">Product Name</label>
                                    <input type="text" name="product_name" class="form-control" id="inputProductTitle" placeholder="Enter product title" value="{{ $products->product_name }}">
                                </div>

                                <div class="mb-3">
                                    <label for="inputProductTitle" class="form-label">Product Tags</label>
                                    <input type="text" name="product_tags" class="form-control visually-hidden" data-role="tagsinput" value="{{ $products->product_tags }}">
                                </div>

                                <div class="mb-3">
                                    <label for="inputProductTitle" class="form-label">Product Size</label>
                                    <input type="text" name="product_size" class="form-control visually-hidden" data-role="tagsinput" value="{{ $products->product_size }}">
                                </div>

                                <div class="mb-3">
                                    <label for="inputProductTitle" class="form-label">Product Color</label>
                                    <input type="text" name="product_color" class="form-control visually-hidden" data-role="tagsinput"
                                    value="{{ $products->product_color }}" >
                                </div>

                                <div class="form-group mb-3">
                                    <label for="inputProductDescription" class="form-label">Short Description</label>
                                    <textarea class="form-control" name="short_descp" id="inputProductDescription" rows="3">
                                        {!! $products->short_descp !!}
                                    </textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="inputProductDescription" class="form-label">Long Description</label>
                                    <textarea id="mytextarea" name="long_descp">
                                        {!! $products->long_descp !!}
                                    </textarea>
                                </div>
                                <!-- <div class="form-group  mb-3">
                                    <label for="inputProductDescription" class="form-label">Main Thumbnail</label>
                                    <input class="form-control" name="product_thumbnail" type="file" id="formFile" onChange="mainThumbUrl(this)" />
                                    <br>
                                    <img id="mainThumb" src="" alt="" style="object-fit: contain; border: 1px solid; border-radius: 4px;">
                                </div>
                                <div class="form-group mb-3">
                                    <label for="multi_image" class="form-label">Multiple Images</label>
                                    <input class="form-control" type="file" name="multi_img[]" id="multiImg" multiple >
                                    <br>
                                    <br>
                                    <div class="row" id="preview_img"></div>
                                </div> -->
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="border border-3 p-4 rounded">
                                <div class="row g-3">
                                    <div class="form-group col-md-6">
                                        <label for="inputPrice" class="form-label"> Product Price</label>
                                        <input type="text" name="selling_price" class="form-control" id="inputPrice" placeholder="00.00" value="{{ $products->selling_price }}">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="inputCompareatprice" class="form-label">Discount Price</label>
                                        <input type="text" name="discount_price" class="form-control" id="inputCompareatprice" placeholder="00.00" value="{{ $products->discount_price }}">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="inputCostPerPrice" class="form-label">Product Code</label>
                                        <input type="text" name="product_code" class="form-control" id="inputCostPerPrice" placeholder="00.00" value="{{ $products->product_code }}">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="inputStarPoints" class="form-label">Product Quantity</label>
                                        <input type="text" name="product_qty" class="form-control" id="inputStarPoints" placeholder="00.00" value="{{ $products->product_qty }}">
                                    </div>

                                    <div class="form-group col-12">
                                        <label for="inputProductType" class="form-label">Product Brand</label>
                                        <select name="brand_id" class="form-select" id="inputProductType">
                                            <option></option>
                                            @foreach($brands as $brand)
                                            <option value="{{ $brand->id }}" {{ $brand->id == $products->brand_id ? 'selected' : ''}} >{{ $brand->brand_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group col-12">
                                        <label for="inputVendor" class="form-label">Product Category</label>
                                        <select name="category_id" class="form-select" id="inputVendor">
                                            <option></option>
                                            @foreach($categories as $cat)
                                            <option value="{{ $cat->id }}" {{ $cat->id == $products->category_id ? 'selected' : ''}}>{{ $cat->category_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group col-12">
                                        <label for="inputCollection" class="form-label">Product SubCategory</label>
                                        <select class="form-select" name="subcategory_id" id="inputCollection">
                                            @foreach($subcategory as $subcat)
                                            <option value="{{ $subcat->id }}" {{ $subcat->id == $products->subcategory_id ? 'selected' : ''}}> {{ $subcat->subcategory_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group col-12">
                                        <label for="inputVendor" class="form-label">Select Vendor</label>
                                        <select name="vendor_id" class="form-select" id="inputVendor">
                                            <option></option>
                                            @foreach($activeVendor as $vendor)
                                            <option value="{{ $vendor->id }}" {{ $vendor->id == $products->vendor_id ? 'selected' : ''}}>{{ $vendor->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="col-6">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="hot_deals" value="1" id="flexCheckDefault" {{ $products->hot_deals == 1 ? 'checked' : '' }}>
                                            <label class="form-check-label" for="flexCheckDefault">Hot Deals</label>
                                        </div>
                                    </div>

                                    <div class="col-6">
                                        <div class="form-check">
                                            <input class="form-check-input" name="featured" type="checkbox" value="1" id="Featured" {{ $products->featured == 1 ? 'checked' : '' }}>
                                            <label class="form-check-label" for="Featured">Featured</label>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="col-6">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="special_offer" value="1" id="offer" {{ $products->special_offer == 1 ? 'checked' : '' }}>
                                            <label class="form-check-label" for="offer">Special Offer</label>
                                        </div>
                                    </div>

                                    <div class="col-6">
                                        <div class="form-check">
                                            <input class="form-check-input" name="special_deals" type="checkbox" value="1" id="special_deals"  {{ $products->special_deals == 1 ? 'checked' : '' }}>
                                            <label class="form-check-label" for="special_deals">Special Deals</label>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                    <br>
                    <div class="col-12">
                        <div class="">
                            <button type="submit" class="btn btn-primary">Save Info Product</button>
                        </div>
                    </div>
                    <!--end row-->
                </div>
            </form>
        </div>
    </div>
</div>
<!-- ---- Start main Img---- -->
<div class="page-content">
    <div class="card">
        <div class="card-body p-4">
            <h5 class="card-title">Update Main Image Thumbnail</h5>
            <hr/>
            <form id="myForm" method="post" action="{{ route('update.product.thumbnail') }}" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id" value="{{ $products->id }}">
                <input type="hidden" name="old_img" value="{{ $products->product_thumbnail }}">
                <div class="form-body mt-4">
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="border border-3 p-4 rounded">
                                <div class="form-group mb-3">
                                    <label for="inputProductTitle" class="form-label">Chose Thumbnail Image</label>
                                    <input class="form-control" name="product_thumbnail" type="file" id="formFile" onChange="mainThumbUrl(this)" />
                                    <br>
                                    <img id="mainThumb" src="{{ asset($products->product_thumbnail) }}" alt="" style="object-fit: contain; border-radius: 8px; width: 200px; height: 200px; border: 1px solid lightgrey;">
                                </div>
                            </div>

                            <br>
                            <div class="col-lg-8">
                                <button type="submit" class="btn btn-primary">Save Product</button>
                            </div>
                        </div>

                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- ---- End main Img---- -->

<!-- start Upload Multi Image -->
<div class="page-content">
    <div class="card">
        <div class="card-body p-4">
            <h5 class="card-title">Add An Image To Multi Image</h5>
            <hr/>
            <form method="post" action="{{ route('store.new.multiimage') }}" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="imageid" value="{{ $products->id }}">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="border border-3 p-4 rounded">
                            <div class="form-group mb-3">
                                <label for="inputProductTitle" class="form-label">Chose a Image</label>
                                <input type="file" name="multi_img" class="form-control" >
                            </div>
                        </div>
                    </div>
                </div>
                <br>
                <input type="submit" class="btn btn-info" value="Add Image">
            </form>
        </div>
    </div>
</div>
<!-- end Upload Multi Image -->

<!-- start Upload Multi Image -->
<div class="page-content">
    <div class="card">
        <div class="card-body p-4">
            <h5 class="card-title">Update Multi Image</h5>
            <hr/>
            <div class="table-responsive">
                <table class="table table-striped table-bordered " style="width:100%">
                    <thead>
                        <tr>
                            <th>#Sl</th>
                            <th>Image</th>
                            <th>Change Image</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        <form id="myForm" method="post" action="{{ route('update.product.multiimage') }}" enctype="multipart/form-data">
                            @csrf

                            @foreach($multiImgs as $key => $img )
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>
                                    <img src="{{ asset($img->photo_name) }}" alt="" style="width: 100px; height: 100px; object-fit: contain; border: 1px solid darkgrey; border-radius: 8px;" >
                                </td>
                                <td>
                                    <div style="display: flex; align-items: center; justify-content: center; height: 100px; gap: 8px;">
                                        <input type="file" class="form-group" name="multi_img[ {{ $img->id }} ]" >
                                    </div>
                                </td>
                                <td>
                                    <div style="display: flex; align-items: center; justify-content: center; height: 100px; gap: 8px;">
                                        <input type="submit" class="btn btn-primary" value="Update Image">
                                        <a href="{{ route('product.multiimg.delete', $img->id) }}" class="btn btn-danger" id="delete">Detele</a>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </form>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>#Sl</th>
                            <th>Image</th>
                            <th>Change Image</th>
                            <th>Delete</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- end Upload Multi Image -->



<script type="text/javascript">
    function mainThumbUrl(input) {
        if(input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#mainThumb').attr('src', e.target.result).width(150).height(150);
            };
            reader.readAsDataURL(input.files[0]);
        }
    };
</script>

<script type="text/javascript">
    $(document).ready(function() {
        $('select[name="category_id"]').on('change', function() {
            var category_id = $(this).val();
            if (category_id) {
                $.ajax({
                    url: "/subcategory/ajax/" + category_id, // Corrected URL
                    type: "GET",
                    dataType: "json",
                    success: function(data) {
                        $('select[name="subcategory_id"]').empty(); // Simplified code
                        $.each(data, function(key, value) { // Corrected typo
                            $('select[name="subcategory_id"]').append('<option value="' + value.id + '"> ' + value.subcategory_name + ' </option>'); // Corrected syntax
                        });
                    }
                });
            } else {
                alert('danger');
            }
        });
    });
</script>

@endsection
