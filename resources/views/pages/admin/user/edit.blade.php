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
                Edit User
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
                                action="{{ route('user.update',$item->id) }}"
                                method="POST"
                                enctype="multipart/form-data"
                            >
                                @method('PUT')
                                @csrf
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="">Nama User</label>
                                            <input type="text" name="name" class="form-control" value="{{ $item->name }}" required>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="">Email User</label>
                                            <input type="email" name="email" class="form-control" value="{{ $item->email }}" required>
                                        </div>
                                    </div>
                                     <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="">Password</label>
                                            <input type="password" name="password" class="form-control">
                                            <small class="text-danger">Kosongkan Bila Tidak Mau mengganti Password</small>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="">Role Akses</label>
                                            <select name="roles" class="form-control" required>
                                                <option {{ ($item->roles == "ADMIN") ? 'selected' : '' }} value="ADMIN">ADMIN</option>
                                                <option {{ ($item->roles == "USER") ? 'selected' : '' }} value="USER">USER</option>
                                            </select>
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

