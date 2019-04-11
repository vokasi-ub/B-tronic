@extends('layouts.userTemplate')
@section('contents')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script> 
@foreach($data_lokasi as $p)
<div class="container-fluid">
            <div class="row clearfix">
                <div class="col-xs-12 col-sm-3">
                    <div class="card profile-card">
                        <div class="profile-header">&nbsp;</div>
                        <div class="profile-body">
                            <div class="image-area">
                                <img style="width:170px; height:200px" src="/images/user/{{ Auth::user()->foto }}" alt="AdminBSB - Profile Image" />
                            </div>
                            <div class="content-area">
                                <h3>{{ Auth::user()->name }}</h3>
                                <p>{{ Auth::user()->email }}</p>
                                <p>{{ Auth::user()->status }}</p>
                            </div>
                        </div>
                        <div class="profile-footer">
                            <ul>
                                <li>
                                    <span><i class="fa fa-map-marker"></i> Location</span>
                                    <span>
										  {{ ucfirst(strtolower($p->kec)) }} , <br> {{ $p->provinsi }} 
									</span>
                                </li>
                                <li></li>
							
                                <li>
                                    <span><i class="fa fa-phone"></i> No Telp</span>
                                    <span>{{ Auth::user()->telp }}</span>
                                </li>
                            </ul>
                            <button class="btn btn-primary btn-lg waves-effect btn-block"><i class="material-icons">remove_red_eye</i> Show No.Telpon</button>
                        </div>
                    </div>
					</div>
                <div class="col-xs-12 col-sm-9">
                    <div class="card">
                        <div class="body">
                            <div>
                                <ul class="nav nav-tabs" role="tablist">
                               
                                    <li role="presentation" class="active"><a href="#profile_settings" aria-controls="settings" role="tab" data-toggle="tab">Profile Settings</a></li>
                                    <li role="presentation"><a href="#change_image_settings" aria-controls="settings" role="tab" data-toggle="tab">Change Image Profile</a></li>
                                  
                                </ul>

                                <div class="tab-content">
                                     <div role="tabpanel" class="tab-pane fade in active" id="profile_settings">
                                     <form action="{{ url('updateBio2') }}" class="form-horizontal" method="post" enctype="multipart/form-data"> 
                                     {{ csrf_field() }}
                                            <div class="form-group">
                                                <label for="NameSurname" class="col-sm-2 control-label">Name</label>
                                                <div class="col-sm-10">
                                                    <div class="form-line">
                                                        <input type="text" autocomplete="off" class="form-control" id="NameSurname" name="name" placeholder="Name" value="{{ Auth::user()->name }}" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="NameSurname" class="col-sm-2 control-label">Jenis Kelamin</label>
                                                <div class="col-sm-10">
                                                    <div class="form-line">
                                                    <input type="radio" name="gender" value="male" id="male" class="with-gap" {{ Auth::user()->gender == 'male' ? 'checked="true"' : '' }}>
                                                    <label for="male">Laki-laki</label>

                                                    <input type="radio" name="gender" value="female" id="female" class="with-gap" {{ Auth::user()->gender == 'female' ? 'checked="true"' : '' }}>
                                                    <label for="female" class="m-l-20">Perempuan</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="NameSurname" class="col-sm-2 control-label">No Telp</label>
                                                <div class="col-sm-10">
                                                    <div class="form-line">
                                                        <input type="number" class="form-control" id="NameSurname" name="telp" placeholder="No Telp" value="{{ Auth::user()->telp }}" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="NameSurname" class="col-sm-2 control-label">Provinsi</label>
                                                <div class="col-sm-10">
                                                    <div class="form-line">
                                                    <select name="province" id="province" class="form-control show-tick" required>
										        	<option value=""> - Select Provinsi -</option>
											        	@foreach($province as $row)
											        	<option value="{{ $row->id }}" {{ Auth::user()->id_province == $row->id ? 'selected="selected"' : '' }}>{{ $row->name }}</option>
											    	@endforeach
										        	</select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="NameSurname" class="col-sm-2 control-label">Kota</label>
                                                <div class="col-sm-10">
                                                    <div class="form-line">
                                                    <select name="city" id="city" class="form-control show-tick" required>
                                                            <option value="{{ Auth::user()->id_city }}"> {{ $p->kota }}</option>
                                                    </select>
                                                    </div>  
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="NameSurname" class="col-sm-2 control-label">Kecamatan</label>
                                                <div class="col-sm-10">
                                                    <div class="form-line">
                                                    <select name="kec" id="kec" class="form-control show-tick" required>
                                                            <option value="{{ Auth::user()->id_district }}"> {{ $p->kec }}</option>
                                                    </select>
                                                    </div>  
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="NameSurname" class="col-sm-2 control-label">Kelurahan / Desa </label>
                                                <div class="col-sm-10">
                                                    <div class="form-line">
                                                    <select name="kel" id="kel" class="form-control show-tick" required>
                                                            <option value="{{ Auth::user()->id_village }}"> {{ $p->kel }}</option>
                                                    </select>
                                                    </div>  
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="NameSurname" class="col-sm-2 control-label">Alamat</label>
                                                <div class="col-sm-10">
                                                    <div class="form-line">
                                                    <textarea name="address" rows="3" class="form-control no-resize" required>
                                                    {{ Auth::user()->address }}
                                                    </textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            
                    
											
                                            <div class="form-group">
                                                <div class="col-sm-offset-2 col-sm-10">
                                                    <button type="submit" onClick="return confirm('Are you sure you want to submit?')" class="btn btn-danger">SUBMIT</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div role="tabpanel" class="tab-pane fade in" id="change_image_settings">
                                       <form action="{{ url('updateImgBio') }}" class="form-horizontal" method="post" enctype="multipart/form-data">
                                       {{ csrf_field() }}
                                           <div class="form-group">
                                                <label for="NameSurname" class="col-sm-2 control-label">Foto Profile</label>
                                                <div class="col-sm-10">
                                                    <div class="form-line">
                                                        <input type="file" class="form-control" id="foto" name="foto" required>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="col-sm-offset-3 col-sm-9">
                                                    <button type="submit" class="btn btn-danger">Upload</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                               
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endforeach	
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
