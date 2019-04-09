@extends('layouts.userTemplate')
@section('contents')
	
        <div class="container-fluid">
            <div class="block-header">
            <button type="button" class="btn btn-danger waves-effect" data-toggle="modal" data-target="#modal-default">
                                    <i class="material-icons">library_add</i>
                                    <span>Add Data</span>
            </button>
            </div>
            <div class="modal fade" id="modal-default" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
						<form action="{{ url('tambahPenjual') }}" class="form-horizontal" method="post" enctype="multipart/form-data">
						{{ csrf_field() }}
                        <div class="modal-header"  style="background-color:#fb483a; color:white;">
                            <h4 class="modal-title" id="defaultModalLabel"><i class="fa fa-pencil"></i> Form Add Product</h4>
                        </div>
                        <div class="modal-body" style="margin-left:4%;margin-right:4%">
                            <div class="row clearfix">
								<br>
								<div class="col-sm-12">
                                     <select class="form-control show-tick" required name="id_kategori">
                                        <option value="">- Select Jenis Kategori- </option>
                                        @foreach($kategori as $row)
                                         <option value="{{ $row->id }}">{{ $row->kategori }}</option>
                                        @endforeach
                                    </select>
                                </div><br><hr>        
								<input type="hidden" class="form-control" name="email_user" value="{{ Auth::user()->email }}" required autocomplete="off" />
                                <div class="col-sm-12">
									<div class="form-group form-float">
                                        <div class="form-line">
											<input type="text" class="form-control" name="nama_product" required autocomplete="off" />
                                            <label class="form-label">Nama Barang</label>
                                        </div><br>
                                    </div>
                                </div>  
                               
                                <div class="col-sm-12">
									<div class="form-group form-float">
                                        <div class="form-line">
											<input type="number" class="form-control" name="harga" required autocomplete="off" />
                                            <label class="form-label">Harga</label>
                                        </div><br>
                                    </div>
                                </div>

                                <div class="col-sm-12">
									<div class="form-group form-float">
                                        <div class="form-line">
											<input type="text" class="form-control" name="deskripsi" required autocomplete="off" />
                                            <label class="form-label">Deskripsi</label><br>
                                        </div>
                                    </div>
                                </div>
							                   
                            </div>
                        </div>
                        <div class="modal-footer">
							<div class="js-sweetalert">
                            <button type="submit" class="btn btn-danger waves-effect" data-type="success"><i class="fa fa-save"></i> SAVE</button>
                            <button type="button" class="btn btn-link waves-effect" data-dismiss="modal"><i class="fa fa-close"></i> CLOSE</button>
							</div>
                        </div>
						</form>
                    </div>
                </div>
            </div>
            <div class="row clearfix">
            
            @foreach($product as $row)
                <!-- With Captions -->
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>{{ $row->nama_product }}</h2>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">   
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons">more_vert</i>
                                    </a>
                                    <ul class="dropdown-menu pull-right">
                                        <li style="margin-left:11%;"><div class="js-sweetalert"><button class="btn btn-warning waves-effect" data-type="confirm">Delete</button></a></div></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="body">
                            <div id="carousel-example-generic_2" class="carousel slide" data-ride="carousel">
                                <!-- Indicators -->
                                <ol class="carousel-indicators">
                                    <li data-target="#carousel-example-generic_2" data-slide-to="0" class="active"></li>
                                    <li data-target="#carousel-example-generic_2" data-slide-to="1"></li>
                                </ol>
                                <!-- Wrapper for slides -->
                                <div class="carousel-inner" role="listbox">
                                    <div class="item active">
                                        <img src="/backend/images/a.jpg" />
                                    </div>
                                    <div class="item">
                                        <img src="/backend/images/a.jpg" />
                                    </div>
                                 
                                </div>
                                <!-- Controls -->
                                <a class="left carousel-control" href="#carousel-example-generic_2" role="button" data-slide="prev">
                                    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                                    <span class="sr-only">Previous</span>
                                </a>
                                <a class="right carousel-control" href="#carousel-example-generic_2" role="button" data-slide="next">
                                    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </div><br>
                                <button type="button" class="btn btn-sm btn-info" data-toggle="modal" data-target="#modal-default">
									<i class="fa fa-tag"></i> Rp.{{ number_format($row->harga,0) }}
								</button>
                                <button type="button" class="btn btn-sm btn-success" data-toggle="modal" data-target="#modal-default">
									<i class="fa fa-pencil"></i> Detail Data
								</button>     
                        </div>
                    </div>
                </div>
                <!-- #END# With Captions -->
                @endforeach

               
            </div>
        </div>
    </section>
@endsection

