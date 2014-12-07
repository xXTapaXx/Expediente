   {{--Inicio modal--}}
            <div class="modal fade" id="create" tabindex="-1" role="dialog" aria-labelledby="create" aria-hidden="true">
                  <div class="modal-dialog">
                <div class="modal-content">
                      <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h4 class="modal-title custom_align" id="heading-user-show">User create</h4>
                  </div>

                   {{--Inicio formualrio --}}
                  {{ Form::open(array('url' => 'admin/users','id'=>'form-create')) }}

                      <div class="modal-body">

                      <div class="form-group">
                    {{Form::label('username','Username')}}
                    {{Form::text('username','',array('class'=>'form-control','id'=>'username'))}}
                    </div>

                    <div class="form-group">
                    {{Form::label('name','Name')}}
                    {{Form::text('real_name','',array('class'=>'form-control','id'=>'name'))}}
                    </div>

                     <div class="form-group">
                      {{Form::label('password','Password')}}
                      {{Form::password('password',array('class'=>'form-control','id'=>'password'))}}

                      </div>

                  </div>
                      <div class="modal-footer ">

                    <button type="submit" id="btn-users-save" class="btn btn-success btn-group-sm" ><span class="glyphicon glyphicon-ok-sign"></span> Create</button>
                    <button type="reset"  id="btn-users-cancel"  data-dismiss="modal" class="btn btn-default btn-group-sm" ><span class="glyphicon glyphicon-refresh"></span> Cancel</button>

                  </div>
                  {{ Form::close() }}

                  {{--Final del formulario--}}

                    </div>


              </div>
                </div> {{--Fin modal--}}