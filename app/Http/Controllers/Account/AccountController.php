<?php

namespace App\Http\Controllers\Account;

/**
 * Account Controller
 *
 * @author Bret Mette <bret.mette@rowdydesign.com>
 * @category Controller
 */

use Validator;
use App\Http\Controllers\Controller;
use App\Traits\Auth\RegistersUsers;
use App\Contracts\Auth\RegistrationServiceContract;
use App\Contracts\Repositories\UserRepositoryContract;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    use RegistersUsers;

    /**
     * @var App\Contracts\Auth\RegistrationServiceContract
     */
    protected $registration;

    /**
     * @var App\Contracts\Respositories\UserRepositoryContract
     */
    protected $repo;

    /**
     * Create a new account controller instance.
     *
     * @return void
     */
    public function __construct(RegistrationServiceContract $registration, UserRepositoryContract $repo)
    {
        $this->registration = $registration;
        $this->repo = $repo;
    }

    /**
     * Display the view to create a new user
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('account.create');
    }

    /**
     * Checks if a username is unique
     *
     * @return \Illuminate\Http\Response
     */
    public function unique(Request $request)
    {
        $valid = false;

        if ($email = $request->input('email')) {
            $valid = $this->registration->isUnique($email);
        }

        return response()->json(['valid' => $valid]);
    }

    /**
     * Validate and create the user input
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'first_name' => 'required|max:50',
            'last_name' => 'required|max:50',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6',
        ]);

        $input = $request->all();
        $user = $this->createUser($input);

        if ($user) {
            if ($request->ajax()) {
                return response()->json(['success' => true, 'redirect_url' => route('account.create.success')]);
            }
        }

        return view('account.store');
    }

    /**
     * Display the account verification view
     *
     * @return \Illuminate\Http\Response
     */
    public function verify($email, $code)
    {
        $user = $this->repo->getUserBy('email', $email);

        if ($user) {
            $user->verifyConfirmationCode($code);

            if ($user->isConfirmed()) {
                return view('account.verifysuccess');
            }
        }

        return view('errors.account.verifyfailure');
    }

    /**
     * Display the signup view
     *
     * @return \Illuminate\Http\Response
     */
    public function signup()
    {
        return view('signup');
    }

    /**
     * Display the view for a successfully created account
     *
     * @return \Illuminate\Http\Response
     */
    public function success()
    {
        return view('account.create.success');
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @param  array  $params
     *
     * @return User
     */
    protected function createUser(array $data)
    {
        $user = $this->registration->createUser([
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);

        return $user;
    }

}
