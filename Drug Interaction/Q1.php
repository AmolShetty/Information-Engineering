<!DOCTYPE html>
<html>
<head>
    <title>DRUG INTERACTION</title>
    <style type="text/css">
        .header {
        background-color: maroon;
        padding: 30px 40px;
        color: white;
        text-align: center;
        }
        input[type=text] {
            border: 2px solid red;
            border-radius: 4px;
            height: 25px;
            width: 400px;
            }
        input[type=submit] {
            background-color: maroon;
            border: none;
            color: white;
            padding: 16px 32px;
            text-decoration: none;
            margin: 4px 2px;
            cursor: pointer;
        }

}

    </style>
</head>
<body>
    <div id="myDIV" class="header">
      <h2 style="margin:5px">Drug Interaction</h2>
    </div>
    <br>
    <br>
    <div style="text-align:center">
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
            <h3 style="color: maroon">First Drug Name:</h3>
            <input type="text" name="D1" required>
            <br>
            <br>
            <h3 style="color: maroon">Second Drug Name:</h3>
            <input type="text" name="D2" required><br><br>
            <input type="submit" value="Submit">
        </form>
    </div>

</body>
</html>



<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $D1 = strtolower(htmlspecialchars($_POST["D1"]));
    $D2 = strtolower(htmlspecialchars($_POST["D2"]));
    function DrugI($X){
        $str1 = 'https://rxnav.nlm.nih.gov/REST/rxcui.json?name='.$X;
        //echo $str1;
        $response = file_get_contents($str1);
        //echo $response;
        $res = json_decode($response);
        $n = $res->idGroup->rxnormId[0];
        //echo $n;
        //var_dump($n);

        $str = 'https://rxnav.nlm.nih.gov/REST/interaction/interaction.json?rxcui='.$n;
        //echo $str;

        $response2 = file_get_contents($str);
        //echo $response2;
        $res2 = json_decode($response2, true);
        //print $res2['interactionTypeGroup'];
        //print_r($res2['interactionTypeGroup'][0]['interactionType'][0]['interactionPair'][0]);
        echo '<ul style= "background: #ff9999;border-style: solid ;border-width: 2px; text-align:center; margin-left:20%; margin-right:20%; list-style-type: none">';
        foreach($res2['interactionTypeGroup'][0]['interactionType'][0]['interactionPair'] as $result) {
            $check = strtolower($result['interactionConcept'][1]['sourceConceptItem']['name']);
            if ($check===$GLOBALS['D2']){
                echo '<li>'.$result['description'].'</li><br>';
            }
        }
        echo '</ul>';
    }
    DrugI($D1, $D2);
}


?>
