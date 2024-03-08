<?php

function wordFrequencyCounter ($text, $order, $limit) {
    
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

     //Lower case all words
     $words = array_map(function ($word) {
        return strtolower($word);
    }, $words);
    
    //Filter Stop Words
    $filteredWords = array_diff($words, $stopWords);

    // Calculate word frequencies
    $wordFrequencies = array_count_values($filteredWords);

    // Sort the word frequencies based on the selected sorting order
    if ($order == "asc") {
        asort($wordFrequencies);
    } else {
        arsort($wordFrequencies);
    }

    $wordFrequencies = array_slice($wordFrequencies, 0, $limit, true);
    
    return $wordFrequencies;
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") { 
        $text = $_POST["text"];
        $order = $_POST["sort"];
        $limit = $_POST['limit'];
    }

    $wordFrequencies = wordFrequencyCounter($text, $order, $limit);

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Word Frequency Counter</title>
    <link rel="stylesheet" type="text/css" href="styles.css">

</head>
<body>
    <?php
   // Display the word frequencies
    echo "<h2>Word Frequencies</h2>";
    echo "<table>";
    echo "<tr><th>Word</th><th>Frequency</th></tr>";

    // Check if $wordFrequencies is not empty
    if (!empty($wordFrequencies)) {
        foreach ($wordFrequencies as $word => $frequency) {
            echo "<tr><td>$word</td><td>$frequency</td></tr>";
        }
        echo "</table>";
    } else {
        // Redirect to index.php if $wordFrequencies is empty
        header("Location: index.php");
        exit;
    }

    ?>
    <button ><a href="index.php">Back</a></button>
</body>
</html>
