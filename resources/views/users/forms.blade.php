
@inject('role','Spatie\Permission\Models\Role')
<?php 
$roles=$role->pluck('name','id')->toArray();
?>

<div class="form-group bmd-form-group">
                        <label class="bmd-label-floating">name</label>
                        {!! Form::text('name',null,[
                        
                        'class'=>'form-control'
                        
                        ]) !!}

                       
                      </div>
                      <div class="form-group bmd-form-group">
                        <label class="bmd-label-floating">Email</label>
                        {!! Form::email('email',null,[
                        
                        'class'=>'form-control'
                        
                        ]) !!}

                       
                      </div>
                      <div class="form-group bmd-form-group">
                        <label class="bmd-label-floating">Password</label>
                        {!! Form::password('password',[
                        
                        'class'=>'form-control'
                        
                        ]) !!}

                       
                      </div>
                      <div class="form-group bmd-form-group">
                        <label class="bmd-label-floating">Password confirmation</label>
                        {!! Form::password('password_confirmation',[
                        
                        'class'=>'form-control'
                        
                        ]) !!}

                       
                      </div>
                  
                      <div class="form-group">
    <label for="roles_list">Roles  </label>
    {!! Form::select('roles_list[]',$roles,null,[
    'class' => 'form-control select2',
    'multiple' => 'multiple',
 ]) !!}
</div>

