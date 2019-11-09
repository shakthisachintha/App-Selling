@extends('template.main')


@section('content')

<div class="row">
    <div class="col">

        <div class="card">
            <div class="card-header">
                    <h3 class="card-title">All Users</h3>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <div id="zero_config_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
                            <div class="row">
                                <div class="col-sm-12">
                                <table id="zero_config" class="text-center table dataTable" role="grid" aria-describedby="zero_config_info">
                        <thead>
                            <tr role="row">
                                <th tabindex="0" aria-controls="zero_config" rowspan="1" colspan="1">#</th>
                                <th class="sorting" tabindex="0" aria-controls="zero_config" rowspan="1" colspan="1">Name</th>
                                <th class="sorting" tabindex="0" aria-controls="zero_config" rowspan="1" colspan="1">Email</th>
                                <th class="sorting" tabindex="0" aria-controls="zero_config" rowspan="1" colspan="1">Telephone</th>
                                
                        </thead>
                        <tbody>
                            <?php $count=1?>
                            @foreach ($apps as $app)
                                <tr>
                                    <td>{{$count}}</td>
                                    <td>{{$app->name}}</td>
                                    <td>{{$app->email}}</td>
                                    <td>{{$app->telephone}}</td>
                              
                                </tr>
                                <?php $count++?>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th rowspan="1" colspan="1">#</th>
                                <th rowspan="1" colspan="1">Name</th>
                                <th rowspan="1" colspan="1">Email</th>
                                <th rowspan="1" colspan="1">Telephone</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
                </div>
                </div>

            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')
<script>
        $('#zero_config').DataTable({
            "columnDefs": [
                { "orderable": false, "targets": [0,2] }
            ]
        });
</script>



@endsection
