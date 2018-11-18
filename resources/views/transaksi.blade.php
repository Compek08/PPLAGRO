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
                        <h3 class="box-title">Pemesanan</h3>
                        <div class="box-tools pull-right"></div>
                        <!-- /.box-tools -->
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <?php if(Auth::user()->role != 0 && !(Auth::user()->nik == null || Auth::user()->alamat == null || Auth::user()->telp == null)) { ?>
                            <table class="table">
                                <tr>
                                    <th>No</th>
                                    <th>Nama Barang</th>
                                    <th>Jumlah Barang / KG</th>
                                </tr>
                                <?php
                                    $no = 0;
                                    foreach ($orders as $order): ?>
                                <?php  $no = $no + 1; ?>
                                <tr>
                                    <td>{{$no}}</td>
                                    <td>{{$order->category}} {{$order->type}}</td>
                                    <td>{{$order->quantity}}</td>
                                </tr>
                                <?php endforeach ?>
                            </table>
                            <a href="/order" type="button" class="btn btn-block btn-default">Tambah</a>
                            {{ csrf_field() }}
                        <?php } else {
                            if(Auth::user()->role == 0) {?>
                                <table class="table">
                                    <tr>
                                        <th>No</th>
                                        <th>Customer</th>
                                        <th>Alamat</th>
                                        <th>No. HP</th>
                                        <th>Barang</th>
                                        <th>Jumlah</th>
                                    </tr>
                                    <?php
                                        $no = 0;
                                        foreach ($orders as $order): ?>
                                    <?php  $no = $no + 1; ?>
                                    <tr>
                                        <td>{{$no}}</td>
                                        <td>{{$order->name}}</td>
                                        <td>{{$order->alamat}}</td>
                                        <td>{{$order->telp}}</td>
                                        <td>{{$order->category}} {{$order->type}}</td>
                                        <td>{{$order->quantity}}</td>
                                    </tr>
                                    <?php endforeach ?>
                                </table>
                            <?php
                            } else {?>
                                <h2 style="text-align:center"><strong>Lengkapi data diri</strong> anda sebelum melakukan pemesanan</h2>
                            <?php }
                        }?>
                    </div>
                    <!-- /.box-body -->
                </div>
			</div>
		</div>
	</div>
@endsection
