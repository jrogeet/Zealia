document.addEventListener('DOMContentLoaded', function () {
    var notificationDropdown = document.getElementById('notification-dropdown');
    var accountDropdown = document.getElementById('account-dropdown');

    function closeOtherDropdowns(exceptThisOne) {
        if (exceptThisOne !== notificationDropdown) {
            notificationDropdown.checked = false;
        }
        if (exceptThisOne !== accountDropdown) {
            accountDropdown.checked = false;
        }
    }

    notificationDropdown.addEventListener('change', function () {
        closeOtherDropdowns(notificationDropdown);
    });

    accountDropdown.addEventListener('change', function () {
        closeOtherDropdowns(accountDropdown);
    });

    // Close dropdowns when clicking outside
    document.addEventListener('click', function(event) {
        var isClickInsideNotification = notificationDropdown.closest('.dropdown').contains(event.target);
        var isClickInsideAccount = accountDropdown.closest('.dropdown').contains(event.target);

        if (!isClickInsideNotification && !isClickInsideAccount) {
            notificationDropdown.checked = false;
            accountDropdown.checked = false;
        }
    });

    // Close edit forms when clicking outside
    document.addEventListener('click', function(event) {
      const editElements = document.querySelectorAll('.edit-options');
      let clickedInsideEdit = false;

      editElements.forEach(editElement => {
          if (editElement.contains(event.target)) {
              clickedInsideEdit = true;
          }
      });

      if (!clickedInsideEdit) {
          editElements.forEach(editElement => {
              editElement.style.display = 'none';
          });

          document.getElementById('students-accounts-table').style.display = 'table';
          document.getElementById('professors-accounts-table').style.display = 'table';
      }
  });
});










// *************************
// *    MAIN MBTI PAGE     *
// *************************
function setFlexDirection(direction) {
  const flexContainer = document.querySelector('.table-result');
  flexContainer.style.flexDirection = direction;
}

// let prevScrollpos = window.pageYOffset;
// window.onscroll = function() {
//   let currentScrollPos = window.pageYOffset;
//   if (prevScrollpos > currentScrollPos) {
//     document.getElementById("navbar").style.top = "0";
//   } else {
//     document.getElementById("navbar").style.top = "-80px"; // Adjust with the height of your navbar
//   }
//   prevScrollpos = currentScrollPos;
// }



// *************************
// * MAIN MBTI-Input Field *
// *************************
// check if input field is not empty and not disappear when may tinype user
// const mbtiInputs = document.querySelectorAll('.add-name');
// const inputContainers = document.querySelectorAll('.mbti-type-input');

// *******************************
// *         MBTI PAGE           *
// *******************************

const imageContainer = document.querySelector('.cards');
const cursorCircle = document.querySelector('.cursor-circle');

imageContainer.addEventListener('mousemove', (e) => {
  const x = e.pageX - imageContainer.offsetLeft;
  const y = e.pageY - imageContainer.offsetTop;
  
  cursorCircle.style.display = 'block';
  cursorCircle.style.left = `${x}px`;
  cursorCircle.style.top = `${y}px`;
  cursorCircle.style.clipPath = `circle(25px at ${x}px ${y}px)`; /* Adjust radius */
});





// *******************************
// *         ROOM PAGE           *
// *******************************

function tabs(currentTab) {
  if (currentTab === 'group') {
    document.querySelector(".group-parent-container").style.display = "flex";
    document.querySelector(".requests-container").style.display = "none";
    document.querySelector(".edit-container").style.display = "none";
  } else if (currentTab === 'requests'){
    document.querySelector(".group-parent-container").style.display = "none";
    document.querySelector(".requests-container").style.display = "flex";
    document.querySelector(".edit-container").style.display = "none";
  } else if (currentTab === 'edit') {
    document.querySelector(".group-parent-container").style.display = "none";
    document.querySelector(".requests-container").style.display = "none";
    document.querySelector(".edit-container").style.display = "flex";
  }
}

function innerTabs(innerTab){
  if (innerTab === 'grouptool') {
    document.querySelector(".group-tool-container").style.display = "flex";
    document.querySelector(".result-wrap").style.display = "none";
  } else if (innerTab === 'results') {
    document.querySelector(".group-tool-container").style.display = "none";
    document.querySelector(".result-wrap").style.display = "flex";
  }
}



// GROUP RESULT PAGE

// function toggleEditOptions(appear, disappear) {
//   console.log('Appear selector:', appear);
//   console.log('Disappear selector:', disappear);
//   const appearElement = document.querySelector(appear);
//   const disappearElement = document.querySelector(disappear);
//   console.log('Appear element:', appearElement);
//   console.log('Disappear element:', disappearElement);

