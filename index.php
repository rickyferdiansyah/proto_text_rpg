<?php
include "config.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Repeg</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="player_area">
        <div class="stats">
            <div class="level">
                <?php
                $query = "SELECT player_tb.level FROM player_tb";
                $sql = mysqli_query($conn, $query);
                while ($data = mysqli_fetch_array($sql)) {
                    echo "level : " . $data['level'];
                }
                ?>
            </div>
            <div class="exp">
                <?php
                $query = "SELECT player_tb.exp FROM player_tb";
                $sql = mysqli_query($conn, $query);
                while ($data = mysqli_fetch_array($sql)) {
                    echo "exp : " . $data['exp'];
                }
                ?>
            </div>
        </div>
        <div class="skills">
            <?php
            $query = "SELECT * FROM player_tb";
            $sql = mysqli_query($conn, $query);
            while ($data = mysqli_fetch_array($sql)) {
                echo "Normal Attack : " . $data['normal_attack'];
                echo "<br>Shadow Step : " . $data['shadow_step'];
                echo "<br>Fireball : " . $data['fireball'];
                echo "<br>Thunderbolt : " . $data['thunderbolt'];
                echo "<br>Meteor Shower : " . $data['meteor_shower'];
            }
            ?>
        </div>
        <div class="play">
            <a href="href/stages-list.php">[Play]</a>

            <!-- testing penambahan exp -->
            <form action="process/add-process.php" method="POST" style="margin:0;">
                <button type="submit" style="border: none; background: none; padding: 0; cursor: pointer; font-size: 15px; color: blue; text-decoration:underline;">[Add Exp]</button>test only
            </form>

            <!-- testing reset exp -->
            <form action="process/resetexp-process.php" method="POST" style="margin:0;">
                <button type="submit" style="border: none; background: none; padding: 0; cursor: pointer; font-size: 15px; color: blue; text-decoration:underline;">[Reset EXP]</button>
            </form>

        </div>
    </div>
    <div class="info" style="margin-top: 1em;">
        <a id="showBtn" style="cursor: pointer;">[Show Info]</a>
        <p class="info" id="info" style="margin-top: 0;">
            Level 2 need 100 exp, will acquire shadow step <br>
            Level 3 need 300 exp <br>
            Level 4 need 600 exp, will acquire fireball <br>
            Level 5 need 1000 exp, will acquire thunderbolt <br>
            Level 6 need 1500 exp, will acquire meteor shower <br>
            Level 7 need 2500 exp <br>
        </p>
        <script>
            let showBtn = document.getElementById('showBtn');
            let infotxt = document.getElementById('info');
            isInfoShow = 0;
            infotxt.style.display = "none";

            function infoShow() {
                if (isInfoShow == 0) {
                    isInfoShow = 1;
                    infotxt.style.display = "block";
                } else if (isInfoShow == 1) {
                    isInfoShow = 0;
                    infotxt.style.display = "none";
                }
            }
            showBtn.addEventListener('click', infoShow);
        </script>
    </div>
</body>

</html>