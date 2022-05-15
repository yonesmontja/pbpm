<!DOCTYPE html>
<html lang="en">

<head>
    <title>Laravel Insert Data into Table without Model </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body>

    <div class="container">
        <h2 class="text-center">Laravel Insert Data into Table without Model</h2>
        <form action="save_user" method="post" enctype='multipart/form-data'>
            @csrf
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
            </div>

            <div class="form-group">
                <label for="pwd">Password:</label>
                <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pwd">
            </div>

            <div class="form-group">
                <label for="country">Country:</label>
                <select name="country" id="country" class="form-control">
                    <option value="india">Indonesia</option>
                    <option value="srilanka">USA</option>
                    <option value="usa">UK</option>
                </select>
            </div>

            <div class="form-group">
                <label>Gender : </label>
                <label for="male">Male</label>
                <input type="radio" name="gender" value="male">
                <label for="female">Female</label>
                <input type="radio" name="gender" value="female">
            </div>

            <div class="form-group">
                <label><strong>Hobbies :</strong></label>
                <label><input type="checkbox" name="hobbies[]" value="Reading"> Reading</label>
                <label><input type="checkbox" name="hobbies[]" value="Writing"> Writing</label>
                <label><input type="checkbox" name="hobbies[]" value="Developing"> Developing</label>
                <label><input type="checkbox" name="hobbies[]" value="Music"> Music</label>
                <label><input type="checkbox" name="hobbies[]" value="Dance"> Dance</label>
            </div>


            <div class="form-group">
                <label for="photo">Photo:</label>
                <input type="file" class="form-control" id="photo" name="photo">
            </div>

            <button type="submit" class="btn btn-default">Submit</button>
        </form>
    </div>

</body>

</html>
