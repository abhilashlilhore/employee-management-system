<?php
require_once '../../common/auth.php';
require_once '../../common/config.php';

// Secure ID
$id = intval($_GET['id']);

$result = $conn->query("SELECT * FROM employees WHERE id='$id'");
$employee = $result->fetch_assoc();

if (!$employee) {
    die("Employee not found");
}
?>

<?php include '../../common/header.php'; ?>

<style>
    .profile-card {
        border: none;
        border-radius: 18px;
        overflow: hidden;
        box-shadow: 0 4px 18px rgba(0,0,0,0.08);
        background: #fff;
    }

    .profile-header {
        background: linear-gradient(135deg, #0d6efd, #0a58ca);
        padding: 40px 30px;
        color: #fff;
        text-align: center;
    }

    .profile-avatar {
        width: 90px;
        height: 90px;
        border-radius: 50%;
        background: rgba(255,255,255,0.2);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 40px;
        margin: auto;
        margin-bottom: 15px;
    }

    .info-box {
        border-radius: 12px;
        background: #f8f9fa;
        padding: 18px;
        height: 100%;
    }

    .info-label {
        font-size: 13px;
        color: #6c757d;
        margin-bottom: 5px;
    }

    .info-value {
        font-weight: 600;
        font-size: 16px;
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
                    <i class="bi bi-person-badge-fill text-primary me-2"></i>
                    Employee Profile
                </h2>

                <a href="list.php" class="btn btn-dark rounded-3">
                    <i class="bi bi-arrow-left"></i> Back
                </a>

            </div>

            <!-- Profile Card -->
            <div class="profile-card">

                <!-- Top Header -->
                <div class="profile-header">

                    <div class="profile-avatar">
                        <i class="bi bi-person-fill"></i>
                    </div>

                    <h3 class="mb-1">
                        <?php echo $employee['first_name'] . ' ' . $employee['last_name']; ?>
                    </h3>

                    <p class="mb-0">
                        <?php echo $employee['designation']; ?>
                    </p>

                </div>

                <!-- Profile Details -->
                <div class="card-body p-4">

                    <div class="row g-4">

                        <div class="col-md-4">
                            <div class="info-box">
                                <div class="info-label">Employee Code</div>
                                <div class="info-value">
                                    <?php echo $employee['employee_code']; ?>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="info-box">
                                <div class="info-label">Email Address</div>
                                <div class="info-value">
                                    <?php echo $employee['email']; ?>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="info-box">
                                <div class="info-label">Phone Number</div>
                                <div class="info-value">
                                    <?php echo $employee['phone']; ?>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="info-box">
                                <div class="info-label">Department</div>
                                <div class="info-value">
                                    <?php echo $employee['department']; ?>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="info-box">
                                <div class="info-label">Designation</div>
                                <div class="info-value">
                                    <?php echo $employee['designation']; ?>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="info-box">
                                <div class="info-label">Basic Salary</div>
                                <div class="info-value text-success">
                                    ₹<?php echo number_format($employee['basic_salary'], 2); ?>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="info-box">
                                <div class="info-label">Joining Date</div>
                                <div class="info-value">
                                    <?php echo date('d M Y', strtotime($employee['joining_date'])); ?>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="info-box">
                                <div class="info-label">Status</div>

                                <div class="info-value">
                                    <?php if($employee['status'] == 'active') { ?>

                                        <span class="badge bg-success">
                                            Active
                                        </span>

                                    <?php } else { ?>

                                        <span class="badge bg-danger">
                                            Inactive
                                        </span>

                                    <?php } ?>
                                </div>
                            </div>
                        </div>

                    </div>

                    <!-- Action Buttons -->
                    <div class="mt-4 d-flex gap-2">

                        <a href="edit.php?id=<?php echo $employee['id']; ?>"
                           class="btn btn-primary rounded-3">

                            <i class="bi bi-pencil-square"></i>
                            Edit Employee
                        </a>

                        <a href="list.php"
                           class="btn btn-secondary rounded-3">

                            Cancel
                        </a>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

<?php include '../../common/footer.php'; ?>