@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Create Role') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('roles.store') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="name" class="col-md-2 col-form-label text-md-right">Role Name</label>
                                <div class="col-md-8">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mt-3">
                                <label for="name" class="col-md-2 col-form-label text-md-right">Permissions</label>
                                <div class="col-md-8">
                                    <select class="js-example-basic-multiple form-select @error('name') is-invalid @enderror" name="permissions[]" data-placeholder="Choose anything" multiple="multiple">
                                        @foreach($permissions as $permission)
                                            <option value="{{ $permission->name }}">{{ $permission->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('permissions')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mt-3">
                                <div class="col-md-8 offset-md-2">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Create') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-center mt-5">
            <table class="table" id="roles-table">
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

    <script>
        $(document).ready(function() {
            $( '.js-example-basic-multiple' ).select2( {
                theme: 'bootstrap-5'
            } );
        });
    </script>
@endpush
