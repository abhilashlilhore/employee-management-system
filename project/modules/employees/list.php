<?php
require_once '../../common/auth.php';
require_once '../../common/config.php';

$search = $_GET['search'] ?? '';

$sql = "SELECT * FROM employees WHERE first_name LIKE '%$search%' OR last_name LIKE '%$search%' ORDER BY id DESC";
$result = $conn->query($sql);
?>

<?php include '../../common/header.php'; ?>

<div class="main-container">

<?php include '../../common/sidebar.php'; ?>

<div class="content-area">

<?php include '../../common/navbar.php'; ?>

<div class="page-content">

    <div class="page-header">
        <h2>Employee List</h2>
        <a href="add" class="btn">Add Employee</a>
    </div>

    <form method="GET" class="search-form">
        <input type="text" name="search" placeholder="Search Employee..." value="<?php echo $search; ?>">
        <button type="submit">Search</button>
    </form>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Employee Code</th>
                <th>Name</th>
                <th>Department</th>
                <th>Designation</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>

        <?php while($row = $result->fetch_assoc()): ?>

            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['employee_code']; ?></td>
                <td><?php echo $row['first_name'].' '.$row['last_name']; ?></td>
                <td><?php echo $row['department']; ?></td>
                <td><?php echo $row['designation']; ?></td>
                <td><?php echo ucfirst($row['status']); ?></td>
                <td>
                    <a href="view?id=<?php echo $row['id']; ?>">View</a>
                    <a href="edit?id=<?php echo $row['id']; ?>">Edit</a>
                    <a href="delete?id=<?php echo $row['id']; ?>" onclick="return confirm('Delete Employee?')">Delete</a>
                </td>
            </tr>

        <?php endwhile; ?>

        </tbody>
    </table>

</div>

</div>

</div>
<?php include '../../common/footer.php'; ?>