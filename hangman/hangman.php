<?php
	require_once 'hangedman.php';
	$category = "household things";
	$words = array();
	$numWords = 0;
    $script = " ";

	function getWords() {
		global $words,$numWords;
		$fileContent = fopen("words.txt","r");
		while(true) {
			$word=fgets($fileContent);
			if(!$word) break;
			$words[] = rtrim($word,"\n");
			$numWords++;
		}
		fclose($fileContent);
	}

	function playGame() {
		global $words;
		global $numWords;
		global $hanged;
		global $category;
		global $script;
		global $guessTemplate;
		$chooseWord = rand(0,$numWords-1);
		$choosedWord = $words[$chooseWord];
		$guessTemplate = str_repeat(" _ ",strlen($choosedWord));
		$script = $_SERVER["PHP_SELF"];
		printPage($category,$hanged[0], $guessTemplate, $chooseWord, "", 0);
	}

	function printPage($category,$image,$guessTemplate,$chooseWord,$guessed,$wrong) { 
		global $script;
		global $guessTemplate;
		echo <<<END
   		<!DOCTYPE html>
		<html>
 		<head><title>Hangman game</title></head>
		<body>
 			<h1>Hangman Game</h1>
 			<br>
			<p>category of word:$category</p>
			<br>
 			<pre>$image</pre>
  			<br>
			<p>Use A to Z to alphabets to guess</p>
 			<p><strong>Word to guess: $guessTemplate</strong></p>
 			<p>Letters used in guesses so far: $guessed</p>
			<form method = "post" action = "$script">
				<input type = "hidden" name = "wrong" 		   value = "$wrong" /><br>
				<input type = "hidden" name = "lettersguessed" value = "$guessed" /><br>
				<input type = "hidden" name = "word"   		   value = "$chooseWord" />
				<label>Your next guess</label>
	 	 		<input type = "text" name = "letter"/>
	 	 		<input type = "submit" value = "Guess" />
			</form>
		</body>
	    </html>
END;
	}

	function checkLetter($word,$lettersGuessed) {
		global $guessTemplate;
		$len = strlen($word);
		$guessTemplate = str_repeat("_",$len);
		for ($i = 0; $i < $len; $i++) {
			$ch = $word[$i];
			if (stristr($lettersGuessed, $ch)) {
		 		 $pos = $i;
		 		 $guessTemplate[$pos] = $ch;
			 	}
			}
		return $guessTemplate;
	}

	function handleGuess() {
		global $words;
		global $hanged;
		global $category;
		global $guessTemplate;
	  	$chooseWord = $_POST["word"];
	  	$word  = $words[$chooseWord];
	  	$wrong = $_POST["wrong"];
	  	$lettersGuessed = $_POST["lettersguessed"];
	  	$guess = $_POST["letter"];
	  	$letter =$guess[0];
	  	if(!stristr($word, $letter)) {
			$wrong++;
	  	}	
	  	$lettersGuessed = $lettersGuessed . $letter;
	  	$guessTemplate = checkLetter($word, $lettersGuessed);
	  	if (!stristr($guessTemplate, "_")) {
			gameWon($word);
	  	} else if ($wrong >= 5) {
			gameLost($word);
	  	} else {
			printPage($category,$hanged[$wrong], $guessTemplate, $chooseWord, $lettersGuessed,$wrong);
	  	}
	}

	function gameWon($word) {
		echo <<<END
		<!DOCTYPE html>
		<html>
  		<head><title>Hangman game</title></head>
  		<body>
			<h1>You win!</h1>
			<pYou guessed that the word was $word</p>
 	 	</body>
		</html>
END;
	}

	function gameLost($word) {
		echo <<<END
		<!DOCTYPE html>
        <html>
        <head><title>Hangman game</title></head>
        <body>
        	<h1>You lose!</h1>
       	 	<p>word you were trying to guess was $word</p>
        </body>
        </html>
END;
	}

	getWords();

	$method = $_SERVER["REQUEST_METHOD"];
	if($method == "POST") {
		handleGuess();
	}else {
		playGame();
	}
?>	
