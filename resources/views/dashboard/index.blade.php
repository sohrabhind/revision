@extends('layouts.dashboard')
@section('title', $viewData["title"])
@section('content')
<?php
session_start();
$no_login = "false";
if ($_SESSION["id"] == "" || $_SESSION["name"] == "" || $_SESSION["username"] == "") {
    $no_login = "true";
}
$id_user = $_SESSION["id"];
?>
<?php
if ($no_login == "true") {
    echo "<script>
        Swal.fire ({
            icon: 'error',
            text: 'Please login first !',
            allowOutsideClick: false,
        }).then((result)=> {
            if (result.isConfirmed) {
                window.location.href = '../index.php';
            }
        });
    </script>";
}
?>
<header>
    <div class="row">
        <div class="col-md-10">
        </div>
        <div class="col-md-2">
            <div id="myDropdown" class="dropdown-content">
                <h5>User Profile</h5>
                <div class="profile-detail">
                    <p>User ID : <?= $_SESSION["id"] ?></p>
                    <p>Username : <?= $_SESSION["username"] ?></p>
                    <p>Name : <?= $_SESSION["name"] ?></p>
                </div>
                <div class="logout-btn">
                    <a href="backend/logout.php">
                        <span class="logout-text">Logout</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</header>
<div class="container-fluid">
    <div class="row">
        <form action="backend/save_todo_list.php" method="POST">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="task_name">Task : </label>
                    <textarea type="text" class="form-control" id="task_name" class="task_name" name="task_name" autocomplete="off" required></textarea>
                </div>
                <div class="form-group">
                    <label for="interval">Intervals :</label>
                    <select class="form-control" id="interval" name="interval" class="interval" required>
                        <option value="2">Low: 2</option>
                        <option value="3">Medium: 3</option>
                        <option value="4">High: 4</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="date">Start Date : </label>
                    <input type="date" name="date" id="date" class="form-control" name="date" value="<?php echo date("Y-m-d"); ?>" minx="<?php echo date("Y-m-d"); ?>" required>
                </div>
                <div class="form-group">
                    <label for="date">Notification Time : </label>
                    <input type="time" name="time" id="time" class="form-control" name="date" value="<?php echo date("H:i"); ?>" required>
                </div>
                <div class="two-btn mt-5">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="submit-btn">
                                <button type="submit" class="btn btn-primary" id="submit">Submit</button>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="see-finished">
                                <a href="finished.php">
                                    <button type="button" class="btn btn-danger" id="finished">Finished List</button>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

</div>

@endsection