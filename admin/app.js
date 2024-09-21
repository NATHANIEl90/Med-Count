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
  window.location.href = "http://localhost/capstone/admin/index.php";
}

//AAYUSIN PA!!!!!
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

              document.getElementById("index.php").click(); 
          }
      };
      xhr.send("id=" + id);
  }
}

$(document).ready(function() {
  // Supply Office
  $('#supplySearchForm').submit(function(e) {
      e.preventDefault();
      var formData = $(this).serialize();
      $.ajax({
          type: 'GET',
          url: '2.supply_search.php',
          data: formData,
          success: function(response) {
              $('#supplyTable tbody').html(response);
          }
      });
  });

  $('#supplyShowAllBtn').click(function() {
      $.ajax({
          type: 'GET',
          url: '2.supply_show_all.php',
          success: function(response) {
              $('#supplyTable tbody').html(response);
          }
      });
  });

  // Pharmacy
  $('#pharmacySearchForm').submit(function(e) {
      e.preventDefault();
      var formData = $(this).serialize();
      $.ajax({
          type: 'GET',
          url: '2.pharmacy_search.php',
          data: formData,
          success: function(response) {
              $('#pharmacyTable tbody').html(response);
          }
      });
  });

  $('#pharmacyShowAllBtn').click(function() {
      $.ajax({
          type: 'GET',
          url: '2.pharmacy_show_all.php',
          success: function(response) {
              $('#pharmacyTable tbody').html(response);
          }
      });
  });

  // Laboratory
  $('#laboratorySearchForm').submit(function(e) {
      e.preventDefault();
      var formData = $(this).serialize();
      $.ajax({
          type: 'GET',
          url: '2.laboratory_search.php',
          data: formData,
          success: function(response) {
              $('#laboratoryTable tbody').html(response);
          }
      });
  });

  $('#laboratoryShowAllBtn').click(function() {
      $.ajax({
          type: 'GET',
          url: '2.laboratory_show_all.php',
          success: function(response) {
              $('#laboratoryTable tbody').html(response);
          }
      });
  });

  // Central Supply Office
  $('#centralSearchForm').submit(function(e) {
      e.preventDefault();
      var formData = $(this).serialize();
      $.ajax({
          type: 'GET',
          url: '2.central_search.php',
          data: formData,
          success: function(response) {
              $('#centralTable tbody').html(response);
          }
      });
  });

  $('#centralShowAllBtn').click(function() {
      $.ajax({
          type: 'GET',
          url: '2.central_show_all.php',
          success: function(response) {
              $('#centralTable tbody').html(response);
          }
      });
  });
});

$(document).ready(function() {
  // Pharmacy Request
      $('#pharmacyRequestSearchForm').submit(function(e) {
        e.preventDefault();
        var formData = $(this).serialize();
        $.ajax({
            type: 'GET',
            url: '3.pharmacy_search.php',
            data: formData,
            success: function(response) {
                $('#pharmacyRequestTable tbody').html(response);
            }
        });
    });

    $('#pharmacyRequestShowAllBtn').click(function() {
        $.ajax({
            type: 'GET',
            url: '3.pharmacy_show_all.php',
            success: function(response) {
                $('#pharmacyRequestTable tbody').html(response);
            }
        });
    });

    // Laboratory Request
    $('#laboratoryRequestSearchForm').submit(function(e) {
        e.preventDefault();
        var formData = $(this).serialize();
        $.ajax({
            type: 'GET',
            url: '3.laboratory_search.php',
            data: formData,
            success: function(response) {
                $('#laboratoryRequestTable tbody').html(response);
            }
        });
    });

    $('#laboratoryRequestShowAllBtn').click(function() {
        $.ajax({
            type: 'GET',
            url: '3.laboratory_show_all.php',
            success: function(response) {
                $('#laboratoryRequestTable tbody').html(response);
            }
        });
    });

    // Central Supply Office Request
    $('#centralRequestSearchForm').submit(function(e) {
        e.preventDefault();
        var formData = $(this).serialize();
        $.ajax({
            type: 'GET',
            url: '3.central_search.php',
            data: formData,
            success: function(response) {
                $('#centralRequestTable tbody').html(response);
            }
        });
    });

    $('#centralRequestShowAllBtn').click(function() {
        $.ajax({
            type: 'GET',
            url: '3.central_show_all.php',
            success: function(response) {
                $('#centralRequestTable tbody').html(response);
            }
        });
    });
});
function togglePasswordFields() {
  var checkBox = document.getElementById("changePasswordCheckbox");
  var passwordFields = document.querySelectorAll(".password-fields");

  if (checkBox.checked) {
      passwordFields.forEach(function(field) {
          field.style.display = "block";
          document.getElementById('new_password').setAttribute('required', 'required');
          document.getElementById('confirm_password').setAttribute('required', 'required');
      });
  } else {
      passwordFields.forEach(function(field) {
          field.style.display = "none";
          document.getElementById('new_password').removeAttribute('required');
          document.getElementById('confirm_password').removeAttribute('required');
      });
  }
}
document.addEventListener('DOMContentLoaded', function() {
  const PrejectSelectedBtn = document.getElementById('PrejectSelectedBtn');
  if (PrejectSelectedBtn) {
      PrejectSelectedBtn.addEventListener('click', function() {
          let selected = [];
          document.querySelectorAll('input[name="request_ids[]"]:checked').forEach(checkbox => {
              selected.push(checkbox.value);
          });

          if (selected.length > 0) {
              if (confirm('Are you sure you want to reject the selected requests?')) {
                  let form = document.createElement('form');
                  form.method = 'POST';
                  form.action = '4.pharmacy_reject_selected.php';

                  selected.forEach(id => {
                      let input = document.createElement('input');
                      input.type = 'hidden';
                      input.name = 'request_ids[]';
                      input.value = id;
                      form.appendChild(input);
                  });

                  document.body.appendChild(form);
                  form.submit();
              }
          } else {
              alert('Please select at least one item to reject.');
          }
      });
  }
});

