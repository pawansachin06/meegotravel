<?php

namespace App\Http\Controllers;

use App\Enums\UserRoleEnum;
use App\Models\User;
use Exception;
use Hidehalo\Nanoid\Client;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Enum;

class UserController extends Controller
{

    public function dashboard(Request $req)
    {
        $currentUser = $req->user();
        return view('dashboard', [
            'currentUser' => $currentUser,
        ]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = User::paginate(10)->withQueryString();
        return view('users.index', ['items' => $items]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $nanoidClient = new Client();
            $nanoid = $nanoidClient->generateId();
            $item = User::create([
                'name' => 'New User',
                'email' => 'user@'. $nanoid . '.com',
            ]);
            return response()->json([
                'success' => true,
                'redirect' => route('users.edit', $item),
                'message' => 'User created',
            ]);
        } catch (Exception $e) {
            return response()->json([
                'success' => false, 'message' => $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('users.edit', [
            'item' => $user,
            'roles' => UserRoleEnum::toArray(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $item = $user;
        $request->merge(['email' => strtolower($request['email']) ]);
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['string', 'email', 'max:255', Rule::unique(User::class)->ignore($user->id)],
            'phone' => ['nullable', 'string', 'max:255'],
            'role' => [new Enum(UserRoleEnum::class)],
        ]);
        try {
            $item->update($validated);
            return response()->json([
                'success' => true, 'message' => 'Saved successfully',
            ]);
        } catch (Exception $e) {
            return response()->json([
                'success' => false, 'message' => $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
    }
}
