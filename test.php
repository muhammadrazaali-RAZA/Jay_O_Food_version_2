<!DOCTYPE html>
<html>
<head>
    <title>Upcoming Event Pop-up</title>
    <style>
        /* Styles for overlay */
        .overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.1);
        }

        /* Styles for pop-up content */
        .popup {
            
            display: none;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            padding: 20px;
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body>

<!-- Overlay and pop-up content -->
<div class="overlay" id="overlay">
    <h2>asjghdlasdhalkjsh</h2>
</div>
<div class="popup" id="popup">
    <div class="d-flex align-items-center">
        <img class="flex-shrink-0 img-fluid rounded" src="img/menu-7.jpg" alt="" style="width: 500px;">
        <button onclick="closePopup()">Close</button>
    </div>
</div>

<!-- JavaScript to control the pop-up -->
<script>
    // Function to open the pop-up
    function openPopup() {
        document.getElementById("overlay").style.display = "block";
        document.getElementById("popup").style.display = "block";
    }

    // Function to close the pop-up
    function closePopup() {
        document.getElementById("overlay").style.display = "none";
        document.getElementById("popup").style.display = "none";
    }

    // Call the openPopup() function to show the pop-up
    openPopup();
</script>

</body>
</html>
