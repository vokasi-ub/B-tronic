@extends('layouts.adminTemplate')
@section('contents')
<div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
					
						@if(session('warning'))
						<div class="alert alert-info" style="font-size:25px">
						{{ session('warning') }}
						</div>
						@endif
                        <div class="header">
                            <h2>Update Kategori : </h2>
                        </div>
						@foreach($data as $p)
                        <div class="body">
                           <form action="<?php echo url('updateKategori/'.$p->id)?>" class="form-horizontal" method="post" enctype="multipart/form-data">
							{{ csrf_field() }}
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" autocomplete="off" name="kategori" value="{{$p->kategori}}" required>
                                        <label class="form-label">Kategori</label>
                                    </div>
                                </div>
								<br>
								 <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" autocomplete="off" class="form-control" name="description" value="{{$p->description}}" required>
                                        <label class="form-label">Description</label>
                                    </div>
                                </div>
								<br>
                                <div class="form-group">
                                    <input type="checkbox" id="checkbox" name="checkbox" required>
                                    <label for="checkbox">I have read and accept the terms</label>
                                </div>
                                <button class="btn btn-primary waves-effect" type="submit">SUBMIT</button>
                            </form>
                        </div>		
						
                      @endforeach
                    </div>
                </div>
            </div>
           
@endsection