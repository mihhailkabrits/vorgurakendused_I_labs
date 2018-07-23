var compArray = [];
var myMoveArray = [];
/*var myGameArray = compArray.concat(myMoveArray);*/
var compScore2 = 0;
var humanScore1 = 0;
var myMoveToWord;
var tempScore;
var startTime = Date.now();//praegune aeg epokis
var results = [];

$('#send').click(function () {//list et meelde jatta mis tulemused  on yhe mängu jooksul saadud
	var username = $('#usernameField').val();////////////////////////////


	

});

function restartGame() {
	location.reload();
}
function showScore1() {
	var newLineCompAr = compArray.join("<br />");
	var newLineHumanAr = myMoveArray.join("<br />");
	document.getElementById("PrintArray1").innerHTML = newLineCompAr;
	document.getElementById("PrintArray2").innerHTML = newLineHumanAr;
	document.getElementById("Koguskoor2").innerHTML = "Human:" + " " + humanScore1;
	document.getElementById("Koguskoor1").innerHTML = "Computer:" + " " + compScore2;
}
function pressKivi() {
	tempScore = 1;
	document.getElementById("myMoveVisible").src = "rock.png";
	computerMove();
	myMoveArray.push("ME---Rock");
	showScore1();

	return document.getElementById("SCORE2").innerHTML = tempScore;

}

function pressPaber() {
	tempScore = 2;
	document.getElementById("myMoveVisible").src = "paper.png";
	computerMove();
	myMoveArray.push("ME---Paper");
	showScore1();

	return document.getElementById("SCORE2").innerHTML = tempScore;

}

function pressKaarid() {
	tempScore = 3;
	document.getElementById("myMoveVisible").src = "scissors.png";
	computerMove();
	myMoveArray.push("ME---Scissors");
	showScore1();
}
function getDate() {
	var startDate = $('#inputDate1').val();
	var endDate = $('#inputDate2').val();
}

function computerMove() {
	var playerName = $('#player_name').val();
	$.post("../cgi-bin/comp_move.py",  
			{
				playername: playerName,
		playermove: tempScore 
			},
			function(data, status) { //3.parameeter pyton comp_move.py tagastab
				var dataArray = data.split('\n');
				var compMove = JSON.parse(dataArray[0]); 
				var result = dataArray[1];

				displayComputerMove(compMove);//html vormis
				processResult(result);
				showScore1();
			});
}

function processResult(result) {
        if (result === 'win') {
			humanScore1++;
			document.getElementById("SCORE3").innerHTML = "YOU WIN!";
			results.push("win");
		} else if (result === 'lose') {
			compScore2++;
			document.getElementById("SCORE3").innerHTML = "YOU LOSE!";
			results.push("loss");
		} else {
			compScore2++;
			humanScore1++;
			document.getElementById("SCORE3").innerHTML = "TIE";
			results.push("draw");
		}
}

function displayComputerMove(coMove) {
	switch (coMove) {
		case 1:
			compArray.push("COMP---Rock");
			document.getElementById("compMoveVisible").src = "ai_rock.png";
			break;
		case 2:
			compArray.push("COMP---Paper");
			document.getElementById("compMoveVisible").src = "ai_paper.png";
			break;
		case 3:
			compArray.push("COMP---Scissors");
			document.getElementById("compMoveVisible").src = "ai_scissors.png";
			break;
	}

}

function saveResults() {
	$.post("../cgi-bin/save_results.py",
			{
				playername: $("#player_name").val(),
	                        results: "[" + results + "]",
	                        start_time: startTime,
				end_time: Date.now()
			});
	$("#player_name").text("");
	location.reload();
}
