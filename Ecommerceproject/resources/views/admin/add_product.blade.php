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
						<h2><i class="halflings-icon edit"></i><span class="break"></span>Add Product</h2>
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
						<form class="form-horizontal" action="{{url('/save-product')}}" method="post" enctype="multipart/form-data">

                        {{csrf_field()}}


						  <fieldset>
							<div class="control-group">
							  <label class="control-label" for="typeahead">product Name </label>
							  <div class="controls">
								<input type="text" class="input-xlarge" name="product_name">
							  </div>
							</div>

						<div class="control-group">
							<label class="control-label" for="selectError3">Product Category</label>
							<div class="controls">
							  <select id="selectError3" name="category_id">
							   <option>select category</option>

								  <?php

                                    $all_published_category=DB::table('tbl_category')
                                          ->where('publication_status',1)
                                          ->get();

                                    foreach($all_published_category as $v_category){?>
									<option value="{{$v_category->category_id}}">{{$v_category->category_name}}</option>	

								  <?php } ?>
							  </select>
							</div>
						  </div>
						  <div class="control-group">
								<label class="control-label" for="selectError3">Brands Category</label>
								<div class="controls">
								  <select id="selectError3" name="brands_id">
								  <option>select brand</option>
								   <?php

                                    $all_published_brands=DB::table('tbl_brands')
                                          ->where('publication_status',1)
                                          ->get();

                                    foreach($all_published_brands as $v_brands){?>
									<option value="{{$v_brands->brands_id}}">{{$v_brands->brands_name}}</option>	

								  <?php } ?>
									


								  </select>
								
								</div>
							  </div>
       
							<div class="control-group hidden-phone">
							  <label class="control-label" for="textarea2">Product short Description</label>
							  <div class="controls">
								<textarea class="cleditor" name="product_short_description" rows="3"></textarea>
							  </div>
							</div>

							<div class="control-group hidden-phone">
							  <label class="control-label" for="textarea2">Product long Description</label>
							  <div class="controls">
								<textarea class="cleditor" name="product_long_description" rows="3"></textarea>
							  </div>
							</div>

							<div class="control-group">
							  <label class="control-label" for="typeahead">Product Price </label>
							  <div class="controls">
								<input type="text" class="input-xlarge" name="product_price">
							  </div>
							</div>

							<div class="control-group">
							  <label class="control-label" for="fileInput">Product Image</label>
							  <div class="controls">
								<input class="input-file uniform_on" name="product_image" id="fileInput" type="file">
							  </div>
							</div>  

							  <div class="control-group">
							  <label class="control-label" for="typeahead">Product Size </label>
							  <div class="controls">
								<input type="text" class="input-xlarge" name="product_size">
							  </div>
							</div>

							<div class="control-group">
							  <label class="control-label" for="typeahead">Product color </label>
							  <div class="controls">
								<input type="text" class="input-xlarge" name="product_color">
							  </div>
							</div>


                             <div class="control-group hidden-phone">
							  <label class="control-label" for="textarea2">Publication status</label>
							  <div class="controls">
								<input type="checkbox" name="publication_status" value="1">
							  </div>
							</div>

							<div class="form-actions">
							  <button type="submit" class="btn btn-primary">Add Product</button>
							  <button type="reset" class="btn">Cancel</button>
							</div>
						  </fieldset>
						</form>   

					</div>
				</div><!--/span-->

			</div>


@endsection