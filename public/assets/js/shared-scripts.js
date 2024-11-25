function toggle(toggleID) {
  const element = document.getElementById(toggleID);
  element.classList.toggle("hidden");
  element.classList.toggle("flex");
}

function toggleHidden(toggleID) {
  for (let i = 0; i < toggleID.length; i++) {
    const element = document.getElementById(toggleID[i]);
    element.classList.toggle("hidden");
  }
}

function show(showID, display = "flex") {
  const element = document.getElementById(showID);
  const displayClasses = [
    "hidden",
    "block",
    "inline-block",
    "inline",
    "flex",
    "inline-flex",
    "table",
    "table-row",
    "table-cell",
    "grid",
    "inline-grid",
  ];

  if (element) {
    element.classList.remove(...displayClasses);
    element.classList.add(display);
  }
}

function hide(hideID) {
  const element = document.getElementById(hideID);
  const displayClasses = [
    "block",
    "inline-block",
    "inline",
    "flex",
    "inline-flex",
    "table",
    "table-row",
    "table-cell",
    "grid",
    "inline-grid",
  ];

  if (element) {
    element.classList.remove(...displayClasses);
    element.classList.add("hidden");
  }
}

function active(activeID, inactiveID, removeList, addList) {
  const active = document.getElementById(activeID);
  const inactive = document.getElementById(inactiveID);

  for (let i = 0; i < removeList.length; i++) {
    inactive.classList.remove(removeList[0][i]);
    active.classList.remove(removeList[1][i]);
  }

  for (let i = 0; i < addList.length; i++) {
    inactive.classList.add(addList[0][i]);
    active.classList.add(addList[1][i]);
  }
}

function disableScroll() {
  document.body.style.overflow = "hidden";
}

function enableScroll() {
  document.body.style.overflow = "auto";
}

function toggleDropdown(openId, closeId) {
  const openElement = document.getElementById(openId);
  const closeElement = document.getElementById(closeId);

  if (!openElement.classList.contains("flex")) {
    openElement.classList.remove("hidden");
    openElement.classList.add("flex");
    closeElement.classList.remove("flex");
    closeElement.classList.add("hidden");
  } else {
    openElement.classList.remove("flex");
    openElement.classList.add("hidden");
  }
}

// const navDDbutton = document.getElementById('navDDbutton');
// const notificationBtn = document.getElementById('notificationBtn');
// const navDropDown = document.getElementById('navDropDown');
// const notificationDropDown = document.getElementById('notificationDropdown');

if (document.getElementById("navDDbutton")) {
  document.getElementById("navDDbutton").addEventListener("click", (event) => {
    event.stopPropagation();
    toggleDropdown("navDropDown", "notificationDropdown");
  });
}

if (document.getElementById("notificationBtn")) {
  document
    .getElementById("notificationBtn")
    .addEventListener("click", (event) => {
      event.stopPropagation();
      toggleDropdown("notificationDropdown", "navDropDown");
    });
}
// Prevent hiding dropdowns when clicking inside them

if (document.getElementById("navDropDown")) {
  document.getElementById("navDropDown").addEventListener("click", (event) => {
    event.stopPropagation();
  });
}

if (document.getElementById("notificationDropdown")) {
  document
    .getElementById("notificationDropdown")
    .addEventListener("click", (event) => {
      event.stopPropagation();
    });
}

// Modify the body click event listener
if (
  document.getElementById("navDDbutton") &&
  document.getElementById("notificationDropdown")
) {
  document.body.addEventListener("click", () => {
    hide("navDropDown");
    hide("notificationDropdown");
  });
}

// SweetAlert2

// Add this to your shared-scripts.js
function showAlert(type, title, message) {
  const styles = {
    success: {
      background: "#69DB7C", // greensuccess
      color: "#1A1A1A", // blackpri
    },
    error: {
      background: "#FF6B6B", // rederr
      color: "#FFFFFF", // white
    },
    warning: {
      background: "#DF9F5E", // orangeaccent
      color: "#1A1A1A", // blackpri
    },
    info: {
      background: "#4DABF7", // blueinfo
      color: "#1A1A1A", // blackpri
    },
  };

  return Swal.fire({
    title: title,
    text: message,
    icon: type,
    confirmButtonText: "OK",
    customClass: {
      popup: "swal-popup font-satoshireg",
      title: "swal-title font-clashbold",
      confirmButton: "swal-confirm font-satoshimed",
      cancelButton: "swal-cancel font-satoshimed",
    },
    background: styles[type]?.background || "#FFFFFF",
    color: styles[type]?.color || "#1A1A1A",
    confirmButtonColor: "#03346E", // blue3
  });
}

// For confirmation dialogs
function showConfirm(title, message, confirmText = "Yes", cancelText = "No") {
  return Swal.fire({
    title: title,
    text: message,
    icon: "warning",
    showCancelButton: true,
    confirmButtonText: confirmText,
    cancelButtonText: cancelText,
    customClass: {
      popup: "swal-popup font-satoshireg",
      title: "swal-title font-clashbold",
      confirmButton: "swal-confirm font-satoshimed",
      cancelButton: "swal-cancel font-satoshimed",
    },
    background: "#FFFFFF", // white
    color: "#1A1A1A", // blackpri
    confirmButtonColor: "#03346E", // blue3
    cancelButtonColor: "#99948C", // grey1
  });
}

// for Loading visual:
let loadingCount = 0;
function showLoading() {
  loadingCount++;
  document.getElementById("loadingIndicator").classList.remove("hidden");
}

function hideLoading() {
  loadingCount--;
  if (loadingCount <= 0) {
    loadingCount = 0;
    document.getElementById("loadingIndicator").classList.add("hidden");
  }
}
