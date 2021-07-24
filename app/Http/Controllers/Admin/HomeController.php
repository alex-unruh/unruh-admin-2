<?php

namespace App\Http\Controllers\Admin;

use App\Models\Statistic;
use App\Http\Controllers\Controller;

/**
 * Undocumented class
 *
 * @author Alexandre Unruh <alexandre@unruh.com.br>
 */
class HomeController extends Controller
{
	private $data;

	/**
	 * Show login form
	 */
	public function index()
	{
		$this->getGeneralStats();
		return view('admin.home', $this->data);
	}

	/**
	 * Undocumented function
	 *
	 * @return void
	 */
	private function getGeneralStats()
	{
		$all = Statistic::all()->count();
		$unique = Statistic::distinct('ip')->count();
		$unique_today = Statistic::distinct('ip')->whereDate('created_at', date('Y-m-d'))->count();

		$this->data = ['all' => $all, 'all_unique' => $unique, 'unique_today' => $unique_today];
	}
}
