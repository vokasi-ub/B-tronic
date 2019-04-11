@extends('layouts.adminTemplate')
@section('contents')
	<div class="container-fluid">
			 <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                  <i class="fa fa-tags"></i> Data Category
                            </h2><hr>
							   <button type="button" class="btn btn-danger waves-effect" data-toggle="modal" data-target="#modal-default">
                                    <i class="material-icons">library_add</i>
                                    <span>Add Data</span>
                                </button>
								
			<div class="modal fade" id="modal-default" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
						<form action="{{ url('tambahKategori') }}" class="form-horizontal" method="post" enctype="multipart/form-data">
						{{ csrf_field() }}
                        <div class="modal-header"  style="background-color:#fb483a; color:white;">
                            <h4 class="modal-title" id="defaultModalLabel"><i class="fa fa-pencil"></i> Form Add Category</h4>
                        </div>
                        <div class="modal-body" style="margin-left:4%;margin-right:4%">
                            <div class="row clearfix">
                                <div class="col-sm-12">
                                    <div class="form-group form-float">
                                        <div class="form-line">
											<input type="text" class="form-control" name="kategori" required autocomplete="off" />
                                            <label class="form-label">Category</label>
                                        </div>
                                    </div><br>
								</div>
								<div class="col-sm-12">
									<div class="form-group form-float">
                                        <div class="form-line">
											<input type="text" class="form-control" name="description" required autocomplete="off" />
                                            <label class="form-label">Description</label>
                                        </div>
                                    </div>
                                </div>                        
                            </div>
                        </div>
                        <div class="modal-footer js-sweetalert">
                            <button type="submit" class="btn btn-danger waves-effect" data-type="success"><i class="fa fa-save"></i> SAVE</button>
                            <button type="button" class="btn btn-link waves-effect" data-dismiss="modal"><i class="fa fa-close"></i> CLOSE</button>
                        </div>
						</form>
                    </div>
                </div>
            </div>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                               <table class="table table-bordered table-striped table-hover">
                                     <thead>
                                        <tr>
                                            <th>#</th>
                                           
                                            <th>Kategori</th>
                                            <th>Deskripsi</th>
                                            <th>Created</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
										<?php $no=1;?>
										@foreach ($kategori  as $p)
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                          
                                            <td>{{ $p->kategori }}</td>
                                            <td>{{ $p->description }}</td>
                                            <td>{{ $p->created_at }}</td>
                                            <td><a href="editKategori/{{ $p->id }}"class="btn default"><i class="fa fa-edit"></i> Edit</a> <br>
												<a href="hapusKategori/{{ $p->id }}"
												onClick="return confirm('Are you sure you want to delete?')
												" class="btn default"><i class="fa fa-trash-o"></i> Hapus</a></td>
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
<script src="{{ asset('backend/js/pages/ui/dialogs.js') }}"></script>
@endsection

