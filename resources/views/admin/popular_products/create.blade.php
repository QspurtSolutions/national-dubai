@extends('admin.Layouts.main')
@section('content')
<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
    <div class="breadcrumb-title pe-3">Dashboard</div>
    <div class="ps-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0 p-0">
                <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                    Sub Category</li>
                <li class="breadcrumb-item active" aria-current="page">Add Forms</li>
            </ol>
        </nav>
    </div>
</div>

<!--form Start Here --->
<div class="card radius-10 w-100">
    <div class="card-body">
        <form class="row g-3" method="POST" enctype="multipart/form-data">
            @csrf
            @if($popular_products->id)
            @method('PATCH')
            @endif
            <!-- Title Field -->
            <div class="col-md-6">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control" id="title" name="title" value="{{ $popular_products->title ?? old('title') }}">
            </div>



            <!-- Categories Dropdown -->
            <div class="col-md-6">
                <label for="category" class="form-label">Category</label>
                <select class="form-select" id="category_id" name="category_id">

                    <option value="">Select category</option>
                    @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ old('category_id', $popular_products->category_id ?? '') == $category->id ? 'selected' : '' }}>{{ $category->heading }}</option>
                    @endforeach
                </select>
            </div>


            <div class="col-md-6">
                <label for="category" class="form-label">Category</label>
                <select class="form-select" id="category_id" name="category_id">

                    <option value="">Select subCategory</option>
                    @foreach($sub_categories as $subcategory)
                    <option value="{{ $subcategory->id }}" {{ old('subcategory_id', $popular_products->subcategory_id ?? '') == $subcategory->id ? 'selected' : '' }}>{{ $subcategory->title }}</option>
                    @endforeach
                </select>
            </div>




            <!-- Description Field -->
            <div class="col-md-6">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" id="description" name="description" rows="3">{{ $popular_products->description ?? old('description') }}</textarea>
            </div>
            <!-- Image Field with Preview -->
            <div class="col-md-6">
                <label for="image" class="form-label">Image</label>
                <input type="file" class="form-control" id="image" name="image" onchange="previewImage(event)">
                <img id="image-preview" src="{{ $popular_products->image ?? '#' }}" alt="Image Preview" style="display: {{ isset($popular_products->image) ? 'block' : 'none' }}; max-width: 20%; margin-top: 10px;">
            </div>




            <div class="col-12">
                <button type="submit" class="btn btn-light px-5">{{ $popular_products->id ? 'Update' : 'Submit' }}</button>
            </div>
        </form>
    </div>
</div>




@if(session()->has('success'))
<div class="alert border-0 alert-dismissible fade show">
    <div class="text-white"> {{ session('success') }}</div>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

@endsection


@push('script')
<script>
    function previewImage(event) {
        var reader = new FileReader();
        reader.onload = function() {
            var preview = document.getElementById('image-preview');
            preview.src = reader.result;
            preview.style.display = 'block';
        };
        reader.readAsDataURL(event.target.files[0]);
    }
</script>

@endpush