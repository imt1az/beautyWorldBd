@extends('admin.admin_dashboard')
@section('admin')
    {{-- @php
        $activeNews = App\Models\NewsPost::where('status', 1)->get();
        $breakingNews = App\Models\NewsPost::where('breaking_news', 1)->get();
        $topSlider = App\Models\NewsPost::where('top_slider', 1)->get();
        $first_section_three = App\Models\NewsPost::where('first_section_three', 1)->get();
        $first_section_nine = App\Models\NewsPost::where('first_section_nine', 1)->get();
        $subCategory = App\Models\SubCategory::latest()->get();
    @endphp --}}
    <div class="content ">

        <!-- Start Content-->
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12 mb-3">
                    <div class="page-title-box ">
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <a href="{{ route('add.service.post') }}" class="btn btn-blue waves-effect waves-light">Add
                                    Service
                                    Post</a>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->


            <!-- end row-->

            <div class="row">
                <div class="col-12">
                    <div class="card overflow-auto w-100">
                        <div class="card-body">


                            <table id="basic-datatable" class="table dt-responsive nowrap w-100">
                                <thead>
                                    <tr>
                                        <th>Sl</th>
                                        <th>Title </th>
                                        <th>Description </th>




                                        <th>Action </th>
                                    </tr>
                                </thead>


                                <tbody class="">

                                    @foreach ($allService as $key => $item)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>

                                            <td>{{ Str::limit($item->title, 20) }}</td>
                                            <td>{{ Str::limit($item->description, 20) }}</td>







                                            <td>
                                                <a href="{{ route('edit.service.post', $item->id) }}"
                                                    class="btn btn-primary rounded-pill waves-effect waves-light">Edit</a>



                                                <a href="{{ route('delete.service.post', $item->id) }}"
                                                    class="btn btn-danger rounded-pill waves-effect waves-light"
                                                    id="delete">Delete</a>

                                             

                                            </td>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>

                        </div> <!-- end card body-->
                    </div> <!-- end card -->
                </div><!-- end col-->
            </div>
            <!-- end row-->



        </div> <!-- container -->

    </div> <!-- content -->
@endsection
