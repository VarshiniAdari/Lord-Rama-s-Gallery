<?php 
$score = 0;

if (isset($_POST['q1']) && $_POST['q1'] === 'Valmiki') {
    $score += 5;
}
if (isset($_POST['q2']) && is_array($_POST['q2'])) {
    $correct_answers = ['Ramachandra', 'Raghunatha'];
    foreach ($correct_answers as $answer) {
        if (in_array($answer, $_POST['q2'])) {
            $score += 5;
        }
    }
}

if (isset($_POST['q3']) && $_POST['q3'] === 'sundara') {
    $score += 5;
}

if (isset($_POST['q4']) && strtolower(trim($_POST['q4'])) === 'ganga') {
    $score += 5;
}

if (isset($_POST['q5'])) {
    $time = strtotime($_POST['q5']);
    if ($time >= strtotime('05:00') && $time <= strtotime('09:00')) {
        $score += 10; 
    } elseif ($time >= strtotime('17:00') && $time <= strtotime('20:00')) {
        $score += 5; 
    }
}
$image = $_FILES['q6']['name'] ?? 'No image uploaded';
$color = $_POST['q7'] ?? 'Not specified';
$rating = $_POST['q8'] ?? 'Not specified';
$fav_character = $_POST['q9'] ?? 'Not specified';
$lesson = $_POST['q10'] ?? 'Not specified';
if (isset($_POST['event1'], $_POST['event2'], $_POST['event3'], $_POST['event4'])) {
    $correct_order = [1, 2, 4, 3];
    $submitted_order = [
        $_POST['event1'],
        $_POST['event2'],
        $_POST['event3'],
        $_POST['event4']
    ];
    foreach ($submitted_order as $key => $value) {
        if ($value == $correct_order[$key]) {
            $score += 5;
        }
    }
}
if (isset($_POST['survey'])) {
    if ($_POST['survey'] === 'yes') {
        $score += 20;
    } elseif ($_POST['survey'] === 'maybe') {
        $score += 10;
    } else {
        $score += 5;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz Results</title>
    <style>
        body {
            font-family: 'Georgia', serif;
            background: linear-gradient(135deg, #4a0000, #800000);
            color: #ffd700; 
            margin: 8;
            padding: 0;
            line-height: 1.6;
            position: relative;
            overflow-x: hidden;
        }

        body::before {
            content: '';
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: radial-gradient(circle, rgb(192, 145, 6), rgba(0, 0, 0, 0) 70%);
            background-size: 300px 300px;
            animation: twinkle 5s infinite;
            pointer-events: none;
            z-index: 0;
        }

        div {
            max-width: 900px;
            margin: 20px auto;
            padding: 20px;
            background: rgba(0, 0, 0, 0.8);
            border: 3px solid #ffd700;
            border-radius: 20px;
            z-index: 1;
            position: relative;
        }

        .container {
            width: 80%;
            margin: 30px auto;
            background: rgba(72, 52, 50, 0.9); 
            padding: 20px;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
            border: 2px solid #ffd700; 
        }

        h1 {
            text-align: center;
            font-size: 2.5em;
            color: #ffd700; 
            margin-bottom: 10px;
            text-shadow: 2px 2px 5px #8b0000;
        }

        h2 {
            text-align: center;
            font-size: 1.8em;
            color: #ffcc33; 
        }

        .score {
            font-size: 2em;
            color: #ff8c00; 
        }

        .result-item {
            margin: 15px 0;
            padding: 10px;
            background: #fff8e7; 
            color: #8b4513; 
            border-left: 4px solid #8b4513; 
        }

        .footer {
            text-align: center;
            margin-top: 30px;
            color: #ffdab9; 
            font-style: italic;
        }

        a {
            color: #ffd700; 
            text-decoration: none;
            font-weight: bold;
        }

        a:hover {
            text-decoration: underline;
            color: #ff8c00; 
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Ramayana Quiz Results</h1>
        <h2>Your Total Score: <span class="score"><?= $score; ?></span></h2>
        <hr>
        <div class="result-item"><strong>Image Uploaded:</strong> <?= htmlspecialchars($image); ?></div>
        <div class="result-item"><strong>Chosen Color:</strong> <span style="color: <?= htmlspecialchars($color); ?>;"><?= htmlspecialchars($color); ?></span></div>
        <div class="result-item"><strong>Rating of Knowledge:</strong> <?= htmlspecialchars($rating); ?></div>
        <div class="result-item"><strong>Favorite Character:</strong> <?= htmlspecialchars($fav_character); ?></div>
        <div class="result-item"><strong>Lesson Learned:</strong> <?= htmlspecialchars($lesson); ?></div>
        <hr>
        <div class="footer">
            Thank you for participating in the <a href="index.html">Ramayana Quiz</a>!
        </div>
    </div>
</body>
</html>
