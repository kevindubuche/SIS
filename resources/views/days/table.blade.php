<div class="table-responsive">
    <table class="table" id="days-table">
        <thead>
            <tr>
                <th>Name</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($days as $day)
            <tr>
                <td>{{ $day->name }}</td>
                <td>
                    {!! Form::open(['route' => ['days.destroy', $day->day_id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                    <a data-toggle="modal" data-target="#view-day-modal" data-day_id="{{ $day->day_id}}"
                        data-name="{{ $day->name}}" data-created_at="{{ $day->created_at }}"
                        data-updated_at="{{ $day->updated_at }}"
                        class='btn btn-default btn-xs'>
                        <i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('days.edit', [$day->day_id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>


{{-- THE MODAL FOR THE VIEW --}}
  <!-- Modal -->
  <div class="modal fade" id="view-day-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">

            <input type="hidden" name="day_id" id="day_id">
                <!-- Day Field -->
                <div class="form-group col-sm-6">
                    {!! Form::label('name', 'Name:') !!}
                    <input type="text" name="name" id="name" readonly>
                </div>

                  <div class="form-group">
                    {!! Form::label('created_at', 'Created At:') !!}
                   <input type="text" name="created_at" id="created_at" readonly>
                  </div>

                  <div class="form-group">
                    {!! Form::label('updated_at', 'Updated At:') !!}
                   <input type="text" name="updated_at" id="updated_at" readonly>
                  </div>
                  


</div>
<div class="modal-footer">
  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
  {!! Form::submit('Save Day', ['class' => 'btn btn-primary']) !!}
</div>
</div>
</div>

</div>


@section('scripts')
 <script>
        // {{-------day view side--------}}
        $('#view-day-modal').on('show.bs.modal', function(event){
          console.log('ou la')
            var button = $(event.relatedTarget)
            var name = button.data('name')
            var created_at = button.data('created_at')
            var updated_at = button.data('updated_at')
            var name_id = button.data('name_id')

            var modal =$(this)

            modal.find('.modal-title').text('VIEW DAY INFORMATION');
            modal.find('.modal-body #name').val(name);
          modal.find('.modal-body #created_at').val(created_at);
            modal.find('.modal-body #updated_at').val(updated_at);
            modal.find('.modal-body #name_id').val(name_id);

        });


    </script>
@endsection
