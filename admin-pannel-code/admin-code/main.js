// Select the sidebar element
// const sidebar = document.querySelector("#sidebar");

// Ensure the sidebar is always visible
sidebar.classList.add("show");

// OPTIONAL: If you have a toggle button and don't want it to do anything
const sidebarToggler = document.querySelector(".sidebar_toggler");
if (sidebarToggler) {
    sidebarToggler.style.display = "none"; // or just remove it
}

// Remove any previous event listeners that hide the sidebar
// (Only needed if this script runs after the old one)
window.onclick = null;
