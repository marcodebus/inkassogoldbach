<!DOCTYPE html>
<html>
<head>
    <title>JS Liste</title>
    <style>
        th, td, p, input {
            font:14px Verdana;
        }
        table, th, td
        {
            border: solid 1px #DDD;
            border-collapse: collapse;
            padding: 2px 3px;
            text-align: center;
        }
        th {
            font-weight:bold;
        }
    </style>
</head>
<body>
    <input type="button" onclick="CreateTableFromJSON()" value="JS Tabelle erstellen" />
    <p id="showData"></p>
</body>

<script>
    function CreateTableFromJSON() {
        var myList = <?= file_get_contents('http://localhost/projects/inkasso/inkassogoldbach/RestAPI/'); ?>


        var col = [];
        for (var i = 0; i < myList.length; i++) {
            for (var key in myList[i]) {
                if (col.indexOf(key) === -1) {
                    col.push(key);
                }
            }
        }

        //  DYNAMIC TABLE.
        var table = document.createElement("table");

        var tr = table.insertRow(-1);                   // TABLE ROW.

        for (var i = 0; i < col.length; i++) {
            var th = document.createElement("th");      // TABLE HEADER.
            th.innerHTML = col[i];
            tr.appendChild(th);
        }

        for (var i = 0; i < myList.length; i++) {

            tr = table.insertRow(-1);

            for (var j = 0; j < col.length; j++) {
                var tabCell = tr.insertCell(-1);
                tabCell.innerHTML = myList[i][col[j]];
            }
        }

        var divContainer = document.getElementById("showData");
        divContainer.innerHTML = "";
        divContainer.appendChild(table);
    }
</script>
</html>
