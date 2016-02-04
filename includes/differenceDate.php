<?php

function differenceDate($dateBegin, $dateEnd){
	if (($dateBegin == 0) OR ($dateEnd == 0)) {
		$days = "Sem dados";
	} else {
		$pieceBegin = explode('/', $dateBegin);
		$dateBegin =  mktime(0, 0, 0, $pieceBegin[1], $pieceBegin[0], $pieceBegin[2]);

		$pieceEnd = explode('/', $dateEnd);
		$dateEnd =  mktime(0, 0, 0, $pieceEnd[1], $pieceEnd[0], $pieceEnd[2]);

		$difference = $dateBegin - $dateEnd;

		$days = ((int)floor( $difference / (60 * 60 * 24)))*(-1); 
		$days = $days." dias";
	}
	
	return $days;
}


?>