@extends('layouts.userTemplate')
@section('contents')
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>	
        <div class="container-fluid">
            <div class="block-header">
				<h3>Detail Product</h3>
            </div>
          
            <div class="row clearfix">
            @foreach($data as $row)
                <!-- With Captions -->
                <div class="col-lg-6 col-md-4 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
							
                            <h2>{{ $row->nama_product }}</h2>
                            <ul class="header-dropdown m-r--5">
                            
                            </ul>
                        </div>
                        <div class="body">
                            <div id="carousel-example-generic_{{$row->id}}" class="carousel slide" data-ride="carousel">
                                <!-- Indicators -->
                                <ol class="carousel-indicators">
									<?php $a = 0 ?>
									<?php foreach (json_decode($row->img)as $gambar) { ?>
                                    <li data-target="#carousel-example-generic_{{$row->id}}" data-slide-to="$a++" class=""></li>	
									<?php } ?>
							   </ol>
                                <!-- Wrapper for slides -->
                                <div class="carousel-inner" role="listbox">
									<div class="item active">
                                       <img style="width:100%; height:360px" src="{{ asset('/images/product/'.array_first(json_decode($row->img))) }}" />
                                    </div>
									<?php foreach (json_decode($row->img)as $gambar) { ?>									
										<div class="item">
											<img style="width:100%; height:360px" src="{{ asset('/images/product/'.$gambar) }}">
										</div>
									<?php } ?>
                                </div>
                                <!-- Controls -->
                                <a class="left carousel-control" href="#carousel-example-generic_{{$row->id}}" role="button" data-slide="prev">
                                    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                                    <span class="sr-only">Previous</span>
                                </a>
                                <a class="right carousel-control" href="#carousel-example-generic_{{$row->id}}" role="button" data-slide="next">
                                    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </div>
							
							<br>
                               
							
                        </div>
                    </div>
                </div>
				 <div class="col-lg-6 col-md-4 col-sm-12 col-xs-12">
                  
                    <div class="card">
                        <div class="body">
                            <div>
                                <ul class="nav nav-tabs" role="tablist">
                               
                                    <li role="presentation" class="active"><a href="#profile_settings" aria-controls="settings" role="tab" data-toggle="tab">Info Product</a></li>
                                    <li role="presentation"><a href="#change_image_settings" aria-controls="settings" role="tab" data-toggle="tab">Change Image Product</a></li>
                                  
                                </ul>

                                <div class="tab-content">
                                     <div role="tabpanel" class="tab-pane fade in active" id="profile_settings">
											<form action="{{ url('updateProduct') }}" class="form-horizontal" method="post" enctype="multipart/form-data">
											{{ csrf_field() }}
											<div class="panel panel-default panel-post">
                                            <div class="panel-heading">
                                                <div class="media">
                                                    <div class="media-body">
				
														<div class="form-group">	
															<label for="NameSurname" class="col-sm-2 control-label">Kategori  </label>
															<div class="col-sm-10">
																 <h4>  {{ $row->kategori }} </h4>
															</div>
														</div>
														<div class="form-group">	
															<label for="NameSurname" class="col-sm-2 control-label">Judul</label>
															<div class="col-sm-10">
																<div class="form-line">
																	<input type="text" autocomplete="off" class="form-control"  name="nama_product" placeholder="Judul" value="{{$row->nama_product}}" required>
																	<input type="hidden" autocomplete="off" class="form-control"  name="id_product" value="{{$row->key}}" required>
																</div>
															</div>
														</div>
														<div class="form-group">	
															<label for="NameSurname" class="col-sm-2 control-label">Harga</label>
															<div class="col-sm-10">
																<div class="form-line">
																	<input type="number" autocomplete="off" class="form-control" name="harga" placeholder="Harga" value="{{$row->harga}}" required>
																</div>
															</div>
														</div>
														<div class="form-group">	
															<label for="NameSurname" class="col-sm-2 control-label">Deskripsi</label>
															 <div class="col-sm-10">
																<div class="form-line">
																<textarea name="deskripsi" rows="3" class="form-control no-resize" required>
																{{$row->deskripsi}}
																</textarea>
																</div>
															</div>
														</div>
													
                                                    </div>
                                                </div>
                                            </div>
                                           
                                            <div class="panel-footer">
                                                <ul>
                                                    <button type="submit" class="btn btn-primary"><i class="fa fa-edit"></i> Update</button>
                                                    <button type="reset" class="btn btn-default"><i class="fa fa-refresh"></i> Reset</button>
                                                </ul>

                                          
                                            </div>
											</form>
                                        </div>

                                        
                                    </div>
                                    <div role="tabpanel" class="tab-pane fade in" id="change_image_settings">
                                       <form action="{{ url('updateImgProduct') }}" class="form-horizontal" method="post" enctype="multipart/form-data">
                                       {{ csrf_field() }}
											<input type="hidden" autocomplete="off" class="form-control"  name="id_product" value="{{$row->key}}" required>
										    <i class="fa fa-image"></i> Foto Product
											<div class="input-group control-group increment" >
											  <input type="file" name="filename[]" class="form-control" required>
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

                                            <div class="form-group">
                                                <div class="col-sm-offset-3 col-sm-9">
                                                    <button type="submit" class="btn btn-danger"><i class="fa fa-upload"></i> Upload</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                               
                                </div>
                            </div>
                        </div>
                  
                </div>
                </div>
                <!-- #END# With Captions -->
                @endforeach

               
            </div>
        </div>
		
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

