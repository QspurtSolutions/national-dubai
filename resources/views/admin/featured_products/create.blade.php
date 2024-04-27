@extends('admin.Layouts.main')
@section('content')
<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
    <div class="breadcrumb-title pe-3">Dashboard</div>
    <div class="ps-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0 p-0">
                <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                    Featured Product</li>
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
            @if($featured_products->id)
            @method('PATCH')
            @endif
            <!-- Title Field -->
            <div class="col-md-6">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control" id="title" name="title" value="{{ $featured_products->title ?? old('title') }}">
            </div>

            <!-- Description Field -->
            <div class="col-md-6">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" id="description" name="description" rows="3">{{ $featured_products->description ?? old('description') }}</textarea>
            </div>
           
<div class="form-group">
    <label for="image">Primary Image:</label>
    <input type="file" class="form-control" id="image" name="image" accept="image/*" onchange="previewImage(event)">
    <img id="image-preview" src="{{ $featured_products->image ?? '#' }}" alt="Image Preview" style="display: {{ isset($featured_products->image) ? 'block' : 'none' }}; max-width: 20%; margin-top: 10px;">
</div>

            <div class="col-12">
                <button type="submit" class="btn btn-light px-5">{{ $featured_products->id ? 'Update' : 'Submit' }}</button>
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
        var preview = document.getElementById('image-preview');
        preview.style.display = 'block';
        preview.src = URL.createObjectURL(event.target.files[0]);
    }

    // Function to preview additional images
    function previewImages(event) {
        var files = event.target.files;
        var previewContainer = document.getElementById('additional-images-preview');
        previewContainer.innerHTML = '';

        for (var i = 0; i < files.length; i++) {
            var file = files[i];
            var reader = new FileReader();

            reader.onload = function (e) {
                var img = document.createElement('img');
                img.src = e.target.result;
                img.style.maxWidth = '20%';
                img.style.marginTop = '10px';
                previewContainer.appendChild(img);
            }

            reader.readAsDataURL(file);
        }
    }
</script>

@endpush
