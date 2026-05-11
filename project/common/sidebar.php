<?php
$current_page = basename($_SERVER['PHP_SELF']);
?>

<style>
    .sidebar {
        width: 270px;
        min-height: 100vh;
        background: #212529;
        color: #fff;
        position: sticky;
        top: 0;
    }

    .sidebar .nav-link {
        color: #adb5bd;
        padding: 12px 18px;
        border-radius: 10px;
        margin-bottom: 6px;
        transition: 0.3s;
        font-weight: 500;
    }

    .sidebar .nav-link:hover {
        background: rgba(255,255,255,0.08);
        color: #fff;
    }

    .sidebar .nav-link.active {
        background: #0d6efd;
        color: #fff !important;
    }

    .sidebar .menu-title {
        font-size: 12px;
        text-transform: uppercase;
        color: #6c757d;
        margin-top: 25px;
        margin-bottom: 10px;
        padding-left: 18px;
    }

    .logo-box {
        border-bottom: 1px solid rgba(255,255,255,0.08);
    }
</style>

<!-- Sidebar -->
<div class="sidebar d-flex flex-column p-3 shadow">

    <!-- Logo -->
    <div class="logo-box text-center py-3 mb-4">
        <h3 class="fw-bold text-white mb-0">
            <i class="bi bi-people-fill text-primary"></i> HRMS
        </h3>
    </div>

    <!-- Navigation -->
    <ul class="nav nav-pills flex-column mb-auto">

        <li class="nav-item">
            <a href="../../dashboard.php"
               class="nav-link <?php echo ($current_page == 'dashboard.php') ? 'active' : ''; ?>">

                <i class="bi bi-speedometer2 me-2"></i>
                Dashboard
            </a>
        </li>

        <div class="menu-title">Management</div>

        <li>
            <a href="../../modules/employees/list.php"
               class="nav-link <?php echo ($current_page == 'list.php') ? 'active' : ''; ?>">

                <i class="bi bi-people me-2"></i>
                Employee Management
            </a>
        </li>

        <li>
            <a href="../../modules/attendance/list.php"
               class="nav-link">

                <i class="bi bi-calendar-check me-2"></i>
                Attendance
            </a>
        </li>

        <li>
            <a href="../../modules/leaves/list.php"
               class="nav-link">

                <i class="bi bi-calendar-event me-2"></i>
                Leave Management
            </a>
        </li>

        <li>
            <a href="../../modules/payroll/list.php"
               class="nav-link">

                <i class="bi bi-cash-stack me-2"></i>
                Payroll
            </a>
        </li>

        <li>
            <a href="../../modules/recruitment/list.php"
               class="nav-link">

                <i class="bi bi-person-plus me-2"></i>
                Recruitment
            </a>
        </li>

        <li>
            <a href="../../modules/performance/list.php"
               class="nav-link">

                <i class="bi bi-graph-up-arrow me-2"></i>
                Performance
            </a>
        </li>

        <li>
            <a href="../../modules/documents/list.php"
               class="nav-link">

                <i class="bi bi-folder2-open me-2"></i>
                Documents
            </a>
        </li>

        <li>
            <a href="../../modules/reports/list.php"
               class="nav-link">

                <i class="bi bi-bar-chart-line me-2"></i>
                Reports
            </a>
        </li>

    </ul>

    <!-- Footer -->
    <div class="mt-auto pt-4 border-top border-secondary">

        <a href="../../logout.php"
           class="btn btn-outline-light w-100 rounded-3">

            <i class="bi bi-box-arrow-right me-2"></i>
            Logout
        </a>

    </div>

</div>