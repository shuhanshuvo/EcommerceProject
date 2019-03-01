@extends('admin_layout')
@section('admin_content')


			<ul class="breadcrumb">
				<li>
					<i class="icon-home"></i>
					<a href="index.html">Home</a>
					<i class="icon-angle-right"></i> 
				</li>
				<li>
					<i class="icon-edit"></i>
					<a href="#">Forms</a>
				</li>
			</ul>
			
			<div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon edit"></i><span class="break"></span>Update brands</h2>
						<div class="box-icon">
							<a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
							<a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
							<a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
						</div>
					</div>

					   <p class="alert-success">
                      <?php

                      $message=Session::get('message');
                      if ($message)
                       { 

                       	echo $message;

                       	Session::put('message',null);
                      
                      }

                      ?>
                      	
                      </p>

					<div class="box-content">
						<form class="form-horizontal" action="{{url('/update-brands',$brands_info ->brands_id)}}" method="post">

                        {{csrf_field()}}


						  <fieldset>
							<div class="control-group">
							  <label class="control-label" for="typeahead">Brands Name </label>
							  <div class="controls">
								<input type="text" class="input-xlarge" name="brands_name" value="{{$brands_info ->brands_name}}">
							  </div>
							</div>
       
							<div class="control-group hidden-phone">
							  <label class="control-label" for="textarea2">Brands Description</label>
							  <div class="controls">
								<textarea class="cleditor" name="brands_description" rows="3">
									{{$brands_info ->brands_description}}

								</textarea>

							</div>

							<div class="form-actions">
							  <button type="submit" class="btn btn-primary">Update</button>
					
							</div>
						  </fieldset>
						</form>   

					</div>
				</div><!--/span-->

			</div>


@endsection