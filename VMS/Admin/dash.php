<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['username'])) {
    header("Location:login.php");
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
        <li><a href="approve-request.php">🔔 Servicing Schedule</a></li>
        <li><a href="service_completed.php"> ✅ Servicing Completed </a></li>
        <li><a href="service-history.php"> 🛠️ Service History</a></li>
        <li><a href="inventory-management.php">📦 Inventory Management</a></li>
        <li><a href="update-tracking.php">📦 Updated Tracking</a></li>

   
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
      
      <!-- Dashboard Details
      <section class="dashboard-overview">
        <div class="dashboard-cards">
          <div class="card">
            <h3>Total Vehicles</h3>
            <p>25</p>
          </div>
          <div class="card">
            <h3>Services Completed</h3>
            <p>18</p>
          </div>
          <div class="card">
            <h3>Upcoming Services</h3>
            <p>7</p>
          </div>
          <div class="card">
            <h3>Pending Services</h3>
            <p>5</p>
          </div>
        </div>
      </section>
    </main>
  </div> -->





















  <div style="padding: 20px; background-color: #ecf0f1; border: 1px solid #3498db; border-radius: 10px; font-family: 'Segoe UI', sans-serif; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
  <h1 style="font-size: 30px; color: #2980b9; margin-bottom: 15px; text-align: center;">
    🚗 Welcome to the VMS Admin Panel, Super Admin! 🌟
  </h1>
  <p style="font-size: 18px; color: #2c3e50; margin-bottom: 20px; line-height: 1.6; text-align: center;">
  Congratulations on being the leader of the Vehicle Management System! As the admin, you're in charge of keeping the fleet running smoothly and ensuring efficient operations. Let's get started and take charge of the journey ahead!
  </p>
  
  <div style="background-color: #3498db; padding: 20px; border-radius: 8px; color: white; font-size: 16px; margin-bottom: 20px;">
    <strong>Quick Access to Key Tasks:</strong>
    <ul style="font-size: 16px; margin-left: 20px; list-style-type: none; padding: 0; color: #ecf0f1;">
      <li>📊 <strong>Dashboard Overview:</strong> A quick snapshot of vehicle status, service schedules, and user activities.</li>
      <li>🚘 <strong>Manage Fleet:</strong> Effortlessly add, update, or deactivate vehicles from the system.</li>
      <li>🔧 <strong>Service Management:</strong> Oversee service requests and ensure your fleet stays in peak condition.</li>
      <li>👥 <strong>User Access:</strong> Monitor users and assign roles to keep things running smoothly.</li>
      <li>📈 <strong>Performance Insights:</strong> Dive into analytics to fine-tune fleet management and optimize performance.</li>
    </ul>
  </div>

  <p style="font-size: 16px; color: #34495e; margin-bottom: 20px;">
    Your leadership makes all the difference! Let’s keep the wheels of success turning, and together we’ll make this system stronger than ever. 🌟
  </p>

  <p style="font-size: 14px; color: #7f8c8d; text-align: center; font-style: italic;">
    "The best leaders not only guide but inspire greatness in others." 🚀
  </p>
</div>
























  

  
  <!-- Logout Confirmation Modal -->
  <div id="logout-modal" class="modal">
    <div class="modal-content">
      <p>Are you sure you want to logout?</p>
      <form action="logout.php">
        <button id="confirm-logout" class="btn-confirm">Yes</a></button>
      </form>
      
      <button id="cancel-logout" class="btn-cancel">No</button>
    </div>
  </div>
  
  <script src="dash/dash.js"></script>
</body>
</php>
