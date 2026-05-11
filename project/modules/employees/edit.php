<?php
require_once '../../common/auth.php';
require_once '../../common/config.php';

// Secure ID
$id = intval($_GET['id']);

$getEmployee = $conn->query("SELECT * FROM employees WHERE id='$id'");
$employee = $getEmployee->fetch_assoc();

if (!$employee) {
    die("Employee not found");
}

$message = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // Secure Inputs
    $first_name   = mysqli_real_escape_string($conn, $_POST['first_name']);
    $last_name    = mysqli_real_escape_string($conn, $_POST['last_name']);
    $email        = mysqli_real_escape_string($conn, $_POST['email']);
    $phone        = mysqli_real_escape_string($conn, $_POST['phone']);
    $department   = mysqli_real_escape_string($conn, $_POST['department']);
    $designation  = mysqli_real_escape_string($conn, $_POST['designation']);
    $basic_salary = mysqli_real_escape_string($conn, $_POST['basic_salary']);
    $status       = mysqli_real_escape_string($conn, $_POST['status']);

    $sql = "UPDATE employees SET
        first_name='$first_name',
        last_name='$last_name',
        email='$email',
        phone='$phone',
        department='$department',
        designation='$designation',
        basic_salary='$basic_salary',
        status='$status'
        WHERE id='$id'";

    if ($conn->query($sql)) {
        header('Location: list.php');
        exit;
    } else {
        $message = "Error updating employee";
    }
}
?>

<?php include '../../common/header.php'; ?>

<style>
    .edit-card {
        border: none;
        border-radius: 18px;
        overflow: hidden;
        box-shadow: 0 4px 18px rgba(0,0,0,0.08);
        background: #fff;
    }

    .edit-header {
        background: linear-gradient(135deg, #0d6efd, #0a58ca);
        padding: 25px 30px;
        color: #fff;
    }

    .form-control,
    .form-select {
        border-radius: 10px;
        padding: 12px;
    }

    .form-label {
        font-weight: 600;
        margin-bottom: 8px;
    }

    .btn {
        border-radius: 10px;
        padding: 10px 22px;
    }
</style>

<div class="main-container d-flex">

    <!-- Sidebar -->
    <?php include '../../common/sidebar.php'; ?>

    <div class="content-area flex-grow-1 p-4">

        <!-- Navbar -->
        <?php include '../../common/navbar.php'; ?>

        <div class="container-fluid">

            <!-- Page Header -->
            <div class="d-flex justify-content-between align-items-center mb-4">

                <h2 class="fw-bold">
                    <i class="bi bi-pencil-square text-primary me-2"></i>
                    Edit Employee
                </h2>

                <a href="list.php" class="btn btn-dark">
                    <i class="bi bi-arrow-left"></i> Back
                </a>

            </div>

            <!-- Error Message -->
            <?php if(!empty($message)) { ?>

                <div class="alert alert-danger">
                    <?php echo $message; ?>
                </div>

            <?php } ?>

            <!-- Edit Form Card -->
            <div class="edit-card">

                <!-- Card Header -->
                <div class="edit-header">

                    <h4 class="mb-1">
                        <?php echo $employee['first_name'].' '.$employee['last_name']; ?>
                    </h4>

                    <p class="mb-0">
                        Update employee information
                    </p>

                </div>

                <!-- Form Body -->
                <div class="card-body p-4">

                    <form method="POST">

                        <div class="row">

                            <!-- First Name -->
                            <div class="col-md-6 mb-3">
                                <label class="form-label">
                                    First Name
                                </label>

                                <input type="text"
                                       name="first_name"
                                       class="form-control"
                                       value="<?php echo $employee['first_name']; ?>"
                                       required>
                            </div>

                            <!-- Last Name -->
                            <div class="col-md-6 mb-3">
                                <label class="form-label">
                                    Last Name
                                </label>

                                <input type="text"
                                       name="last_name"
                                       class="form-control"
                                       value="<?php echo $employee['last_name']; ?>"
                                       required>
                            </div>

                            <!-- Email -->
                            <div class="col-md-6 mb-3">
                                <label class="form-label">
                                    Email Address
                                </label>

                                <input type="email"
                                       name="email"
                                       class="form-control"
                                       value="<?php echo $employee['email']; ?>">
                            </div>

                            <!-- Phone -->
                            <div class="col-md-6 mb-3">
                                <label class="form-label">
                                    Phone Number
                                </label>

                                <input type="text"
                                       name="phone"
                                       class="form-control"
                                       value="<?php echo $employee['phone']; ?>">
                            </div>

                            <!-- Department -->
                            <div class="col-md-6 mb-3">
                                <label class="form-label">
                                    Department
                                </label>

                                <input type="text"
                                       name="department"
                                       class="form-control"
                                       value="<?php echo $employee['department']; ?>">
                            </div>

                            <!-- Designation -->
                            <div class="col-md-6 mb-3">
                                <label class="form-label">
                                    Designation
                                </label>

                                <input type="text"
                                       name="designation"
                                       class="form-control"
                                       value="<?php echo $employee['designation']; ?>">
                            </div>

                            <!-- Salary -->
                            <div class="col-md-6 mb-3">
                                <label class="form-label">
                                    Basic Salary
                                </label>

                                <input type="number"
                                       step="0.01"
                                       name="basic_salary"
                                       class="form-control"
                                       value="<?php echo $employee['basic_salary']; ?>">
                            </div>

                            <!-- Status -->
                            <div class="col-md-6 mb-3">
                                <label class="form-label">
                                    Status
                                </label>

                                <select name="status" class="form-select">

                                    <option value="active"
                                        <?php if($employee['status'] == 'active') echo 'selected'; ?>>
                                        Active
                                    </option>

                                    <option value="inactive"
                                        <?php if($employee['status'] == 'inactive') echo 'selected'; ?>>
                                        Inactive
                                    </option>

                                </select>
                            </div>

                        </div>

                        <!-- Buttons -->
                        <div class="mt-4 d-flex gap-2">

                            <button type="submit" class="btn btn-primary">
                                <i class="bi bi-save"></i>
                                Update Employee
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