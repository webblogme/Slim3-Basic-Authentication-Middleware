<?php

namespace App\Controllers;

use App\Models\Data as Data;
use Slim\Views\Twig as View;


class HomeController extends Controller {
	
	public function index($request, $response) {
		
		return $this->view->render($response, 'home.twig.php');
		
	}
	
	public function post($request, $response, $arg) {
		
		$page = $arg['pagenumber'];
		
		$items_per_group=20;
		
		$rows = $this->db->table('data')->count();
		
		//$this->auth->user()->setPassword($request->getParam('password'));

		//FIND LAST
		$last = ceil($rows/$items_per_group);

		if($last < 1) { $last = 1; }

		if(isset($page)){ $pagenum = preg_replace('#[^0-9]#', '', $page);} else { $pagenum = 1; }

		if ($pagenum < 1) { $pagenum = 1; } else if ($pagenum > $last) { $pagenum = $last; }

		$limit_first = ($pagenum - 1) * $items_per_group;
		$limit_last = $items_per_group;
		
		$datas = $this->db->table('data')->skip($limit_first)->take($limit_last)->get();
		

		$paginationCtrls = '';
		
		if ($page == '') { $pageName = 'posts/'; }

		if($last != 1){

				if ($pagenum > 1) {
					$previous = $pagenum - 1;
					$paginationCtrls .= '<a href="'.$pageName.'1">Latest</a>'."\r\n";
					$paginationCtrls .= '<a href="'.$pageName.$previous.'">&laquo;</a>'."\r\n";

					for($i = $pagenum-2; $i < $pagenum; $i++){
						if($i > 0){
							$paginationCtrls .= '<a href="'.$pageName.$i.'">'.$i.'</a>'."\r\n";
						}
					}
				}
				// Render the target page number, but without it being a link
				$paginationCtrls .= '<a class="selected">'.$pagenum.'</a>'."\r\n";

				for($i = $pagenum+1; $i <= $last; $i++){
					$paginationCtrls .= '<a href="'.$pageName.$i.'">'.$i.'</a>'."\r\n";
					if($i >= $pagenum+2){
						break;
					}
				}

				if ($pagenum != $last) {
					$next = $pagenum + 1;
					$paginationCtrls .= '<a href="'.$pageName.$next.'">&raquo;</a>'."\r\n";
					$paginationCtrls .= '<a href="'.$pageName.$last.'">Oldest</a>'."\r\n";
				}
		}
		
		$pagination = [
			'page' => $pagenum,
			'perpage' => $items_per_group,
			'total' => number_format($rows),
			'start' => $limit_first+1,
			'end' => ($pagenum == $last ? $rows : $pagenum*$items_per_group),
			'paginationCtrls' => $paginationCtrls,
		];


		return $this->view->render($response, 'posts.twig.php', ['datas'=>$datas, 'pagination'=>$pagination]);
		
	}

}

?>