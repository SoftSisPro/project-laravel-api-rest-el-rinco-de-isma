<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\UserToken;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        $user = $request->user();

        /// Obtener los tokens existentes o crearlos si no existen
        $tokens = $this->getOrCreateTokens($user);

        return view('profile.edit', [
            'user' => $user,
            'tokens' => $tokens
        ]);
    }

    private function getOrCreateTokens($user): array
    {
        $tokenNames = [
            'admin-token' => ['create', 'update', 'delete'],
            'update-token' => ['update'],
            'basic-token' => ['read'],
        ];

        $tokens = [];

        foreach ($tokenNames as $name => $abilities) {
            // Buscar si el token ya existe en la nueva tabla
            $existingToken = UserToken::where('user_id', $user->id)->where('name', $name)->first();

            if (!$existingToken) {
                // Crear el token si no existe
                $newToken = $user->createToken($name, $abilities);
                // Guardar el token en la nueva tabla
                UserToken::create([
                    'user_id' => $user->id,
                    'name' => $name,
                    'token' => $newToken->plainTextToken,
                ]);
                $tokens[$name] = $newToken->plainTextToken;
            } else {
                // Usar el token existente de la nueva tabla
                $tokens[$name] = $existingToken->token;
            }
        }

        return $tokens;
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

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
