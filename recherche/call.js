function getXhr() {
    var xhr = null;
    if (window.XMLHttpRequest)
        // Navigateur moderne
        xhr = new XMLHttpRequest();
    else if (window.ActiveXObject) {
        // Internet Explorer <7
        try {
            xhr = new ActiveXObject("Msxml2.XMLHTTP");
            // IE 6
        } catch (e) {
            xhr = new ActiveXObject("Microsoft.XMLHTTP");
            // IE 5!!
        }
    } else { // XMLHttpRequest non supporté par le navigateur
        alert("Votre navigateur ne supporte pas les objets XHR...");
        xhr = false;
    }
    return xhr;
}

var xhr = getXhr();



function nodeValues(elements) { // XML Elements vers tableau
    var t = [];
    for (var i = 0; i < elements.length; ++i) {
        t.push(elements[i].childNodes[0].nodeValue);
    }
    return t;
}

function stateChanged(xhr) {
    return function () { // Fermeture
        if (xhr.readyState == 4 && xhr.status == 200) {
            document.getElementById("proposals").innerHTML =
                nodeValues(xhr.responseXML.getElementsByTagName("nomRecette"));
        }
    }
}

function show(str) { // Appelé pour chaque frape au clavier
    if (str.length == 0) {
        document.getElementById("proposals").innerHTML = "";
    }
    else {
        xhr.onreadystatechange = stateChanged(xhr);
    }
    xhr.open("GET", "proposals.php?start=" + str, true);
    xhr.send(null);
}