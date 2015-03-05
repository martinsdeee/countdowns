<?php namespace App\Http\Controllers;

use App\Countdown;
use Illuminate\Http\Request;
use Auth;



class HomeController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Home Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders your application's "dashboard" for users that
	| are authenticated. Of course, you are free to change or remove the
	| controller as you wish. It is just here to get your app started!
	|
	*/

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('auth');
	}

	/**
	 * Show the application dashboard to the user.
	 *
	 * @return Response
	 */
	public function index()
	{

		$countdowns = Countdown::whereUserId(Auth::user()->id)->get();
		return view('home', compact('countdowns'));
	}

	/**
	 * @param $cd
	 * @return \Illuminate\View\View
	 */
	public function show($cd)
	{
		$countdown = Countdown::whereSlug($cd)->first();
		return view('countdowns.show', compact('countdown'));
	}

	/**
	 * @return \Illuminate\View\View
	 */
	public function create()
	{
		return view('countdowns.create');
	}

	/**
	 * @param Request $request
	 * @return \Illuminate\Http\RedirectResponse
	 */
	public function store(Request $request)
	{

		$data =
			[
			'title' => $request->input('title'),
			'description' => $request->input('description'),
			'datetime' => $request->input('datetime'),
			'public' => $request->input('public'),
			'slug' => $request->input('slug'),
			'background_url' => $request->input('background_url'),
			'user_id' => Auth::user()->id,
			];

		//return $data;
		Countdown::create($data);
		return redirect()->route('home');
}

	/**
	 * @param $cd
	 * @return \Illuminate\View\View
	 */
	public function edit($cd)
	{
		$countdown = Countdown::whereSlug($cd)->first();
		return view('countdowns.edit', compact('countdown'));
	}

	public function update(Request $request) {

		$id = $request->input('id');
		$data =
			[
				'title' => $request->input('title'),
				'description' => $request->input('description'),
				'datetime' => $request->input('datetime'),
				'public' => $request->input('public'),
				'slug' => $request->input('slug'),
				'background_url' => $request->input('background_url'),
			];

		Countdown::whereId($id)->update($data);

		return redirect()->route('home');

	}

}
