function getscore() {
    const score = document.getElementById("kotae").getElementsByClassName('correct').length;
    const all_quest = document.getElementById("kotae").getElementsByClassName('correct').length + document.getElementById("kotae").getElementsByClassName('wrong').length;
    const scoretext = document.getElementById("score");
    const remarktext = document.getElementById("remark");
    if(all_quest==0){
        return;
    }
    if (score < all_quest * 2 / 3) {
        scoretext.innerText += "点数は　" + score + "　/　" + all_quest;
        remarktext.innerText += "まだできませんね！もっとがんばって。。";
        remarktext.style.color = "red";
    } else {
        scoretext.innerText += "点数は　" + score + "　/　" + all_quest;
        remarktext.innerText += "おめでとうございます。。";
        remarktext.style.color = "green";
        if (all_quest < 10) {
            remarktext.style.color = "yellow";
        }
    }
/*
    if (all_quest < 10) {
        remarktext.innerText += "最も早くて！";
    }*/
}