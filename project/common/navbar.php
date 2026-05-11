<?php
$user_name = $_SESSION['name'] ?? 'User';
$user_role = $_SESSION['role'] ?? 'Employee';
?>

<!-- Top Navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm px-4 py-3 rounded-3 mb-4">

    <div class="container-fluid">

        <!-- Left Side -->
        <div class="d-flex align-items-center">
            <h4 class="mb-0 fw-bold text-primary">
                <i class="bi bi-people-fill me-2"></i>
                Employee Management System
            </h4>
        </div>

        <!-- Right Side -->
        <div class="d-flex align-items-center gap-3 ms-auto">

            <!-- Search Box -->
            <form class="d-none d-md-flex">
                <div class="input-group">
                    <span class="input-group-text bg-light border-end-0">
                        <i class="bi bi-search"></i>
                    </span>

                    <input type="text"
                           class="form-control border-start-0"
                           placeholder="Search here...">
                </div>
            </form>

            <!-- User Info -->
            <div class="dropdown">

                <button class="btn btn-light border dropdown-toggle d-flex align-items-center gap-2"
                        type="button"
                        data-bs-toggle="dropdown"
                        aria-expanded="false">

                    <div class="bg-primary text-white rounded-circle d-flex justify-content-center align-items-center"
                         style="width:40px;height:40px;">

                        <i class="bi bi-person-fill"></i>
                    </div>

                    <div class="text-start d-none d-md-block">
                        <small class="text-muted d-block">
                            <?php echo ucfirst($user_role); ?>
                        </small>

                        <strong>
                            <?php echo htmlspecialchars($user_name); ?>
                        </strong>
                    </div>

                </button>

                <!-- Dropdown Menu -->
                <ul class="dropdown-menu dropdown-menu-end shadow border-0">

                    <li>
                        <a class="dropdown-item" href="#">
                            <i class="bi bi-person-circle me-2"></i>
                            Profile
                        </a>
                    </li>

                    <li>
                        <a class="dropdown-item" href="#">
                            <i class="bi bi-gear me-2"></i>
                            Settings
                        </a>
                    </li>

                    <li><hr class="dropdown-divider"></li>

                    <li>
                        <a class="dropdown-item text-danger" href="../../logout.php">
                            <i class="bi bi-box-arrow-right me-2"></i>
                            Logout
                        </a>
                    </li>

                </ul>

            </div>

        </div>

    </div>

</nav>