<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\User;

/**
 * Class UserController
 * @package App\Http\Controllers
 */
class UserController extends Controller
{
    /**
     * @var User
     */
    protected $user;

    /**
     * UserController constructor.
     *
     * @param User $user
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $user                   = User::find(2);
        $questions              = collect(['question_1' => '', 'question_2' => '', 'question_3' => '', 'question_4' => '']);
        $accessibilityQuestions =collect( config('questions'));

        return view('user.create', compact('user', 'questions', 'accessibilityQuestions'));
    }

    /**
     * @param UserRequest $request
     */
    public function store(UserRequest $request)
    {
        $data             = $request->all();
        $data['password'] = bcrypt('secret');
        $newUser          = new User();
        $newUser->fill($data);
        $newUser->save();

        return $request->ajax() ? response()->json(['redirect' => route('user.create')]) : redirect()->back();
    }

    public function show($id)
    {
        $user = User::find($id);

        return response()->json(['user' => $user]);
    }
}
