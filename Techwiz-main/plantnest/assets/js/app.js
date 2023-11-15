//make sure if user want to signout
document.addEventListener('DOMContentLoaded', function () {
    // Get a reference to the logout button
    const logoutButton = document.querySelectorAll('.logoutButton');

    // Attach a click event listener to the logout button
    logoutButton.addEventListener('click', function () {
        // Display a confirmation dialog
        const confirmed = window.confirm('Are you sure you want to log out?');

        // If the user confirms, log them out
        if (confirmed) {
            // Perform the logout action here, for example, redirect to 'logout.php'
            window.location.href = 'logout.php';
        }
    });
});

//checkout
