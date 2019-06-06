<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use DateTime;
use DatePeriod;
use DateInterval;

class ArticleController extends BaseController {
	public function __construct(Request $request){

	}
	public function list(){

		$categories = [
			'daily' => [
				'title' => '每日焦點',
				'code' => 'daily',
				'dates' => $this->get_dates(),
			],
			'reference' => [
				'title' => '來源網站',
				'code' => 'reference',
				'sites' => $this->get_sites(),
			],
		];

		return view('article/list', [
			'categories' => $categories,
		]);
		
	}
	public function view($site_code, $article_id){
		// $article_id = Route::current()->getParameter('article_id');
		// $site_code = Route::current()->getParameter('site_code');
		echo '/'.$site_code.'/'.$article_id;
		return view('article/view');
	}

	private function get_dates(){
		$dates = [];
		$date_string = date('Y-m-d');
		$date_1 = new DateTime($date_string);
		$date_1->modify('+1 days');
		$date_2 = new DateTime($date_string);
		$date_2->modify('-2 days');
		$interval = new DateInterval('P1D');
		$daterange = new DatePeriod($date_2, $interval ,$date_1);
		foreach ($daterange as $date){
			$dates[] = $date->format('Y-m-d');
		}
		$dates = array_reverse($dates);
		return $dates;
	}

	private function get_sites(){
		$sites = [
			'dq_yam_com' => [
				'code' => 'dq_yam_com',
				'title' => '地球圖輯隊',
			],
			'cna_com_tw' => [
				'code' => 'cna_com_tw',
				'title' => '中央社',
			],
		];
		return $sites;
	}
}
