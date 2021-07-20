@extends('layouts.back-main')

@section('title','Dashboard')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">

                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>#</h3>
                            <p>Author</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-chalkboard-teacher"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>

            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title font-weight-bold">
                                Aturan Input Jurnal :
                            </h3>
                        </div>
                        <div class="card-body">
                            <ol>
                                <li>Login ke sistem sesuai dengan email dan password</li>
                                <li>Pilih menu jurnal</li>
                                <li>Pilih tombol tambah pada tampilan data jurnal</li>
                                <li>Inputkan sesuai dengan form</li>
                                <li>Pada form pengisian abstrak diwajibkan ukuran font <b>14</b>, font style <b>Roboto</b>, Paragraph <b>Justify Full</b></li>
                                <li>Jika pada form author belum terdapat nama author yang akan diinputkan, maka harus mengisi dulu pada menu author</li>
                                <li>Jika sudah klik tombol simpan untuk melakukan submit</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
