













let isAdminMode = false;

// Function to show the User Panel
function showLoginPanel() {
    document.querySelector(".headline").textContent = "Welcome to the User Panel";
    document.getElementById("whole").style.display = "block";
    document.getElementById("dynamicForm").action = "../userjs/authentication.php";
    document.getElementById("isAdmin").value = "0";
    isAdminMode = false;

    // Update URL to match user login context
    history.pushState({ panel: 'user' }, null, "../userjs/login.php");
}

// Function to show the Admin Panel
function showAdminPanel() {
    document.querySelector(".headline").textContent = "Welcome to the Admin Panel";
    document.getElementById("whole").style.display = "block";
    document.getElementById("dynamicForm").action = "../Admin/authentication.php";
    document.getElementById("isAdmin").value = "1";
    isAdminMode = true;

    // Update URL to match admin login context
    history.pushState({ panel: 'admin' }, null, "../Admin/login.php");
}

// Cancel button logic: Close UI without navigating history
function hideLoginPanel(event) {
    event.preventDefault();
    document.getElementById("whole").style.display = "none";
    document.getElementById("vsms").style.display = "block";

    // Reset URL back to home
    history.replaceState(null, null, "/");
}





// Ensure the form submission redirects correctly
document.getElementById("dynamicForm").onsubmit = function () {
    const successRedirectUrl = isAdminMode
        ? "../Admin/login.php"
        : "../userjs/login.php";
    this.action = isAdminMode
        ? "../Admin/authentication.php"
        : "../userjs/authentication.php";
};

































