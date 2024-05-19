@extends('admin.admin_dashboard');
@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<div class="page-content">
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Edit Banner</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Edit Banner</li>
                </ol>
            </nav>
        </div>

    </div>
    <!--end breadcrumb-->
    <div class="">
        <div class="main-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <form id="myForm" method="post" action="{{ route('update.banner') }}" enctype="multipart/form-data">
                                @csrf

                                <input type="hidden" name="id" value="{{ $banners->id }}">
                                <input class="form-control" type="hidden" name="old_image" value="{{ $banners->banner_image }}" />

                                <div class=" form-group row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Banner Title</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary form-group">
                                        <input type="text" name="banner_title" class="form-control" placeholder="Enter banner title..." value="{{ $banners->banner_title }}" />
                                    </div>
                                </div>


                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Banner URL</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary form-group">
                                        <input type="text" name="banner_url" class="form-control" placeholder="Enter banner url..." value="{{ $banners->banner_url }}"/>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Banner Image</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="file" class="form-control" name="banner_image" id="image"/>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Show Image</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary" style="">
                                        <img id="showImage" src="{{ (!empty($banners->banner_image)) ? asset($banners->banner_image) : url('upload/no_image.jpg') }}" alt="Slider" style="width: 768px; height: 450px; object-fit: fill; border: 0.5px solid lightgray;">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-3"></div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="submit" class="btn btn-primary px-4" value="Save Change" />
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function() {
        $('#image').change(function(e) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#showImage').attr('src', e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        })
    });

    $(document).ready(function() {
        $('#myForm').validate({
            rules: {
                banner_title: {
                    required: true,
                },
                banner_url: {
                    required: true,
                },
            },
            messages: {
                banner_title: {
                    required: 'Please Enter Banner Title',
                },
                banner_url: {
                    required: 'Please Enter Banner Url',
                },
            },
            errorElement: 'span',
            errorPlacement: function(error, element) {
                error.addClass('invalid-feedback');
                element.closest('.form-group').append(error);
            },
            highlight: function(element, errorClass, validClass) {
                $(element).addClass('is-invalid');
            },
            unhighlight: function(element, errorClass, validClass) {
                $(element).removeClass('is-invalid');
            },
        });
    });

</script>
@endsection
