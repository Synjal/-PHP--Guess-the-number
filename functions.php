<?php
  function testerNombre($user_number, $number) {
    if (intval($user_number) === 0 || $user_number >= 100 || $user_number <= 1) {
      return '2';
    } else 
      return ($user_number == $number) ? '0' : (($user_number > $number) ? '-1' : '1');
  }

  function tourSuivant($msg){
    $_SESSION["tries"] += 1;
    array_push($_SESSION["essais"], "Essai ". $_SESSION["tries"] . " : ".$_POST["guess"]." est " .$msg);
  }

  function win() {
    $_SESSION["timer"] = timeConvert(time() - $_SESSION["timer"]);
    echo "<h1> Bien joué, vous avez trouvé le nombre magique !</h1>";
    echo "<br>Le nombre était : <b>".$_SESSION["number"]."</b>";
    echo "<br>Nombre d'essais : <b>".$_SESSION["tries"]."</b>";
    echo "<br>Temps écoulé : <b>".$_SESSION["timer"]."</b>";
    echo "<br><br><form action='' method='post'><input type='submit' name='reset' value='Recommencer'></form>";
    $_SESSION = array();
  };

  function timeConvert($data, $m = 0, $h = 0) {
    if ($data > 59) {
      $m += 1;
      return timeConvert($data - 60, $m);
    }
    if ($m > 59) {
      $h += 1;
      return timeConvert($data, $m - 60, $h);
    }

    return $h >= 1 ? $h." heures, ".$m." minutes, ".$data." secondes." : ($m >= 1 ? $m." minutes, ".$data." secondes." : $data." secondes");    
  }

?>