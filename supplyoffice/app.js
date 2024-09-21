$(document).ready(function () {
  // Sidebar Toggle
  const sidebarToggle = document.querySelector("#sidebar-toggle");
  sidebarToggle.addEventListener("click", function () {
    document.querySelector("#sidebar").classList.toggle("collapsed");
  });

  document.querySelector(".theme-toggle").addEventListener("click", () => {
    toggleLocalStorage();
    toggleRootClass();
  });

  // Darkmode Toggle
  function toggleRootClass() {
    const current = document.documentElement.getAttribute("data-bs-theme");
    const inverted = current == "dark" ? "light" : "dark";
    document.documentElement.setAttribute("data-bs-theme", inverted);
  }

  function toggleLocalStorage() {
    if (isLight()) {
      localStorage.removeItem("light");
    } else {
      localStorage.setItem("light", "set");
    }
  }

  function isLight() {
    return localStorage.getItem("light");
  }

  if (isLight()) {
    toggleRootClass();
  }

  //Items toggle
  var tab_list = document.querySelectorAll(".sidebar-item[data-tc]");
  console.log(tab_list);

  var tab_items = document.querySelectorAll(".tab_item");

  tab_list.forEach(function (list) {
    list.addEventListener("click", function () {
      var tab_data = list.getAttribute("data-tc");
      console.log(tab_data);

      tab_items.forEach(function (item) {
        var tab_class = item.getAttribute("id");
        console.log(tab_class);

        tab_list.forEach(function (list) {
          list.classList.remove("active");
        });

        list.classList.add("active");

        if (tab_class.includes(tab_data)) {
          item.style.display = "flex";
        } else {
          item.style.display = "none";
        }
      });
    });
  });

  //time lamaw
  function updateTimeAndDate(elementId) {
    let time = document.getElementById(`current-time-${elementId}`);
    let date = document.getElementById(`current-date-${elementId}`);

    setInterval(() => {
      let now = new Date();
      time.innerHTML = now.toLocaleTimeString();
      date.textContent = formatDate(now);
    }, 200);
  }

  for (let i = 1; i <= 1; i++) {
    updateTimeAndDate(i);
  }

  /**
   * @param {Date} date
   */

  function formatDate(date) {
    const DAYS = [
      "Sunday",
      "Monday",
      "Tuesday",
      "Wednesday",
      "Thursday",
      "Friday",
      "Saturday",
    ];
    const MONTHS = [
      "January",
      "Febuary",
      "Marh",
      "April",
      "May",
      "June",
      "July",
      "August",
      "September",
      "October",
      "November",
      "December",
    ];

    return `${
      DAYS[date.getDay()]
    }, ${MONTHS[date.getMonth()]} ${date.getDate()} ${date.getFullYear()}`;
  }
});

function resetWebsite(event) {
  event.preventDefault(); // Prevent the default behavior
  console.log("lamaw");
  // Add your reset logic here
  // For example, you can reload the page
  window.location.href = "http://localhost/capstone/supplyoffice/index.php";
}


function confirmDelete() {
  if (confirm("Are you sure you want to delete this record?")) {
      var id = document.getElementById("delete_id").value;
      var xhr = new XMLHttpRequest();
      xhr.open("POST", "1.supply_delete.php", true);
      xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
      xhr.onreadystatechange = function() {
          if (xhr.readyState == 4 && xhr.status == 200) {
              // Update the UI or display a message if needed
              alert(xhr.responseText);
              window.location.href = 'index.php'; // Redirect back to the main page after deletion 
          }
      };
      xhr.send("id=" + id);
  }
}

function PconfirmDelete(id) {
  if (confirm("Are you sure you want to delete this record?")) {
      var xhr = new XMLHttpRequest();
      xhr.open("POST", "2.pharmacy_delete.php", true);
      xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
      xhr.onreadystatechange = function() {
          if (xhr.readyState == 4 && xhr.status == 200) {
              alert(xhr.responseText);
              window.location.href = 'index.php'; // Redirect back to the main page after deletion
          } else {
              console.log("Error:", xhr.statusText); // Debugging output
          }
      };
      xhr.send("id=" + id);
  }
}

function LconfirmDelete(id) {
  if (confirm("Are you sure you want to delete this record?")) {
      var xhr = new XMLHttpRequest();
      xhr.open("POST", "2.laboratory_delete.php", true);
      xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
      xhr.onreadystatechange = function() {
          if (xhr.readyState == 4 && xhr.status == 200) {
              alert(xhr.responseText);
              window.location.href = 'index.php'; // Redirect back to the main page after deletion
          } else {
              console.log("Error:", xhr.statusText); // Debugging output
          }
      };
      xhr.send("id=" + id);
  }
}

function CconfirmDelete(id) {
  if (confirm("Are you sure you want to delete this record?")) {
      var xhr = new XMLHttpRequest();
      xhr.open("POST", "2.central_delete.php", true);
      xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
      xhr.onreadystatechange = function() {
          if (xhr.readyState == 4 && xhr.status == 200) {
              alert(xhr.responseText);
              window.location.href = 'index.php'; // Redirect back to the main page after deletion
          } else {
              console.log("Error:", xhr.statusText); // Debugging output
          }
      };
      xhr.send("id=" + id);
  }
}

