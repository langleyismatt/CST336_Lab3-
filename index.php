<!DOCTYPE html>
<html>
    <head>
        <title>Lab 3 - Morgan Johnson & Matthew Langley test</title>
        <link type="css/text" rel="stylesheet" href="css/styles.css">
    </head>
    <body>
        <?php
            class Card
            {
                private $number;
                private $suit;
                
                function __construct($n, $s)
                {
                    $this->number = $n;
                    $this->suit = $s;
                }
                
                function getImage()
                {
                    return "images/" . $this->suit . "/" . $this->number . ".png";
                }
                function getValue()
                {
                    return $this->number;
                }
            }
            
            $array = array();
            for($i = 1; $i <= 13; ++$i)
            {
                $array[] = new Card($i, "clubs");
            }
            for($i = 13; $i >= 1; --$i)
            {
                $array[] = new Card($i, "diamonds");
            }
            for($i = 1; $i <= 13; ++$i)
            {
                $array[] = new Card($i, "spades");
            }
            for($i = 13; $i >= 1; --$i)
            {
                $array[] = new Card($i, "hearts");
            }
            
            for($i = 0, $j = count($array); $i < $j; ++$i)
            {
                echo "<img src=\"" . $array[$i]->getImage() . "\" />\n";
            }
        ?>
    </body>
</html>