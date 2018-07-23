var compArray = [];
var myMoveArray = [];
/*var myGameArray = compArray.concat(myMoveArray);*/
var compScore2 = 0;
var humanScore1 = 0;
var coMove;
var myMoveToWord;
var tempScore;
var scoreToWord;
var textik = "XXXXX";
function restartGame(){
	 location.reload();
}
function showScore1(){
	var newLineCompAr = compArray.join ("<br />");
	var newLineHumanAr = myMoveArray.join ("<br />");
document.getElementById("PrintArray1").innerHTML = newLineCompAr;
document.getElementById("PrintArray2").innerHTML = newLineHumanAr;
document.getElementById("Koguskoor2").innerHTML ="Human:"+" " + humanScore1;
document.getElementById("Koguskoor1").innerHTML ="Computer:"+" " + compScore2;
}
function showScore2(){
document.getElementById("SCORE2").innerHTML = score2;	
}
function incrementComputer(){
 compScore2 ++;
 return compScore2;
	
}
function incrementHuman(){
	humanScore1++;
	return humanScore1;
}
function pressKivi(){
tempScore = 1;
document.getElementById("myMoveVisible").src = "rock.png";
computerMove();
 myMoveArray.push("ME---Rock");
showScore1();


return document.getElementById("SCORE2").innerHTML = tempScore;
 
 
}

function pressPaber(){
	tempScore = 2;
	document.getElementById("myMoveVisible").src = "paper.png";
	computerMove();
	myMoveArray.push("ME---Paper");
	showScore1();
	
	
	
	
 return document.getElementById("SCORE2").innerHTML = tempScore;
	

}
function pressKaarid(){
	tempScore = 3;
	document.getElementById("myMoveVisible").src = "scissors.png";
	computerMove();
	myMoveArray.push("ME---Scissors");
	showScore1();
	

	
}

function computerMove(){
	
coMove = Math.floor(Math.random() * 3) + 1;
switch(coMove){
	case 1:
	scoreToWord = "Rock";
	compArray.push("COMP---Rock");
	document.getElementById("compMoveVisible").src = "ai_rock.png";
	break;
	case 2: 
	scoreToWord = "paper";
	compArray.push("COMP---Paper");
	document.getElementById("compMoveVisible").src = "ai_paper.png";
	break;
	case 3:
	scoreToWord = "scissors";
	compArray.push("COMP---Scissors");
	document.getElementById("compMoveVisible").src = "ai_scissors.png";
	break;
}


if (coMove == 1 &&  tempScore == 3 || coMove == 2 &&  tempScore == 1 || coMove == 3 &&  tempScore == 2){
	incrementComputer();
	document.getElementById("SCORE3").innerHTML = "YOU LOOSE!";
	
}
else if (coMove == tempScore){
	incrementComputer();
	incrementHuman();
	document.getElementById("SCORE3").innerHTML = "TIE";
}
else if(coMove == 3 &&  tempScore == 1 || coMove == 1 &&  tempScore == 2 || coMove == 2 &&  tempScore == 3){
	incrementHuman();
	document.getElementById("SCORE3").innerHTML = "YOU WIN!";
}

}

