@extends('admin.admin_dashboard');
@section('admin')

<div class="page-content">
<!--breadcrumb-->
<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
    <div class="breadcrumb-title pe-3">All Product </div>
    <div class="ps-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0 p-0">
                <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">All Product</li>
            </ol>
        </nav>
    </div>
    <div class="ms-auto">
        <div class="btn-group">
            <a href="{{ route('add.product') }}" class="btn btn-primary">Add Product</a>
        </div>
    </div>
</div>
<!--end breadcrumb-->
<br>
<hr>
<h6> Total product: <span class="badge rounded-pill bg-success">{{ count($products) }}</span></h6>
<hr>
<div class="card custome-table">
    <div class="card-body">
        <div class="table-responsive">
            <table id="example" class="table table-striped table-bordered " style="width:100%">
                <thead>
                    <tr>
                        <th>Sl</th>
                        <th>Image</th>
                        <th>Product Name</th>
                        <th>Price</th>
                        <th>QTY</th>
                        <th>Discount</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($products as $key => $item)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>
                            <img src="{{ asset($item->product_thumbnail) }}" alt="" style="width: 70px; height: 70px; object-fit: contain;" >
                        </td>
                        <td>{{ $item->product_name }}</td>
                        <td>{{ $item->selling_price }}</td>
                        <td>{{ $item->product_qty }}</td>
                        <!-- <td>
                            @if($item->discount_price == NUll)
                            <span class="badge rounded-pill bg-success"> No Discount</span>
                            @else
                            @php
                                $amount = $item->selling_price - $item->discount_price;
                                $discount = ($amount/$item->selling_price) * 100;
                            @endphp
                            <span class="badge rounded-pill bg-danger">{{ round($discount) }}%</span>
                            @endif
                        </td> -->

                        <td>
                            @if(is_numeric($item->selling_price) && is_numeric($item->discount_price) && $item->discount_price != null)
                                @php
                                    $amount = $item->selling_price - $item->discount_price;
                                    $discount = ($amount / $item->selling_price) * 100;
                                @endphp
                                <span class="badge rounded-pill bg-danger">{{ round($discount) }}%</span>
                            @else
                                <span class="badge rounded-pill bg-info">No Discount</span>
                            @endif
                        </td>

                        <td>
                            @if($item->status == 1)
                            <span class="badge rounded-pill bg-success">Active</span>
                            @else
                            <span class="badge rounded-pill bg-danger">InActive</span>
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('edit.product', $item->id) }}" class="btn btn-info" title="Edit Product">
                                <div class="fa-solid fa-pen-to-square"></div>
                            </a>
                            <a href="{{ route('delete.category', $item->id) }}" class="btn btn-danger" id="delete" title="Delete Product">
                                <div class="fa-solid fa-trash-can"></div>
                            </a>
                            <a href="{{ route('delete.category', $item->id) }}" class="btn btn-warning" title="Details Page">
                                <div class="fa-regular fa-eye"></div>
                            </a>
                            @if($item->status == 1)
                            <a href="{{ route('product.inactive', $item->id) }}" class="btn btn-danger"  title="Inactive">
                                <div class="fa-solid fa-thumbs-down"></div>
                            </a>
                            @else
                            <a href="{{ route('product.active', $item->id) }}" class="btn btn-warning"  title="Active">
                                <div class="fa-solid fa-thumbs-up"></div>
                            </a>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
