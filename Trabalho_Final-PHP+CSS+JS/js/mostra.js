/////////////////////////CLIENTES/////////////////////////////////////////////
function Select(string, func) {
    xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("principal").innerHTML = xmlhttp.responseText;
        }

    };
    xmlhttp.open("GET", string + ".php?func=" + func);
    xmlhttp.send();
}

function cliente_forminsert() {
    var func = "insertform";
    var string = "cliente";
    xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("principal").innerHTML = xmlhttp.responseText;
        }

    };
    xmlhttp.open("GET", string + ".php?func=" + func);
    xmlhttp.send();
}

function cliente_insert() {
    var nome = document.getElementById('nome').value;
    var radiobuttons = document.getElementsByName('sexo');
    var sexo;
    for(var i = 0; i < radiobuttons.length; i++){
    if(radiobuttons[i].checked){
       sexo = radiobuttons[i].value;
    }
    }
    var cidade = document.getElementById('select').value;
    var func = "insert";
    var string = "cliente";
    xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("principal").innerHTML = xmlhttp.responseText;
        }
    };
    xmlhttp.open("GET", string + ".php?func=" + func + "&nome=" + nome + "&sexo=" + sexo + "&cidade=" + cidade);
    xmlhttp.send();
}

function cliente_delete(codigo) {
    var func = "delete";
    var string = "cliente";
    xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("principal").innerHTML = xmlhttp.responseText;
        }

    };
    xmlhttp.open("GET", string + ".php?func=" + func + "&codigo=" + codigo);
    xmlhttp.send();
}

function cliente_filhodelete(codigofilho, codigo) {
    var func = "deletefilhos";
    var string = "cliente";
    xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("principal").innerHTML = xmlhttp.responseText;
        }

    };
    xmlhttp.open("GET", string + ".php?func=" + func + "&codigofilho=" + codigofilho + "&codigo=" + codigo);
    xmlhttp.send();
}

function cliente_filhoselect(codigo) {
    var func = "mostrafilhos";
    var string = "cliente";
    xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("principal").innerHTML = xmlhttp.responseText;
        }
    };
    xmlhttp.open("GET", string + ".php?func=" + func + "&codigo=" + codigo);
    xmlhttp.send();
}

function cliente_update(codigo) {}
/////////////////////////FILHOS/////////////////////////////////////////////

function filho_delete(codigo) {
    var func = "delete";
    var string = "dependente";
    xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("principal").innerHTML = xmlhttp.responseText;
        }

    };
    xmlhttp.open("GET", string + ".php?func=" + func + "&codigo=" + codigo);
    xmlhttp.send();
}

function filho_forminsert() {
    var func = "insertform";
    var string = "dependente";
    xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("principal").innerHTML = xmlhttp.responseText;
        }

    };
    xmlhttp.open("GET", string + ".php?func=" + func);
    xmlhttp.send();
}

function filho_insert() {
    var nome = document.getElementById('nome').value;
    var id_cliente = document.getElementById('id_cliente').value;
    var func = "insert";
    var string = "dependente";
    xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("principal").innerHTML = xmlhttp.responseText;
        }

    };
    xmlhttp.open("GET", string + ".php?func=" + func + "&nome=" + nome + "&id_cliente=" + id_cliente);
    xmlhttp.send();
}

/////////////////////////CIDADES/////////////////////////////////////////////

function cidade_delete(codigo) {
    var func = "delete";
    var string = "cidade";
    xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("principal").innerHTML = xmlhttp.responseText;
        }

    };
    xmlhttp.open("GET", string + ".php?func=" + func + "&codigo=" + codigo);
    xmlhttp.send();
}

function cidade_forminsert() {
    var func = "cidadeform";
    var string = "cidade";
    xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("principal").innerHTML = xmlhttp.responseText;
        }

    };
    xmlhttp.open("GET", string + ".php?func=" + func);
    xmlhttp.send();
}

function cidade_insert() {
    var nome = document.getElementById('nome').value;
    var func = "insert";
    var string = "cidade";
    xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("principal").innerHTML = xmlhttp.responseText;
        }

    };
    xmlhttp.open("GET", string + ".php?func=" + func + "&nome=" + nome);
    xmlhttp.send();
}

function cidade_formupdate(codigo) {
    var func = "updateform";
    var string = "cidade";
    xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("principal").innerHTML = xmlhttp.responseText;
        }
    };
    xmlhttp.open("GET", string + ".php?func=" + func + "&codigo=" + codigo);
    xmlhttp.send();
}

function cidade_update() {
    var nome = document.getElementById('nome').value;
    var codigo = document.getElementById('codigo').value;
    var func = "update";
    var string = "cidade";
    xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("principal").innerHTML = xmlhttp.responseText;
        }

    };
    xmlhttp.open("GET", string + ".php?func=" + func + "&nome=" + nome + "&codigo=" + codigo);
    xmlhttp.send();
}