document.addEventListener('DOMContentLoaded', function() {
    const LrejectSelectedBtn = document.getElementById('LrejectSelectedBtn');
    if (LrejectSelectedBtn) {
        LrejectSelectedBtn.addEventListener('click', function() {
            let selected = [];
            document.querySelectorAll('input[name="request_ids[]"]:checked').forEach(checkbox => {
                selected.push(checkbox.value);
            });
  
            if (selected.length > 0) {
                if (confirm('Are you sure you want to reject the selected requests?')) {
                    let form = document.createElement('form');
                    form.method = 'POST';
                    form.action = '4.laboratory_reject_selected.php';
  
                    selected.forEach(id => {
                        let input = document.createElement('input');
                        input.type = 'hidden';
                        input.name = 'request_ids[]';
                        input.value = id;
                        form.appendChild(input);
                    });
  
                    document.body.appendChild(form);
                    form.submit();
                }
            } else {
                alert('Please select at least one item to reject.');
            }
        });
    }
  });

document.addEventListener('DOMContentLoaded', function() {
    const CrejectSelectedBtn = document.getElementById('CrejectSelectedBtn');
    if (CrejectSelectedBtn) {
        CrejectSelectedBtn.addEventListener('click', function() {
            let selected = [];
            document.querySelectorAll('input[name="request_ids[]"]:checked').forEach(checkbox => {
                selected.push(checkbox.value);
            });
  
            if (selected.length > 0) {
                if (confirm('Are you sure you want to reject the selected requests?')) {
                    let form = document.createElement('form');
                    form.method = 'POST';
                    form.action = '4.central_reject_selected.php';
  
                    selected.forEach(id => {
                        let input = document.createElement('input');
                        input.type = 'hidden';
                        input.name = 'request_ids[]';
                        input.value = id;
                        form.appendChild(input);
                    });
  
                    document.body.appendChild(form);
                    form.submit();
                }
            } else {
                alert('Please select at least one item to reject.');
            }
        });
    }
  });

document.addEventListener('DOMContentLoaded', function() {
  const PpendingSelectedBtn = document.getElementById('PpendingSelectedBtn');
  if (PpendingSelectedBtn) {
      PpendingSelectedBtn.addEventListener('click', function() {
          let selected = [];
          document.querySelectorAll('input[name="request_ids[]"]:checked').forEach(checkbox => {
              selected.push(checkbox.value);
          });

          if (selected.length > 0) {
              if (confirm('Are you sure you want to set the selected requests to pending?')) {
                  let form = document.createElement('form');
                  form.method = 'POST';
                  form.action = '4.pharmacy_pending_selected.php';

                  selected.forEach(id => {
                      let input = document.createElement('input');
                      input.type = 'hidden';
                      input.name = 'request_ids[]';
                      input.value = id;
                      form.appendChild(input);
                  });

                  document.body.appendChild(form);
                  form.submit();
              }
          } else {
              alert('Please select at least one item to set as pending.');
          }
      });
  }
});

document.addEventListener('DOMContentLoaded', function() {
    const LpendingSelectedBtn = document.getElementById('LpendingSelectedBtn');
    if (LpendingSelectedBtn) {
        LpendingSelectedBtn.addEventListener('click', function() {
            let selected = [];
            document.querySelectorAll('input[name="request_ids[]"]:checked').forEach(checkbox => {
                selected.push(checkbox.value);
            });
  
            if (selected.length > 0) {
                if (confirm('Are you sure you want to set the selected requests to pending?')) {
                    let form = document.createElement('form');
                    form.method = 'POST';
                    form.action = '4.laboratory_pending_selected.php';
  
                    selected.forEach(id => {
                        let input = document.createElement('input');
                        input.type = 'hidden';
                        input.name = 'request_ids[]';
                        input.value = id;
                        form.appendChild(input);
                    });
  
                    document.body.appendChild(form);
                    form.submit();
                }
            } else {
                alert('Please select at least one item to set as pending.');
            }
        });
    }
  });

