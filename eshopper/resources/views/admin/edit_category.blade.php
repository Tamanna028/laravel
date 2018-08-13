 @extends('admin.admin_master')
 @section('content')
   <div class="row-fluid sortable">
                <div class="box span12">
                    <div class="box-header" data-original-title>
                        <h2><i class="halflings-icon edit"></i><span class="break"></span>Update Category</h2>
                        
                    </div>
                  
                    <div class="box-content">
                        <form class="form-horizontal" action="{{url('/update-category',$category_info->category_id)}}" method="post">
                            {{csrf_field()}}
                          <fieldset>
                            <div class="control-group">
                              <label class="control-label" for="typeahead">Category Name </label>
                              <div class="controls">
                                <?php
                                echo '<pre>';
                                print_r($category_info);
                                echo '</pre>';
                                ?>
                                <input type="text" name="category_name" class="span6 typeahead" value="{{$category_info->category_name}}" required="">
                              </div>
                            </div>
                                
                            <div class="control-group hidden-phone">
                              <label class="control-label" for="textarea2">Category Description</label>
                              <div class="controls">
                                <textarea name="category_description" id="textarea2" rows="3" required="">{{$category_info->category_description}}</textarea>
                              </div>
                            </div>

                             

                            <div class="form-actions">
                              <button type="submit" class="btn btn-primary">Update Category</button>
                              <button type="reset" class="btn">Cancel</button>
                            </div>
                          </fieldset>
                        </form>   

                    </div>
                </div><!--/span-->

            </div><!--/row-->

                     @endsection