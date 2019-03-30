@extends('layouts.adminTemplate')
@section('contents')
	
	<div class="animated fadeIn">
                <div class="row">
				@foreach($data as $p)
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                               <i class="fa fa-tags"></i> <strong class="card-title">Update Data Kategori : {{ $p->kategori }} </strong>
                            </div>
                            <div class="card-body">
								<form action="<?php echo url('updateKategori/'.$p->id_kategori)?>" class="form-horizontal" method="post" enctype="multipart/form-data">
								{{ csrf_field() }}
                                            <div class="input-group">
                                              <span class="input-group-addon"><i class="fa fa-tags"></i> Kategori </span>
											  <input title="Nama Kategori"type="text" name="kategori" placeholder="Kategori"autocomplete="off" required class="form-control" value="{{ $p->kategori }}">
                                            </div><br>
											<div class="input-group">
												<span class="input-group-addon"><i class="fa fa-list-alt"></i> Description</span>
												<input title="Slug"type="text" name="description" placeholder="Description" autocomplete="off" required class="form-control" value="{{ $p->description }}">
											</div>
                                            <div><br>
											<div class="col-md-2">
                                                <button id="payment-button" type="submit" class="btn btn-md btn-info btn-block">
                                                    <i class="fa fa-save"></i>&nbsp;
                                                    <span id="payment-button-amount">Simpan</span>
                                                  
                                                </button>
                                            </div>
                                            </div>
                                        </form>
								
                            </div>
                        </div>
                    </div>
			@endforeach
			</div>
    </div>
@endsection