document.addEventListener('DOMContentLoaded', function() {
    const CpendingSelectedBtn = document.getElementById('CpendingSelectedBtn');
    if (CpendingSelectedBtn) {
        CpendingSelectedBtn.addEventListener('click', function() {
            let selected = [];
            document.querySelectorAll('input[name="request_ids[]"]:checked').forEach(checkbox => {
                selected.push(checkbox.value);
            });
  
            if (selected.length > 0) {
                if (confirm('Are you sure you want to set the selected requests to pending?')) {
                    let form = document.createElement('form');
                    form.method = 'POST';
                    form.action = '4.central_pending_selected.php';
  
                    selected.forEach(id => {
                        let input = document.createElement('input');
                        input.type = 'hidden';
                        input.name = 'request_ids[]';
                        input.value = id;
                        form.appendChild(input);
                    });
  
                    document.body.appendChild(form);
                    form.submit();
                }
            } else {
                alert('Please select at least one item to set as pending.');
            }
        });
    }
  });

document.addEventListener('DOMContentLoaded', function() {
  const PapproveSelectedBtn = document.getElementById('PapproveSelectedBtn');
  if (PapproveSelectedBtn) {
      PapproveSelectedBtn.addEventListener('click', function() {
          let selected = [];
          document.querySelectorAll('input[name="request_ids[]"]:checked').forEach(checkbox => {
              selected.push(checkbox.value);
          });

          if (selected.length > 0) {
              if (confirm('Are you sure you want to approve the selected requests?')) {
                  let form = document.createElement('form');
                  form.method = 'POST';
                  form.action = '4.pharmacy_approve_selected.php';

                  selected.forEach(id => {
                      let input = document.createElement('input');
                      input.type = 'hidden';
                      input.name = 'request_ids[]';
                      input.value = id;
                      form.appendChild(input);
                  });

                  document.body.appendChild(form);
                  form.submit();
              }
          } else {
              alert('Please select at least one item to approve.');
          }
      });
  } else {
      console.error('Approve Selected button not found');
  }
});

document.addEventListener('DOMContentLoaded', function() {
    const LapproveSelectedBtn = document.getElementById('LapproveSelectedBtn');
    if (LapproveSelectedBtn) {
        LapproveSelectedBtn.addEventListener('click', function() {
            let selected = [];
            document.querySelectorAll('input[name="request_ids[]"]:checked').forEach(checkbox => {
                selected.push(checkbox.value);
            });
  
            if (selected.length > 0) {
                if (confirm('Are you sure you want to approve the selected requests?')) {
                    let form = document.createElement('form');
                    form.method = 'POST';
                    form.action = '4.laboratory_approve_selected.php';
  
                    selected.forEach(id => {
                        let input = document.createElement('input');
                        input.type = 'hidden';
                        input.name = 'request_ids[]';
                        input.value = id;
                        form.appendChild(input);
                    });
  
                    document.body.appendChild(form);
                    form.submit();
                }
            } else {
                alert('Please select at least one item to approve.');
            }
        });
    } else {
        console.error('Approve Selected button not found');
    }
  });

document.addEventListener('DOMContentLoaded', function() {
    const CapproveSelectedBtn = document.getElementById('CapproveSelectedBtn');
    if (CapproveSelectedBtn) {
        CapproveSelectedBtn.addEventListener('click', function() {
            let selected = [];
            document.querySelectorAll('input[name="request_ids[]"]:checked').forEach(checkbox => {
                selected.push(checkbox.value);
            });
  
            if (selected.length > 0) {
                if (confirm('Are you sure you want to approve the selected requests?')) {
                    let form = document.createElement('form');
                    form.method = 'POST';
                    form.action = '4.central_approve_selected.php';
  
                    selected.forEach(id => {
                        let input = document.createElement('input');
                        input.type = 'hidden';
                        input.name = 'request_ids[]';
                        input.value = id;
                        form.appendChild(input);
                    });
  
                    document.body.appendChild(form);
                    form.submit();
                }
            } else {
                alert('Please select at least one item to approve.');
            }
        });
    } else {
        console.error('Approve Selected button not found');
    }
  });


document.addEventListener('DOMContentLoaded', function() {
  const selectAllCheckbox = document.getElementById('selectAll');
  console.log(selectAllCheckbox); // Check if this logs the checkbox element in the console

  if (selectAllCheckbox) {
      const checkboxes = document.querySelectorAll('input[name="request_ids[]"]');
      
      selectAllCheckbox.addEventListener('click', function() {
          checkboxes.forEach(checkbox => {
              checkbox.checked = selectAllCheckbox.checked;
          });
      });
  } else {
      console.error('Select All checkbox not found');
  }
});

$(document).ready(function() {
    function checkForNewRequests() {
        $.ajax({
            url: '5.check_new_requests.php',
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



