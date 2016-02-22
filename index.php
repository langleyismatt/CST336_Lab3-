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
                function getCardValue()
                {
                    return $this->number;
                }
                function getCardName()
                {
                    return $this->number . " of " . $this->suit;
                }
            }
            function shuffleDeck(&$deck)
            {
                $temp;
                for($i = count($deck) - 1; $i > 0; --$i)
                {
                    $j = rand() % ($i + 1);
                    $temp = $deck[$j];
                    $deck[$j] = $deck[$i];
                    $deck[$i] = $temp;
                }
            }
            class Player
            {
                private $name = "";
                private $picture = "";
                private $numCards = 0;
                private $hand = array();
                private $score = 0;
                
                function __construct($n, $c)
                {
                    $this->name = $n;
                    $this->numCards = $c;
                }
                
                function addCard($c)
                {
                    $this->hand[] = $c;
                }
                function finalize()
                {
                    for($i = 0, $j = count($hand); $i < $j; ++$i)
                    {
                        $this->score += $hand[$i]->getCardValue();
                    }
                }
                function getScore()
                {
                    return $this->score;
                }
            }
            
            $deckOfCards = array();
            for($i = 1; $i <= 13; ++$i)
            {
                $deckOfCards[] = new Card($i, "clubs");
            }
            for($i = 13; $i >= 1; --$i)
            {
                $deckOfCards[] = new Card($i, "diamonds");
            }
            for($i = 1; $i <= 13; ++$i)
            {
                $deckOfCards[] = new Card($i, "spades");
            }
            for($i = 13; $i >= 1; --$i)
            {
                $deckOfCards[] = new Card($i, "hearts");
            }
            shuffleDeck($deckOfCards);
            
            $players = array();
            
            for($i = 0, $j = count($deckOfCards); $i < $j; ++$i)
            {
                echo "<img src=\"" . $deckOfCards[$i]->getImage() . "\" />\n";
            }
        ?>
    </body>
</html>