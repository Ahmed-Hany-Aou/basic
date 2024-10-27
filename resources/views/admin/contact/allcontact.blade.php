@extends('admin.admin_master')
@section('admin')

<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Contact Message All</h4>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Contact Message All</h4>

                        <table id="datatable" class="table table-striped table-hover table-bordered dt-responsive nowrap" 
                        style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead class="table-dark">
                                <tr>
                                    <th style="width: 5%;">Sl</th>
                                    <th style="width: 15%;">Name</th>
                                    <th style="width: 20%;">Email</th>
                                    <th style="width: 10%;">Phone</th>
                                    <th style="width: 15%;">Subject</th>
                                    <th style="width: 20%;">Message</th>
                                    <th style="width: 10%;">Date</th>
                                    <th style="width: 5%;">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php($i = 1)
                                @foreach($contacts as $item)
                                <tr>
                                    <td class="text-center">{{ $i++ }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->email }}</td>
                                    <td>{{ $item->phone }}</td>
                                    <td>{{ $item->subject }}</td>
                                    <td>{{ Str::limit($item->message, 30, '...') }}</td>
                                    <td>{{ Carbon\Carbon::parse($item->created_at)->diffForHumans() }}</td>
                                    <td class="text-center">
                                        <a href="{{ route('delete.message', $item->id) }}" 
                                           class="btn btn-danger btn-sm" 
                                           title="Delete Data" id="delete">
                                            <i class="fas fa-trash-alt"></i>
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- DataTable Initialization Script -->
<script>
    $(document).ready(function() {
        // Check if DataTable is already initialized
        if (!$.fn.DataTable.isDataTable('#datatable')) {
            $('#datatable').DataTable({
                responsive: true, // Enable responsive mode
                autoWidth: false, // Disable automatic column width adjustment
            });
        }
    });
</script>

@endsection
