<?php
// Exercice 1
$date = date("d/m/Y",);
echo "<p>".$date."</p>";

// Exercice 2
$date = date("d-m-y",);
echo "<p>".$date."</p>";

// Exercice 3
setlocale(LC_TIME, 'fr_FR.UTF-8', "fra");
$date = strftime("%A %e %B %Y");
echo "<p>Date d'aujourd'hui : ".$date."</p>";

// Exercice 4
$jourTimestamp = time();
$mardiTimestamp = mktime(15, 0, 0, 8, 2, 2016);
echo "<p>Timestamp du jour : " . $jourTimestamp . "</p>";
echo "<p>Timestamp du mardi 2 août 2016 à 15h00 : ".$mardiTimestamp."</p>";

// Exercice 5
$currentDate = date_create();
$specificDate = date_create('2016-05-16');
$diff = date_diff($currentDate, $specificDate);
echo "<p>Nombre de jours écoulés depuis le 16 mai 2016 : ".$diff->days."</p>";

// Exercice 6
$daysInFebruary = cal_days_in_month(CAL_GREGORIAN, 2, 2016);
echo "<p>Nombre de jours dans le mois de février 2016 : ".$daysInFebruary."</p>";

// Exercice 7
$date = date("Y-m-d", strtotime("+20 days"));
echo "<p>Date du jour + 20 jours : ".$date."</p>";

// Exercice 8
$date = date("Y-m-d", strtotime("-22 days"));
echo "<p>Date du jour - 22 jours : ".$date."</p>";
?>
<!-- Exercice Calendrier -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <h1>Calendrier</h1>
    <form method="post" action="">
        <label for="mois">Mois :</label>
        <select name="mois" id="mois">
            <option value="1">Janvier</option>
            <option value="2">Février</option>
            <option value="3">Mars</option>
            <option value="4">Avril</option>
            <option value="5">Mai</option>
            <option value="6">Juin</option>
            <option value="7">Juillet</option>
            <option value="8">Août</option>
            <option value="9">Septembre</option>
            <option value="10">Octobre</option>
            <option value="11">Novembre</option>
            <option value="12">Décembre</option>
        </select>
        <label for="annee">Année :</label>
        <select name="annee" id="annee">
            <?php
            $nbrAnnee = date('Y');
            for ($i = $nbrAnnee - 23; $i <= $nbrAnnee + 10; $i++) {
                echo "<option value='$i'>$i</option>";
            }
            ?>
        </select>
        <button type="submit">Afficher</button>
    </form>

    <?php
    if (isset($_POST['mois']) && isset($_POST['annee'])) {
        $mois = $_POST['mois'];
        $annee = $_POST['annee'];

        $firstDayOfMonth = mktime(0, 0, 0, $mois, 1, $annee); // Indique le 1er jour du mois
        $daysInMonth = date('t', $firstDayOfMonth); // Indique le nombre de jours du mois
        $firstDayOfWeek = date('N', $firstDayOfMonth); // Indique le 1er jour de la semaine

        echo "<table>";
        echo "<tr>";
        echo "<th>Lundi</th>";
        echo "<th>Mardi</th>";
        echo "<th>Mercredi</th>";
        echo "<th>Jeudi</th>";
        echo "<th>Vendredi</th>";
        echo "<th>Samedi</th>";
        echo "<th>Dimanche</th>";
        echo "</tr>";

        echo "<tr>";
        for ($i = 1; $i < $firstDayOfWeek; $i++) {
            echo "<td></td>";
        }

        $day = 1;
        // Incrémente jusqu'au nombre de jour spécifié dans le mois
        while ($day <= $daysInMonth) {
            // Pour afficher les jours de la semaine 
            for ($i = $firstDayOfWeek; $i <= 7; $i++) {
                // Si $day dépasse dépasse le nombre de jours dans le mois Break
                if ($day > $daysInMonth) {
                    break;
                }
                echo "<td>$day</td>";
                $day++;
            }
            echo "</tr>";
            echo "<tr>";
            $firstDayOfWeek = 1;
        }

        while ($day <= $daysInMonth) {
            echo "<td></td>";
            $day++;
        }

        echo "</tr>";
        echo "</table>";
    }
    ?>
</body>

</html>