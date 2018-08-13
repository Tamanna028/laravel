
 @extends('admin.admin_master')
 @section('content')

   <div class="row-fluid sortable">
                <div class="box span12">
                    <div class="box-header" data-original-title>
                        <h2><i class="halflings-icon edit"></i><span class="break"></span>Add Product</h2>
                        
                    </div>
<p>
                
    <?php

    $message = Session::get('message');
if($message){
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
                              <label class="control-label" for="typeahead">Product Name </label>
                              <div class="controls">
                                <input type="text" name="product_name" class="span6 typeahead" required="">
                              </div>
                            </div>
                            
                            <div class="control-group">
                                <label class="control-label" for="selectError3">Product Category</label>
                                <div class="controls">
                                  <select id="selectError3" name="category_id">
                                    <option>Select Category</option>
                                    <?php 
                               $all_category = DB::table('category')
                                      ->where('publication_status',1)
                                      ->get();


              ?>
              
              @foreach($all_category as $category)
              
                                  <option value="{{$category->category_id}}">{{$category->category_name}}</option>
                                  @endforeach
                                  </select>
                                </div>
                                </div>

                      <div class="control-group">
                          <label class="control-label" for="selectError3">Product Brand </label>
                          <div class="controls">
                            <select id="selectError3" name="manufacture_id">
                           <option>Select Brand</option>
                                    <?php 
                               $all_manufacture = DB::table('manufacture')
                                      ->where('publication_status',1)
                                      ->get();


              ?>
              
              @foreach($all_manufacture as $manufacture)
              
                                  <option value="{{$manufacture->manufacture_id}}">{{$manufacture->manufacture_name}}</option>
                                  @endforeach
                                  </select>
                          </div>
                          </div>


                            <div class="control-group hidden-phone">
                              <label class="control-label" for="textarea2">Product Short Description</label>
                              <div class="controls">
                                <textarea class="cleditor" name="product_short_description" id="textarea1" rows="3" required=""></textarea>
                              </div>
                            </div>

                          <div class="control-group hidden-phone">
                              <label class="control-label" for="textarea2">Product Long Description</label>
                              <div class="controls">
                                <textarea class="cleditor" name="product_long_description" id="textarea2" rows="3" required=""></textarea>
                              </div>
                            </div>

        <div class="control-group">
                <label class="control-label" for="typeahead">Product Price</label>
                <div class="controls">
                  <input type="text" class="input-xlarge" name="product_price" >
                  
                </div>
                </div>

                 <div class="control-group">
                <label class="control-label">File Upload</label>
                <div class="controls">
                  <input type="file" name="products_image">
                </div>
                </div>

                <div class="control-group">
                <label class="control-label" for="typeahead">Product Size</label>
                <div class="controls">
                  <input type="text" class="input-xlarge" name="product_size">
                  
                </div>
                </div>

                <div class="control-group">
                <label class="control-label" for="typeahead">Product Color</label>
                <div class="controls">
                  <input type="text" class="input-xlarge" name="product_color" >
                  
                </div>
                </div>

                         

                             <div class="control-group">
                <label class="control-label">Publication Status</label>
                <div class="controls">
                  <label class="checkbox inline">
                  <input type="checkbox" id="inlineCheckbox1" name="publication_status" value="1"> Publish
                  </label>
                  <label class="checkbox inline">
                  <input type="checkbox" id="inlineCheckbox2" name="publication_status" value="0"> Unpublish
                  </label>
                 
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

            </div><!--/row-->

                     @endsection