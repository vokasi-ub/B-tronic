@extends('layouts.userTemplate')
@section('contents')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script> 

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
					
						@if(session('warning'))
						<div class="alert alert-info" style="font-size:25px">
						{{ session('warning') }}
						</div>
						@endif
                        <div class="header">
                            <h2>Data Biodata Anda : </h2>
                        </div>
                        <div class="body">
                            <form action="{{ url('updateBio') }}" method="post" enctype="multipart/form-data">
							{{ csrf_field() }}
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" autocomplete="off" name="name" value="{{ Auth::user()->name }}" required>
                                        <label class="form-label">Nama</label>
                                    </div>
                                </div>
								<p>Jenis Kelamin</p>
                                <div class="form-group">
                                    <input type="radio" name="gender" value="male" id="male" class="with-gap">
                                    <label for="male">Laki-laki</label>

                                    <input type="radio" name="gender" value="female" id="female" class="with-gap">
                                    <label for="female" class="m-l-20">Perempuan</label>
                                </div>
								 <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="number" autocomplete="off" class="form-control" name="telp" value="{{ Auth::user()->no_telp }}" required>
                                        <label class="form-label">No telp</label>
                                    </div>
                                </div>
								<p>Provinsi</p>
								<select name="province" id="province" class="form-control show-tick" required>
											<option value=""> - Select Provinsi -</option>
												@foreach($province as $row)
												<option value="{{ $row->id }}">{{ $row->name }}</option>
												@endforeach
											</select>
								<p><br>Kota</p>
								<select name="city" id="city" class="form-control show-tick" required>
										<option value=""> - Select Kota -</option>
								</select>
								<p><br>Kecamatan</p>
								<select name="kec" id="kec" class="form-control show-tick" required>
										<option value=""> - Select Kecamatan -</option>
								</select>
								<p><br>Kelurahan / Desa</p>
								<select name="kel" id="kel" class="form-control show-tick" required>
										<option value=""> - Select Kelurahan / Desa -</option>
								</select>
								<br>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <textarea name="address" cols="30" rows="5" class="form-control no-resize" required></textarea>
                                        <label class="form-label">Address</label>
                                    </div>
                                </div>
								<p><br>Foto Profile</p>
								<div class="input-group control-group increment" >
									  <input type="file" name="foto" class="form-control">
								</div>
                                <div class="form-group">
                                    <input type="checkbox" id="checkbox" name="checkbox" required>
                                    <label for="checkbox">I have read and accept the terms</label>
                                </div>
                                <button class="btn btn-primary waves-effect" type="submit">SUBMIT</button>
                            </form>
                        </div>		
						
                      
                    </div>
                </div>
            </div>
            <!-- #END# Tabs With Icon Title -->
</div>

<script type="text/javascript">
    jQuery(document).ready(function ()
    {
            jQuery('select[name="province"]').on('change',function(){
               var provinceID = jQuery(this).val();
               if(provinceID)
               {
                  jQuery.ajax({
                     url : '/home/getcity/' +provinceID,
                     type : "GET",
                     dataType : "json",
                     success:function(data)
                     {
                        console.log(data);
                        jQuery('select[name="city"]').empty();
                        jQuery.each(data, function(key,value){
                           $('select[name="city"]').append('<option value="'+ key +'">'+ value +'</option>');
                        });
                     }
                  });
               }
               else
               {
                  $('select[name="city"]').empty();
               }
            });
    });
</script>
<script type="text/javascript">
    jQuery(document).ready(function ()
    {
            jQuery('select[name="city"]').on('change',function(){
               var cityID = jQuery(this).val();
               if(cityID)
               {
                  jQuery.ajax({
                     url : '/home/getkec/' +cityID,
                     type : "GET",
                     dataType : "json",
                     success:function(data)
                     {
                        console.log(data);
                        jQuery('select[name="kec"]').empty();
                        jQuery.each(data, function(key,value){
                           $('select[name="kec"]').append('<option value="'+ key +'">'+ value +'</option>');
                        });
                     }
                  });
               }
               else
               {
                  $('select[name="kec"]').empty();
               }
            });
    });
</script>
<script type="text/javascript">
    jQuery(document).ready(function ()
    {
            jQuery('select[name="kec"]').on('change',function(){
               var kecID = jQuery(this).val();
               if(kecID)
               {
                  jQuery.ajax({
                     url : '/home/getkel/' +kecID,
                     type : "GET",
                     dataType : "json",
                     success:function(data)
                     {
                        console.log(data);
                        jQuery('select[name="kel"]').empty();
                        jQuery.each(data, function(key,value){
                           $('select[name="kel"]').append('<option value="'+ key +'">'+ value +'</option>');
                        });
                     }
                  });
               }
               else
               {
                  $('select[name="kel"]').empty();
               }
            });
    });
</script>

@endsection
