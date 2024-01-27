@extends('admin.admin_dashboard')
@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <div class="content">

        <!-- Start Content-->
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">

                                <li class="breadcrumb-item active">Client Post</li>
                            </ol>
                        </div>
                        <h4 class="page-title">Client Post</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <!-- Form row -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <form id="myForm" method="post" action="{{ route('update.client') }}"
                                enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="id" value="{{ $client->id }}">

                                <div class="row">
                                 


                               

                                    <div class="form-group col-md-6 mb-3">
                                        <label for="inputEmail4" class="form-label">Name</label>
                                        <input type="text" value="{{ $client->name }}" name="name" class="form-control" id="inputEmail4">
                                    </div>
                                    {{-- Image --}}
                                    <div class="form-group col-md-6 mb-3">
                                        <label class="form-label">Image</label>
                                        <input type="file" id='image' name="image" class="form-control">
                                    </div>

                                    <div class="form-group col-md-6 mb-3">
                                        <label for="example-fileinput" class="form-label"></label>
                                        <img id='showImage' src="{{ url('upload/no_image.jpg') }}"
                                            class="rounded-circle avatar-lg img-thumbnail" alt="profile-image">
                                    </div>
                                    {{-- End Image --}}

                                    <div class="row mb-3" id="preview_img"></div>

                                    <div class="form-group col-md-6 col-md-12 mb-3">
                                        <label for="inputEmail4" class="form-label">News Details</label>
                                        <textarea name="details">{!! $client->details !!}</textarea>
                                    </div>
                            


                                </div>



                                <button type="submit" class="btn btn-primary waves-effect waves-light">Save
                                    Changes</button>

                            </form>

                        </div> <!-- end card-body -->
                    </div> <!-- end card-->
                </div> <!-- end col -->
            </div>
            <!-- end row -->



        </div> <!-- container -->

    </div> <!-- content -->

    {{-- <script type="text/javascript">
        $(document).ready(function() {
            $('#myForm').validate({
                rules: {
                    category_id: {
                        required: true,
                    },
                    news_title: {
                        required: true,
                    },
                    multiImg: {
                        required: true,
                    },
                    image: {
                        required: true,
                    },
                  
                    news_details: {
                        required: true,
                    }


                },
                messages: {
                    category_id: {
                        required: 'Please Select Categorie',
                    },
                    news_title: {
                        required: 'Please Enter News Title',
                    },
                    multiImg: {
                        required: 'Please Select Thumbnail Photo Then Muultiple Image',
                    },
                    image: {
                        required: 'Please Choose Image',
                    },
                    
                    news_details: {
                        required: 'Please Enter News Details',
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
    </script> --}}

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

    {{-- <option value="{{ $item->id }}">{{ $item->category_name }}</option>
    <script type="text/javascript">
        $(document).ready(function() {
            $('select[name="category_id"]').on('change', function() {
                var category_id = $(this).val();
                if (category_id) {
                    $.ajax({
                        url: "{{ url('/subcategory/ajax') }}/" + category_id,
                        type: 'GET',
                        dataType: "json",
                        success: function(data) {
                            $('select[name="subcategory_id"]').html('');
                            var d = $('select[name="subcategory_id"]').empty();
                            $.each(data, function(key, value) {
                                $('select[name="subcategory_id"]').append(
                                    '<option value="' + value.id + '">' + value
                                    .subcategory_name + '</option>')
                            })

                        }
                    })
                } else {
                    alert('danger');
                }
            })
        })
    </script>  --}}

    {{--  Multiple Image  --}}

    {{-- <script type="text/javascript">
        $(document).ready(function() {
            $('#multiImg').on('change', function() { //on file input change
                if (window.File && window.FileReader && window.FileList && window
                    .Blob) //check File API supported browser
                {
                    var data = $(this)[0].files; //this file data

                    $.each(data, function(index, file) { //loop though each file
                        if (/(\.|\/)(gif|jpe?g|png)$/i.test(file
                                .type)) { //check supported file type
                            var fRead = new FileReader(); //new filereader
                            fRead.onload = (function(file) { //trigger function on successful read
                                return function(e) {
                                    var img = $('<img/>').addClass('thumb').attr('src',
                                            e.target.result).width(100)
                                        .height(80); //create image element
                                    $('#preview_img').append(
                                        img); //append image to output element
                                };
                            })(file);
                            fRead.readAsDataURL(file); //URL representing the file's data.
                        }
                    });

                } else {
                    alert("Your browser doesn't support File API!"); //if File API is absent
                }
            });
        });
    </script> --}}
@endsection
