@extends('layouts.adminTemplate')
@section('contents')
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
                            <div class="text">TOTAL USERS</div>
                            <div class="number count-to">@foreach ($total_user as $p)
														{{ $p->total }}
														 @endforeach
							</div>
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
                            <div class="number count-to">@foreach ($active_product as $p)
														{{ $p->active }}
														 @endforeach
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
                            <div class="number count-to">@foreach ($pending_product as $p)
														{{ $p->pending }}
														 @endforeach
						
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
            <!-- CPU Usage -->
			<!-- #END# CPU Usage -->
        
            
            </div>
@endsection
