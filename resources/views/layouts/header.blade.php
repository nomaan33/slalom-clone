<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <!-- Basic CSS for layout -->
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            display: flex;
        }
        .sidebar {
            height: 100vh;
            width: 250px;
            background-color: #333;
            color: white;
            padding: 1rem;
            position: fixed;
        }
        .sidebar h2 {
            margin: 0;
            font-size: 1.5rem;
        }
        .sidebar ul {
            list-style: none;
            padding: 0;
            margin-top: 50px;
        }
        .sidebar ul li {
            margin: 1rem 0;
        }
        .sidebar ul li a {
            color: white;
            text-decoration: none;
            font-size: 1rem;
        }
        .sidebar ul li a:hover {
            text-decoration: underline;
        }
        .content {
            margin-left: 250px;
            padding: 2rem;
            flex: 1;
        }
        .header {
            background-color: #333;
            color: white;
            padding: 1rem;
            position: fixed;
            top: 0;
            left: 250px;
            right: 0;
            z-index: 1000;
        }
        .header h1 {
            margin: 0;
        }
        .container {
            margin-top: 4rem; /* Adjust based on the height of the header */
            margin-left: 80px;
        }
    </style>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
  <!-- Sidebar -->
  <div class="sidebar">
        <h2>Admin Panel</h2>
        <ul>
            <li><a href="{{url('/admin')}}">Dashboard</a></li>
            <li><a href="{{url('/blog')}}">Blogs</a></li>
        </ul>
    </div>