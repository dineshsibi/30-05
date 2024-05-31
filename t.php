<?php
// Start session at the beginning of the script
session_start();

// Check if register number is set in session
if (!isset($_SESSION['register_number'])) {
    die("No register number found. Please submit the form first.");
}

// Get the register number from the session
$register_number = $_SESSION['register_number'];

require_once('config/db.php');

// Modify the query to filter by register_number
$query = "SELECT * FROM `grievances1` WHERE `register_number` = '$register_number'";
$result = mysqli_query($con, $query); // Corrected this line to include both arguments

if (!$result) {
    die("Query failed: " . mysqli_error($con));
}

// Fetch the grievance type from the result
$grievanceType = '';
if ($row = mysqli_fetch_assoc($result)) {
    $grievanceType = htmlspecialchars($row['grievance_type']);
}

// Define a mapping of grievances to choices
$grievanceChoices = [
    'Course Completion Certificate' => '1',
    'Result' => '2',
    'Current Mark Statement' => '3',
    'Consolidated Mark Statement' => '4',
    'Provisional Certificate' => '5',
    'Grievance Certificate' => '6',
    'PSTM' => '7'
];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document Upload</title>
    <link rel="stylesheet" href="styles3.css">
</head>
<body>
<div class="container">
    <h2>Student Grievances</h2>
    <?php if ($grievanceType): ?>
        <p>Grievance Type: <?php echo $grievanceType; ?></p>
    <?php else: ?>
        <p>No grievances found for this student.</p>
    <?php endif; ?>
</div>

<form id="uploadForm" action="upload.php" method="post" enctype="multipart/form-data">
    <label for="document1" id="label1">Fees Payment Details:</label>
    <input type="file" name="document1" id="document1" accept=".pdf, .doc, .docx">
    
    <label for="document2" id="label2">Hall Ticket:</label>
    <input type="file" name="document2" id="document2" accept=".pdf, .doc, .docx">
    
    <label for="document3" id="label3">Exam Application Form:</label>
    <input type="file" name="document3" id="document3" accept=".pdf, .doc, .docx">
    
    <label for="document4" id="label4">Available Mark Statement:</label>
    <input type="file" name="document4" id="document4" accept=".pdf, .doc, .docx">
    
    <label for="document5" id="label5">Consolidated Mark Statement:</label>
    <input type="file" name="document5" id="document5" accept=".pdf, .doc, .docx">
    
    <label for="document6" id="label6">Course Completion Certificate:</label>
    <input type="file" name="document6" id="document6" accept=".pdf, .doc, .docx">
    
    <label for="document7" id="label7">Application Fees:</label>
    <input type="file" name="document7" id="document7" accept=".pdf, .doc, .docx">
    
    <label for="document8" id="label8">Genuine Certificate Fees:</label>
    <input type="file" name="document8" id="document8" accept=".pdf, .doc, .docx">
    
    <label for="document9" id="label9">PSTM:</label>
    <input type="file" name="document9" id="document9" accept=".pdf, .doc, .docx">
    
    <input type="submit" value="Upload Documents">
</form>

<script>
    const grievanceType = "<?php echo $grievanceType; ?>";
</script>
<script src="uploadsection.js"></script>

<?php
// Close the database connection
mysqli_close($con);
?>
</body>
</html>
