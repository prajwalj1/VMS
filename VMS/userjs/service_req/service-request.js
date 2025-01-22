document.getElementById("service-request-form").onsubmit = function (event) {
  let isValid = true;

  // Get form elements
  const name = document.getElementById("name");
  const email = document.getElementById("email");
  const vehicleNumber = document.getElementById("vehicle-number");
  const serviceType = document.getElementById("service-type");
  const date = document.getElementById("date");

  // Get error elements
  const nameError = document.getElementById("nameError");
  const emailError = document.getElementById("emailError");
  const vehicleNumberError = document.getElementById("vehicleNumberError");
  const serviceTypeError = document.getElementById("serviceTypeError");
  const dateError = document.getElementById("dateError");

  // Reset errors
  [nameError, emailError, vehicleNumberError, serviceTypeError, dateError].forEach((error) => (error.innerHTML = ""));
  [name, email, vehicleNumber, serviceType, date].forEach((input) => input.classList.remove("error-border"));

  // Name validation
  const nameRegex = /^[a-zA-Z\s]{3,50}$/;
  if (!name.value.trim()) {
    nameError.innerHTML = "Full name is required.";
    name.classList.add("error-border");
    isValid = false;
  } else if (!nameRegex.test(name.value.trim())) {
    nameError.innerHTML = "Enter a valid full name only letters";
    name.classList.add("error-border");
    isValid = false;
  }

  // Email validation
  const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
  if (!email.value.trim()) {
    emailError.innerHTML = "Email is required.";
    email.classList.add("error-border");
    isValid = false;
  } else if (!emailRegex.test(email.value.trim())) {
    emailError.innerHTML = "Enter a valid email address.";
    email.classList.add("error-border");
    isValid = false;
  }

  // Vehicle number validation
  if (!vehicleNumber.value.trim()) {
    vehicleNumberError.innerHTML = "Vehicle number is required.";
    vehicleNumber.classList.add("error-border");
    isValid = false;
  }

  // Service type validation
  if (!serviceType.value) {
    serviceTypeError.innerHTML = "Please select a service type.";
    serviceType.classList.add("error-border");
    isValid = false;
  }

  // Date validation
  if (!date.value.trim()) {
    dateError.innerHTML = "Preferred service date is required.";
    date.classList.add("error-border");
    isValid = false;
  }

  // Prevent form submission if invalid
  if (!isValid) {
    event.preventDefault();
  }
};
