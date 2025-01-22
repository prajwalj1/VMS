document.querySelector('form').addEventListener('submit', function (event) {
    event.preventDefault(); // Prevent form submission

    let isValid = true; // Overall form validity flag

    // Clear all previous error messages
    const errorMessages = document.querySelectorAll('.error-message');
    errorMessages.forEach((msg) => msg.remove());

    // Define validation rules for all fields
    const fields = [
        { 
            selector: 'input[name="first_name"]', 
            message: 'First Name is required and should only contain alphabetic characters.',
            validation: (value) => value.trim() !== '' && /^[A-Za-z\s]+$/.test(value) // Regex for alphabetic characters and spaces
        },
        { 
            selector: 'input[name="last_name"]', 
            message: 'Last Name is required and should only contain alphabetic characters.',
            validation: (value) => value.trim() !== '' && /^[A-Za-z\s]+$/.test(value) // Regex for alphabetic characters and spaces
        },
        { 
            selector: 'input[name="email"]', 
            message: 'Email is required.',
            validation: (value) => value.trim() !== '' && /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(value) 
        },
        { 
            selector: 'input[name="password"]', 
            message: 'Password is required.',
            validation: (value) => value.trim() !== '' 
        },
        { 
            selector: 'input[name="confirm_password"]', 
            message: 'Confirm Password is required and should match Password.',
            validation: (value) => value.trim() !== '' && value === document.querySelector('input[name="password"]').value 
        },
        { 
            selector: 'input[name="gender"]:checked', 
            message: 'Please select your gender.',
            validation: (value) => !!value 
        },
        { 
            selector: 'select[name="country"]', 
            message: 'Please select a country.',
            validation: (value) => value.trim() !== '' 
        },
        { 
            selector: 'input[name="terms"]:checked', 
            message: 'You must accept the Terms and Conditions.',
            validation: (value) => !!value 
        }
    ];

    // Validate all fields
    fields.forEach((field) => {
        const element = document.querySelector(field.selector);
        const value = element ? element.value : null;

        if (!field.validation(value)) {
            isValid = false;

            // Find the parent container
            const inputContainer = element.parentElement;

            // Create and append error message
            const errorMessage = document.createElement('span');
            errorMessage.classList.add('error-message');
            errorMessage.style.color = 'red';
            errorMessage.style.fontSize = '12px';
            errorMessage.textContent = field.message;

            inputContainer.appendChild(errorMessage);
        }
    });

    // If the form is valid, submit it
    if (isValid) {
        this.submit();
    }
});
