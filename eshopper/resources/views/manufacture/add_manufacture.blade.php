
 @extends('admin.admin_master')
 @section('content')

   <div class="row-fluid sortable">
                <div class="box span12">
                    <div class="box-header" data-original-title>
                        <h2><i class="halflings-icon edit"></i><span class="break"></span>Add Brand</h2>
                        
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
                        <form class="form-horizontal" action="{{url('/save-manufacture')}}" method="post">
                            {{csrf_field()}}
                          <fieldset>
                            <div class="control-group">
                              <label class="control-label" for="typeahead">Brand Name </label>
                              <div class="controls">
                                <input type="text" name="manufacture_name" class="span6 typeahead" required="">
                              </div>
                            </div>
                                
                            <div class="control-group hidden-phone">
                              <label class="control-label" for="textarea2">Brand Description</label>
                              <div class="controls">
                                <textarea name="manufacture_description" id="textarea2" rows="3" required=""></textarea>
                              </div>
                            </div>

                           

                             <div class="control-group hidden-phone">
                              <label class="control-label" for="textarea2">Publication Status</label>
                              <div class="controls">
                                <input type="checkbox" class="cleditor" name="publication_status" id="textarea2" value="1" rows="3">
                              </div>
                            </div>

                            <div class="form-actions">
                              <button type="submit" class="btn btn-primary">Add Manufacture</button>
                              <button type="reset" class="btn">Cancel</button>
                            </div>
                          </fieldset>
                        </form>   

                    </div>
                </div><!--/span-->

            </div><!--/row-->

                     @endsection