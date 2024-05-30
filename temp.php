<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document Upload</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        h2 {
            color: #333;
        }

        button {
            margin: 5px;
            padding: 10px 20px;
            font-size: 16px;
            color: white;
            background-color: #007BFF;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        button:hover {
            background-color: #0056b3;
        }

        form {
            margin-top: 20px;
        }

        label {
            display: block;
            margin-top: 15px;
            font-weight: bold;
            color: #555;
        }

        input[type="file"] {
            margin-top: 5px;
        }

        input[type="submit"] {
            margin-top: 20px;
            padding: 10px 20px;
            font-size: 16px;
            color: white;
            background-color: #28a745;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #218838;
        }
    </style>
</head>
<body>
    <h2>Choose an option:</h2>
    <button id="choice1">1</button>
    <button id="choice2">2</button>
    <form id="uploadForm" action="upload.php" method="post" enctype="multipart/form-data">
        <label for="document1" id="label1">Fees Payment Details:</label>
        <input type="file" name="document1" id="document1" accept=".pdf, .doc, .docx">
        
        <label for="document2" id="label2">Hall Ticket:</label>
        <input type="file" name="document2" id="document2" accept=".pdf, .doc, .docx">
        
        <label for="document3" id="label3">Exam Application Form:</label>
        <input type="file" name="document3" id="document3" accept=".pdf, .doc, .docx" hidden>
        
        <label for="document4" id="label4">Available Mark Statement:</label>
        <input type="file" name="document4" id="document4" accept=".pdf, .doc, .docx" hidden>
        
        <label for="document5" id="label5">Consolidated Mark Statement:</label>
        <input type="file" name="document5" id="document5" accept=".pdf, .doc, .docx" hidden>
        
        <label for="document6" id="label6">Course Completion Certificate:</label>
        <input type="file" name="document6" id="document6" accept=".pdf, .doc, .docx" hidden>
        
        <label for="document7" id="label7">Application Fees:</label>
        <input type="file" name="document7" id="document7" accept=".pdf, .doc, .docx" hidden>
        
        <input type="submit" value="Upload Documents">
    </form>

    <script>
        // Function to toggle visibility of sections based on choice
        function toggleSections(choice) {
            var start, end;
            if (choice === '1') {
                start = 1;
                end = 2;
            } else if (choice === '2') {
                start = 3;
                end = 4;
            } else {
                // Default to show first two sections if choice is invalid
                start = 1;
                end = 2;
            }

            for (var i = 1; i <= 7; i++) {
                var section = document.getElementById('document' + i);
                var label = document.getElementById('label' + i);
                if (i >= start && i <= end) {
                    section.hidden = false;
                    label.hidden = false;
                } else {
                    section.hidden = true;
                    label.hidden = true;
                }
            }
        }

        // Initially hide all sections except the first two
        toggleSections('1');

        // Event listeners for choice buttons
        document.getElementById('choice1').addEventListener('click', function() {
            toggleSections('1');
        });

        document.getElementById('choice2').addEventListener('click', function() {
            toggleSections('2');
        });

        // Prevent form submission for now
        document.getElementById('uploadForm').addEventListener('submit', function(event) {
            event.preventDefault();
            // Form submission logic can be added here
        });
    </script>
</body>
</html>
