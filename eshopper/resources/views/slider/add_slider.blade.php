
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
                        <form class="form-horizontal" action="{{url('/save-slider')}}" method="post" enctype="multipart/form-data">
                            {{csrf_field()}}
                          <fieldset>
                           

                 <div class="control-group">
                <label class="control-label">File Upload</label>
                <div class="controls">
                  <input type="file" name="slider_image" required="">
                </div>
                </div>

               
                         

                             <div class="control-group">
                <label class="control-label">Publication Status</label>
                <div class="controls">
                  <label class="checkbox inline">
                  <input type="checkbox" id="inlineCheckbox1" name="publication_status" value="1" > Publish
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