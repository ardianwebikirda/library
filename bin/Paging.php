<?php
class Paging{

	/*
	* Checking Page dan Data's Position
	*/
	function cariPosisi($batas){
		if(empty($_GET['halaman'])){
			$posisi 			= 0;
			$_GET['halaman']	= 1;
		} else {
			$posisi 			= ($_GET['halaman']-1) * $batas;
		}
		return $posisi;
	}

	/*
	* Count Total Page 
	*/
	function jmlHalaman($jmldata, $batas){
		$jmlhalaman = ceil($jmldata/$batas);
		return $jmlhalaman;
	}

	/*
	* Create Link 1,2,3..n Next, Prev, First and Last
	*/
	function navHalaman($halaman_aktif, $jmlhalaman){
		$link = "";

		//First & Prev Link
		if($halaman_aktif > 1){
			$link .= "<a href=$file?halaman=1>&laquo;</a> ";
		}

		if(($halaman_aktif-1) > 0){
			$prev 	= $halaman_aktif-1;
			$link 	.= "<a href=$file?halaman=$prev>Prev </a>";
		}

		//Page 1,2,3...
		for($i = 1; $i <= $jmlhalaman; $i++){
			if($i == $halaman_aktif){
				$link .= "<b>$i</b> ";
			} else {
				$link .= "<a href=$file?halaman=$i>$i</a> ";
			}
			$link .= " ";
		}

		//Next & Last Link
		if($halaman_aktif < $jmlhalaman){
			$next 	= $halaman_aktif+1;
			$link 	.= "<a href=$file?halaman=$next>&raquo; </a>"; 
		}

		if(($halaman_aktif != $jmlhalaman) && ($jmlhalaman != 0)){
			$link 	.= "<a href=$file?halaman=$jmlhalaman>Last </a>";
		}

		return $link;
	}
}
?>