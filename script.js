document.addEventListener('DOMContentLoaded', function () {
    // Standard form submission is preferred for this local test to view PDF directly
    const form = document.getElementById('certificateForm');
    const message = document.getElementById('message');
    
    // Optional: verification logging
    form.addEventListener('submit', function (e) {
        console.log("Submitting form...");
        message.textContent = "Generating Certificate...";
    });
});
