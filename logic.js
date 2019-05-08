function makeRequest(url, method, formdata, callback) {

    const headerObject = method == "GET" || !formdata ? { method: method} : { method: method, body: formdata }

    fetch(url, headerObject).then((data) => {
        return data.json()
    }).then((result) => {
        callback(result)
    }).catch((err) => {
        console.log(err)
    })
}

// lägger till i session
function saveHoroscope() {

    //läser in, och omvandlar årtalet till 2019, check med databasen
    var userDate = document.getElementById("birthDate").value;
    var newUserDate = userDate.slice(5);

    // kollar över årskiften, omvandlar till 2020 || 2019
    if (newUserDate <= "01-19") {
        var chosenDate = ("2020-") + newUserDate;
    } else {
        var chosenDate = ("2019-") + newUserDate;
    }

    var formData = new FormData()
    formData.set("newHoroscope", chosenDate)
    formData.set("action", "save")

    makeRequest("addHoroscope.php", "POST", formData, (data) => {
            viewHoroscope();
    })
}

// uppdatera Stjärntecken
function updateHoroscope() {

    var userDate = document.getElementById("birthDate").value;
    var newUserDate = userDate.slice(5);

    if (newUserDate <= "01-19") {
        var chosenDate = ("2020-") + newUserDate;
    } else {
        var chosenDate = ("2019-") + newUserDate;
    }

    var formData = new FormData()
    formData.set("newHoroscope", chosenDate)
    formData.set("action", "update")

    makeRequest("updateHoroscope.php", "POST", formData, (data) => {
            console.log(data)
            viewHoroscope();
    })
}

// radera session 
function removeHoroscope() {
    makeRequest("deleteHoroscope.php", "DELETE", undefined, (data) => {
        console.log(data)
    })
    var text = document.getElementById('container');
    text.innerHTML = "";
}

// visar innehåll i session
function viewHoroscope() {
    makeRequest("viewHoroscope.php", "GET", undefined, (data) => {
        if (data != undefined) {
            var zodiac = (data[0].horoscopeSign)
            var text = document.getElementById('container');
            text.innerHTML = zodiac;
        } 
    })
}