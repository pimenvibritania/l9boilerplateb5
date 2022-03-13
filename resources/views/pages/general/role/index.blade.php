@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Create Role') }}</div>

                    <div class="card-body">
                        <x-form.form-input :action="route('roles.store')" method="POST">
                            <x-form.text-input name="name" label="Name" :required="true" />
                            <x-form.select2-input
                                name="permissions[]"
                                label="Permissions"
                                placeholder="Select or Type Permissions"
                                entity="name"
                                :multiple="true"
                                :required="true"
                                :options="$permissions"/>

                            <button class="btn btn-success mt-3" type="submit">Create</button>
                        </x-form.form-input>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid mt-5">
            <table class="table table-striped table-bordered nowrap" id="roles-table">
                <thead>
                <tr>
                    <th>No</th>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Guard</th>
                    <th>Permissions</th>
                    <th>Actions</th>
                </tr>
                </thead>
            </table>
            <div class="col-md mt-3">
                <button class="btn btn-primary" type="submit" id="btn-example">Click on me</button>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $(function() {
            let table =  $('#roles-table').DataTable({
                responsive: true,
                processing: true,
                serverSide: true,
                ajax: '{!! route('roles.datatable') !!}',
                columns: [
                    { data: 'DT_RowIndex', name: 'DT_RowIndex'},
                    { data: 'id', name: 'id' },
                    { data: 'name', name: 'name' },
                    { data: 'guard_name', name: 'guard_name' },
                    { data: 'permissions', name: 'permissions' },
                    {data: 'action', name: 'action', orderable: false, searchable: false},
                ],
                columnDefs: [
                    {
                        targets: 0,
                        checkboxes: {
                            selectRow: true
                        }
                    }
                ],
                select: {
                    style: 'multi'
                },
                order: [[1, 'asc']]
            });

            new $.fn.dataTable.FixedHeader( table );

            // Handle form submission event
            $('#btn-example').on('click', function(e){

                let rows_selected = table.column(0).checkboxes.selected();

                let ids = [];

                $.each(rows_selected, function(index, rowId){
                    ids.push(rowId);
                });

                Swal.fire({
                    title: 'Roles Ids',
                    html: ids,// add html attribute if you want or remove
                });
            });
        });

    </script>
@endpush


