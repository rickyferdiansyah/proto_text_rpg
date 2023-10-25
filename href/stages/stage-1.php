<?php
include '../../config.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stage 1</title>
    <link rel="stylesheet" href="../../style.css">
</head>

<body>
    <br>
    <a href="../../index.php">[Home]</a>
    <br><br>
    <div class="skills" style="background-color:lightgreen;">
        <?php
        $query = "SELECT * FROM player_tb";
        $sql = mysqli_query($conn, $query);
        while ($data = mysqli_fetch_array($sql)) {
            if ($data['normal_attack'] == "true") {
                echo "<button id='normalAttackBtn'>Normal Attack</button>";
            }
            if ($data['shadow_step'] == "true") {
                echo "<button id='shadowStepBtn'>Shadow Step</button>";
            }
            if ($data['fireball'] == "true") {
                echo "<button id='fireballBtn'>Fireball</button>";
            }
            if ($data['thunderbolt'] == "true") {
                echo "<button id='thunderboltBtn'>Thunderbolt</button>";
            }
            if ($data['meteor_shower'] == "true") {
                echo "<button id='meteorShowerBtn'>Meteor Shower</button>";
            }
        }
        ?>
    </div>
    <div id="isi"></div>
    <div id="log"></div>
    <script>
        let normalAttackBtn = document.getElementById('normalAttackBtn');
        let shadowStepBtn = document.getElementById('shadowStepBtn');
        let fireballBtn = document.getElementById('fireballBtn');
        let thunderboltBtn = document.getElementById('thunderboltBtn');
        let meteorShowerBtn = document.getElementById('meteorShowerBtn');
        let isiText = document.getElementById('isi');
        let log = document.getElementById('log');
        let playerHP = 100;
        let enemyHP = 100;


        normalAttackBtn.addEventListener('click', () => {
            if (playerHP <= 0 || enemyHP <= 0) {
                return; // Game over, no more attacks
            }
            //disable all attack button
            if (normalAttackBtn != null)
                normalAttackBtn.disabled = true;
            if (shadowStepBtn != null)
                shadowStepBtn.disabled = true;
            if (fireballBtn != null)
                fireballBtn.disabled = true;
            if (thunderboltBtn != null)
                thunderboltBtn.disabled = true;
            if (meteorShowerBtn != null)
                meteorShowerBtn.disabled = true;

            // Player attack
            const playerDamage = Math.floor(Math.random() * 25) + 1; //normal attack damage
            enemyHP -= playerDamage;
            if (enemyHP < 0) {
                enemyHP = 0;
            }

            log.innerHTML += `You attacked the enemy for ${playerDamage} damage. Enemy HP: ${enemyHP}<br>`;

            // Delay enemy attack for 1 second
            setTimeout(() => {
                // Enemy attack
                const enemyDamage = Math.floor(Math.random() * 25) + 1;
                playerHP -= enemyDamage;
                if (playerHP < 0) {
                    playerHP = 0;
                }

                log.innerHTML += `You were attacked by the enemy for ${enemyDamage} damage. Your HP: ${playerHP}<br>`;

                // Check if the player or enemy has won
                if (playerHP <= 0) {
                    log.innerHTML += "The enemy has won!<br>";
                } else if (enemyHP <= 0) {
                    log.innerHTML += "You've won!<br>";
                    // Make an AJAX request to stage1-exp.php
                    sendAjaxRequest("../../process/stage1-exp.php");
                }

                //enable all attack button
                if (normalAttackBtn != null)
                    normalAttackBtn.disabled = false;
                if (shadowStepBtn != null)
                    shadowStepBtn.disabled = false;
                if (fireballBtn != null)
                    fireballBtn.disabled = false;
                if (thunderboltBtn != null)
                    thunderboltBtn.disabled = false;
                if (meteorShowerBtn != null)
                    meteorShowerBtn.disabled = false;

            }, 500); // 1 second delay
        });
        if (shadowStepBtn != null) {
            shadowStepBtn.addEventListener('click', () => {
                if (playerHP <= 0 || enemyHP <= 0) {
                    return; // Game over, no more attacks
                }
                //disable all attack button
                if (normalAttackBtn != null)
                    normalAttackBtn.disabled = true;
                if (shadowStepBtn != null)
                    shadowStepBtn.disabled = true;
                if (fireballBtn != null)
                    fireballBtn.disabled = true;
                if (thunderboltBtn != null)
                    thunderboltBtn.disabled = true;
                if (meteorShowerBtn != null)
                    meteorShowerBtn.disabled = true;


                // Player attack
                const playerDamage = Math.floor(Math.random() * 50) + 1; //shadowstep damage
                enemyHP -= playerDamage;
                if (enemyHP < 0) {
                    enemyHP = 0;
                }

                log.innerHTML += `You attacked the enemy for ${playerDamage} damage. Enemy HP: ${enemyHP}<br>`;

                // Delay enemy attack for 1 second
                setTimeout(() => {
                    // Enemy attack
                    const enemyDamage = Math.floor(Math.random() * 25) + 1; //enemy damage
                    playerHP -= enemyDamage;
                    if (playerHP < 0) {
                        playerHP = 0;
                    }

                    log.innerHTML += `You were attacked by the enemy for ${enemyDamage} damage. Your HP: ${playerHP}<br>`;

                    // Check if the player or enemy has won
                    if (playerHP <= 0) {
                        log.innerHTML += "The enemy has won!<br>";
                    } else if (enemyHP <= 0) {
                        log.innerHTML += "You've won!<br>";
                        // Make an AJAX request to stage1-exp.php
                        sendAjaxRequest("../../process/stage1-exp.php");
                    }

                    //enable all attack button
                    if (normalAttackBtn != null)
                        normalAttackBtn.disabled = false;
                    if (shadowStepBtn != null)
                        shadowStepBtn.disabled = false;
                    if (fireballBtn != null)
                        fireballBtn.disabled = false;
                    if (thunderboltBtn != null)
                        thunderboltBtn.disabled = false;
                    if (meteorShowerBtn != null)
                        meteorShowerBtn.disabled = false;
                }, 500); // 1 second delay
            });
        }
        if (fireballBtn != null) {
            fireballBtn.addEventListener('click', () => {
                if (playerHP <= 0 || enemyHP <= 0) {
                    return; // Game over, no more attacks
                }
                //disable all attack button
                if (normalAttackBtn != null)
                    normalAttackBtn.disabled = true;
                if (shadowStepBtn != null)
                    shadowStepBtn.disabled = true;
                if (fireballBtn != null)
                    fireballBtn.disabled = true;
                if (thunderboltBtn != null)
                    thunderboltBtn.disabled = true;
                if (meteorShowerBtn != null)
                    meteorShowerBtn.disabled = true;

                // Player attack
                const playerDamage = Math.floor(Math.random() * 100) + 1; //fireball damage
                enemyHP -= playerDamage;
                if (enemyHP < 0) {
                    enemyHP = 0;
                }

                log.innerHTML += `You attacked the enemy for ${playerDamage} damage. Enemy HP: ${enemyHP}<br>`;

                // Delay enemy attack for 1 second
                setTimeout(() => {
                    // Enemy attack
                    const enemyDamage = Math.floor(Math.random() * 25) + 1; //enemy damage
                    playerHP -= enemyDamage;
                    if (playerHP < 0) {
                        playerHP = 0;
                    }

                    log.innerHTML += `You were attacked by the enemy for ${enemyDamage} damage. Your HP: ${playerHP}<br>`;

                    // Check if the player or enemy has won
                    if (playerHP <= 0) {
                        log.innerHTML += "The enemy has won!<br>";
                    } else if (enemyHP <= 0) {
                        log.innerHTML += "You've won!<br>";
                        // Make an AJAX request to stage1-exp.php
                        sendAjaxRequest("../../process/stage1-exp.php");
                    }

                    //enable all attack button
                    if (normalAttackBtn != null)
                        normalAttackBtn.disabled = false;
                    if (shadowStepBtn != null)
                        shadowStepBtn.disabled = false;
                    if (fireballBtn != null)
                        fireballBtn.disabled = false;
                    if (thunderboltBtn != null)
                        thunderboltBtn.disabled = false;
                    if (meteorShowerBtn != null)
                        meteorShowerBtn.disabled = false;
                }, 500); // 1 second delay
            });
        }
        if (thunderboltBtn != null) {
            thunderboltBtn.addEventListener('click', () => {
                if (playerHP <= 0 || enemyHP <= 0) {
                    return; // Game over, no more attacks
                }
                //disable all attack button
                if (normalAttackBtn != null)
                    normalAttackBtn.disabled = true;
                if (shadowStepBtn != null)
                    shadowStepBtn.disabled = true;
                if (fireballBtn != null)
                    fireballBtn.disabled = true;
                if (thunderboltBtn != null)
                    thunderboltBtn.disabled = true;
                if (meteorShowerBtn != null)
                    meteorShowerBtn.disabled = true;

                // Player attack
                const playerDamage = Math.floor(Math.random() * 200) + 1; //thunderbolt damage
                enemyHP -= playerDamage;
                if (enemyHP < 0) {
                    enemyHP = 0;
                }

                log.innerHTML += `You attacked the enemy for ${playerDamage} damage. Enemy HP: ${enemyHP}<br>`;

                // Delay enemy attack for 1 second
                setTimeout(() => {
                    // Enemy attack
                    const enemyDamage = Math.floor(Math.random() * 25) + 1; //enemy damage
                    playerHP -= enemyDamage;
                    if (playerHP < 0) {
                        playerHP = 0;
                    }

                    log.innerHTML += `You were attacked by the enemy for ${enemyDamage} damage. Your HP: ${playerHP}<br>`;

                    // Check if the player or enemy has won
                    if (playerHP <= 0) {
                        log.innerHTML += "The enemy has won!<br>";
                    } else if (enemyHP <= 0) {
                        log.innerHTML += "You've won!<br>";
                        // Make an AJAX request to stage1-exp.php
                        sendAjaxRequest("../../process/stage1-exp.php");
                    }

                    //enable all attack button
                    if (normalAttackBtn != null)
                        normalAttackBtn.disabled = false;
                    if (shadowStepBtn != null)
                        shadowStepBtn.disabled = false;
                    if (fireballBtn != null)
                        fireballBtn.disabled = false;
                    if (thunderboltBtn != null)
                        thunderboltBtn.disabled = false;
                    if (meteorShowerBtn != null)
                        meteorShowerBtn.disabled = false;
                }, 500); // 1 second delay
            });
        }
        if (meteorShowerBtn != null) {
            meteorShowerBtn.addEventListener('click', () => {
                if (playerHP <= 0 || enemyHP <= 0) {
                    return; // Game over, no more attacks
                }
                //disable all attack button
                if (normalAttackBtn != null)
                    normalAttackBtn.disabled = true;
                if (shadowStepBtn != null)
                    shadowStepBtn.disabled = true;
                if (fireballBtn != null)
                    fireballBtn.disabled = true;
                if (thunderboltBtn != null)
                    thunderboltBtn.disabled = true;
                if (meteorShowerBtn != null)
                    meteorShowerBtn.disabled = true;

                // Player attack
                const playerDamage = Math.floor(Math.random() * 500) + 1; //meteor shower damage
                enemyHP -= playerDamage;
                if (enemyHP < 0) {
                    enemyHP = 0;
                }

                log.innerHTML += `You attacked the enemy for ${playerDamage} damage. Enemy HP: ${enemyHP}<br>`;

                // Delay enemy attack for 1 second
                setTimeout(() => {
                    // Enemy attack
                    const enemyDamage = Math.floor(Math.random() * 25) + 1; //enemy damage
                    playerHP -= enemyDamage;
                    if (playerHP < 0) {
                        playerHP = 0;
                    }

                    log.innerHTML += `You were attacked by the enemy for ${enemyDamage} damage. Your HP: ${playerHP}<br>`;

                    // Check if the player or enemy has won
                    if (playerHP <= 0) {
                        log.innerHTML += "The enemy has won!<br>";
                    } else if (enemyHP <= 0) {
                        log.innerHTML += "You've won!<br>";
                        // Make an AJAX request to stage1-exp.php
                        sendAjaxRequest("../../process/stage1-exp.php");
                    }

                    //enable all attack button
                    if (normalAttackBtn != null)
                        normalAttackBtn.disabled = false;
                    if (shadowStepBtn != null)
                        shadowStepBtn.disabled = false;
                    if (fireballBtn != null)
                        fireballBtn.disabled = false;
                    if (thunderboltBtn != null)
                        thunderboltBtn.disabled = false;
                    if (meteorShowerBtn != null)
                        meteorShowerBtn.disabled = false;
                }, 500); // 1 second delay
            });
        }


        // Function to make an AJAX request
        function sendAjaxRequest(url) {
            var xhr = new XMLHttpRequest();
            xhr.open("GET", url, true);
            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    log.innerHTML += "You've gain 20 exp";
                }
            };
            xhr.send();
        }
    </script>


</body>

</html>