<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <title>Add New Hospital</title>
</head>

<body>
    <div class="container my-5">
    <header class="d-flex justify-content-between my-4">
            <h1>Add New Hospital</h1>
            <div>
            <a href="index.php" class="btn btn-primary">Back</a>
            </div>
        </header>
        
        <form action="process.php" method="post">
            <div class="form-elemnt my-4">
                <input type="text" class="form-control" name="findhosp" placeholder="Hospital Name:">
            </div>
            <div class="form-elemnt my-4">
                <select name="specialized" id="" class="form-control"> 	     
                    <option value="">Doctor Specialized For:</option>
                    <option value="Internal medicine">Internal medicine</option>
                    <option value="Ophthalmology">Ophthalmology</option>
                    <option value="Plastic surgery">Plastic surgery</option>
                    <option value="Radiology">Radiology</option>
                    <option value="Family medicine">Family medicine</option>
                </select>
            </div>
            <div class="form-elemnt my-4">
                <input type="text" class="form-control" name="doctor" placeholder="Doctor Name:">
            </div>

            <div class="form-element my-4">
                <textarea name="description" id="" class="form-control" placeholder="Hospital Description:"></textarea>
            </div>
            <div class="form-element my-4">
                <input type="submit" name="create" value="Add Hospital" class="btn btn-primary">
            </div>
        </form>
    </div>
</body>
</html>