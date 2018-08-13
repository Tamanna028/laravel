 @extends('admin.admin_master')
 @section('content')
   <div class="row-fluid sortable">
                <div class="box span12">
                    <div class="box-header" data-original-title>
                        <h2><i class="halflings-icon edit"></i><span class="break"></span>Update Manufacture</h2>
                        
                    </div>
                  
                    <div class="box-content">
                        <form class="form-horizontal" action="{{url('/update-manufacture',$manufacture_info->manufacture_id)}}" method="post">
                            {{csrf_field()}}
                          <fieldset>
                            <div class="control-group">
                              <label class="control-label" for="typeahead">Manufacture Name </label>
                              <div class="controls">
                               
                                <input type="text" name="manufacture_name" class="span6 typeahead" value="{{$manufacture_info->manufacture_name}}" required="">
                              </div>
                            </div>
                                
                            <div class="control-group hidden-phone">
                              <label class="control-label" for="textarea2">Manufacture Description</label>
                              <div class="controls">
                                <textarea name="manufacture_description" id="textarea2" rows="3" required="">{{$manufacture_info->manufacture_description}}</textarea>
                              </div>
                            </div>

                             

                            <div class="form-actions">
                              <button type="submit" class="btn btn-primary">Update Manufacture</button>
                              <button type="reset" class="btn">Cancel</button>
                            </div>
                          </fieldset>
                        </form>   

                    </div>
                </div><!--/span-->

            </div><!--/row-->

                     @endsection