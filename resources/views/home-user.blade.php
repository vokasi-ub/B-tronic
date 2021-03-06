@extends('layouts.userTemplate')
@section('contents')
   <link href="{{ asset('backend/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css') }}" rel="stylesheet">
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<div class="container-fluid">
            <div class="block-header">
                <h2>DASHBOARD</h2>
            </div>
            <!-- Widgets -->
            <div class="row clearfix">
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-blue hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">face</i>
                        </div>
                        <div class="content">
                            <div class="text">BIODATA</div>
                            <div class="number count-to">{{ $biodata }}</div>
                        </div>
                    </div>
                </div>
				<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-green hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">playlist_add_check</i>
                        </div>
                        <div class="content">
                            <div class="text">PRODUCT ACTIVE</div>
                            <div class="number count-to">{{ $active_product }}
													
							</div>
                        </div>
                    </div>
                </div>
				<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-orange hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">update</i>
                        </div>
                        <div class="content">
                            <div class="text">PRODUCT PENDING</div>
                            <div class="number count-to">{{ $pending_product }}
														
						
							</div>
                        </div>
                    </div>
                </div>
				<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-deep-orange hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">event</i>
                        </div>
                        <div class="content">
                            <div class="text">DATE NOW</div>
                            <div class="">{{ $tgl }}</div>
                        </div>
                    </div>
                </div>
                
            </div>
            <!-- #END# Widgets -->
			 <!-- Tabs With Icon Title -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
						<div class="header">
                            <h2>
                                TABS WITH ICON TITLE
                            </h2>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons">more_vert</i>
                                    </a>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="javascript:void(0);">Action</a></li>
                                        <li><a href="javascript:void(0);">Another action</a></li>
                                        <li><a href="javascript:void(0);">Something else here</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="body">
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs" role="tablist">
                                <li role="presentation" class="active">
                                    <a href="#home_with_icon_title" data-toggle="tab">
                                        <i class="material-icons">developer_board</i> PASANG IKLAN
                                    </a>
                                </li>
                                <li role="presentation">
                                    <a href="#profile_with_icon_title" data-toggle="tab">
                                        <i class="material-icons">playlist_add_check</i> PRODUCT ACTIVE
                                    </a>
                                </li>
                                <li role="presentation">
                                    <a href="#messages_with_icon_title" data-toggle="tab">
                                        <i class="material-icons">update</i> PRODUCT PENDING
                                    </a>
                                </li>
                             
                            </ul>

                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane fade in active" id="home_with_icon_title">
								<div class="body">
									 @if (count($errors) > 0)
									 <div class="alert alert-danger">
										<strong>Whoops!</strong> There were some problems with your input.<br><br>
										<ul>
										  @foreach ($errors->all() as $error)
											  <li>{{ $error }}</li>
										  @endforeach
										</ul>
									 </div>
									 @endif

									<div class="row clearfix">
										<form action="{{ url('addIklan') }}" class="form-horizontal" method="post" enctype="multipart/form-data">
										{{ csrf_field() }}
										<div class="col-sm-12">
											<select class="form-control show-tick" required name="id_kategori">
											<option value="">- Select Jenis Kategori- </option>
												@foreach($kategori as $row)
												<option value="{{ $row->id }}">{{ $row->kategori }}</option>
												@endforeach
											</select>
											<hr>
											<input type="hidden" class="form-control" name="id_user" value="{{ Auth::user()->id }}" required autocomplete="off" />
											<div class="form-group form-float">
												<div class="form-line">
													<input type="text" class="form-control" name="nama_product" required autocomplete="off" />
													<label class="form-label">Nama Barang</label>
												</div>
											</div><br>
											<div class="form-group form-float">
												<div class="form-line">
													<input type="number" class="form-control" name="harga" required autocomplete="off" />
													<label class="form-label">Harga</label>
												</div>
											</div><br>
											<div class="form-group form-float">
												<div class="form-line">
													<textarea name="deskripsi" cols="30" rows="5" class="form-control no-resize" required></textarea>
													<label class="form-label">Deskripsi</label><br>
												</div>
											</div><br>
											<div class="input-group control-group increment" >
											  <input type="file" name="filename[]" class="form-control">
											  <div class="input-group-btn"> 
												<button class="btn btn-primary waves-effect" type="button"><i class="fa fa-plus"></i> Add</button>
											  </div>
											</div>
											<div class="clone hide">
											  <div class="control-group input-group" style="margin-top:10px">
												<input type="file" name="filename[]" class="form-control">
												<div class="input-group-btn"> 
												  <button class="btn btn-danger" type="button"><i class="glyphicon glyphicon-remove"></i> Remove</button>
												</div>
											  </div>
											</div>
										<hr>	
											<div class="form-group">
											<input type="checkbox" id="checkbox" required name="checkbox">
											<label for="checkbox">I have read and accept the terms</label>
											</div>
										</div>
									</div>
									<button type="reset" class="btn btn-default waves-effect" data-type="success"><i class="fa fa-refresh"></i> Reset</button>
									<button type="submit" class="btn btn-danger waves-effect" data-type="success"><i class="fa fa-save"></i> Save </button>
									</form>
								</div>
                                </div>
                                <div role="tabpanel" class="tab-pane fade" id="profile_with_icon_title">
                                   <b>ACTIVE PRODUCT</b>
									<p></p>
								
										<div class="table-responsive">
											<table class="table table-bordered table-striped table-hover js-basic-example dataTable">
												<thead>
													<tr>
														
														<th>Judul Product</th>
														<th>Kategori</th>
														<th>Harga</th>
														<th>Created</th>
														<th>Status</th>
													</tr>
												</thead>
								
												<tbody>
													@foreach($product_on as $k)
													<tr>
														
														<td>{{$k->nama_product}}</td>
														<td>{{$k->getKategori->kategori}}</td>
														<td>Rp.{{ number_format($k->harga)}}</td>
														<td>{{$k->created_at}}</td>
														<td>{{$k->status}}</td>
													</tr>
												    @endforeach
												</tbody>
											</table>
										</div>
                                </div>
                                <div role="tabpanel" class="tab-pane fade" id="messages_with_icon_title">
                                    <b>PENDING PRODUCT</b>
									<p>Menunggu Proses Verifikasi Sistem</p>
								
										<div class="table-responsive">
											<table class="table table-bordered table-striped table-hover js-basic-example dataTable">
												<thead>
													<tr>
													
														<th>Judul Product</th>
														<th>Kategori</th>
														<th>Harga</th>
														<th>Created</th>
														<th>Status</th>
													</tr>
												</thead>
								
												<tbody>
													@foreach($product_off as $k)
													<tr>
														
														<td>{{$k->nama_product}}</td>
														<td>{{$k->getKategori->kategori}}</td>
														<td>Rp.{{ number_format($k->harga)}}</td>
														<td>{{$k->created_at}}</td>
														<td>{{$k->status}}</td>
													</tr>
												    @endforeach
												</tbody>
											</table>
										</div>
									</div>
                   
                                
                               
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Tabs With Icon Title -->
</div>

	<script src="{{ asset('backend/plugins/jquery-datatable/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('backend/plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js') }}"></script>
    <script src="{{ asset('backend/plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('backend/plugins/jquery-datatable/extensions/export/buttons.flash.min.js') }}"></script>
    <script src="{{ asset('backend/plugins/jquery-datatable/extensions/export/jszip.min.js') }}"></script>
    <script src="{{ asset('backend/plugins/jquery-datatable/extensions/export/pdfmake.min.js') }}"></script>
    <script src="{{ asset('backend/plugins/jquery-datatable/extensions/export/vfs_fonts.js') }}"></script>
    <script src="{{ asset('backend/plugins/jquery-datatable/extensions/export/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('backend/plugins/jquery-datatable/extensions/export/buttons.print.min.js') }}"></script>
	<script src="{{ asset('backend/js/pages/tables/jquery-datatable.js"></script>
<script type="text/javascript">
    $(document).ready(function() {

      $(".btn-primary").click(function(){ 
          var html = $(".clone").html();
          $(".increment").after(html);
      });

      $("body").on("click",".btn-danger",function(){ 
          $(this).parents(".control-group").remove();
      });

    });

</script>

@endsection
