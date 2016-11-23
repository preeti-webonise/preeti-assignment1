<?php
require_once 'hangedman.php';
$category="household things";
$words=array();
$numwords=0;
$script=" ";

function get_words()
{
	global $words,$numwords;
	$file_content=fopen("words.txt","r");
	
	while(true)
	{
		$word=fgets($file_content);
		if(!$word) break;
		$words[]=rtrim($word,"\n");
		$numwords++;
	}
	fclose($file_content);
}

function play_game()
{
	global $words;
	global $numwords;
	global $hanged;
	global $category;
	global $script;
	global $guess_template;
	$choose_word=rand(0,$numwords-1);
	$choosed_word=$words[$choose_word];
	$guess_template=str_repeat(" _ ",strlen($choosed_word));
	$script= $_SERVER["PHP_SELF"];
	
	printpage($category,$hanged[0], $guess_template, $choose_word, "", 0);
}

function printpage($category,$image,$guess_template,$choose_word,$guessed,$wrong)
{
global $script;
global $guess_template;
	echo <<<END
   	<!DOCTYPE html>
	<html>
 	<head>
		<title>Hangman game</title>
 	</head>
	
	<body>
 	<h1>Hangman Game</h1>
 	<br>
	<p>category of word:$category</p>
	<br>
 	<pre>$image</pre>
  	<br>
	<p>Use A to Z to alphabets to guess</p>
 	<p><strong>Word to guess: $guess_template</strong></p>
 	<p>Letters used in guesses so far: $guessed</p>
	<form method="post" action="$script">
		<input type="hidden" name="wrong" value="$wrong" /><br>
		<input type="hidden" name="lettersguessed" value="$guessed" /><br>
		<input type="hidden" name="word" value="$choose_word" />
		<label>Your next guess</label>
	 	 <input type="text" name="letter"/>
	 	 <input type="submit" value="Guess" />
		
	</form>
	</body>
	</html>
END;
}

function check_letter($word,$letters_guessed)
{
	global $guess_template;
	$len = strlen($word);
	$guess_template = str_repeat("_",$len);
	for ($i = 0; $i < $len; $i++)
	{
		$ch = $word[$i];
		if (stristr($letters_guessed, $ch))
		 {
	 		 $pos = $i;
	 		 $guess_template[$pos] = $ch;
		 }
	}
	return $guess_template;
}

function handleguess() 
{
	global $words;
	global $hanged;
	global $category;
	global $guess_tamplate;
  	$choose_word = $_POST["word"];
  	$word  = $words[$choose_word];
  	$wrong = $_POST["wrong"];
  	$letters_guessed = $_POST["lettersguessed"];
  	$guess = $_POST["letter"];
  	$letter =$guess[0];
  	if(!stristr($word, $letter)) 
	{
		$wrong++;
  	}	
  	$letters_guessed = $letters_guessed . $letter;
  	$guess_template = check_letter($word, $letters_guessed);
  	if (!stristr($guess_template, "_")) 
	{
		game_won($word);
  	} 
	else if ($wrong >= 5) 
	{
		game_lost($word);
  	}
	 else 
	{
		printpage($category,$hanged[$wrong], $guess_template, $choose_word, $letters_guessed,$wrong);
  	}
}

function game_won($word)
{
	echo <<<END
	<!DOCTYPE html>
	<html>
  	<head>
	<title>Hangman game</title>
  	</head>
  	<body>
	<h1>You win!</h1>
	<pYou guessed that the word was $word</p>
 	 </body>
	</html>
END;
}

function game_lost($word)
{
	echo <<<END
	<!DOCTYPE html>
        <html>
        <head>
        <title>Hangman game</title>
        </head>
        <body>
        <h1>You lose!</h1>
        <p>word you were trying to guess was $word</p>
         </body>
        </html>
END;

}

get_words();

$method=$_SERVER["REQUEST_METHOD"];
if($method=="POST")
{
	handleguess();
}
else
{
	play_game();
}

?>	
