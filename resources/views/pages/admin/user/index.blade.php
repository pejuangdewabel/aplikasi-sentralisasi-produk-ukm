@extends('layouts.admin')

@section('title')
    User
@endsection

@section('content')
<!-- Section Content -->
<div class="section-content section-dashboard-home" data-aos="fade-up">
    <div class="container-fluid">
        <div class="dashboard-heading">
            <h2 class="dashboard-title">User</h2>
            <p class="dashboard-subtitle">
                List Of Users
            </p>
        </div>                            
        <div class="dashboard-content">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <a href="{{ route('user.create') }}" class="btn btn-primary mb-3">
                            + Tambah Kategori Baru
                        </a>
                        <div class="table table-responsive">
                            <table class="table-hover scroll-horizontal-vertical w-100" id="crudTable" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Nama Toko</th>
                                        <th>Nama Pemilik</th>                                        
                                        <th>Email</th>
                                        <th>Jenis Toko</th>
                                        <th>Alamat</th>
                                        <th>No Telp</th>                                        
                                        <th>Roles</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>                        
    </div>
</div>
@endsection

@push('addon-script')
    <script>        
        var datatable = $('#crudTable').DataTable({                                  
            processing: true,
            serverSide: true,
            ordering: true,
            ajax:{
                url: '{!! url()->current() !!}',
            },
            columns:[
                {data: 'id', name: 'id'},
                {                               
                    data: 'store_name',       
                    name: 'store_name'                    
                },
                {data: 'name', name: 'name'},
                {data: 'email', name: 'email'},
                {data: 'category.name', name: 'category.name'},
                {data: 'address_one', name: 'address_one'},
                {data: 'phone_number', name: 'phone_number'},                
                {data: 'roles', name: 'roles'},
                {
                    data: 'action',
                    name: 'action',
                    orderable: false,
                    searcable: false,
                    width: '15%'
                },
            ],
            scrollY:        "300px",
            scrollX:        true,
            scrollCollapse: true,
            paging:         false,
            fixedColumns:   {
                heightMatch: 'none'
            }                   
        })
    </script>
@endpush
