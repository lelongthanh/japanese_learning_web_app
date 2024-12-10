const tbwith = document.getElementById("game").getAttribute("with");
const tbhight = document.getElementById("game").getAttribute("hight");
let word_table = [];
let checkcount = 0;
let checked = 0;
let finish = all_word.length;
var timeout = false;

function shuffle() {
    const new_table = [];
    for (let i = 0; i < finish; i++) {
        new_table.push(all_word[i].word);
        new_table.push(all_word[i].anser);
    }
    const cloned = new_table;
    for (let i = cloned.length - 1; i > 0; i--) {
        const random = Math.floor(Math.random() * (i + 1))
        const original = cloned[i]

        cloned[i] = cloned[random]
        cloned[random] = original
    }
    word_table = cloned;
}

function gametable() {
    const game = document.getElementById("game");
    game.innerHTML = "";
    for (let i = 0; i < tbhight; i++) {
        const row = game.insertRow(i);
        for (let j = 0; j < tbwith; j++) {
            //row.insertCell(j).innerHTML = '<span class="check"><ruby>' + word_table[((i * tbwith) + j)] + '<rt></rt></ruby></span>';
            row.insertCell(j).innerHTML = '<span class="check">' + word_table[((i * tbwith) + j)] + '</span>';
        }
    }
    document.querySelectorAll("td").forEach(td => { td.setAttribute("class", "kanji"); })
    EventListeners()
}

function ckanji(text) {debugger;
    var newtext = text.replace('<ruby>|</ruby>|<rt></rt>', '');
    for (i = 0; i < all_word.length; i++) {
        if (newtext == all_word[i]["anser"]) {
            return all_word[i]["word"]
        }
    }
    return newtext;
}

function startgame() {
    document.getElementById("startbutton").style.display = "none";
    document.getElementsByTagName("main")[0].style.display = "unset";
    shuffle();
    gametable();
}

function EventListeners() {
    var elements = document.getElementsByClassName("kanji");
    for (var i = 0; i < elements.length; i++) {
        elements[i].addEventListener("click", (function () {
            return function () {
                if (timeout == false) {
                    timeout = true;
                    if (this.children[0].classList.contains("check") && checkcount < 2) {
                        checkcount++;
                        this.children[0].classList.add("checking");
                        this.children[0].classList.remove("check");
                    }

                    if (checkcount == 2) {
                        const checking = document.querySelectorAll(".checking");
                        var a = ckanji(checking[0].innerHTML);
                        var b = ckanji(checking[1].innerHTML);

                        if (a == b) {
                            checking[0].classList.add("checked");
                            checking[1].classList.add("checked");
                            checking[0].classList.remove("checking");
                            checking[1].classList.remove("checking");
                            checked++;
                            checkcount = 0;
                        } else {
                            setTimeout(() => {
                                checking[0].classList.add("check");
                                checking[1].classList.add("check");
                                checking[0].classList.remove("checking");
                                checking[1].classList.remove("checking");
                                timeout = false;
                            }, 1000);
                            checkcount = 0;
                            return;
                        }
                    }
                    timeout = false;
                }
                if (checked == finish) {
                    document.getElementById("congratulation").style.display = "unset";
                }
            }
        })(i));
    }
}