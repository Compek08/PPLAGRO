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
                            {{-- <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button> --}}
                        </div>
                        <!-- /.box-tools -->
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <form action="/Stock/add" method="POST">
                            {{-- @if(Auth::check())
                            @endif --}}
                            <div class="form-group">
                                <label class="lable-mod" for="exampleInputEmail1">Nama Produk</label>
                                <input type="text" name="nama" class="form-control" id="mod-inputan" placeholder="Nama" required autofocus>
                            </div>
                            <div class="form-group">
                                <label class="lable-mod" for="exampleInputEmail1">Stok</label>
                                <input type="number" name="stok" class="form-control" id="mod-inputan" placeholder="Stok" required autofocus>
                            </div>
                            <div class="form-group">
                                <label class="lable-mod" for="exampleInputEmail1">Harga</label>
                                <input type="number" name="harga" class="form-control" id="mod-inputan" placeholder="Harga" required autofocus min="5000">
                            </div>
                            <div class="form-group">
                                <input type="hidden" name="kat" value={{$cat}}>
                            </div>

                            <button type="submit" class="btn btn-block btn-default">Tambah</button>
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
