<?php
$name = $_POST['name'];
$age = $_POST['age'];
$targetAge = $_POST['targetAge'];
$timeOutside = $_POST['timeOutside'];
$hobbies = $_POST['hobbies'];
$CH = $_POST['CH'];
$height = $_POST['height'];
$weight = $_POST['weight'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Results</title>
    <link rel="stylesheet" href="/styles/results.css">
    <link rel="stylesheet" href="/styles/modal.css">
</head>
<body>
    <main>
        <h4>Results</h4>
        <p id="result"></p>

        <div class="modal-wrapper">
            <div class="modal">
                <div class="modal-head">
                    <h5>Join my Patreon to get content!</h5>
                </div>
                <div class="modal-content">
                    <p>In order to get your results, please pay $10.</p>
                </div>
                <div class="modal-footer">
                    <a href="https://patreon.com/RUN1_IT">Donate here!</a>
                    <button onclick="closeModal()">Close</button>
                </div>
            </div>
        </div>

        <button onclick="calculate('<?php echo $name; ?>', <?php echo $age; ?>, <?php echo $targetAge; ?>, <?php echo $timeOutside; ?>, '<?php echo implode(',', $hobbies); ?>', <?php echo $CH; ?>, <?php echo $height; ?>, <?php echo $weight; ?>);">
            Show Results
        </button>
        <br>
        <a href="/index.php">Reset The Test</a>
    </main>
</body>
<script src="/scripts/calculation.js"></script>
</html>