<?php

class Util {

	public static function coupeTexte($texte, $NB_CARACTERE) {

		$compteurTexte = 0;
		$texteCoupe = "";
		$tabPonctuation = ['.', '?', '!'];
		for ($i = 0; $i < strlen($texte); $i++) {
			$texteCoupe .= $texte[$i];
				if ($compteurTexte >= $NB_CARACTERE && in_array($texte[$i],$tabPonctuation)) {
						break;
        }

        $compteurTexte++;

    }

  	return $texteCoupe;
  }
  
}
?>