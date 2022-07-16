const form = document.querySelector("#form");

form.addEventListener("submit", (e) => {
    e.preventDefault();

    var text1 = document.getElementById("text1").value;
    var text2 = document.getElementById("text2").value;

    var final_text = `Заявка: %0A - ФИО: ${text1} %0A - Телефон: <a href="tel:${text2}">${text2}</a>`

    var token = "5438363211:AAER-32E_TWjbeiESmhqxHU2EiYcbF0nex4";
    var chat_id = -1001626128585;
    var url = `https://api.telegram.org/bot${token}/sendMessage?chat_id=${chat_id}&text=${final_text}&parse_mode=html`

    let api = new XMLHttpRequest();
    api.open("GET", url, true);
    api.send();

    console.log("Message done!")
})