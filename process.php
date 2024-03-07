<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") { //Check muna kung na submit na
    // Get the text input from the form
    $text = $_POST["text"];

    // Tokenize the text into words
    $words = str_word_count($text, 1);

    // Remove common stop words (e.g., "the", "and", "in")
    $stopWords = array("a","i","me","my","myself","we","our","ours","ourselves","you","your","yours","yourself","yourselves","he",
    "him","his","himself","she","her","hers", "herself","it","its","itself","they","them","their","theirs",
     "themselves","what","which","who","whom","this","that","these","those","get","got","am","is","are",
     "was","were","be","been","being","have","has","had","having","really","do","does","did","doing","an",
     "the","and","but","if","or","because","as","until","while","of","at","by","for","with","about","against",
     "between","into","through","during","before","after","above","below","to","from","up","down","in","out",
     "on","off","over","under","again","further","then","once","here","there","when","where","why","how","all",
     "any","both","each","few","more","most","other","some","such","no","nor","not","only","own","same","so","than",
     "too","very","can","will","just","don","should","may","now","receive","received","well","much","buy","also"); 
    // Dagdagan mo nalang pre hehehe
    $filteredWords = array_diff($words, $stopWords);

    // Calculate word frequencies
    $wordFrequencies = array_count_values($filteredWords);

    // Sort the word frequencies based on the selected sorting order
    $sortOrder = $_POST["sort"];
    if ($sortOrder == "asc") {
        asort($wordFrequencies);
    } else {
        arsort($wordFrequencies);
    }

    // Limit the number of words to display based on user input
    $limit = isset($_POST["limit"]) ? (int)$_POST["limit"] : count($wordFrequencies);

    // Display the word frequencies
    echo "<h2>Word Frequencies</h2>";
    echo "<table>";
    echo "<tr><th>Word</th><th>Frequency</th></tr>";
    foreach ($wordFrequencies as $word => $frequency) {
        echo "<tr><td>$word</td><td>$frequency</td></tr>";
    }
    echo "</table>";
} else {

    header("Location: index.php");
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Word Frequency Counter</title>
    <link rel="stylesheet" type="text/css" href="styles.css">

</head>
<body>
    <button ><a href="index.php">Back</a></button>
</body>
</html>
