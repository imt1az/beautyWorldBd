@extends('admin.admin_dashboard')

@section('admin')
<div class="content">

    <!-- Start Content-->
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <a href="" class="btn btn-primary rounded-pill waves-effect waves-light">All Clients</a>
                        </ol>
                    </div>
                    <h4 class="page-title">All Clients</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title">All Clients Data</h4>
                        <p class="text-muted font-13 mb-4">
                            DataTables has most features enabled by default, so all you need to do to use it with your own tables is to call the construction
                            function:
                            <code>$().DataTable();</code>.
                        </p>

                        <table id="basic-datatable" class="table dt-responsive nowrap w-100">
                            <thead>
                                <tr>
                                    <th>SL No</th>
                                    <th>Image</th>

                                    <th>Action</th>

                                </tr>
                            </thead>


                            <tbody>
                                @foreach ($clients as $key => $item)
                                {{-- @php
                                 echo $item;
                                @endphp --}}
                                <tr>
                                    <td>{{ $key +1 }}</td>
                                    <td><img src="{{ asset($item->image) }}" style="width:50px;height:50px">
                                    </td>

                                    <td>
                                        <a href="{{ route('edit.clients',$item->id) }}" class="btn btn-primary rounded-pill waves-effect waves-light">Edit</a>
                                        <a href="{{ route('delete.clients',$item->id) }}" id="delete" class="btn btn-danger rounded-pill waves-effect waves-light">Delete</a>
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


















        <!-- end row-->

    </div> <!-- container -->

</div> <!-- content -->

@endsection
