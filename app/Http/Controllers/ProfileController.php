<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        // --- LÓGICA DE FOTO DE PERFIL ---
        if ($request->hasFile('photo')) {
            // 1. Validar que sea una imagen válida
            $request->validate([
                'photo' => ['nullable', 'image', 'max:1024'], // Max 1MB
            ]);

            // 2. Si ya tenía una foto vieja, borrarla para no acumular basura
            if ($request->user()->profile_photo_path) {
                Storage::delete($request->user()->profile_photo_path);
            }

            // 3. Guardar la nueva foto en la carpeta 'profile-photos' del disco público
            $path = $request->file('photo')->store('profile-photos', 'public');

            // 4. Asignar la ruta al usuario
            $request->user()->profile_photo_path = $path;
        }
        // --------------------------------

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}