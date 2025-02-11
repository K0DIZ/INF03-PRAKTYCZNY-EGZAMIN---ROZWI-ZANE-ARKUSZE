<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prognoza pogody Poznań</title>
    <link rel="stylesheet" href="styl4.css">
</head>
<body>
    <div id="baner-lewy">
        <p>maj, 2019 r.</p>
    </div>
    <div id="baner-srodkowy">
        <h2>Prognoza dla Poznania</h2>
    </div>
    <div id="baner-prawy">
        <img src="logo.png" alt="prognoza">
    </div>
    <div style="clear:both"></div>
    <div id="centrum-lewy">
        <a href="kwerendy.txt">Kwerendy</a>
    </div>
    <div id="centrum-prawy">
        <img src="obraz.jpg" alt="Polska, Poznań">
    </div>
    <div style="clear:both"></div>
    <div id="glowny">
        <table>
            <tr>
                <th>Lp.</th>
                <th>DATA</th>
                <th>NOC - TEMPERATURA</th>
                <th>DZIEŃ - TEMPERATURA</th>
                <th>OPADY [mm/h]</th>
                <th>CIŚNIENIE [hPa]</th>
            </tr>
            <!-- skrypt -->
            <?php
                $polaczenie = mysqli_connect("localhost", "root", "", "prognoza");
                if (!mysqli_error($polaczenie)) 
                {
                    $sql = 'SELECT * FROM pogoda WHERE miasta_id = 2 ORDER BY data_prognozy DESC;';
                    $zapytanie = mysqli_query($polaczenie, $sql);
                    $porzadkowa = 1;
                    while ($dane = mysqli_fetch_array($zapytanie))
                    {
                        echo "<tr>";
                        echo "<td>$porzadkowa</td>";
                        $porzadkowa = $porzadkowa + 1;
                        echo "<td>$dane[2]</td>";
                        echo "<td>$dane[3]</td>";
                        echo "<td>$dane[4]</td>";
                        echo "<td>$dane[5]</td>";
                        echo "<td>$dane[6]</td>";
                        echo "</tr>";
                    }
                    mysqli_close($polaczenie);
                }
            ?>
        </table>
    </div>
    <div id="stopka">
        <p>Stronę wykonał: 00000000000</p>
    </div>
</body>
</html>