<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Barcode Scanner</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
<input type="text" id="barcodeInput" placeholder="Scan barcode here">

<script>
    $(document).ready(function () {
        $('#barcodeInput').focus();
        // Listen for keyboard input in the barcode input field
        $('#barcodeInput').on('keydown', function (e) {
            // Check if the Enter key was pressed (or other trigger key)
            if (e.which === 13) {
                // Barcode data is in the input field value
                var barcodeData = $(this).val();

                // You can now process the barcode data as needed
                alert('Scanned barcode: ' + barcodeData);

                // Clear the input field for the next scan
                $(this).val('');
            }
        });
    });
</script>
</body>
</html>
