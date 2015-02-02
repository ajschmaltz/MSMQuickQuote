<?php namespace App\Http\Controllers;

class WelcomeController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Welcome Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders the "marketing page" for the application and
	| is configured to only allow guests. Like most of the other sample
	| controllers, you are free to modify or remove it as you desire.
	|
	*/

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('guest');
	}

	/**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
	public function index()
	{
    return view('welcome');
    $json = file_get_contents(public_path() . '/mowers.json');
    $mowers = json_decode($json);
    return $this->filter($mowers, 'Brand');
	}

  public function filter($array, $key)
  {
    $filter = array_fetch($array, $key);
    return array_unique($filter);
  }

}
