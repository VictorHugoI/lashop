<tr>
    <td class="text-center">{{ $user->id }}</td>
    <td>{{ $user->name }}</td>
    <td>{{ $user->email }}</td>
    <td>{{ config('setup.user_types.' . $user->role) }}</td>
    <td class="text-center">
        <a href="{{ route('admin.users.edit', $user->id) }}" style="color: green; font-size: 18px;">
            <i class="fa fa-pencil"></i>
        </a>
        {{ Form::open(['method' => 'DELETE', 'route' => ['admin.users.destroy', $user->id]]) }}
            {{ Form::submit('Delete', ['class' => 'btn btn-danger btn-xs btn-delete-resource fa fa-trash']) }}
        {{ Form::close() }}
    </td>
</tr>
