@extends('vendor.vendor_dashboard');
@section('vendor')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<div class="page-content">
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Vendor User Profile</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="{{ route('vendor.dashboard') }}"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Vendor Profile</li>
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
                            <form method="post" action="{{ route('active.vendor.approve') }}" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="id" value="{{ $inactiveVendorDetails->id }}">
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">User Name</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="text" class="form-control" name="username" value="{{ $inactiveVendorDetails->username }}" />
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Vendor Shop Name</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="text" class="form-control" name="name" value="{{ $inactiveVendorDetails->name }}" />
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Vendor Email</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="email" class="form-control" name="email" value="{{ $inactiveVendorDetails->email }}" />
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Vendor Phone</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="text" class="form-control" name="phone" value="{{ $inactiveVendorDetails->phone }}" />
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Vendor Address</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="text" class="form-control" name="address" value="{{ $inactiveVendorDetails->address }}" />
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Vendor Join Date</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <select class="form-select mb-3" name="vendor_join" aria-label="Default select example">
                                            <option selected="">Open this select menu</option>
                                            <option value="2021" {{ $inactiveVendorDetails->vendor_join  == '2021' ? 'selected' : '' }}>2021</option>
                                            <option value="2022" {{ $inactiveVendorDetails->vendor_join  == '2022' ? 'selected' : '' }}>2022</option>
                                            <option value="2023" {{ $inactiveVendorDetails->vendor_join  == '2023' ? 'selected' : '' }}>2023</option>
                                            <option value="2024" {{ $inactiveVendorDetails->vendor_join  == '2024' ? 'selected' : '' }}>2024</option>
                                            <option value="2025" {{ $inactiveVendorDetails->vendor_join  == '2025' ? 'selected' : '' }}>2025</option>
                                            <option value="2026" {{ $inactiveVendorDetails->vendor_join  == '2026' ? 'selected' : '' }}>2026</option>
                                            <option value="2026" {{ $inactiveVendorDetails->vendor_join  == '2027' ? 'selected' : '' }}>2027</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Vendor Info</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <textarea class="form-control" name="vendor_short_info" id="inputAddress" placeholder="Vendor Info..." rows="3">
                                            {{ $inactiveVendorDetails->vendor_short_info }}
                                        </textarea>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Vendor Photo</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="file" class="form-control" name="photo" id="image"/>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Vendor Image</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <img id="showImage" src="{{ (!empty($inactiveVendorDetails->photo)) ? url('upload/vendor_images/'.$inactiveVendorDetails->photo) : url('upload/no_image.jpg') }}" alt="Admin" style="width: 150px; height: 150px; object-fit: contain;">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-3"></div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="submit" class="btn btn-danger px-4" value="Active Vendor" />
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
    })
</script>
@endsection
