<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"
        integrity="sha512-Avb2QiuDEEvB4bZJYdft2mNjVShBftLdPG8FJ0V7irTLQ8Uo0qcPxh4Plq7G5tGm0rU+1SPhVotteLpBERwTkw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        .input-container {
    position: relative;
    width: 100%;
}

.input-container .icon {
    position: absolute;
    top: 50%;
    left: 10px;
    transform: translateY(-50%);
    color: #888;
}

.input-container input {
    width: 100%;
    padding: 10px 10px 10px 40px; /* Adjust padding for icon space */
    border: 1px solid #ccc;
    border-radius: 4px;
}

    </style>
</head>
<body>
    <div class="input-container">
        <i class="icon fa fa-user"></i>
        <input type="text" placeholder="Username">
    </div>

</body>
</html>