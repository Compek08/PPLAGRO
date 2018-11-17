@extends('adminlte::page')

@section('htmlheader_title')
	Change Title here!
@endsection


@section('main-content')
	<div class="container-fluid spark-screen">
		<div class="row">
			<div class="col-md-9 col-md-offset-1">

				<div class="box box-success box-solid">
                    <div class="box-header with-border">
                        <h3 class="box-title">Stock Ayam yang Tersedia</h3>
                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                        </div>
                        <!-- /.box-tools -->
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table class="table">
                                <tr>
                                    <th>No</th>
                                    <th>Nama Barang</th>
                                    <th>Stock</th>
                                    <th>Harga Perkilo</th>
                                </tr>
                                <?php
                                    $no = 0;
                                    foreach ($ayam as $key): ?>
                                <?php  $no = $no + 1; ?>
                                <tr>
                                    <td>{{$no}}</td>
                                    <td>{{$key->type}}</td>
                                    <td>{{$key->stock}}</td>
                                    <td>{{$key->price}}</td>
                                    <?php if(Auth::user()->role == 0) { ?>
                                        <td style="text-align: center;">
                                            <a href="/admin/{{ Auth::user()->name }}/data/edit/{{$key->id}}" class="btn btn-warning">Edit</a>
                                            <button href="/stock" class="btn btn-danger" type="button" data-toggle="modal" data-target="#myModal">Hapus</button>
                                        </td> <?php } else { ?>
                                            <td style="text-align: center;">
                                                <a href="/order" class="btn btn-success">Pesan</a>
                                            </td>
                                        <?php } ?>
                                </tr>
                                <?php endforeach ?>
                        </table>
                        <?php if(Auth::user()->role == 0) {?>
                            <button href="" type="button" class="btn btn-block btn-default">Tambah</button>
                            {{ csrf_field() }}
                        <?php }?>
                    </div>
                    <!-- /.box-body -->
                </div>


                <div class="box box-primary box-solid">
                    <div class="box-header with-border">
                        <h3 class="box-title">Stock Telur yang Tersedia</h3>
                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                        </div>
                        <!-- /.box-tools -->
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table class="table">
                                <tr>
                                    <th>No</th>
                                    <th>Nama Barang</th>
                                    <th>Stock</th>
                                    <th>Harga Perkilo</th>
                                </tr>
                                <?php
                                    $no = 0;
                                    foreach ($telur as $key): ?>
                                <?php  $no = $no + 1; ?>
                                <tr>
                                    <td>{{$no}}</td>
                                    <td>{{$key->type}}</td>
                                    <td>{{$key->stock}}</td>
                                    <td>{{$key->price}}</td>
                                    <?php if(Auth::user()->role == 0) { ?>
                                        <td style="text-align: center;">
                                            <a href="/admin/{{ Auth::user()->name }}/data/edit/{{$key->id}}" class="btn btn-warning">Edit</a>
                                            <button href="/stock" class="btn btn-danger" type="button" data-toggle="modal" data-target="#myModal">Hapus</button>
                                        </td> <?php } else { ?>
                                            <td style="text-align: center;">
                                                <a href="/order" class="btn btn-success">Pesan</a>
                                            </td>
                                        <?php } ?>
                                </tr>
                                <?php endforeach ?>
                        </table>
                        <?php if(Auth::user()->role == 0) {?>
                            <button href="" type="button" class="btn btn-block btn-default">Tambah</button>
                            {{ csrf_field() }}
                        <?php }?>
                    </div>
                    <!-- /.box-body -->
                </div>
			</div>
		</div>
	</div>
@endsection
