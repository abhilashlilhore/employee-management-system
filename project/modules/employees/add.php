<?php
require_once '../../common/auth.php';
require_once '../../common/config.php';

$message = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // Secure Input Handling
    $employee_code = mysqli_real_escape_string($conn, $_POST['employee_code']);
    $first_name    = mysqli_real_escape_string($conn, $_POST['first_name']);
    $last_name     = mysqli_real_escape_string($conn, $_POST['last_name']);
    $email         = mysqli_real_escape_string($conn, $_POST['email']);
    $phone         = mysqli_real_escape_string($conn, $_POST['phone']);
    $department    = mysqli_real_escape_string($conn, $_POST['department']);
    $designation   = mysqli_real_escape_string($conn, $_POST['designation']);
    $joining_date  = mysqli_real_escape_string($conn, $_POST['joining_date']);
    $basic_salary  = mysqli_real_escape_string($conn, $_POST['basic_salary']);

    $sql = "INSERT INTO employees(
        employee_code,
        first_name,
        last_name,
        email,
        phone,
        department,
        designation,
        joining_date,
        basic_salary
    ) VALUES (
        '$employee_code',
        '$first_name',
        '$last_name',
        '$email',
        '$phone',
        '$department',
        '$designation',
        '$joining_date',
        '$basic_salary'
    )";

    if ($conn->query($sql)) {
        header('Location: list.php');
        exit;
    } else {
        $message = "Error: " . $conn->error;
    }
}
?>


<?php include '../../common/header.php'; ?>
<div class="main-container">

    <!-- Sidebar -->
    <?php include '../../common/sidebar.php'; ?>

    <div class="content-area">

        <!-- Navbar -->
        <?php include '../../common/navbar.php'; ?>

        <div class="container-fluid mt-4">

            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2 class="page-title">
                    <i class="bi bi-person-plus-fill"></i> Add Employee
                </h2>

                <a href="list.php" class="btn btn-dark">
                    <i class="bi bi-arrow-left"></i> Back
                </a>
            </div>

            <?php if(!empty($message)) { ?>
                <div class="alert alert-danger">
                    <?php echo $message; ?>
                </div>
            <?php } ?>

            <div class="card">
                <div class="card-body p-4">

                    <form method="POST">

                        <div class="row">

                            <div class="col-md-4 mb-3">
                                <label class="form-label">Employee Code</label>
                                <input type="text"
                                       name="employee_code"
                                       class="form-control"
                                       placeholder="EMP001"
                                       required>
                            </div>

                            <div class="col-md-4 mb-3">
                                <label class="form-label">First Name</label>
                                <input type="text"
                                       name="first_name"
                                       class="form-control"
                                       placeholder="John"
                                       required>
                            </div>

                            <div class="col-md-4 mb-3">
                                <label class="form-label">Last Name</label>
                                <input type="text"
                                       name="last_name"
                                       class="form-control"
                                       placeholder="Doe"
                                       required>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label">Email Address</label>
                                <input type="email"
                                       name="email"
                                       class="form-control"
                                       placeholder="john@example.com">
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label">Phone Number</label>
                                <input type="text"
                                       name="phone"
                                       class="form-control"
                                       placeholder="+91 9876543210">
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label">Department</label>
                                <input type="text"
                                       name="department"
                                       class="form-control"
                                       placeholder="HR">
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label">Designation</label>
                                <input type="text"
                                       name="designation"
                                       class="form-control"
                                       placeholder="Manager">
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label">Joining Date</label>
                                <input type="date"
                                       name="joining_date"
                                       class="form-control">
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label">Basic Salary</label>
                                <input type="number"
                                       step="0.01"
                                       name="basic_salary"
                                       class="form-control"
                                       placeholder="50000">
                            </div>

                        </div>

                        <div class="mt-4">
                            <button type="submit" class="btn btn-primary">
                                <i class="bi bi-save"></i> Save Employee
                            </button>

                            <a href="list.php" class="btn btn-secondary">
                                Cancel
                            </a>
                        </div>

                    </form>

                </div>
            </div>

        </div>

    </div>

</div>
<?php include '../../common/footer.php'; ?>
