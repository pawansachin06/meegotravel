<?php

namespace App\Http\Controllers;

use App\Enums\UserRoleEnum;
use App\Models\User;
use Exception;
use Hidehalo\Nanoid\Client;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;
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
    public function index(Request $req)
    {
        $currentUser = $req->user();
        $query = User::query();
        if($currentUser->role == UserRoleEnum::ADMIN){
        } else if($currentUser->role == UserRoleEnum::RESELLER){
            $query = $query->where('role', UserRoleEnum::USER);
        } else {
            $query = $query->where('id', $currentUser->id);
        }
        $items = $query->latest()->paginate(10)->withQueryString();
        return view('users.index', ['items' => $items]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $req)
    {
        $currentUser = $req->user();
        $req->merge(['email' => strtolower($req['email']) ]);
        $validated = $req->validate([
            'name' => ['required', 'string', 'max:255'],
            'lastname' => ['nullable', 'string', 'max:255'],
            'email' => ['string', 'email', 'max:255', Rule::unique(User::class)],
            'phone' => ['nullable', 'string', 'max:255'],
            'role' => [new Enum(UserRoleEnum::class)],
            'password' => ['string', 'max:26'],
            'referral_code' => ['nullable', 'string', 'max:255',],
            'unique_code' => ['nullable', 'string', 'max:255', Rule::unique(User::class)],
        ]);

        if($currentUser->role !== UserRoleEnum::ADMIN) {
            $validated['role'] = UserRoleEnum::USER;
        }

        $validated['password'] = Hash::make($validated['password']);

        try {
            $item = User::create($validated);
            return response()->json([
                'success' => true,
                'redirect' => route('users.edit', $item->id),
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
    public function update(Request $req, User $user)
    {
        $currentUser = $req->user();
        $item = $user;
        $req->merge(['email' => strtolower($req['email']) ]);
        $validated = $req->validate([
            'name' => ['required', 'string', 'max:255'],
            'lastname' => ['nullable', 'string', 'max:255'],
            'email' => ['string', 'email', 'max:255', Rule::unique(User::class)->ignore($user->id)],
            'phone' => ['nullable', 'string', 'max:255'],
            'role' => [new Enum(UserRoleEnum::class)],
            'referral_code' => ['nullable', 'string', 'max:255',],
            'unique_code' => ['nullable', 'string', 'max:255', Rule::unique(User::class)->ignore($user->id)],
        ]);

        if($currentUser != UserRoleEnum::ADMIN) {
            $validated['role'] = UserRoleEnum::USER;
        }

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
