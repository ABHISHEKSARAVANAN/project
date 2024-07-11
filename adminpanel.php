<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <style>
        #website-iframe {
            width: 1150px;
            height: 100vh;
            border: none;
            z-index: 1000;
        }

        body {
            margin: 0;
            padding: 0;
            height: 100%;
            width: 100%;
        }

        .horizontal-navbar {
            position: absolute;
            left: 0;
            padding-top: 20px;
            padding-left: 10px;
            height: 100%;
            width: 15%;
            background-color: #30694B;
        }

        .left-button {
            background-color: transparent;
            color: white;
            padding: 12px;
            font-size: 16px;
            border: none;
            cursor: pointer;
        }

        .left-button:hover,
        .left-button:active,
        .left-button:focus {
            transform: scale(1.1);
            color: wheat;
        }

        .container-fluid {
            display: flex;
            width: 100%;
            height: 100vh;
        }

        .frame-container {
            position: absolute;
            margin-left: 14%;
            width: 85%;
            height: 100%;
        }

        .dropdown-content {
            display: none;
            background-color: #30694B;
            min-width: 190px;
            z-index: 1;
        }

        .dropdown-content .inner-button {
            background-color: transparent;
            border: none;
            color: white;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
        }

        .dropdown-content .inner-button:hover,
        .dropdown-content .inner-button:active,
        .dropdown-content .inner-button:focus {
            margin-left: 5px;
            color: wheat;
        }

        .show {
            display: block;
        }

        .toggle-button {
            position: absolute;
            top: 10px;
            right: 10px;
            padding: 10px;
            background-color: #30694B;
            color: white;
            border: none;
            cursor: pointer;
        }

        .closed {
            display: none;
            
        }
        .sidebar {
        width: 250px;
        height: 100vh;
        color: white;
        background-color: #214162;
        background-image: url('assets/img/pattern_h.png');
        transition: width 0.3s;
    }
    .sidebar.closed {
        width: 0;
        overflow: hidden;
    }
    .sidebar-toggle-btn {
        position: absolute;
        top: 20px;
        left: 250px;
        background-color: #214162;
        border: none;
        color: white;
        padding: 10px;
        cursor: pointer;
        z-index: 1000;
        transition: left 0.3s;
    }
    .sidebar.closed + .sidebar-toggle-btn {
        left: 0;
    }
    </style>
</head>
<body style="background-color: #E8EFFA;">
    <div class="container-fluid">
        <div class="horizontal-navbar" id="navbar">
            
            <div class="dropdown">
                <button class="left-button" onclick="displayWebsite('dashboard.php')"><i class="bi bi-grid-1x2-fill"></i> Dashboard</button><br>
                <button class="left-button" onclick="displayWebsite('edituser.php')"><i class="bi bi-person"></i> Edit User</button><br>
                <button class="left-button" onclick="toggleDropdown()"><i class="bi bi-plus-square"></i> Insert Products<i class="bi bi-caret-down-fill"></i></button>
                <div id="dropdownContent" class="dropdown-content">
                    <button class="inner-button" onclick="displayWebsite('insert.php')"><i class="bi bi-plus-square"></i> Insert Plants &#127793;</button>
                    <button class="inner-button" onclick="displayWebsite('insertfish.php')"><i class="bi bi-plus-square"></i> Fishes &#128031;</button>
                    <button class="inner-button" onclick="displayWebsite('insertaccessories.php')"><i class="bi bi-plus-square"></i> Accessories &#128160;</button>
                </div>
                <button class="left-button" onclick="displayWebsite('editproduct.php')"><i class="bi bi-pencil-square"></i> Edit Plants &#127793;</button><br>
                <button class="left-button" onclick="displayWebsite('editfish.php')"><i class="bi bi-pencil-square"></i> Edit Fishes &#128031;</button><br>
                <button class="left-button" onclick="displayWebsite('editaccessories.php')"><i class="bi bi-pencil-square"></i> Edit Accessories &#128160;</button><br>
            </div>
        </div>
        <div class="frame-container">
            <div id="iframe-container"></div>
        </div>
    </div>
    
    <script>
        function toggleSidebar() {
            var sidebar = document.getElementById("navbar");
            sidebar.classList.toggle("closed");
        }

        function displayWebsite(url) {
            var iframe = document.createElement("iframe");
            iframe.setAttribute("src", url);
            iframe.setAttribute("id", "website-iframe");

            var container = document.getElementById("iframe-container");
            container.innerHTML = "";
            container.appendChild(iframe);
        }

        function toggleDropdown() {
            var dropdown = document.getElementById("dropdownContent");
            dropdown.classList.toggle("show");
        }

        window.onclick = function(event) {
            if (!event.target.matches('.left-button')) {
                var dropdowns = document.getElementsByClassName("dropdown-content");
                for (var i = 0; i < dropdowns.length; i++) {
                    var openDropdown = dropdowns[i];
                    if (openDropdown.classList.contains('show')) {
                        openDropdown.classList.remove('show');
                    }
                }
            }
        }
    </script>
</body>
</html>
