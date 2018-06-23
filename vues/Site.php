<!DOCTYPE html>

<?php
require('../controls/Home.php');
?>

<html>
<head>

    <style>
        .house{
            width:1200px;
            height:1000px;
            background-color: white;
            border-style:solid;
            border-color: red;
            position: absolute;
            margin: 3px;

        }

        .room{
            width: 500px;
            height: 500px;
            background-color: lightgrey;
            border-style: solid;
            border-color: Black;
            position:absolute;
        }

        .capteur{
            width: 50px;
            height: 50px;
            background-color: Red;
            position:absolute;
            margin: 5px;
        }

        .capteurInformation{
            width: 50px;
            height: 50px;
            background-color: white;
            position:absolute;
            bottom: -55px;
            display: none;
            border-style: solid;
            border-color: Black;
            border-width: 1px;
        }

        .bloc {
            border-style: solid;
            border-color: Black;
            border-width: 1px;
            float: left;
        }
    </style>
</head>

<body>
<div class = "bloc" style="width:300px;height:1000px;">
    <div class="bloc" style="width:300px;height:210px;">
        <h3> User </h3>
        <form action="../models/AddToDatabase.php" method="post">
            LastName: <input type="text" name="LastName"><br>
            FirstName: <input type="text" name="FirstName"><br>
            Mail: <input type="text" name="Mail"><br>
			<input type="hidden" name="Table" value="users">
            <input type="submit">
        </form>
    </div>
    <div class="bloc" style="width:300px;height:210px;">
        <h3> House </h3>
        <form action="../models/AddToDatabase.php" method="post">
            Name: <input type="text" name="Name"><br>
            Address: <input type="text" name="Address"><br>
            City: <input type="text" name="City"><br>
            NumberOfFloor:<input type="text" name="NumberOfFloor"><br>
            <select name="UserID">
                <?php
                $users = selectUsers($db);
                foreach($users as $user)
                {
                    echo '<option value ="'.$user['UserID'].'"> '.$user['FirstName'].'</option>';
                }

                ?>
            </select>
			<input type="hidden" name="Table" value="houses">
            <input type="submit">
        </form>
    </div>
    <!--
    <div class="bloc" style="width:300px;height:210px;">
        <h3> Actuator </h3>
        <form action="AddActuator.php" method="post">
            Name: <input type="text" name="name"><br>
            ActuatorType: <input type="text" name="ActuatorType"><br>
            xPosition: <input type="text" name="xPosition"><br>
            yPosition: <input type="text" name="yPosition"><br>
            <select name="houseID">

            </select>
            <input type="hidden" name="RoomID" value="0">
            <input type="submit">
        </form>
    </div>
    -->
</div>
<div class = "bloc" style="width:151;height:1010px>


        <div class="bloc">
            <h4>User :</h4>
            <form action="ChooseHouse.php" method="post">
                <select name="UserID">
                    <?php
                    $users = selectUsers($db);
                    foreach($users as $user)
                    {
                        echo '<option value ="'.$user['UserID'].'"> '.$user['FirstName'].'</option>';
                    }

                    ?>
                </select>
                <input type="submit">
            </form>
        </div>

</div>
</body>
</html>