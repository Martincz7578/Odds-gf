<?php
$Unattractive = ['Anime', 'Gaming', 'Collecting Action Figures',
    'Watching Cartoons', 'Cosplaying', 'Role-Playing Games',
    'Comic Books', 'Tabletop Gaming', 'Model Building'];

$SemiHobbies = ['Photography', 'Hiking', 'Board games', 'Cooking',
    'Languages', 'Yoga', 'Drawing'];

$Attractive = ['Martial arts', 'Dancing', 'Travelling',
    'Music', 'Rock Climbing', 'Writing', 'Performer', 'High-school/Uni'];

$Categories = [
    'Unattractive' => $Unattractive,
    'Semi-attractive' => $SemiHobbies,
    'Attractive' => $Attractive
];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Odds to get a girlfriend Calculator</title>
    <link rel="stylesheet" href="/styles/index.css">
</head>
<body>
    <main>
        <h1>Your odds to get a girlfriend</h1>
        <form action="/results.php" method="post" class="form-container">
            <div class="con">
                <label for="name">Enter your name:</label><br>
                <input type="text" id="name" name="name" required>
                <br>
                <label for="age">Enter your age: </label><br>
                <input type="number" id="age" name="age" min="15" max="150" required>
                <br>
                <label for="targetAge">Enter your target age: </label><br>
                <input type="number" id="targetAge" name="targetAge" min="15" max="150" required>
                <br>
                <label for="timeOutside">Enter the time you spend outside (in hours, daily): </label><br>
                <input type="number" id="timeOutside" name="timeOutside" min="0" max="24" required>
                <br>
                <?php foreach($Categories as $CategoryName => $Array): ?>
                    <fieldset>
                        <legend><?php echo htmlspecialchars($CategoryName); ?></legend>
                        <?php foreach($Array as $Hobby): ?>
                            <label>
                                <input type="checkbox" name="hobbies[]" value="<?php echo htmlspecialchars($Hobby); ?>">
                                <?php echo htmlspecialchars($Hobby); ?>
                            </label><br>
                        <?php endforeach; ?>
                    </fieldset>
                <?php endforeach; ?>
                <br>
                <label for="CH">Enter your charisma level: </label><br>
                <input type="number" id="CH" name="CH" min="0" max="10" required>
                <br>
                <label for="height">Enter your height (in cm): </label><br>
                <input type="number" id="height" name="height" min="0" max="250" required>
                <br>
                <label for="weight">Enter your weight (in kg): </label><br>
                <input type="number" id="weight" name="weight" min="40" max="200" required>
                <br>
            </div>
            <input type="submit" value="Calculate Odds">
        </form>
    </main>
</body>
</html>