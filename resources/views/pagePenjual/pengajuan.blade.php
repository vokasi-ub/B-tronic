@extends('layouts.adminTemplate')
@section('contents')
	<div class="container-fluid">
			 <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                  <i class="fa fa-list"></i> List Pengajuan Product
                            </h2><hr>
							
								
			</div>
                        <div class="body">
                            <div class="table-responsive">
							<table class="table table-bordered table-striped  js-basic-example dataTable">
                                     <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Penjual</th>
                                            <th>ID Product</th>
                                            <th>Nama Product</th>
                                            <th>Kategori</th>
                                            <th>Created</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
										<?php $no=1;?>
										@foreach ($product as $k)
										<tr>
										<td>{{$no++}}</td>
										<td>{{$k->nama_user}}</td>
										<td>{{$k->key}}</td>
										<td>{{$k->nama_product}}</td>
										<td>{{$k->kategori}}</td>
										<td>{{$k->sts}}</td>
										<td>{{$k->crt}}</td>
										<td><a href=""><button class="btn btn-primary">Detail</button></a>
											<a href="/verifikasi-product/{{encrypt($k->key)}}" 
											onClick="return confirm('Are you sure you want to change this product to active?')"
											><button class="btn btn-success">Verifikasi</button></a>
											
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
	</div> 
@endsection
@section('jsc')
<!-- Jquery DataTable Plugin Js -->
    <script src="{{ asset('backend/plugins/jquery-datatable/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('backend/plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js') }}"></script>
    <script src="{{ asset('backend/plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('backend/plugins/jquery-datatable/extensions/export/buttons.flash.min.js') }}"></script>
    <script src="{{ asset('backend/plugins/jquery-datatable/extensions/export/jszip.min.js') }}"></script>
    <script src="{{ asset('backend/plugins/jquery-datatable/extensions/export/pdfmake.min.js') }}"></script>
    <script src="{{ asset('backend/plugins/jquery-datatable/extensions/export/vfs_fonts.js') }}"></script>
    <script src="{{ asset('backend/plugins/jquery-datatable/extensions/export/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('backend/plugins/jquery-datatable/extensions/export/buttons.print.min.js') }}"></script>
	<script src="{{ asset('backend/js/pages/tables/jquery-datatable.js') }}"></script>
@endsection

