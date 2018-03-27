<!DOCTYPE html>


<html style="height: 100%;">
    <head>
        <style>
            #leftnav{
                width:15%;
                height:100%;
                position:absolute;
                border-right-color: black;
                border-right-style:solid;
                border-top-color: black;
                border-top-style:solid;
                background-color:#5e5e5e;
                overflow-x:auto;

            }

            div.leftgroup{
                width:100%;
                display:table;
                border-bottom-color:black;
                border-bottom-style:solid;
                padding-top:5%;
                padding-bottom:5%;
            }

            a.leftbutton{
                width:99%;
                height:10%;
                position:relative;
                padding:150px;
                display: inline-block;
                text-align: center;
                text-decoration: none;
                display:table-row;
                color:White;
                font-size: 30px;
                vertical-align: middle;
                cursor:pointer;
                overflow:scroll;
                background-color:inherit;

            }
            a.leftbutton:hover{
                background-color:Black;

            }

        </style>

    </head>

    <body style="position: relative; height: 100%; top: 0px;">
        <div id="leftnav">
            <div class="leftgroup">
                <a class="leftbutton" href="Menu.php"> Accueil </a>
                <a class="leftbutton" href="Menu.php"> Vue d'ensemble </a>
            </div>
            <div class="leftgroup">
                <a class="leftbutton" href="Menu.php"> Vue d'ensemble </a>
                <a class="leftbutton" href="Menu.php"> Mes capteurs </a>
                <a class="leftbutton" href="Menu.php"> Mes actionneurs </a>
                <a class="leftbutton" href="Menu.php"> Scénarios </a>
                <a class="leftbutton" href="Menu.php"> Notifications </a>
            </div>
            <div class="leftgroup">
                <a class="leftbutton" href="Menu.php"> Gérer les sous-utilisateurs </a>
                <a class="leftbutton" href="Menu.php"> Gérer les maisons </a>
                <a class="leftbutton" href="Menu.php"> Informations </a>
                <a class="leftbutton" href="Menu.php"> SAV </a>
            </div>

        </div>
    </body>
</html>

