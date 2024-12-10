let shuffledQuestions = [];
let currentNumber = 0;
function Quizstart() {
    handleQuestions();
    Openquiz(currentNumber);
}

function handleQuestions() {
    while (shuffledQuestions.length <= 50) {        //here
        const random = questions[Math.floor(Math.random() * questions.length)]
        if (!shuffledQuestions.includes(random)) {
            shuffledQuestions.push(random)
        }
    }
}

function Openquiz(index) {
    const currentQuestion = shuffledQuestions[index];
    currentNumber = index;
    let ruby_text = "<ruby>" + currentQuestion.question + "<rt>" + currentQuestion.furi + "</rt></ruby>";
    document.getElementById("quiz-number").innerHTML = index + 1;
    document.getElementById("display-question").innerHTML = ruby_text;
    document.getElementById("option-A-label").innerHTML = currentQuestion.optionA;
    document.getElementById("option-B-label").innerHTML = currentQuestion.optionB;
    document.getElementById("option-C-label").innerHTML = currentQuestion.optionC;
    document.getElementById("next-button").innerHTML = ' <button onclick="NextQuestion(' + (index + 1) + ')">次の質問</button>';
}

function checkForAnswer() {
    const currentQuestion = shuffledQuestions[currentNumber];
    const options = document.getElementsByName("option");
    if (options[0].checked == false && options[1].checked == false && options[2].checked == false) {
        document.getElementById('check-mark').innerText = "選んでください。";
        return false;
    }
    options.forEach((option) => {
        if (option.checked == true) {
            //debugger;
            document.getElementById('check-mark').innerText = "";
            document.getElementById("anser").insertAdjacentHTML("beforeend", '<input type="text" name="question[' + currentNumber + '][id]" value="' + currentQuestion.id + '"><input type="text" name="question[' + currentNumber + '][anser]" value="' + option.value + '">');
            option.checked = false;
        }
    })
    return true;
}

function NextQuestion(n) {
    if (checkForAnswer(currentNumber)) {
        setTimeout(() => {
            if (n < 50) {               //here
                Openquiz(n);
            } else {
                EndQuiz()
            }
        }, 100);
    }
}

const timer_btn = document.getElementById("start");
const timeCount = document.getElementById("timer");
function startTimer(time) {
    counter = setInterval(timer, 1000);
    function timer() {
        timeCount.textContent = time;
        time--;
        if (time < 9) {
            let addZero = timeCount.textContent;
            timeCount.textContent = "0" + addZero;
        }
        if (time < 0) {
            clearInterval(counter);
            EndQuiz();
            timeCount.textContent = "60";
            time=60;
            document.getElementById("main").style.display = "none";
            timer_btn.style.display = "unset";
            timeCount.style.display = "none";
        }
    }
}
timer_btn.onclick = function () { startTimer(60); document.getElementById("main").style.display = "unset"; timer_btn.style.display = "none"; timeCount.style.display = "unset"; }

function EndQuiz() {
    document.getElementById("main").style.display = "none";
    checkForAnswer();
    document.getElementById("anser").submit();
}
//debugger;