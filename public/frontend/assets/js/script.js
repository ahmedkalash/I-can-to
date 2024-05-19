document.addEventListener('DOMContentLoaded', function() {
    const translateButton = document.getElementById('translateButton');
    const gestureInputLeft = document.getElementById('gestureInputLeft');
    const gestureInputRight = document.getElementById('gestureInputRight');

    translateButton.addEventListener('click', function() {
        const gestureText = gestureInputLeft.value; // Get the value from the left textarea
        const translatedText = translateGestureToText(gestureText); // Perform translation (replace this with your actual translation logic)

        // Update the value of the right textarea with the translated text
        gestureInputRight.value = translatedText;
    });

    function translateGestureToText(gesture) {
        // Logic to translate the gesture to text goes here
        // Replace this with your actual translation algorithm or API call
        return gesture;
    }
});

    document.getElementById("favorite").addEventListener("click", function() {
        // Get the value from the left gesture input
        var gestureInputLeftValue = document.getElementById("gestureInputLeft").value;
        
        // Create a new <a> element for the dropdown menu
        var newLink = document.createElement("a");
        newLink.href = "#"; // Set href attribute if needed
        newLink.textContent = gestureInputLeftValue; // Set the text content
        
        // Append the new link to the dropdown content
        var dropdownContent = document.querySelector(".dropdown-content");
        dropdownContent.appendChild(newLink);
    });


