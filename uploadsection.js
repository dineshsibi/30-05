document.addEventListener("DOMContentLoaded", function () {
    const labels = [
        document.getElementById('label1'),
        document.getElementById('label2'),
        document.getElementById('label3'),
        document.getElementById('label4'),
        document.getElementById('label5'),
        document.getElementById('label6'),
        document.getElementById('label7'),
        document.getElementById('label8'),
        document.getElementById('label9')
    ];

    function hideAllLabels() {
        labels.forEach(label => {
            if (label) {
                label.style.display = 'none';
                const input = label.nextElementSibling;
                if (input) input.style.display = 'none';
            }
        });
    }

    function showLabels(indices) {
        indices.forEach(index => {
            if (labels[index]) {
                labels[index].style.display = 'block';
                const input = labels[index].nextElementSibling;
                if (input) input.style.display = 'block';
            }
        });
    }

    hideAllLabels();

    switch (grievanceType) {
        case 'Course Completion Certificate':
            showLabels([0]); // 'Fees Payment Details' and 'Course Completion Certificate'
            break;
        case 'Result':
            showLabels([0, 1, 2]); // 'Fees Payment Details', 'Hall Ticket', and 'Exam Application Form'
            break;
        case 'Current Mark Statement':
            showLabels([3]); // 'Available Mark Statement'
            break;
        case 'Consolidated Mark Statement':
            showLabels([0, 1, 2,3 ]); // 'Fees Payment Details', 'Hall Ticket', 'Exam Application Form', and 'Consolidated Mark Statement'
            break;
        case 'Provisional Certificate':
            showLabels([0, 1, 2, 3]); // Adjust indices as per requirement
            break;
        case 'Genuine Certificate':
            showLabels([0]); // Adjust indices as per requirement
            break;
        case 'PSTM':
            showLabels([8]); // 'Fees Payment Details' and 'PSTM'
            break;
        default:
            // No default action
            break;
    }
});
