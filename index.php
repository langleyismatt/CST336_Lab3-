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
                function getNumCards()
                {
                    return $this->numCards;
                }
                function finalize()
                {
                    for($i = 0, $j = count($this->hand); $i < $j; ++$i)
                    {
                        $this->score += $this->hand[$i]->getCardValue();
                    }
                    return $this->score;
                }
                function getScore()
                {
                    return $this->score;
                }
                function getName()
                {
                    return $this->name;
                }
                function getHand()
                {
                    return $this->hand;
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
            $topDeck = count($deckOfCards) - 1;
            
            $players = array();
            
            $playerNames = ["Jill", "Maria", "John", "Tom"];
            
            $topScore = 0;
            
            for($i = 0; $i < 4; ++$i)
            {
                $players[] = new Player($playerNames[$i], rand() % 3 + 4);
                for($j = 0; $j < $players[$i]->getNumCards(); ++$j)
                {
                    $players[$i]->addCard($deckOfCards[$topDeck--]);
                }
                $temp = $players[$i]->finalize();
                if($temp > $topScore && $temp <= 42)
                {
                    $topScore = $temp;
                }
            }
            
            for($i = 0, $j = count($players); $i < $j; ++$i)
            {
                echo "<div>\n\t\t" . $players[$i]->getName() . "\n\t\t";
                for($k = 0, $l = $players[$i]->getNumCards(); $k < $l; ++$k)
                {
                    echo "<img src=\"" . $players[$i]->getHand()[$k]->getImage() . "\" />";
                }
                echo "\n\t\t<label>" . $players[$i]->getScore() . "</label>";
                if($players[$i]->getScore() == $topScore)
                {
                    echo "<label>" . $players[$i]->getName() . " Wins!</label>";
                }
                echo "\n\t</div>\n\t";
            }
        ?>
    </body>
</html>