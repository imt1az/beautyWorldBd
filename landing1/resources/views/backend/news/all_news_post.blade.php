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
                                <a href="{{ route('add.news.post') }}" class="btn btn-blue waves-effect waves-light">Add News
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
                                        <th>Image </th>
                                        <th>Title </th>
                                        <th>Category </th>
                                   
                                 
                                      
                                        <th>Action </th>
                                    </tr>
                                </thead>


                                <tbody class="">
                                 
                                    @foreach ($allNews as $key => $item)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td><img src="{{ asset($item->image) }} " style="width: :50px; height:50px;">
                                        </td>
                                        <td>{{ Str::limit($item->news_title, 20) }}</td>
                                        @if ($item->category_id == null)
                                            <td> </td>
                                        @else
                                            <td>{{ $item['category']['category_name'] }}</td>
                                        @endif
                                        {{-- <td>{{ $item['category']['category_name'] }}</td> --}}



                                        {{-- <td>{{ $item['subcategory']['subcategory_name'] === Null  ? ''  : $item['subcategory']['subcategory_name']}}</td> --}}





                                        <td>
                                            <a href="{{ route('edit.newspost', $item->id) }}"
                                                class="btn btn-primary rounded-pill waves-effect waves-light">Edit</a>



                                            <a href="{{ route('delete.newspost', $item->id) }}"
                                                class="btn btn-danger rounded-pill waves-effect waves-light"
                                                id="delete">Delete</a>

                                            @if ($item->special == 1)
                                                <a href="{{ route('nonspecial.newspost', $item->id) }}"
                                                    class="btn rounded-pill waves-effect "><i class='fas fa-bell'
                                                        style='font-size:20px;color:green'></i></a>
                                            @else
                                                <a href="{{ route('special.newspost', $item->id) }}"
                                                    class="btn rounded-pill waves-effect"><i class='fas fa-bell-slash'
                                                        style='font-size:20px;color:red'></i></a>
                                            @endif





                                            @if ($item->status == 1)
                                                <a href="{{ route('inactive.news.post', $item->id) }}"
                                                    class="btn btn-primary rounded-pill waves-effect waves-light"
                                                    title="Inactive"><i class="fas fa-thumbs-up"></i></a>
                                            @else
                                                <a href="{{ route('active.news.post', $item->id) }}"
                                                    class="btn btn-primary rounded-pill waves-effect waves-light"
                                                    title="Active"><i class="fas fa-thumbs-down"></i></i></a>
                                            @endif

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
