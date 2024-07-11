<?php 
$conn=mysqli_connect("localhost","root","","bill");
session_start();

// Check if the user is logged in
if(!isset($_SESSION['email'])) {
    header("location:login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="images/logo.png" type="image/x-icon">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <div class="navbar" id="navbar">
        <div class="navbar-toggle" id="navbarToggle">&#9776;</div>
        <ul class="nav-links" id="navLinks">
            <li> <button class="left-button" onclick="displayWebsite('dashboard.php')"><i class="bi bi-grid-1x2-fill"></i> Dashboard</button></li>
            <li class="dropdown">
                <button class="left-button"><i class="bi bi-person-vcard"></i> Wedding</button>
                <div class="dropdown-content">
                    <button class="inner-button" onclick="displayWebsite('details.php')"><i class="bi bi-plus-square"></i> Add Details</button>
                    <button class="inner-button" onclick="displayWebsite('viewdetails.php')"><i class="bi bi-pencil-square"></i> Edit</button>
                </div>
            </li>
            
            <button class="left-button" style="margin-top:450px;font-size: 20px;height: 30px;
        background-color: transparent;
        color: white;
        text-decoration: none;
        display: block;
        border: none;
        width: 100%;
        text-align:left;
        padding: 10px 20px;
        margin-left:20px;
        box-sizing: border-box;" onclick="location.href='logout.php'"><i class="bi bi-box-arrow-left"></i> Logout</button>
        </ul>
            </div>
            <body  onload="loadDashboard()">
    <div class="content" id="content">
        <nav class="content-navbar">
            <h2 style="text-align:center;font-family:'Times New Roman', Times, serif;font-weight:300;"><img src="images/logo.png" style="width:50px;height:50px;"> Lv Wedding</h2>
        </nav>
        <div id="iframe-container" style="margin-top:60px"></div>
    </div>
</body>
<style>
    body {
        background-color: #E8EFFA;
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        display: flex;
    }
    #website-iframe {
        margin-top:50px;
        width: 100%;
        height: 100vh;
        border: none;
        z-index: 1000;
    }
    .navbar {
        z-index: 1000;
        background-color: #30694B;
        width: 250px;
        min-height: 100vh;
        overflow: hidden;
        transition: width 0.3s;
        position: relative;
    }
    .navbar-toggle {
        
        display: block;
        font-size: 30px;
        color: white;
        padding: 10px 20px;
        cursor: pointer;
        background-color: #30694B;
        text-align: center;
    }
    .nav-links {
        list-style: none;
        margin: 0;
        padding: 0;
    }
    .nav-links li {
        padding: 14px 20px;
        position: relative;
    }
    .nav-links li button {
        
        font-size: 20px;
        height: 30px;
        background-color: transparent;
        color: white;
        text-decoration: none;
        display: block;
        border: none;
        width: 100%;
        text-align: left;
        padding: 10px 20px;
        box-sizing: border-box;
    }
    .left-button:hover, .left-button:active, .left-button:focus {
        color: wheat;
        transform: scale(1.1);
        -webkit-transform: scale(1.1);
    }
    .inner-button:hover {
        margin-left: 10px;
        color: wheat;
    }
    .dropdown {
        position: relative;
    }
    .dropdown-content {
        display: none;
        background-color: transparent;
        min-width: 200px;
        z-index: 1;
    }
    .dropdown-content .inner-button {
        background-color: transparent;
        border: none;
        padding: 12px 16px;
        text-decoration: none;
        font-size: medium;
        display: block;
        text-align: left;
        padding-left: 30px;
    }
    .dropdown:hover .dropdown-content {
        display: block;
    }
    .content {
        flex-grow: 1;
        padding: 20px;
    }
    .content-navbar{
        position:absolute;
        width:100%;
        left:0;
        top: 0;
        max-width: 100%;
        height:100px;
        background-color: #30694B;
        color:white;
    }
    .navbar.collapsed {
        width: 60px;
    }
    .navbar.collapsed .nav-links {
        display: none;
    }
    .navbar.collapsed .nav-links li {
        text-align: center;
    }
    @media (max-width: 768px) {
        body {
            flex-direction: column;
        }
        .navbar {
            width: 100%;
            height: auto;
        }
        .navbar.collapsed {
            width: 100%;
            height: auto;
        }
        .navbar-toggle {
            background-color: #333;
            text-align: center;
        }
        .nav-links {
            display: none;
            width: 100%;
        }
        .navbar.collapsed .nav-links {
            display: none;
        }
        .navbar.collapsed .nav-links li a {
            display: block;
        }
    }
</style>
<script>

    function loadDashboard(){
        displayWebsite('dashboard.php');  
    }

    document.getElementById('navbarToggle').addEventListener('click', function() {
        var navbar = document.getElementById('navbar');
        var navLinks = document.getElementById('navLinks');
        
        if (navbar.classList.contains('collapsed')) {
            navbar.classList.remove('collapsed');
            navLinks.style.display = 'block';
        } else {
            navbar.classList.add('collapsed');
            navLinks.style.display = 'none';
        }
    });

    function displayWebsite(url) {
        var iframe = document.createElement("iframe");
        iframe.setAttribute("src", url);
        iframe.setAttribute("id", "website-iframe");
        
        var container = document.getElementById("iframe-container");
        container.innerHTML = "";
        container.appendChild(iframe);
    }
</script>
</html>
