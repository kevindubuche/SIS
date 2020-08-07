
  <!-- Modal -->
  <div class="modal fade" id="add-class_ass-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" 
    {{-- style="width:90%" --}}
    role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Assigner un professeur a une classe</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">





          {!! Form::open(array('route'=>'insert', 'id'=>'mult', 'method'=>'post')) !!}
{{-- <form action="{{route('classAssignings.store')}}" method="post"> --}}
  @csrf

<div class="table-responsive">
  {{-- @include('class_assignings.fields') --}}
  <div class="form-group col-sm-12">
    <input type="hidden" name="class_assign_id" id="">
    <label>Selectionner professeur</label>
    <select class="form-control" name="teacher_id" id="">
    {{-- <option value="0" selected="true" disabled="true"> Selectionner professeur<option> --}}
      @foreach($allTeacher as $teacher)
      <option value="{{$teacher->user_id}}">{{$teacher->first_name}} {{$teacher->last_name}}</option>
      @endforeach
  </select>
</div>
<br>
<div class="form-group col-sm-12">
    <table class="table" id="classAssignings-table">
        <thead>
            <tr>
              <td></td>
        <td>Classes</td>
            </tr>
        </thead>
        <tbody>
            <label>Selectionner la/les classe(s)</label>
          @foreach($classes as $classe)
              <tr>
                <td><input type="checkbox" name="multiclass[]" value="{{$classe->class_id}}" ></td>
                <td>{{ $classe->class_name }}</td>
              </tr>
          @endforeach
        </tbody>
    </table> 
</div>
    {{-- <div class="clearfix"></div> --}}
    <div class="modal-footer">
        <button type="button" class="btn btn-warning" data-dismiss="modal">Fermer</button>
        <button type="submit" class="btn btn-info" >Assigner</button>
    </div>  



</div>
{{-- </form> --}}

</div>
{{-- <div class="modal-footer">
  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
  {!! Form::submit('Assigner', ['class' => 'btn btn-primary']) !!}
</div> --}}



</div>
</div>
</div>


{{-- Fin modal --}}

<div class="table-responsive">
  <table id='myTable' class=' display   table table-bordered table-striped table-condensed'>
    <thead>
          <tr>
      <th>Professeur</th>
      <th>Classe</th>
      @if (Auth::user()->role ==1)
      <th>Actions</th>
      @endif
          </tr>
      </thead>
      <tbody>
      @foreach($classAssignings as $classAssigning)
          <tr>
          <td>{{ $classAssigning->InfoTeacher($classAssigning->teacher_id)->first_name }} 
            {{ $classAssigning->InfoTeacher($classAssigning->teacher_id)->last_name }} </td>
          <td>{{ $classAssigning->InfoClass->class_name }}</td>
        
          @if (Auth::user()->role ==1)
              <td>
                  {!! Form::open(['route' => ['classAssignings.destroy', $classAssigning->class_assign_id], 'method' => 'delete']) !!}
                  <div class='btn-group'>
                     {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Etes-vous sur?')"]) !!}
                  </div>
                  {!! Form::close() !!}
              </td>
              @endif
          </tr>
      @endforeach
      </tbody>
  </table>
</div>


@push('scripts')
<script>
//     $(document).ready( function () {
//     $('#myTable').DataTable();
// } );
    
    $(document).ready(function()
    {
        
        $('#myTable').DataTable({  
            // alert('okokok');
            select:true,
            "language": {
            "lengthMenu": "Voir _MENU_ lignes par page",
            "zeroRecords": "Aucune information - desole",
            "info": "_PAGE_ sur _PAGES_",
            "infoEmpty": "Aucun resultat trouve",
            "infoFiltered": "(filtre de _MAX_ total resultats)",
            "search": "Rechercher",
            "paginate":{
            "previous":"Precedent",
            "next":"Suivant"
            }


        },
        buttons:['selectRows']
    }

        );
    });
</script>
@endpush