<html>
<head>
    <title>Form Handling</title>
</head>

<body>
    <h1>Fill in the form</h1>

    <form method="GET" action="response.php">
        <label>First name:</label>
        <input type="text" name="firstname" value="">

        <br><br>

        <label>Last name:</label>
        <input type="text" name="lastname" value="">

        <br><br>

        <label>Gender:</label><br>
        <input type="radio" id="female" name="gender" value="Female">
        <label for="css">Female</label><br>
        <input type="radio" id="male" name="gender" value="Male">
        <label for="javascript">Male</label>

        <br><br>

        <label>Country:</label>
        <select name="country" id="cars">
            <option value="Philippines">Philippines</option>
            <option value="United Kingdom">United Kingdom</option>
            <option value="Japan">Japan</option>
        </select>

        <br><br>

        <label>Birthday:</label>
        <input type="date" id="birthday" name="birthday">

        <br><br>

        <label>Favourite colour/s:</label><br>
            <input type="checkbox" id="color1" name="color[]" value="Red">
            <label for="color1"> Red</label><br>

            <input type="checkbox" id="color2" name="color[]" value="Orange">
            <label for="color2"> Orange</label><br>

            <input type="checkbox" id="color3" name="color[]" value="Yellow">
            <label for="color3"> Yellow</label><br>

            <input type="checkbox" id="color4" name="color[]" value="Green">
            <label for="color4"> Green</label><br>

            <input type="checkbox" id="color5" name="color[]" value="Blue">
            <label for="color5"> Blue</label><br>

            <input type="checkbox" id="color6" name="color[]" value="Indigo">
            <label for="color6"> Indigo</label><br>

            <input type="checkbox" id="color7" name="color[]" value="Violet">
            <label for="color7"> Violet</label>


        <br><br>

        <input type="submit" name="Submit" value="SEND">
    </form>
</body>
</html>