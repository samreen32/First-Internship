<?php
 require_once('database.php');
 $id = $_GET['id'];
 $res = $database->read($id);
 $r = mysqli_fetch_assoc($res);
 if(isset($_POST) & !empty($_POST)){
    $title = $database->sanitize($_POST['title']);
    $fname = $database->sanitize($_POST['fname']);
    $lname = $database->sanitize($_POST['lname']);
    $gender = $_POST['gender'];
    $address =  $database->sanitize($_POST['address']);
    $address2 =  $database->sanitize($_POST['address2']);
    $city = $_POST['city'];
    $state = $_POST['state'];
    $zip = $_POST['zip'];
    $textarea = $_POST['textarea'];
 
	$res = $database->update($title, $fname, $lname, $gender, $address, $address2, $city, $state, $zip, $textarea, $id);
	if($res){
	 	echo "Successfully updated data";
		//header("location:view.php?msg="Successfully submited"");
	}else{
	 	echo "failed to update data";
	}
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<body>
<?php 
    require_once('Navbar.php'); 
?>
    <div class="container">
        <div style="margin-top: 2%;">
            <h1 style="text-align: center;">Civil Aviation Form</h1>
        </div><br>
        <div>
            <form method="post">
            <h4>Personal Information</h4>
                <div class="form-row">
                    <div class="form-group col-md-2">
                        <label class="my-1 mr-2" for="title">Title</label>
                        <select class="form-control" id="title" name="title" >
                            <option selected>Choose...</option>
                            <option value="Mr." <?php if($r['title'] == 'Mr.'){ echo "selected";} ?>>Mr.</option>
                            <option value="Miss" <?php if($r['title'] == 'Miss'){ echo "selected";} ?>>Miss</option>
                            <option value="Mrs" <?php if($r['title'] == 'Mrs'){ echo "selected";} ?>>Mrs</option>
                        </select>
                    </div>

                    <div class="form-group col-md-5">
                        <label for="fname">First Name</label>
                        <input type="text" class="form-control" id="fname" 
                        name="fname" placeholder="e.g. Samreen" value="<?php echo $r['first_name'] ?>">
                    </div>
                    <div class="form-group col-md-5">
                        <label for="lname">Last Name</label>
                        <input type="text" class="form-control" id="lname" 
                        name="lname" placeholder="e.g. Karim" value="<?php echo $r['last_name'] ?>">
                    </div>
                </div>
                <div class="form-group mx-2">
                    <fieldset class="form-group">
                        <div class="row">
                            <legend class="col-form-label col-sm-2 pt-0">Select Gender</legend>
                            <div class="col-sm-10">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="gender" id="male"
                                        value="Male" <?php if($r['gender'] == 'Male'){ echo "checked";} ?>>
                                    <label class="form-check-label" for="male">
                                        Male
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="gender" id="female"
                                        value="Female" <?php if($r['gender'] == 'Female'){ echo "checked";} ?>>
                                    <label class="form-check-label" for="Female">
                                        Female
                                    </label>
                                </div>
                            </div>
                        </div>
                    </fieldset>
                </div>
                <div class="form-group">
                    <label for="address">Address</label>
                    <input type="text" class="form-control" name="address" id="address" 
                        value="<?php echo $r['address'] ?>" placeholder="e.g. 1234 Main St">
                </div>
                <div class="form-group">
                    <label for="address2">Address 2</label>
                    <input type="text" class="form-control" id="address2" name="address2"
                        value="<?php echo $r['address2'] ?>" placeholder="e.g. Apartment, studio, or floor">
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="city">City</label>
                        <input type="text" class="form-control" id="city" name="city"
                            value="<?php echo $r['city'] ?>" placeholder="e.g. Islamabad">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="state">State</label>
                        <select id="state" class="form-control" name="state">
                            <option selected>Choose...</option>
                            <option <?php if($r['state'] == 'Pakistan'){ echo "selected";} ?>>Pakistan</option>
                            <option <?php if($r['state'] == 'Turkey'){ echo "selected";} ?>>Turkey</option>
                            <option <?php if($r['state'] == 'Korea'){ echo "selected";} ?>>Korea</option>
                            <option <?php if($r['state'] == 'Nepal'){ echo "selected";} ?>>Nepal</option>
                            <option <?php if($r['state'] == 'USA'){ echo "selected";} ?>>USA</option>
                        </select>
                    </div>
                    <div class="form-group col-md-2">
                        <label for="zip">Zip</label>
                        <input type="text" class="form-control" id="zip" name="zip"
                        value="<?php echo $r['zip'] ?>" placeholder="e.g. 8000">
                    </div>
                </div>
                <div class="form-group">
                    <label for="textarea">About Yourself</label>
                    <textarea class="form-control" id="textarea" rows="3" name="textarea" 
                    value="<?php echo $r['textarea'] ?>"></textarea>
                </div>
                <input type="submit" class="btn btn-primary col-md-2 col-md-offset-10" value="Update Application" />
            </form>
        </div><br>
       
    </div>
</body>

<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
    integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
    crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
    integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
    crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
    integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
    crossorigin="anonymous"></script>


</html>