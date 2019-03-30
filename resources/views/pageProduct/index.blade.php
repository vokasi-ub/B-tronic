@extends('layouts.adminTemplate')
@section('contents')
  <div class="animated fadeIn">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                               <i class="fa fa-inbox"></i> <strong class="card-title">Data Product</strong>
							    <hr>
							    <button type="button" class="btn btn-sm btn-info" data-toggle="modal" data-target="#modal-default">
									<i class="fa fa-plus"></i> Add Data
								</button>
                            </div>
                            <div class="card-body">
                                <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>ID Product</th>
                                            <th>Kategori</th>
                                            <th>Product</th>
                                            <th>Harga</th>
											<th>Penjual</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
										<?php $no=1;?>
										@foreach ($data  as $p)
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>{{ $p->id_product }}</td>
                                            <td>{{ $p->kategori }}</td>
                                            <td>{{ $p->product }}</td>
                                            <td>{{ $p->harga }}</td>
                                            <td>{{ $p->name }}</td>
											<td>{{ $p->status }}</td>
											<td><a href="detailProduct/{{ $p->id_product }}"class="btn default"><i class="fa fa-info"></i> Detail</a> <br>
												<a href="editProduct/{{ $p->id_product }}"class="btn default"><i class="fa fa-edit"></i> Edit</a> <br>
												<a href="hapusProduct/{{ $p->id_product }}"
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
	<div class="modal fade" id="modal-default">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title"><i class="fa fa-pencil"></i> Form Add Data Product</h4>
				</div>
				<form action="{{ url('tambahProduct') }}" class="form-horizontal" method="post" enctype="multipart/form-data">
					{{ csrf_field() }}
					<div class="modal-body">
						<div class="box-body">
							<div class="input-group">
								<span class="input-group-addon"><i class="fa fa-inbox"></i></span>
								<input type="text" class="form-control" name="product" placeholder="Product" required autocomplete="off">
							</div><br>
							<div class="input-group">
							<span class="input-group-addon"><i class="fa fa-tags"></i></span>
							 <select class="form-control" required name="id_kategori">
								<option value="">- Select Jenis Kategori- </option>
								@foreach($kategori as $row)
									<option value="{{ $row->id_kategori }}">{{ $row->kategori }}</option>
								@endforeach
							  </select>
							</div><br>
							<div class="input-group">
								<span class="input-group-addon"><i class="fa fa-money"></i></span>
								<input type="number" class="form-control" name="harga" placeholder="Harga" required autocomplete="off">
							</div><br>
							<div class="input-group">
							<span class="input-group-addon"><i class="fa fa-users"></i></span>
							 <select class="form-control" required name="penjual">
								<option value="">- Select Penjual- </option>
								@foreach($penjual as $row)
									<option value="{{ $row->email }}">{{ $row->name }}</option>
								@endforeach
							  </select>
						   </div><br>
							<div class="input-group">
								<span class="input-group-addon"><i class="fa fa-list-alt"></i></span>
								<input type="text" class="form-control" name="description" placeholder="Deskripsi" required autocomplete="off">
							</div><br>
						 </div>			
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
						<button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
					</div>
				</form>
			</div>
		</div>			
	</div>		
	
	
			<!-- DataTable -->
	<script src="{{asset('backend/assets/js/lib/data-table/datatables.min.js')}}"></script>
    <script src="{{asset('backend/assets/js/lib/data-table/dataTables.bootstrap.min.js')}}"></script>
    <script src="{{asset('backend/assets/js/lib/data-table/dataTables.buttons.min.js')}}"></script>
    <script src="{{asset('backend/assets/js/lib/data-table/buttons.bootstrap.min.js')}}"></script>
    <script src="{{asset('backend/assets/js/lib/data-table/jszip.min.js')}}"></script>
    <script src="{{asset('backend/assets/js/lib/data-table/vfs_fonts.js')}}"></script>
    <script src="{{asset('backend/assets/js/lib/data-table/buttons.html5.min.js')}}"></script>
    <script src="{{asset('backend/assets/js/lib/data-table/buttons.print.min.js')}}"></script>
    <script src="{{asset('backend/assets/js/lib/data-table/buttons.colVis.min.js')}}"></script>
    <script src="{{asset('backend/assets/js/init/datatables-init.js')}}"></script>
	
    <script type="text/javascript">
        $(document).ready(function() {
          $('#bootstrap-data-table-export').DataTable();
      } );
	</script>
       
@endsection