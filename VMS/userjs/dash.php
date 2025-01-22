<?php
session_start();
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
header("Expires: Thu, 01 Jan 1970 00:00:00 GMT");

// Check if the user is logged in
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

// Retrieve the username from the session
$username = htmlspecialchars($_SESSION['username']);
?>


<!DOCTYPE php>
<php lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Vehicle Servicing Dashboard</title>
  <link rel="stylesheet" href="dash/dash.css">
</head>
<body>
  <div class="dashboard-container">
    <!-- Sidebar -->
    <aside class="sidebar">
      <h2>🚗 Vehicle Service</h2>
      <ul>
        <li><a href="#" class="active">📊 Dashboard</a></li>
        <li><a href="service-request.php">🛠️ Service Request</a></li>
        <li><a href="service-tracking.php">📍 Service Tracking</a></li>
        <li><a href="service-history.php">📜 Service History</a></li>

      </ul>
    </aside>

    <!-- Main Content -->
    <main class="main-content">
      <header>
        <h1>Dashboard</h1>
        <div class="user-actions">
          <span id="username"> Hello ,<?php echo $username; ?></span>
          <button id="logout-btn">Logout</button>
        </div>
      </header>

      <!-- Dashboard Details -->
      <section class="dashboard-overview">
        <div class="dashboard-cards">
          <div class="card">
           <a href="https://www.facebook.com"><h3>Facebook Communtiy </h3>
           </a>
            <img src="icon/facebook_2504903.png" alt="not found">
          </div>
          <div class="card">
          <a href="https://www.viber.com/en/"><h3>Join our Viber Community</h3>
          </a>
          <img src="icon/viber_3670059.png" alt="not found">
          </div>
          <div class="card">
           <a href="https://www.instagram.com">  <h3>Instagram Community</h3></a>
           <img src="icon/instagram_2111463.png" alt="not found">
           
          </div>
          <div class="card">
            <h3>Phone Number</h3>
            <p>9815010413</p>
            <h3>Landline Number</h3>
            <p>023 562674 </p>
          </div>
        </div>
        
        <div class="fots">
 <p>Gmail:vmsoffical@gmail.com</p>
 <p class="account-copyright">Copyright © 2020</p>
 </div>
      </section>
    </main>
    
  </div>

  <!-- Logout Confirmation Modal -->
  <div id="logout-modal" class="modal">
    <div class="modal-content">
      <p>Are you sure you want to logout?</p>
      <form action="logout.php">
        <button id="confirm-logout" class="btn-confirm">Yes</button></form>
        <button id="cancel-logout" class="btn-cancel">No</button>

    </div>
   
  </div>

  <script src="dash/dash.js"></script>
</body>
</php>
