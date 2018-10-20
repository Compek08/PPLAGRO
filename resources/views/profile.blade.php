@extends('adminlte::page')

@section('htmlheader_title')
	Profile User
@endsection



@section('main-content')
	<div class="container-fluid spark-screen">
		<div class="row">
			<div class="col-md-9 col-md-offset-1">

				<div class="box box-success box-solid">
                    <div class="box-header with-border">
                        <h3 class="box-title">Edit Profile {{ Auth::user()->name }}</h3>
                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                        </div>
                        <!-- /.box-tools -->
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <form action="/edit-profile/{{ Auth::user()->id }}" method="POST">
                            {{-- @if(Auth::check())
                            @endif --}}
                            <div class="form-group">
                                <label class="lable-mod" for="exampleInputEmail1">Nama</label>
                                <input type="text" name="nama" class="form-control" value="{{ old('name') ? old('name') : Auth::user()->name  }}" id="mod-inputan" placeholder="Nama" required>
                            </div>
                            <div class="form-group">
                                    <label class="lable-mod" for="exampleInputEmail1">NIK</label>
                                    <input type="number" name="nik" class="form-control" value="{{ old('nik') ? old('nik') : Auth::user()->nik  }}" id="mod-inputan" placeholder="NIK" required>
                                </div>
                            <div class="form-group">
                                <label class="lable-mod" for="exampleInputEmail1">Alamat</label>
                                <input type="text" name="alamat" class="form-control" value="{{ old('alamat') ? old('alamat') : Auth::user()->alamat  }}" id="mod-inputan" placeholder="Alamat" required>
                            </div>
                            <div class="form-group">
                                <label class="lable-mod" for="exampleInputEmail1">E-mail</label>
                                <input type="email" name="email" class="form-control" value="{{ old('email') ? old('email') : Auth::user()->email  }}" id="mod-inputan" placeholder="E-mail" required>
                            </div>
                            <div class="form-group">
                                <label class="lable-mod" for="exampleInputEmail1">Nomor Telepon</label>
                                <input type="number" name="telp" class="form-control" value="{{ old('telp') ? old('telp') : Auth::user()->telp  }}" id="mod-inputan" placeholder="No Telepon" required>
                            </div>
                            <button type="submit" class="btn btn-block btn-default">Save</button>
                            {{ csrf_field() }}
                            <input type="hidden" name="_method"  value="PUT">
                        </form>
                    </div>
                    <!-- /.box-body -->
                </div>
			</div>
		</div>
	</div>
@endsection
