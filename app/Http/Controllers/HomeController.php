<?php namespace App\Http\Controllers;

use App\Countdown;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Storage;


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

	protected $bgs = [];

	/**
	 * Assign background images to variable
	 */
	public function __construct()
	{
		$xbgs = Storage::files('/images/bg');
		foreach($xbgs as $key => $value){
			if( ends_with($value, 'gif')){
				$type = 'Animation';
			} else {
				$type = 'Image';
			}
			$this->bgs['/'.$value] = '/'.$value. ' - '.$type;
		}
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
		$bgs = $this->bgs;
		return view('countdowns.create', compact('bgs'));
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
			'slug' => ($request->input('slug') !== "" ? $request->input('slug'):str_slug($request->input('title'), '-')),
			'background_url' => $request->input('background_url'),
			'user_id' => Auth::user()->id,
			];

		Countdown::create($data);
		return redirect()->route('home');
	}

	/**
	 * @param $cd
	 * @return \Illuminate\View\View
	 */
	public function edit($cd)
	{
		$bgs = $this->bgs;
		$countdown = Countdown::whereSlug($cd)->first();
		return view('countdowns.edit', compact('countdown', 'bgs'));
	}

	/**
	 * @param Request $request
	 * @return \Illuminate\Http\RedirectResponse
	 */
	public function update(Request $request)
	{

		$id = $request->input('id');
		$data =
			[
				'title' => $request->input('title'),
				'description' => $request->input('description'),
				'datetime' => $request->input('datetime'),
				'public' => $request->input('public'),
				'slug' => ($request->input('slug') !== "" ? $request->input('slug'):str_slug($request->input('title'), '-')),
				'background_url' => $request->input('background_url'),
			];

		Countdown::whereId($id)->update($data);

		return redirect()->back();

	}

	/**
	 * @param $id
	 * @return \Illuminate\Http\RedirectResponse
	 */
	public function destroy($id)
	{
		Countdown::destroy($id);
		return redirect()->route('home');
	}

}
