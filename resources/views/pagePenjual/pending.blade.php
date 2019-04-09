@extends('layouts.userTemplate')
@section('contents')
	
        <div class="container-fluid">
            <div class="block-header">
				<h3>Product Pending</h3>
            </div>
          
            <div class="row clearfix">
            @foreach($product as $row)
                <!-- With Captions -->
                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
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
                                       <img style="width:100%; height:200px" src="{{ asset('/images/product/'.array_first(json_decode($row->img))) }}" />
                                    </div>
									<?php foreach (json_decode($row->img)as $gambar) { ?>									
										<div class="item">
											<img style="width:100%; height:200px" src="{{ asset('/images/product/'.$gambar) }}">
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

