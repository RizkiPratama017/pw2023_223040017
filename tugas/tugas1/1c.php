<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .box {
            width: 200px;
            height: 200px;
            background-color: red;
            border-style: solid;
            display: grid;
        }

        .box1 {
            width: 200px;
            height: 200px;
            background-color: red;
            border-style: solid;
            display: flex;
            float: left;
            position: static;
        }

        .box2 {
            width: 200px;
            height: 200px;
            background-color: red;
            border-style: solid;
            float: left;
            position: relative;
            top: 203px;
            right: 409px;
        }
    </style>
</head>

<body>
    <div class="box"></div>
    <div class="box1"></div>
    <div class="box1"></div>
    <div class="box2"></div>
    <div class="box2"></div>
    <div class="box2"></div>
</body>

</html>