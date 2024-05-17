@extends('admin.admin_dashboard');
@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<div class="page-content">
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Product Add</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Add New Product</li>
                </ol>
            </nav>
        </div>

    </div>
    <!--end breadcrumb-->
    <div class="card">
        <div class="card-body p-4">
            <h5 class="card-title">Add New Product</h5>
            <hr/>
            <form id="myForm" method="post" action="{{ route('store.product') }}" enctype="multipart/form-data">
                @csrf
                <div class="form-body mt-4">
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="border border-3 p-4 rounded">
                                <div class="form-group mb-3">
                                    <label for="inputProductTitle" class="form-label">Product Name</label>
                                    <input type="text" name="product_name" class="form-control" id="inputProductTitle" placeholder="Enter product title">
                                </div>

                                <div class="mb-3">
                                    <label for="inputProductTitle" class="form-label">Product Tags</label>
                                    <input type="text" name="product_tags" class="form-control visually-hidden" data-role="tagsinput" value="new product, top product">
                                </div>

                                <div class="mb-3">
                                    <label for="inputProductTitle" class="form-label">Product Size</label>
                                    <input type="text" name="product_size" class="form-control visually-hidden" data-role="tagsinput" value="Smail, Midium, Large">
                                </div>

                                <div class="mb-3">
                                    <label for="inputProductTitle" class="form-label">Product Color</label>
                                    <input type="text" name="product_color" class="form-control visually-hidden" data-role="tagsinput"
                                        value="Red, Blue, Black">
                                </div>

                                <div class="form-group mb-3">
                                    <label for="inputProductDescription" class="form-label">Short Description</label>
                                    <textarea class="form-control" name="short_descp" id="inputProductDescription" rows="3"></textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="inputProductDescription" class="form-label">Long Description</label>
                                    <textarea id="mytextarea" name="long_descp"></textarea>
                                </div>
                                <div class="form-group  mb-3">
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
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="border border-3 p-4 rounded">
                                <div class="row g-3">
                                    <div class="form-group col-md-6">
                                        <label for="inputPrice" class="form-label"> Product Price</label>
                                        <input type="text" name="selling_price" class="form-control" id="inputPrice" placeholder="00.00">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="inputCompareatprice" class="form-label">Discount Price</label>
                                        <input type="text" name="discount_price" class="form-control" id="inputCompareatprice" placeholder="00.00">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="inputCostPerPrice" class="form-label">Product Code</label>
                                        <input type="text" name="product_code" class="form-control" id="inputCostPerPrice" placeholder="00.00">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="inputStarPoints" class="form-label">Product Quantity</label>
                                        <input type="text" name="product_qty" class="form-control" id="inputStarPoints" placeholder="00.00">
                                    </div>

                                    <div class="form-group col-12">
                                        <label for="inputProductType" class="form-label">Product Brand</label>
                                        <select name="brand_id" class="form-select" id="inputProductType">
                                            <option></option>
                                            @foreach($brands as $brand)
                                            <option value="{{ $brand->id }}">{{ $brand->brand_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group col-12">
                                        <label for="inputVendor" class="form-label">Product Category</label>
                                        <select name="category_id" class="form-select" id="inputVendor">
                                            <option></option>
                                            @foreach($categories as $cat)
                                            <option value="{{ $cat->id }}">{{ $cat->category_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group col-12">
                                        <label for="inputCollection" class="form-label">Product SubCategory</label>
                                        <select class="form-select" name="subcategory_id" id="inputCollection">
                                            <option></option>
                                        </select>
                                    </div>

                                    <div class="form-group col-12">
                                        <label for="inputVendor" class="form-label">Select Vendor</label>
                                        <select name="vendor_id" class="form-select" id="inputVendor">
                                            <option></option>
                                            @foreach($activeVendor as $vendor)
                                            <option value="{{ $vendor->id }}">{{ $vendor->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="col-6">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="hot_deals" value="1" id="flexCheckDefault">
                                            <label class="form-check-label" for="flexCheckDefault">Hot Deals</label>
                                        </div>
                                    </div>

                                    <div class="col-6">
                                        <div class="form-check">
                                            <input class="form-check-input" name="featured" type="checkbox" value="1" id="Featured">
                                            <label class="form-check-label" for="Featured">Featured</label>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="col-6">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="special_offer" value="1" id="offer">
                                            <label class="form-check-label" for="offer">Special Offer</label>
                                        </div>
                                    </div>

                                    <div class="col-6">
                                        <div class="form-check">
                                            <input class="form-check-input" name="special_deals" type="checkbox" value="1" id="special_deals">
                                            <label class="form-check-label" for="special_deals">Special Deals</label>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="col-12">
                                        <div class="d-grid">
                                            <button type="submit" class="btn btn-primary">Save Product</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--end row-->
                </div>
            </form>
        </div>
    </div>
</div>

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

<script type="text/javascript">
    $(document).ready(function(){
        $('#multiImg').on('change', function(){ //on file input change
            if (window.File && window.FileReader && window.FileList && window.Blob) //check File API supported browser
            {
                var data = $(this)[0].files; //this file data

                $.each(data, function(index, file){ //loop though each file
                    if(/(\.|\/)(gif|jpe?g|png|webp)$/i.test(file.type)){ //check supported file type
                        var fRead = new FileReader(); //new filereader
                        fRead.onload = (function(file){ //trigger function on successful read
                        return function(e) {
                            var img = $('<img/>').addClass('thumb').attr('src', e.target.result) .width(150).height(150); //create image element
                            $('#preview_img').append(img); //append image to output element
                        };
                        })(file);
                        fRead.readAsDataURL(file); //URL representing the file's data.
                    }
                });

            }else{
                alert("Your browser doesn't support File API!"); //if File API is absent
            }
        });
    });

</script>

<script type="text/javascript">
    $(document).ready(function() {
        $('#myForm').validate({
            rules: {
                product_name: {
                    required: true,
                },
                short_descp: {
                    required: true,
                },
                product_thumbnail: {
                    required: true,
                },
                multi_img: {
                    required: true,
                },
                selling_price: {
                    required: true,
                },
                discount_price: {
                    required: true,
                },
                product_code: {
                    required: true,
                },
                product_qty: {
                    required: true,
                },
                brand_id: {
                    required: true,
                },
                category_id: {
                    required: true,
                },
                subcategory_id: {
                    required: true,
                },
            },
            messages: {
                product_name: {
                    required: 'Please Enter Product Name',
                },
                short_descp: {
                    required: 'Please Enter Short Description',
                },
                product_thumbnail: {
                    required: 'Please Select Product Thumbnail Image',
                },
                multi_img: {
                    required: 'Please Select Product Multi Image',
                },
                selling_price: {
                    required: 'Please Enter Product Selling Price',
                },
                discount_price: {
                    required: 'Please Enter Product Discount Price',
                },
                product_code: {
                    required: 'Please Enter Product Code',
                },
                product_qty: {
                    required: 'Please Enter Product Quantity',
                },
                brand_id: {
                    required: 'Please Enter Product Brand Shop',
                },
                category_id: {
                    required: 'Please Enter Product Category',
                },
                subcategory_id: {
                    required: 'Please Enter Product Sub Catgory',
                },
            },
            errorElement: 'span',
            errorPlacement: function(error, element) {
                error.addClass('invalid-feedback');
                element.closest('.form-group').append(error);
            },
            highlight: function(element, errorClass, validClass) { // Sửa hightlight thành highlight
                $(element).addClass('is-invalid');
            },
            unhighlight: function(element, errorClass, validClass) { // Sửa unhightlight thành unhighlight
                $(element).removeClass('is-invalid');
            },
        });
    });

</script>
@endsection
