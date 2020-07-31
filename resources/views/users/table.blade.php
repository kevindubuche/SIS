<div class="table-responsive">
    <table class="table" id="users-table">
        <thead>
            <tr>
                <th>Prenom</th>
                <th>Nom</th>
        <th>Droit d'access</th>
        <th>Adresse Email</th>
        {{-- <th>Email Verified At</th> --}}
       
        {{-- <th>Remember Token</th> --}}
                <th colspan="3">Actions</th>
            </tr>
        </thead>
        <tbody>
        @foreach($users as $user)
            <tr>
                <td>{{ $user->first_name }}</td>
                <td>{{ $user->last_name }}</td>
               
            <td>
                @if ( $user->role == 1)
                     Administrateur
                @elseif( $user->role == 2)
                    Professeur
                @else
                    Etudiant(e)
                @endif
            </td>
            <td>{{ $user->email }}</td>
            {{-- <td>{{ $user->email_verified_at }}</td> --}}
          
            {{-- <td>{{ $user->remember_token }}</td> --}}
                <td>
                    {!! Form::open(['route' => ['users.destroy', $user->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('users.show', [$user->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('users.edit', [$user->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
