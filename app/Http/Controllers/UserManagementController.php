<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class UserManagementController extends Controller
{
    public function index(): View
    {
        return view('configuracion.usuarios', [
            'users' => User::orderBy('name')->paginate(20),
        ]);
    }

    public function updateRole(Request $request, User $user): RedirectResponse
    {
        $validated = $request->validate([
            'role' => ['required', 'in:admin,user'],
        ]);

        if ($user->is($request->user()) && $validated['role'] !== 'admin') {
            return redirect()
                ->route('configuracion.usuarios.index')
                ->with('status', 'No puedes quitarte el rol de administrador a ti mismo.');
        }

        $user->forceFill([
            'role' => $validated['role'] === 'admin' ? User::ROLE_ADMIN : User::ROLE_USER,
        ])->save();

        return redirect()
            ->route('configuracion.usuarios.index')
            ->with('status', 'Rol actualizado correctamente.');
    }

    public function destroy(Request $request, User $user): RedirectResponse
    {
        if ($user->is($request->user())) {
            return redirect()
                ->route('configuracion.usuarios.index')
                ->with('status', 'No puedes eliminar tu propia cuenta.');
        }

        $user->delete();

        return redirect()
            ->route('configuracion.usuarios.index')
            ->with('status', 'Persona eliminada.');
    }
}
