<!DOCTYPE html>
<html>
    <head>
        <title>Lab 3 - Morgan Johnson & Matthew Langley</title>
        <link type="css/text" rel="stylesheet" href="css/styles.css">
    </head>
    <body>
         <title1>
            <center1>
                Silverjack!
            </center1>
        </title1>
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
                 function getPlayerPic()
                {
                    return "images/players/" . $this->picture;
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
            
            $playerPics = ["<img src=images/players/0.png style=width:72px;height:96px>", "<img src=images/players/1.png style=width:72px;height:96px>", 
                            "<img src=images/players/2.png style=width:72px;height:96px>", "<img src=images/players/3.png style=width:72px;height:96px>"];
            
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
            echo "<center1>";
            for($i = 0, $j = count($players); $i < $j; ++$i)
            {
                echo "<nameLabel>\n\t\t" . $players[$i]->getName() . "'s Hand<pre></pre>\n\t\t";
                                           echo $playerPics[$i];
                for($k = 0, $l = $players[$i]->getNumCards(); $k < $l; ++$k)
                {
                    echo "<img src=\"" . $players[$i]->getHand()[$k]->getImage() . "\" />";
                }

                echo "&nbsp&nbspScore \n\t\t" . $players[$i]->getScore() . "";
                echo "<pre></pre>";
                if($players[$i]->getScore() == $topScore)
                {
                    $echo11 = "" . $players[$i]->getName() . " Wins!";
                }
                echo "\n\t</div>\n\t";
            }
        ?>
        <winner>
            <center1>
                <marquee behavior="alternate">
                    <?php 
                        echo "$echo11";
                    ?>
                </marquee>
            </center1>
        </winner>
    </body>
</html>