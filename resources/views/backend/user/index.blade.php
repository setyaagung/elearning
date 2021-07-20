@extends('layouts.back-main')

@section('title','Data Pengguna')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">

    </div>
    <!-- /.content-header -->
    <section class="container">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title font-weight-bold">
                                Data Pengguna
                            </h3>
                            <a href="{{ route('user.create')}}" class="btn btn-primary btn-sm float-right">Tambah</a>
                        </div>
                        <div class="card-body">
                            @if ($message = Session::get('create'))
                                <div class="alert alert-info alert-dismissible fade show" role="alert">
                                    <strong>Success!</strong> {{$message}}.
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif
                            @if ($message = Session::get('update'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <strong>Updated!</strong> {{$message}}.
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif
                            @if ($message = Session::get('delete'))
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <strong>Deleted!</strong> {{$message}}.
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif
                            <table id="example1" class="table table-bordered table-striped table-sm">
                                <thead>
                                    <tr>
                                        <th>NO</th>
                                        <th>NAMA</th>
                                        <th>EMAIL</th>
                                        <th>ROLE</th>
                                        <th>STATUS</th>
                                        <th>AKSI</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $user)
                                        <tr>
                                            <td>{{ $loop->iteration}}</td>
                                            <td>{{ $user->name}}</td>
                                            <td>{{ $user->email}}</td>
                                            <td>{{ strtoupper($user->role->nama_role)}}</td>
                                            <td>
                                                @if ($user->status == 1)
                                                    <input type="checkbox" class="status" name="status" data-id="{{ $user->id}}" checked>
                                                @else
                                                    <input type="checkbox" class="status" name="status" data-id="{{ $user->id}}">
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{ route('user.show',$user->id)}}" class="btn btn-sm btn-success"><i class="fas fa-cog"></i> Reset Password</a>
                                                @if ($user->id_role == 1)
                                                <a href="{{ route('user.edit',$user->id)}}" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i> Edit</a>
                                                @endif
                                                <form action="{{ route('user.destroy', $user->id)}}" method="POST" class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus data ini??')"><i class="fas fa-trash"></i> Hapus</button>
                                                </form>
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
    </section>
@endsection

@push('scripts')
    <script type="text/javascript">
        $(document).ready(function(){
            $('.status').click(function (e) {
                e.preventDefault();
                var id = $(this).attr('data-id');

                $.ajax({
                    url: '/update-status/'+id,
                    type: 'GET',
                    success: function (response) {
                        alert('Status User Berhasil Diperbarui') ? "": location.reload();
                        //alertify.set('notifier', 'position', 'top-right');
                        //alertify.success(response.status);
                    }
                });

            });
        });
    </script>
@endpush