$(document).ready(function() {
  $('#searchForm').submit(function(e) {
      e.preventDefault();
      var formData = $(this).serialize();
      $.ajax({
          type: 'GET',
          url: '1.supply_search.php', // Replace 'search.php' with the actual PHP file to handle the search
          data: formData,
          success: function(response) {
              $('#supplyTable tbody').html(response);
          }
      });
  });

  $('#showAllBtn').click(function() {
      $.ajax({
          type: 'GET',
          url: '1.supply_show_all.php', // Replace 'show_all.php' with the actual PHP file to fetch all items
          success: function(response) {
              $('#supplyTable tbody').html(response);
          }
      });
  });
});

$(document).ready(function() {
  // Handle the search form submission for pharmacy requests
  $('#pharmacySearchForm').submit(function(e) {
      e.preventDefault();
      var formData = $(this).serialize();
      $.ajax({
          type: 'GET',
          url: '2.pharmacy_search.php', // PHP file to handle pharmacy search
          data: formData,
          success: function(response) {
              $('#pharmacySupplyTable tbody').html(response);
          }
      });
  });

  // Handle the "Show All" button click for pharmacy requests
  $('#pharmacyShowAllBtn').click(function() {
      $.ajax({
          type: 'GET',
          url: '2.pharmacy_show_all.php', // PHP file to fetch all pharmacy requests
          success: function(response) {
              $('#pharmacySupplyTable tbody').html(response);
          }
      });
  });
});

$(document).ready(function() {
  // Handle the search form submission for laboratory requests
  $('#laboratorySearchForm').submit(function(e) {
      e.preventDefault();
      var formData = $(this).serialize();
      $.ajax({
          type: 'GET',
          url: '2.laboratory_search.php', // PHP file to handle laboratory search
          data: formData,
          success: function(response) {
              $('#laboratorySupplyTable tbody').html(response);
          }
      });
  });

  // Handle the "Show All" button click for laboratory requests
  $('#laboratoryShowAllBtn').click(function() {
      $.ajax({
          type: 'GET',
          url: '2.laboratory_show_all.php', // PHP file to fetch all laboratory requests
          success: function(response) {
              $('#laboratorySupplyTable tbody').html(response);
          }
      });
  });
});

$(document).ready(function() {
  // Handle the search form submission for central requests
  $('#centralSearchForm').submit(function(e) {
      e.preventDefault();
      var formData = $(this).serialize();
      $.ajax({
          type: 'GET',
          url: '2.central_search.php', // PHP file to handle central search
          data: formData,
          success: function(response) {
              $('#centralSupplyTable tbody').html(response);
          }
      });
  });

  // Handle the "Show All" button click for central requests
  $('#centralShowAllBtn').click(function() {
      $.ajax({
          type: 'GET',
          url: '2.central_show_all.php', // PHP file to fetch all central requests
          success: function(response) {
              $('#centralSupplyTable tbody').html(response);
          }
      });
  });
});


function printPharmacyTable() {
  // Hide all elements
  document.body.style.visibility = 'hidden';

  // Show only the specific table and its container
  var printSection = document.querySelector('#tab_3');
  printSection.style.visibility = 'visible';

  // Print the page
  window.print();

  // Restore visibility of all elements after printing
  document.body.style.visibility = 'visible';
}

function printLaboratoryTable() {
  // Hide all elements
  document.body.style.visibility = 'hidden';

  // Show only the specific table and its container
  var printSection = document.querySelector('#tab_4');
  printSection.style.visibility = 'visible';

  // Print the page
  window.print();

  // Restore visibility of all elements after printing
  document.body.style.visibility = 'visible';
}

function printCentralTable() {
  // Hide all elements
  document.body.style.visibility = 'hidden';

  // Show only the specific table and its container
  var printSection = document.querySelector('#tab_5');
  printSection.style.visibility = 'visible';

  // Print the page
  window.print();

  // Restore visibility of all elements after printing
  document.body.style.visibility = 'visible';
}

$(document).ready(function() {
  function checkForNewRequests() {
      $.ajax({
          url: '3.check_new_requests.php',
          method: 'GET',
          dataType: 'json',
          success: function(data) {
              // Pharmacy requests count
              if (data.pharmacy_requests > 0) {
                  $('#pharmacyCount').text(data.pharmacy_requests).show();
              } else {
                  $('#pharmacyCount').hide();
              }

              // Laboratory requests count
              if (data.laboratory_requests > 0) {
                  $('#laboratoryCount').text(data.laboratory_requests).show();
              } else {
                  $('#laboratoryCount').hide();
              }

              // Central Supply Office requests count
              if (data.central_requests > 0) {
                  $('#centralCount').text(data.central_requests).show();
              } else {
                  $('#centralCount').hide();
              }

              // Total requests count
              if (data.total_requests > 0) {
                  $('#requestCount').text(data.total_requests).show();
              } else {
                  $('#requestCount').hide();
              }
          },
          error: function(jqXHR, textStatus, errorThrown) {
              console.error("AJAX call failed: ", textStatus, errorThrown);
          }
      });
  }

  // Check for new requests every 5 seconds
  setInterval(checkForNewRequests, 5000);

  // Initial check
  checkForNewRequests();
});

document.addEventListener('DOMContentLoaded', function() {
  var tab_list = document.querySelectorAll('.sidebar-item[data-tc]');
  var tab_items = document.querySelectorAll('.tab_item');

  tab_list.forEach(function(list) {
      list.addEventListener('click', function() {
          var tab_data = list.getAttribute('data-tc');
          
          // Hide all tab items first
          tab_items.forEach(function(item) {
              item.style.display = 'none'; // Hide each tab content
          });

          // Show only the clicked tab content
          document.getElementById(tab_data).style.display = 'block'; // Show the selected tab content
      });
  });
});