//   if (appearElement && disappearElement) {
//       appearElement.style.display = 'inline-block';
//       disappearElement.style.display = 'none';
//   } else {
//       console.error('One of the elements is not found in the DOM');
//   }
// }

function toggleEditOptions(show, hide) {
    console.log('appear:', show);
    console.log('disappear:', hide);
    document.getElementById(show).style.display = 'inline-block';
    document.getElementById(hide).style.display = 'none';
}

function toggleTest(hide, show1, show2, show3) {
  document.getElementById(hide).style.display = 'none';
  document.getElementById(show1).style.display = 'flex';
  document.getElementById(show2).style.display = 'flex';
  document.getElementById(show3).style.display = 'flex';
}

function toggleAdminEditOptions(show, hide) {
  console.log('appear:', show);
  console.log('disappear:', hide);
  document.getElementById(show).style.display = 'block';
  document.getElementById(hide).style.display = 'none';
}

function toggleHide(hide) {
  document.getElementById(hide).style.display = 'none';
}

document.addEventListener('DOMContentLoaded', function() {
  const dropdownToggles = document.querySelectorAll('.dropdown-toggle');

  dropdownToggles.forEach(toggle => {
      toggle.addEventListener('change', function() {
          if (this.checked) {
              dropdownToggles.forEach(otherToggle => {
                  if (otherToggle !== this) {
                      otherToggle.checked = false;
                  }
              });
          }
      });
  });
});

// function toggleEditOptions(containerId) {
//   var container = document.getElementById(containerId);
//   if (container.style.display === 'none' || container.style.display === '') {
//       container.style.display = 'block'; // Show the container
//   } else {
//       container.style.display = 'none'; // Hide the container
//   }
// }












// *******************************
// *         ADMIN PAGE           *
// *******************************
// function adminTabs(tabName) {
//   // Hide all tab content
//   const tabContents = document.querySelectorAll('.dashboard-container > div, .accounts-list, .rooms-list, .submit-ticket-container, .logs-container, .my-account');
//   tabContents.forEach(tabContent => {
//       tabContent.style.display = 'none';
//   });

//   // Show the selected tab content
//   const selectedTab = document.querySelector(`.${tabName}`);
//   if (selectedTab) {
//       selectedTab.style.display = 'block';
//   }
// }

// // Example of how to call the function on page load to show the dashboard by default
// document.addEventListener('DOMContentLoaded', () => {
//   adminTabs('dashboard-container');
// });



function adminTabs(tab) {
  
  switch (tab) {
    case "dashboard":
      document.querySelector(".dashboard-container").style.display = "flex";
      document.querySelector(".accounts-list").style.display = "none";
      document.querySelector(".rooms-list").style.display = "none";
      document.querySelector(".submit-ticket-container").style.display = "none";
      document.querySelector(".logs-container").style.display = "none";
    break;

    case "accounts":
      document.querySelector(".dashboard-container").style.display = "none";
      document.querySelector(".accounts-list").style.display = "flex";
      document.querySelector(".rooms-list").style.display = "none";
      document.querySelector(".submit-ticket-container").style.display = "none";
      document.querySelector(".logs-container").style.display = "none";
    break;

    case "rooms":
      document.querySelector(".dashboard-container").style.display = "none";
      document.querySelector(".accounts-list").style.display = "none";
      document.querySelector(".rooms-list").style.display = "flex";
      document.querySelector(".submit-ticket-container").style.display = "none";
      document.querySelector(".logs-container").style.display = "none";
    break;

    case "my-account":
      document.querySelector(".dashboard-container").style.display = "none";
      document.querySelector(".accounts-list").style.display = "none";
      document.querySelector(".rooms-list").style.display = "none";
      document.querySelector(".my-account").style.display = "flex";
      document.querySelector(".submit-ticket-container").style.display = "none";
      document.querySelector(".logs-container").style.display = "none";
    case "submit-ticket":
      document.querySelector(".dashboard-container").style.display = "none";
      document.querySelector(".accounts-list").style.display = "none";
      document.querySelector(".rooms-list").style.display = "none";
      document.querySelector(".submit-ticket-container").style.display = "flex";
      document.querySelector(".logs-container").style.display = "none";
    break;

    case "logs":
      document.querySelector(".dashboard-container").style.display = "none";
      document.querySelector(".accounts-list").style.display = "none";
      document.querySelector(".rooms-list").style.display = "none";
      document.querySelector(".submit-ticket-container").style.display = "none";
      document.querySelector(".logs-container").style.display = "flex";
    break;

  }



 }