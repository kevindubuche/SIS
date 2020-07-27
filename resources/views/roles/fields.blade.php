






<div class="modal fade left" id="role-add-modal" tabindex="-1" role="dialog" aria-labellebdy="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-notify moda-ms modal-right modal-succes" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-registered" aria-hidden="true">Roles</i></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

<!-- Name Field -->
<div class="form-group ">
    {!! Form::label('name', 'Nom:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

{{-- <!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('roles.index') }}" class="btn btn-default">Cancel</a>
</div> --}}




            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-warning" data-dismiss="modal">Fermer</button>
                {!! Form::submit('Creer Role', ['class'=> 'btn btn-succes']) !!}
            </div>
        </div>
    </div>
</div>
</div>

