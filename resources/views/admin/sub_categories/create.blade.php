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
            @if($sub_categories->id)
            @method('PATCH')
            @endif
            <!-- Title Field -->
            <div class="col-md-6">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control" id="title" name="title" value="{{ $sub_categories->title ?? old('title') }}">
            </div>



            <!-- Categories Dropdown -->
            <div class="col-md-6">
                <label for="category" class="form-label">Category</label>
                <select class="form-select" id="category_id" name="category_id">

                    <option value="">Select category</option>
                    @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ old('category_id', $sub_categories->category_id ?? '') == $category->id ? 'selected' : '' }}>{{ $category->heading }}</option>
                    @endforeach
                </select>
            </div>
            <!-- Description Field -->

            <!-- Image Field with Preview -->
            <!-- <div class="col-md-6">
                <label for="image" class="form-label">Image</label>
                <input type="file" class="form-control" id="image" name="image" onchange="previewImage(event)">
                <img id="image-preview" src="{{ $sub_categories->image ?? '#' }}" alt="Image Preview" style="display: {{ isset($sub_categories->image) ? 'block' : 'none' }}; max-width: 20%; margin-top: 10px;">
            </div> -->
           
          <!-- Primary Image Field with Preview -->
<div class="form-group">
    <label for="image">Primary Image:</label>
    <input type="file" class="form-control" id="image" name="image" accept="image/*" onchange="previewImage(event)">
    <img id="image-preview" src="{{ $sub_categories->image ?? '#' }}" alt="Image Preview" style="display: {{ isset($sub_categories->image) ? 'block' : 'none' }}; max-width: 20%; margin-top: 10px;">
</div>

<!-- Additional Images Field with Preview -->
<div class="form-group">
    <label for="additional_images">Additional Images:</label>
    <input type="file" class="form-control" id="additional_images" name="additional_images[]" multiple accept="image/*" onchange="previewImages(event)">
    <div id="additional-images-preview"></div>
</div>




            <div class="col-12">
                <button type="submit" class="btn btn-light px-5">{{ $sub_categories->id ? 'Update' : 'Submit' }}</button>
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
<!-- <script>
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
</script> -->

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

    // Function to display already uploaded additional images on edit
// Function to display additional images already associated with the sub-category
function displayExistingImages(images) {
    var previewContainer = document.getElementById('additional-images-preview');
    previewContainer.innerHTML = '';

    images.forEach(function(image) {
        var img = document.createElement('img');
        //img.src = image.image_path;
        img.src = '{{ asset('storage/') }}' + '/' + image.image_path; 
        img.style.maxWidth = '20%';
        img.style.marginTop = '10px';
        previewContainer.appendChild(img);
    });
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

// Check if sub_categories has additional_images
var additionalImages = {!! json_encode($sub_categories->images) !!};
if (additionalImages && additionalImages.length > 0) {
    displayExistingImages(additionalImages);
}

var subcategoryId = {!! json_encode($sub_categories->id) !!};
if (subcategoryId) {
    fetch("/admin/sub_categories/" + subcategoryId + "/images")
        .then(response => response.json())
        .then(data => {
            if (data.images && data.images.length > 0) {
                console.log(data.images);
                displayUploadedImages(data.images);
            }
        })
        .catch(error => console.error('Error fetching images:', error));
}
</script>
@endpush
