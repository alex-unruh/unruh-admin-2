<?php

namespace App\Http\Controllers\Admin;

use App\Models\Attempt;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

/**
 * Undocumented class
 *
 * @author Alexandre Unruh <alexandre@unruh.com.br>
 */
class LoginController extends Controller
{
  private $request;
  private $ip;

  /**
   * Show login form
   */
  public function index(Request $request)
  {
    $this->ip = $request->ip ?? '45.227.140.157';
    if (Auth::check()) {
      return redirect()->intended('/admin/home');;
    }
    if ($this->getAttempts() > 3) {
      return redirect()->route('home');
    }
    return view('admin.login');
  }

  /**
   * Authenticates users
   *
   * @param Request $request
   * @return void
   */
  public function authenticate(Request $request)
  {
    $this->request = $request;
    $this->ip = $request->ip ?? '45.227.140.157';

    $this->validateRequest();

    $credentials = $request->only(['email', 'password']);
    if (Auth::attempt($credentials)) {
      $this->deleteAttempt();
      return redirect()->intended('/admin/home');;
    }

    $this->recordAttempt();
    return redirect()->back()->with('error', 'Usuário ou senha inválidos');
  }

  /**
   * Logout users
   *
   * @return void
   */
  public function logout()
  {
    Auth::logout();
    return redirect()->route('admin');
  }

  /**
   * Get failed user login attempts
   *
   * @return integer
   */
  private function getAttempts()
  {
    return Attempt::where('ip', $this->ip)
      ->whereDate('created_at', date("Y-m-d"))
      ->count();
  }

  /**
   * Check whether the required parameters are present in the request
   *
   * @return void
   */
  private function validateRequest()
  {
    $rules = [
      'email'    => 'required|email',
      'password' => 'required|between:3,20'
    ];
    $this->request->validate($rules);
  }

  /**
   * Create a new record for attempt in database
   *
   * @return void
   */
  private function recordAttempt()
  {
    $attempt = new Attempt();
    $attempt->ip = $this->ip;
    $attempt->email = $this->request->email;
    $attempt->password = $this->request->password;
    $attempt->save();
  }

  /**
   * Delete the records with the user ip from table attempts
   *
   * @return void
   */
  private function deleteAttempt()
  {
    Attempt::where('ip', $this->ip)
      ->whereDate('created_at', date('Y-m-d'))
      ->delete();
  }
}
