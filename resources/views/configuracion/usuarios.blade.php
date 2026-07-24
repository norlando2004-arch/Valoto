@extends('configuracion.layout')

@section('title', 'Personas registradas')
@section('subtitle', 'Administra los roles de las personas que se han registrado y eliminalas si es necesario.')

@section('content')
    <div class="panel">
        <h2>Personas registradas</h2>
        <p class="hint">{{ $users->total() }} persona(s) en total.</p>

        <div class="table-scroll">
            <table class="data-table">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Correo</th>
                        <th>Rol</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($users as $registeredUser)
                        <tr>
                            <td>{{ $registeredUser->name }}</td>
                            <td>{{ $registeredUser->email }}</td>
                            <td>
                                <span class="role-badge {{ $registeredUser->isAdmin() ? 'admin' : 'user' }}">
                                    {{ $registeredUser->isAdmin() ? 'Administrador' : 'Usuario' }}
                                </span>
                            </td>
                            <td>
                                <div class="actions-cell">
                                    <form
                                        class="role-form"
                                        method="POST"
                                        action="{{ route('configuracion.usuarios.update', $registeredUser) }}"
                                    >
                                        @csrf
                                        @method('PUT')
                                        <select name="role">
                                            <option value="user" @selected(! $registeredUser->isAdmin())>Usuario</option>
                                            <option value="admin" @selected($registeredUser->isAdmin())>Administrador</option>
                                        </select>
                                        <button type="submit">Guardar rol</button>
                                    </form>

                                    <form
                                        class="delete-form"
                                        method="POST"
                                        action="{{ route('configuracion.usuarios.destroy', $registeredUser) }}"
                                        onsubmit="return confirm('¿Eliminar esta persona?');"
                                    >
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit">Eliminar</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="empty-row">Aun no hay personas registradas.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="pagination-links">
            {{ $users->links() }}
        </div>
    </div>
@endsection
