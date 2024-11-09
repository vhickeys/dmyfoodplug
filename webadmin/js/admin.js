$(document).ready(function () {
  $("#adminAlert").hide();
  $(".adminAlert").hide();
  $(".spinner").hide();

  $("#adminSignupSubmit").click(function (e) {
    e.preventDefault();

    var adminFname = $("#adminFname").val();
    var adminEmail = $("#adminEmail").val();
    var adminPassword = $("#adminPassword").val();
    var adminConfirm = $("#adminConfirm").val();
    var role = $("#role").val();

    if (adminFname == "") {
      var alertDisplay = adminAlertError("Please enter your fullname");
      $("#adminAlert").html(alertDisplay);
      $("#adminAlert").show();
      $("#adminAlert").fadeOut(5000);
    } else if (adminEmail == "") {
      var alertDisplay = adminAlertError("Please enter your Email");
      $("#adminAlert").html(alertDisplay);
      $("#adminAlert").show();
      $("#adminAlert").fadeOut(5000);
    } else if (!validateEmail(adminEmail)) {
      var alertDisplay = adminAlertError("Not a Valid Email");
      $("#adminAlert").html(alertDisplay);
      $("#adminAlert").show();
      $("#adminAlert").fadeOut(5000);
    } else if (adminPassword == "") {
      var alertDisplay = adminAlertError("Please enter a password");
      $("#adminAlert").html(alertDisplay);
      $("#adminAlert").show();
      $("#adminAlert").fadeOut(5000);
    } else if (adminConfirm == "") {
      var alertDisplay = adminAlertError("Please confirm your password");
      $("#adminAlert").html(alertDisplay);
      $("#adminAlert").show();
      $("#adminAlert").fadeOut(5000);
    } else if (adminPassword != adminConfirm) {
      var alertDisplay = adminAlertError(
        "Password doesn't match! Please try again."
      );
      $("#adminAlert").html(alertDisplay);
      $("#adminAlert").show();
      $("#adminAlert").fadeOut(5000);
    } else {
      $.ajax({
        type: "post",
        url: "classes/process.php?action=registerUser",
        data: {
          'adminFname': adminFname,
          'adminEmail': adminEmail,
          'adminPassword': adminPassword,
          'role': role,
        },
        success: function (response) {
          var alertDisplay = adminAlertSuccess(response);
          $("#adminAlert").html(alertDisplay);
          $("#adminAlert").show();
          $("#adminAlert").fadeOut(5000);
        },
      });
    }
  });

  $("#adminLoginSubmit").click(function (e) {
    e.preventDefault();

    var adminEmail = $("#adminEmail").val();
    var adminPassword = $("#adminPassword").val();

    if (adminEmail == "") {
      var alertDisplay = adminAlertError("Please enter your Email");
      $("#adminAlert").html(alertDisplay);
      $("#adminAlert").show();
      $("#adminAlert").fadeOut(5000);
    } else if (!validateEmail(adminEmail)) {
      var alertDisplay = adminAlertError("Not a Valid Email");
      $("#adminAlert").html(alertDisplay);
      $("#adminAlert").show();
      $("#adminAlert").fadeOut(5000);
    } else if (adminPassword == "") {
      var alertDisplay = adminAlertError("Please enter a password");
      $("#adminAlert").html(alertDisplay);
      $("#adminAlert").show();
      $("#adminAlert").fadeOut(5000);
    } else {
      $.ajax({
        type: "post",
        url: "classes/process.php?action=loginUser",
        data: {
          'adminEmail': adminEmail,
          'adminPassword': adminPassword,
        },
        dataType: "json",

        success: function (response) {
          console.log(response.name);
          switch (response.message) {
            case "invalid":
              var alertDisplay = adminAlertError("Invalid User. Please Signup!");
              $("#adminAlert").html(alertDisplay);
              $("#adminAlert").show();
              $("#adminAlert").fadeOut(5000);
              break;

            case "suspended":
              var alertDisplay = adminAlertError("Your account has been suspended! Please contact admin");
              $("#adminAlert").html(alertDisplay);
              $("#adminAlert").show();
              $("#adminAlert").fadeOut(5000);
              break;

            case "incorrect":
              var alertDisplay = adminAlertError("You have entered an incorrect password!");
              $("#adminAlert").html(alertDisplay);
              $("#adminAlert").show();
              $("#adminAlert").fadeOut(5000);
              break;

            case "successful":
              if (response.data.role == "0") {
                window.location.href = "../index.php";
              } else {
                var alertDisplay = adminAlertSuccess("Login Successful! Redirecting...");
                $("#adminAlert").html(alertDisplay);
                $("#adminAlert").show();
                $("#adminAlert").fadeOut(5000);
                $(".spinner").show();
                window.location.href = "../webadmin/index.php";
              }
          }
        },
      });
    }
  });

  $(document).on('click', '.parti_details', '#detailsModal', function (e) {
    e.preventDefault();
    $("#detailsModal").modal('show');

    var participantID = $(this).val();

    $.ajax({
      type: "post",
      url: "classes/process.php?action=getParticipants",
      data: {
        'participantID': participantID
      },
      dataType: "json",

      success: function (response) {
        var event_id = response.event_id;
        var event_title = response.event_title;
        var firstname = response.firstname;
        var lastname = response.lastname;
        var email = response.email;
        var phone = response.phone;
        var company = response.company;
        var job_title = response.job_title;
        var country = response.country;
        var date_created = response.date_created;

        var fullname = firstname + " " + lastname;
        $("#participantName").html(fullname);
        $("#registeredEvent").html("Event Registered: " + event_title);
        $("#participantEmail").html("Email: " + email);
        $("#participantPhone").html("Phone Number: " + phone);
        $("#participantCompany").html("Company: " + company);
        $("#participantJob_title").html("Job Title: " + job_title);
        $("#participantCountry").html("Country: " + country);
        $("#participantRegistration").html("Date Registered : " + date_created);
      }
    });
  });

  $("#adminPasswordChange").click(function (e) {
    e.preventDefault();

    let userId = $("#userId").val();
    let old_password = $("#old_password").val();
    let new_password = $("#new_password").val();
    let confirm_password = $("#confirm_password").val();

    var isValid = /^(?=.*[A-Za-z])(?=.*\d)(?=.*[!@#$%^&*])[A-Za-z\d!@#$%^&*]{8,}$/.test(new_password);

    if (
      userId == "" ||
      old_password == "" ||
      new_password == "" ||
      confirm_password == ""
    ) {
      var adminAlertDisplay = adminAlertError("This Field cannot be empty!");
      $(".adminAlert").html(adminAlertDisplay);
      $(".adminAlert").show();
      $(".adminAlert").fadeOut(5000);
    } else if (old_password == new_password) {
      var adminAlertDisplay = adminAlertError(
        "You have inputed your old password!"
      );
      $(".adminAlert").html(adminAlertDisplay);
      $(".adminAlert").show();
      $(".adminAlert").fadeOut(5000);
    } else if (!isValid) {
      var adminAlertDisplay = adminAlertError(
        "Password Must Contain:<br>" +
          "1 Uppercase Character<br>" +
          "At Least 7 Lowercase Characters<br>" +
          "1 Special Character<br>" +
          "1 Number<br>" +
          "Cannot be less than 8 Characters"
      );
      $(".adminAlert").html(adminAlertDisplay);
      $(".adminAlert").show();
    } else if (new_password != confirm_password) {
      var adminAlertDisplay = adminAlertError(
        "Password doesn't match! Please try again."
      );
      $(".adminAlert").html(adminAlertDisplay);
      $(".adminAlert").show();
      $(".adminAlert").fadeOut(5000);
    } else {
      $.ajax({
        type: "post",
        url: "classes/process.php?action=changePassword",
        data: {
          'userId': userId,
          'old_password': old_password,
          'new_password': new_password,
          'confirm_password': confirm_password,
        },
        success: function (response) {
          var adminAlertDisplay = adminAlertSuccess(response);
          $(".adminAlert").html(adminAlertDisplay);
          $(".adminAlert").show();
          $(".adminAlert").fadeOut(5000);
          $("#userId").val("");
          $("#old_password").val("");
          $("#new_password").val("");
          $("#confirm_password").val("");
        },
      });
    }
  });

  // Delete Agenda
  confirmDelete("delete-agenda", "deleteAgendaModal", "deleteModalId");

  // Delete Event
  confirmDelete("delete-event", "deleteEventModal", "deleteModalId");

  // Delete User
  confirmDelete("delete-user", "deleteUserModal", "deleteModalId");

  // Change User Role
  confirmDelete("change-role", "changeUserRoleModal", "userId");

  // Delete Product Weight
  confirmDelete("deleteProdWeight", "deleteProdWeightModal", "deleteProdWeightId");

  // Delete Product Size
  confirmDelete("deleteProdSize", "deleteProdSizeModal", "deleteProdSizeId");

  // Delete Product Slot
  confirmDelete("deleteProdSlot", "deleteProdSlotModal", "deleteProdSlotId");

  // Delete Coupon Code
  confirmDelete("deleteCouponBtn", "deleteCouponModal", "deleteCouponId");

});

function adminAlertError(alertMessage) {
  var alert = `<div class="alert alert-danger solid alert-dismissible fade show">
        <svg viewBox="0 0 24 24" width="24 " height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="me-2"><polygon points="7.86 2 16.14 2 22 7.86 22 16.14 16.14 22 7.86 22 2 16.14 2 7.86 7.86 2"></polygon><line x1="15" y1="9" x2="9" y2="15"></line><line x1="9" y1="9" x2="15" y2="15"></line></svg>
        <strong>Error!</strong> ${alertMessage}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="btn-close">
        </button>
    </div>`;

  return alert;
}

function adminAlertSuccess(alertMessage) {
  var alert = `<div class="alert alert-success solid alert-dismissible fade show">
  <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="me-2"><polyline points="9 11 12 14 22 4"></polyline><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path></svg>
  <strong>Success!</strong> ${alertMessage}.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="btn-close">
  </button>
</div>`;

  return alert;
}

function validateEmail(email) {
  const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
  return emailRegex.test(email);
}

function confirmDelete(deleteTrashButton, deleteNameModal, deleteModalInputID) {
  $(document).on('click', '.' + deleteTrashButton, '#' + deleteNameModal, function (e) {
    e.preventDefault();
    $("#" + deleteNameModal).modal('show');
    var id = $(this).val();
    $("#" + deleteModalInputID).val(id);
  });
}

// Function to toggle the visibility of actions div
function toggleActions(button) {
  var actionsDiv = button.closest('tr').querySelector('.actions');
  actionsDiv.classList.toggle("show");
  // Toggle display property of the actions div
  if (actionsDiv.classList.contains("show")) {
    actionsDiv.style.display = "flex";
  } else {
    actionsDiv.style.display = "none";
  }
}

document.addEventListener('click', function(event) {
  if (event.target.classList.contains('userAction')) {
      toggleActions(event.target);
  }
});

$(document).ready(function () {
  // $("#summernote").summernote();
  $(".summernote").summernote({
    placeholder: "Your Post Content",
    height: 300,
  });

  $(".dropdown-toggle").dropdown();
});
