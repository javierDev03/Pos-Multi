<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\File;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Inertia\Inertia;
use Inertia\Response;

class ProfileController extends Controller
{
    private string $storage_path = 'photos';

    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): Response
    {
        // Solo pasamos al front los datos mínimos, sin relaciones inexistentes
        return Inertia::render('Profile/Edit', [
            'user' => User::with('file')->findOrFail(Auth::id())
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $user = User::findOrFail(Auth::id());
        $user->update($request->validated());

        if ($request->hasFile('photo')) {
            $fileStorage = $request->file('photo');
            $fileName = (File::max('id') + 1) . '-' . $fileStorage->getClientOriginalName();
            $path = '/storage/' . $fileStorage->storeAs($this->storage_path, $fileName, 'public');

            $file = File::where([
                ['fileable_type', User::class],
                ['fileable_id', $user->id]
            ])->first();

            if ($file) {
                Storage::disk('public')->delete($file->path);
                $file->update([
                    'name' => $fileName,
                    'path' => $path,
                    'size' => $fileStorage->getSize(),
                    'mime_type' => $fileStorage->getMimeType(),
                ]);
            } else {
                $user->file()->create([
                    'name' => $fileName,
                    'path' => $path,
                    'size' => $fileStorage->getSize(),
                    'mime_type' => $fileStorage->getMimeType(),
                ]);
            }
        }

        return Redirect::route('profile.edit')->with('success', 'Perfil actualizado con éxito');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validate([
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }

    /**
     * Delete user's profile photo.
     */
    public function destroyPhoto(): RedirectResponse
    {
        $user = User::with('file')->findOrFail(Auth::id());

        if ($user->file) {
            Storage::disk('public')->delete($user->file->path);
            $user->file->delete();
        }

        return Redirect::route('profile.edit')->with('success', 'Foto eliminada con éxito');
    }
}
