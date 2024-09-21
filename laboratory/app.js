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
  window.location.href = "http://localhost/capstone/laboratory/index.php";
}


function confirmDelete() {
  if (confirm("Are you sure you want to delete this record?")) {
      var id = document.getElementById("delete_id").value;
      var xhr = new XMLHttpRequest();
      xhr.open("POST", "1.laboratory_delete.php", true);
      xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
      xhr.onreadystatechange = function() {
          if (xhr.readyState == 4 && xhr.status == 200) {
              // Update the UI or display a message if needed
              alert(xhr.responseText);

              document.getElementById("index.php").click(); 
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
          url: 'search.php', // Replace 'search.php' with the actual PHP file to handle the search
          data: formData,
          success: function(response) {
              $('#laboratoryTable tbody').html(response);
          }
      });
  });

  $('#showAllBtn').click(function() {
      $.ajax({
          type: 'GET',
          url: 'show_all.php', // Replace 'show_all.php' with the actual PHP file to fetch all items
          success: function(response) {
              $('#laboratoryTable tbody').html(response);
          }
      });
  });
});


function addMore() {
  var items = document.getElementById('items');
  var newItem = document.createElement('div');
  newItem.classList.add('row', 'mb-3', 'item', 'w-100');
  newItem.innerHTML = `
      <div class="col-md-4">
          <input type="number" class="form-control" name="requested_quantity[]" required>
      </div>
      <div class="col-md-4">
          <input type="text" class="form-control" name="unit_of_issue[]" required>
      </div>
      <div class="col-md-4">
          <input type="text" class="form-control" name="product_name[]" required>
      </div>`;
  items.appendChild(newItem);
}

function removeLast() {
  var items = document.getElementById('items');
  if (items.children.length > 1) {
      items.removeChild(items.lastElementChild);
  }
}


window.addEventListener('load', () => {
  const alerts = document.querySelectorAll('.alert');
  setTimeout(() => {
      alerts.forEach(alert => alert.style.display = 'none');
  }, 3000); // Adjust the time as needed
});