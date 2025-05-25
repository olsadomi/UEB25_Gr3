<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Sponsors</title>
    <link rel="stylesheet" href="/UEB25_Gr3/style/admin_sponsors.css">
</head>
<body>

<?php
        require_once "db.php";
        $sql = "SELECT * FROM sponsors;";
        $result = $conn->query($sql);
?>

<div class="sponsors-container">
    <h1>Menaxhimi i sponsorve</h1>
    <div class="table-responsive">
        <table class="sponsors-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Emri</th>
                    <th>Image Path</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($result->num_rows > 0): ?>
                    <?php while ($row = $result->fetch_assoc()): ?>
                        <tr>
                            <td><?= htmlspecialchars($row['id']) ?></td>
                            <td><?= htmlspecialchars($row['name']) ?></td>
                            <td><?= htmlspecialchars($row['image_path']) ?></td>
                        </tr>
                    <?php endwhile; ?>
                <?php else: ?>
                    <tr><td colspan="10" class="no-data">Nuk ka të dhëna.</td></tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

    <div class="buttons">
        <button type="button" id="shtoBtn" class="btn">Shto sponsor</button>

        <form id="deleteForm" method="POST">
            <input type="hidden" name="delete_id" id="delete_id" value="">
            <button type="button" id="largoBtn" class="btn">Largo sponsor</button>
        </form>
        
    </div>

    <div class="shtoContainer">
        <form method="POST"  enctype="multipart/form-data">
            <label for="Emri">Emri:</label>
            <input type="text" name="emri">
            <label for="Emri">Image Path:</label>
            <input type="file" accept="image/*" name="image-path">
            <button type="submit">Save</button>
        </form>
    </div>
</div>

    <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $emri = $_POST['emri'];
            if (isset($_FILES['image-path']) && $_FILES['image-path']['error'] == 0) {
                $uploadDir = 'Photos/';
                $fileName = basename($_FILES['image-path']['name']);
                $targetPath = $uploadDir . $fileName;

                if (move_uploaded_file($_FILES['image-path']['tmp_name'], $targetPath)) {
                    $stmt = $conn->prepare("INSERT INTO sponsors (name, image_path) VALUES (?, ?)");
                    $stmt->bind_param("ss", $emri, $targetPath);
                    $stmt->execute();
                    header("Location: " . $_SERVER['PHP_SELF']);
                    exit;
                } else {
                    echo "Failed to move uploaded file.";
                }
            }
        }
    ?>



<script>
    let shtoBtn = document.querySelector("#shtoBtn");
    let shtoContainer = document.querySelector(".shtoContainer");
    
    shtoBtn.addEventListener("click",function(){
        if(shtoContainer.style.display == "none"){
            shtoContainer.style.display = "block";
        }else{
            shtoContainer.style.display = "none"
        }
    })

    const tableRows = document.querySelectorAll('.sponsors-table tbody tr');
    let selectedRowId = null;

    tableRows.forEach(row => {
    row.addEventListener('click', () => {
        tableRows.forEach(r => r.classList.remove('selected'));

        row.classList.add('selected');
        selectedRowId = row.cells[0].innerText;
        console.log("Selected ID:", selectedRowId);
        });
    });

    const deleteBtn = document.querySelector("#largoBtn");
    const deleteForm = document.querySelector("#deleteForm");
    const deleteInput = document.querySelector("#delete_id");

    deleteBtn.addEventListener("click", () => {
    if (!selectedRowId) {
        alert("Ju lutem zgjidhni një rresht për të fshirë.");
        return;
    }

    if (confirm("A jeni i sigurt që doni ta fshini këtë sponsor?")) {
        deleteInput.value = selectedRowId;
        deleteForm.submit();
    }
    });
</script>

<?php
    if($_SERVER['REQUEST_METHOD']=='POST'){
        if(isset($_POST['delete_id'])){
            $stmt = $conn->prepare("DELETE FROM sponsors WHERE id=?");
            $stmt -> bind_param("i",$_POST['delete_id']);
            if ($stmt->execute()) {
                header("Location: " . $_SERVER['PHP_SELF']);
                exit;
            } else {
                echo "<script>alert('Gabim gjatë fshirjes së sponsorit.');</script>";
            }
        }
    }
?>

<?php $conn->close(); ?>
</body>
</html>