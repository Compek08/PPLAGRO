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
                        <h3 class="box-title">Example box</h3>
                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                        </div>
                        <!-- /.box-tools -->
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <form action="/order/add" method="POST">
                            {{-- @if(Auth::check())
                            @endif --}}
                            {{-- {{dd($id)}} --}}
                            <div class="form-group">
                                <input type="hidden" name="id" value="{{$id}}">
                                <input type="hidden" name="idUser" value="{{Auth::user()->id}}">
                            </div>
                            <div class="form-group">
                                <label class="lable-mod" for="exampleInputEmail1">Jumlah Pesanan</label>
                                <input type="number" name="jumlah" class="form-control" id="mod-inputan" placeholder="Jumlah Pesanan" min="0" max="{{$stok}}" required autofocus>
                            </div>
                            <div class="form-group">
                                <label class="lable-mod" for="exampleInputEmail1">Lokasi Pengiriman</label>
                                <input type="text" name="alamat" class="form-control" id="mod-inputan" placeholder="Lokasi Pengiriman" required autofocus>
                            </div>
                            <div class="form-group">
                                <label class="lable-mod" for="exampleInputEmail1">Tanggal Pengiriman</label>
                                <input type="date" name="tanggal" class="form-control" id="mod-inputan"required autofocus>
                            </div>

                            <button type="submit" class="btn btn-block btn-default">Pesan</button>
                            {{ csrf_field() }}
                            {{-- {{ method_field('PATCH') }} --}}
                            {{-- <input type="hidden" name="_method"  value="PUT"> --}}
                        </form>
                    </div>
                    <!-- /.box-body -->
                </div>
			</div>
		</div>
	</div>
@endsection
