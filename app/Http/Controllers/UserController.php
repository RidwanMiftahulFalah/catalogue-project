<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller {
  /**
   * Display a listing of the resource.
   */
  public function index() {
    $users = User::paginate(5);
    return view('users.index', compact('users'));
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create() {
    return view('users.create');
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(Request $request) {
    $request->validate([
      'name' => ['required', 'max:200'],
      'email' => ['required', 'max:200'],
      'password' => ['required', 'min:8'],
      // 'role' => 'required',
    ]);

    User::create([
      'name' => $request->name,
      'email' => $request->email,
      'password' => $request->password,
      'role' => $request->role,
    ]);

    return redirect()->route('users.index')->with('message', 'New user successfully registered!');
  }

  /**
   * Display the specified resource.
   */
  public function show(User $user) {
    //
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(User $user) {
    //
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, User $user) {
    $user->update($user->is_active ? ['is_active' => false] : ['is_active' => true]);
    $message = 'Selected user\'s account successfully ' . ($user->is_active ? 'activated!' : 'deactivated!');

    return redirect()->route('users.index')->with('message', $message);
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(User $user) {
    //
  }
}
