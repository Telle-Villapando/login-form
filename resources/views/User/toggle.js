function toggleDropdown(button) {
    const dropdown = document.getElementById("dropdown-example");
    const arrow = button.querySelector("#toggle-arrow");

    // Toggle visibility of the dropdown
    dropdown.classList.toggle("hidden");

    // Rotate the arrow
    if (dropdown.classList.contains("hidden")) {
        arrow.style.transform = "rotate(0deg)";
    } else {
        arrow.style.transform = "rotate(180deg)";
    }
}
