@extends('layouts.admin')

@section('title')
    Product
@endsection

@section('content')
<!-- Section Content -->
<div class="section-content section-dashboard-home" data-aos="fade-up">
    <div class="container-fluid">
        <div class="dashboard-heading">
            <h2 class="dashboard-title">Produk</h2>
            <p class="dashboard-subtitle">
                Tambah Produk Baru
            </p>
        </div>                            
        <div class="dashboard-content">
            <div class="row">
                <div class="col-md-12">
                    @if($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="card">
                        <div class="card-body">
                            <form 
                                action="{{ route('product.store') }}"
                                method="POST"
                                enctype="multipart/form-data"
                            >
                                @csrf
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="">Nama Product</label>
                                            <input type="text" name="name" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="">Pemilik Product</label>                                            
                                            <select name="users_id" class="form-control" required>
                                                <option value="">--Pilih Pemilik Produk--</option>
                                                @foreach ($users as $user)
                                                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="">Kategori Product</label>
                                            <select name="categories_id" class="form-control">
                                                <option value="">--Pilih Kategori Produk--</option>                                                
                                                @foreach ($categories as $category)                                                    
                                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>     
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="">Harga Product</label>
                                            <input type="number" name="price" class="form-control" required onkeypress="return Angkasaja(event)">
                                        </div>
                                    </div>                                                                                                 
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="">Deskripsi Product</label>
                                            <textarea name="description" id="editor123"></textarea>
                                        </div>
                                    </div>                                                                                                 
                                </div>
                                <div class="row">
                                    <div class="col text-right">
                                        <button type="submit" class="btn btn-success px-5">
                                            Simpan Data
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>                        
    </div>
</div>
@endsection

@push('addon-script')
    <script src="https://cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace( 'editor123' );
    </script>
    <script type="text/javascript">
            function Angkasaja(evt){
                var charCode = (evt.which) ? evt.which : event.keyCode
                if (charCode > 31 && (charCode < 48 || charCode > 57))
                return false;
                return true;
            }
    </script>
@endpush
