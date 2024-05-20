@extends('admin.admin_dashboard');
@section('admin')

<div class="page-content">
<!--breadcrumb-->
<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
    <div class="breadcrumb-title pe-3">All Slider </div>
    <div class="ps-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0 p-0">
                <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">All Slider</li>
            </ol>
        </nav>
    </div>
    <div class="ms-auto">
        <div class="btn-group">
            <a href="{{ route('add.slider') }}" class="btn btn-primary">Add Slider</a>
        </div>
    </div>
</div>
<!--end breadcrumb-->
<div class="card custome-table">
    <div class="card-body">
        <div class="table-responsive">
            <form id="deleteAllForm" method="POST" action="{{ route('delete.selected.sliders') }}">
                @csrf

                <table id="example" class="table table-striped table-bordered " style="width:100%">
                    <thead>
                        <tr>
                            <th>
                                <input type="checkbox" id="selectAll">
                            </th>
                            <th>Sl</th>
                            <th>Slider Name</th>
                            <th>Short Title</th>
                            <th>Slider Image</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($sliders as $key => $item)
                        <tr>
                            <td><input type="checkbox" name="slider_ids[]" value="{{ $item->id }}" class="select-item"></td>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $item->slider_title }}</td>
                            <td>{{ $item->short_title }}</td>
                            <td style="width: 500px; height: 200px;">
                                <img src="{{ asset($item->slider_image)}}" alt="" style="width: 100%; height: 100%; object-fit: fill;" >
                            </td>
                            <td>
                                <a href="{{ route('edit.slider', $item->id) }}" class="btn btn-info">Edit</a>
                                <a href="{{ route('delete.slider', $item->id) }}" class="btn btn-danger" id="delete">Delete</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>

                </table>

                <button type="submit" class="btn btn-danger" id="deleteSelectedButton" disabled>Delete Selected</button>
            </form>
        </div>
    </div>
</div>

<script>
    document.getElementById('selectAll').addEventListener('click', function(e) {
        var checkboxes = document.querySelectorAll('.select-item');
        checkboxes.forEach(function(checkbox) {
            checkbox.checked = e.target.checked;
        });
        toggleDeleteButton();
    });

    document.querySelectorAll('.select-item').forEach(function(checkbox) {
        checkbox.addEventListener('change', function() {
            toggleDeleteButton();
        });
    });

    function toggleDeleteButton() {
        var anyChecked = Array.from(document.querySelectorAll('.select-item')).some(function(checkbox) {
            return checkbox.checked;
        });
        document.getElementById('deleteSelectedButton').disabled = !anyChecked;
    }

    document.getElementById('deleteAllForm').addEventListener('submit', function(e) {
        if (!confirm('Are you sure you want to delete selected sliders?')) {
            e.preventDefault();
        }
    });
</script>

@endsection
