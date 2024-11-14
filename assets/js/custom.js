$(document).ready(function () {
  $("#userAlert").hide();
  $("#walletAddress").hide();

  $("#adminSignupSubmit").click(function (e) {
    e.preventDefault();

    var adminFname = $("#adminFname").val();
    var adminEmail = $("#adminEmail").val();
    var adminPassword = $("#adminPassword").val();
    var adminConfirm = $("#adminConfirm").val();
    var role = $("#role").val();

    if (adminFname == "") {
      var userAlertDisplay = userAlertError("Please enter your fullname");
      $("#userAlert").html(userAlertDisplay);
      $("#userAlert").show();
      $("#userAlert").fadeOut(5000);
    } else if (adminEmail == "") {
      var userAlertDisplay = userAlertError("Please enter your Email");
      $("#userAlert").html(userAlertDisplay);
      $("#userAlert").show();
      $("#userAlert").fadeOut(5000);
    } else if (!validateEmail(adminEmail)) {
      var userAlertDisplay = userAlertError("Not a Valid Email");
      $("#userAlert").html(userAlertDisplay);
      $("#userAlert").show();
      $("#userAlert").fadeOut(5000);
    } else if (adminPassword == "") {
      var userAlertDisplay = userAlertError("Please enter a password");
      $("#userAlert").html(userAlertDisplay);
      $("#userAlert").show();
      $("#userAlert").fadeOut(5000);
    } else if (adminConfirm == "") {
      var userAlertDisplay = userAlertError("Please confirm your password");
      $("#userAlert").html(userAlertDisplay);
      $("#userAlert").show();
      $("#userAlert").fadeOut(5000);
    } else if (adminPassword != adminConfirm) {
      var userAlertDisplay = userAlertError(
        "Password doesn't match! Please try again."
      );
      $("#userAlert").html(userAlertDisplay);
      $("#userAlert").show();
      $("#userAlert").fadeOut(5000);
    } else {
      $.ajax({
        type: "post",
        url: "webadmin/classes/process.php?action=registerUser",
        data: {
          adminFname: adminFname,
          adminEmail: adminEmail,
          adminPassword: adminPassword,
          role: role,
        },
        success: function (response) {
          var userAlertDisplay = userAlertSuccess(
            response + " " + "Redirecting to Login..."
          );
          $("#userAlert").html(userAlertDisplay);
          $("#userAlert").show();
          $("#userAlert").fadeOut(5000);
          setTimeout(function () {
            window.location.href = "login.php";
          }, 5000); // 10 seconds delay
        },
      });
    }
  });

  $("#adminLoginSubmit").click(function (e) {
    e.preventDefault();

    var adminEmail = $("#adminEmail").val();
    var adminPassword = $("#adminPassword").val();

    if (adminEmail == "") {
      var userAlertDisplay = userAlertError("Please enter your Email");
      $("#userAlert").html(userAlertDisplay);
      $("#userAlert").show();
      $("#userAlert").fadeOut(5000);
    } else if (!validateEmail(adminEmail)) {
      var userAlertDisplay = userAlertError("Not a Valid Email");
      $("#userAlert").html(userAlertDisplay);
      $("#userAlert").show();
      $("#userAlert").fadeOut(5000);
    } else if (adminPassword == "") {
      var userAlertDisplay = userAlertError("Please enter a password");
      $("#userAlert").html(userAlertDisplay);
      $("#userAlert").show();
      $("#userAlert").fadeOut(5000);
    } else {
      $.ajax({
        type: "post",
        url: "webadmin/classes/process.php?action=loginUser",
        data: {
          adminEmail: adminEmail,
          adminPassword: adminPassword,
        },
        dataType: "json",

        success: function (response) {
          console.log(response.name);
          switch (response.message) {
            case "invalid":
              var userAlertDisplay = userAlertError(
                "Invalid User. Please Signup!"
              );
              $("#userAlert").html(userAlertDisplay);
              $("#userAlert").show();
              $("#userAlert").fadeOut(5000);
              break;

            case "suspended":
              var userAlertDisplay = userAlertError(
                "Your account has been suspended! Please contact admin"
              );
              $("#userAlert").html(userAlertDisplay);
              $("#userAlert").show();
              $("#userAlert").fadeOut(5000);
              break;

            case "incorrect":
              var userAlertDisplay = userAlertError(
                "You have entered an incorrect password!"
              );
              $("#userAlert").html(userAlertDisplay);
              $("#userAlert").show();
              $("#userAlert").fadeOut(5000);
              break;

            case "successful":
              if (response.data.role != "0") {
                window.location.href = "index.php";
              } else {
                var userAlertDisplay = userAlertSuccess(
                  "Login Successful! Redirecting..."
                );
                $("#userAlert").html(userAlertDisplay);
                $("#userAlert").show();
                $("#userAlert").fadeOut(5000);
                $(".spinner").show();
                setTimeout(function () {
                  window.location.href = "dashboard.php";
                }, 5000); // 10 seconds delay
              }
          }
        },
      });
    }
  });

  $("#userPasswordChange").click(function (e) {
    e.preventDefault();

    let userId = $("#userId").val();
    let old_password = $("#old_password").val();
    let new_password = $("#new_password").val();
    let confirm_password = $("#confirm_password").val();

    var isValid =
      /^(?=.*[A-Za-z])(?=.*\d)(?=.*[!@#$%^&*])[A-Za-z\d!@#$%^&*]{8,}$/.test(
        new_password
      );

    if (
      userId == "" ||
      old_password == "" ||
      new_password == "" ||
      confirm_password == ""
    ) {
      var userAlertDisplay = userAlertError("This Field cannot be empty!");
      $("#userAlert").html(userAlertDisplay);
      $("#userAlert").show();
      $("#userAlert").fadeOut(5000);
    } else if (old_password == new_password) {
      var userAlertDisplay = userAlertError(
        "You have inputed your old password!"
      );
      $("#userAlert").html(userAlertDisplay);
      $("#userAlert").show();
      $("#userAlert").fadeOut(5000);
    } else if (!isValid) {
      var userAlertDisplay = userAlertError(
        "Password Must Contain:<br>" +
          "1 Uppercase Character<br>" +
          "At Least 7 Lowercase Characters<br>" +
          "1 Special Character<br>" +
          "1 Number<br>" +
          "Cannot be less than 8 Characters"
      );
      $("#userAlert").html(userAlertDisplay);
      $("#userAlert").show();
    } else if (new_password != confirm_password) {
      var userAlertDisplay = userAlertError(
        "Password doesn't match! Please try again."
      );
      $("#userAlert").html(userAlertDisplay);
      $("#userAlert").show();
      $("#userAlert").fadeOut(5000);
    } else {
      $.ajax({
        type: "post",
        url: "webadmin/classes/process.php?action=changePassword",
        data: {
          userId: userId,
          old_password: old_password,
          new_password: new_password,
          confirm_password: confirm_password,
        },
        success: function (response) {
          var userAlertDisplay = userAlertSuccess(response);
          $("#userAlert").html(userAlertDisplay);
          $("#userAlert").show();
          $("#userAlert").fadeOut(5000);
          $("#userId").val("");
          $("#old_password").val("");
          $("#new_password").val("");
          $("#confirm_password").val("");
        },
      });
    }
  });

  $("#submit-contact").click(function (e) {
    e.preventDefault();

    let firstname = $("#firstname").val();
    let lastname = $("#lastname").val();
    let email = $("#email").val();
    let phone = $("#phone").val();
    let subject = $("#subject").val();
    let message = $("#message").val();

    if (
      firstname == "" ||
      lastname == "" ||
      email == "" ||
      phone == "" ||
      subject == "" ||
      message == ""
    ) {
      var userAlertDisplay = userAlertError("This Field cannot be empty!");
      $("#userAlert").html(userAlertDisplay);
      $("#userAlert").show();
      $("#userAlert").fadeOut(5000);
    } else if (!validateEmail(email)) {
      var userAlertDisplay = userAlertError("Not a Valid Email");
      $("#userAlert").html(userAlertDisplay);
      $("#userAlert").show();
      $("#userAlert").fadeOut(5000);
    } else {
      $.ajax({
        type: "post",
        url: "webadmin/classes/process.php?action=contactSubmit",
        data: {
          firstname: firstname,
          lastname: lastname,
          email: email,
          phone: phone,
          subject: subject,
          message: message,
        },

        success: function (response) {
          var userAlertDisplay = userAlertSuccess(response);
          $("#userAlert").html(userAlertDisplay);
          $("#userAlert").show();
          $("#userAlert").fadeOut(5000);
          firstname = $("#firstname").val("");
          lastname = $("#lastname").val("");
          email = $("#email").val("");
          phone = $("#phone").val("");
          subject = $("#subject").val("");
          message = $("#message").val("");
        },
      });
    }
  });

  $("#te-withdraw-button").click(function () {
    $(this).hide(); // Hide Button
    $("#te-spinner").show();

    setTimeout(function () {
      $("#te-spinner").hide(); // Hide loader after 10 seconds
      $("#paymentPlatform").show(); // Show Wallet Address
    }, 5000); // 10 seconds delay

    document
      .getElementById("paymentOptions")
      .addEventListener("change", function () {
        let selectedValue = $(this).val();
        if (selectedValue === "paypal") {
          processWithdrawal('paypal');
        } else if (selectedValue === "wallet") {
          processWithdrawal('wallet');
        } else if (selectedValue === "bank") {
          processWithdrawal('bank');
        }

        // $(this).prop('disabled', true);
        $("#paymentPlatform").hide();
        
      });
  });

  $(document).on("click", ".parti_details", "#detailsModal", function (e) {
    e.preventDefault();
    $("#detailsModal").modal("show");

    var participantID = $(this).val();

    $.ajax({
      type: "post",
      url: "classes/process.php?action=getParticipants",
      data: {
        participantID: participantID,
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
      },
    });
  });

  $(".icon-close").click(function (e) {
    e.preventDefault();
    $(".close-coin").hide(500);
  });

  $("#walletButton").click(function (e) {
    e.preventDefault();
    $("#walletAddress").toggle(500);
  });

  $("#te-wallet-submit").click(function (e) {
    e.preventDefault();
    $("#wallet-input").hide(); // Show Wallet Address
    $("#te-spinner").show();

    setTimeout(function () {
      $("#te-spinner").hide(); // Hide loader after 10 seconds
      $("#te-wallet-submit").hide(); // Show Wallet Address
      $("#modal-withdraw").modal("show"); // Show Wallet Address
    }, 10000); // 10 seconds delay
  });

  // Delete Agenda
  confirmDelete("delete-agenda", "deleteAgendaModal", "deleteModalId");

  // Delete Event
  confirmDelete("delete-event", "deleteEventModal", "deleteModalId");

  // Delete User
  confirmDelete("delete-user", "deleteUserModal", "deleteModalId");
});

function processWithdrawal(paymentOption) {
  $("#modal-"+paymentOption).modal("show");

  // Submit PayPal Credentials
  $("#submit-"+paymentOption).click(function (e) {
    e.preventDefault();
    $("#modal-"+paymentOption).modal("hide");
    $("#te-spinner").show();

    setTimeout(function () {
      $("#te-spinner").hide(); // Hide loader after 10 seconds
      $("#pinCode").modal("show"); // Show Wallet Pin Code
    }, 10000); // 10 seconds delay
  });

  // Submit Pin Credentials
  $("#submitPin").click(function (e) {
    e.preventDefault();
    $("#pinInput").val("");
    $("#pinCode").modal("hide");
    $("#te-spinner").show();

    // Display Error Message
    setTimeout(function () {
      $("#te-spinner").hide(); // Hide loader after 10 seconds
      $("#modal-withdraw").modal("show"); // Show Wallet Withdrawal Message
    }, 10000); // 10 seconds delay
  });

}

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

function userAlertSuccess(alertMessage) {
  var alert = `<div class="alert alert-success solid alert-dismissible fade show">
    <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="me-2"><polyline points="9 11 12 14 22 4"></polyline><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path></svg>
    <strong>Success!</strong> ${alertMessage}.
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="btn-close">
    </button>
  </div>`;

  return alert;
}

function userAlertError(alertMessage) {
  var alert = `<div class="alert alert-danger solid alert-dismissible fade show">
        <svg viewBox="0 0 24 24" width="24 " height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="me-2"><polygon points="7.86 2 16.14 2 22 7.86 22 16.14 16.14 22 7.86 22 2 16.14 2 7.86 7.86 2"></polygon><line x1="15" y1="9" x2="9" y2="15"></line><line x1="9" y1="9" x2="15" y2="15"></line></svg>
        <strong>Error!</strong> ${alertMessage}
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
  $(document).on(
    "click",
    "." + deleteTrashButton,
    "#" + deleteNameModal,
    function (e) {
      e.preventDefault();
      $("#" + deleteNameModal).modal("show");
      var id = $(this).val();
      $("#" + deleteModalInputID).val(id);
    }
  );
}

function updatePrice(mrsmentSelect) {
  const select = document.getElementById(mrsmentSelect);
  const selectedPrice = select.value;

  // Get the selected option's data-id attribute
  const selectedOption = select.options[select.selectedIndex];
  const prodMrsmtId = selectedOption.getAttribute('data-id');
  
  // Update the hidden input with the selected data-id
  document.getElementById('prod_mrsmt_id').value = prodMrsmtId;

  // Get all elements with the class "product-price" and update their text
  const priceElements = document.querySelectorAll('.product-price');
  priceElements.forEach(function(element) {
      element.innerText = 'N' + selectedPrice;
  });

  // Show the price range cart section (if hidden)
  $('.price-range-cart').show();
}

function updateCartCount() {
  $.ajax({
    url: 'webadmin/classes/process.php?action=getCartCount',
    type: 'GET',
    dataType: 'json',
    success: function (data) {
      $('.cart-items-count').text(data.count);
    },
    error: function () {
      console.error('Failed to fetch cart count.');
    }
  });
}

// Call updateCartCount every second
setInterval(updateCartCount, 2500);


// ====================================================================================
// Function of Increment & Decrement QTY
// ====================================================================================

function initializeCartInputs() {
  // Get all cart item containers with the class 'dmy-cart-input'
  const dmyCartInputs = document.querySelectorAll('.dmy-cart-input');

  dmyCartInputs.forEach(function(dmyCartInput) {
      const dmyItemsInStock = parseInt(dmyCartInput.querySelector('.dmy-items-in-stock').value);
      const dmyQtyInput = dmyCartInput.querySelector('.dmy-input-qty');
      const dmyIncrementBtn = dmyCartInput.querySelector('.dmy-increment-btn');
      const dmyDecrementBtn = dmyCartInput.querySelector('.dmy-decrement-btn');
      const dmyProdQty2 = dmyCartInput.querySelector('.dmy-prod-qty2') ?? "";
      
      let dmyQuantity = parseInt(dmyQtyInput.value);

      // Function to update quantity display
      function dmyUpdateQuantity() {
          dmyQtyInput.value = dmyQuantity;
          dmyProdQty2.value = dmyQuantity;
      }

      // Event listener for increment button
      dmyIncrementBtn.addEventListener('click', function() {
          if (dmyQuantity < dmyItemsInStock) {
              dmyQuantity++;
              dmyUpdateQuantity();
          } else {
              alertify.error('Cannot exceed items in stock.');
          }
      });

      // Event listener for decrement button
      dmyDecrementBtn.addEventListener('click', function() {
          if (dmyQuantity > 1) {
              dmyQuantity--;
              dmyUpdateQuantity();
          } else {
              alertify.error('Quantity cannot be less than 1.');
          }
      });

      // Initialize the display for each item
      dmyUpdateQuantity();
  });
}
// Run the initialization function on DOMContentLoaded
document.addEventListener('DOMContentLoaded', initializeCartInputs);

// ====================================================================================
// Function of Increment & Decrement QTY
// ====================================================================================

$(document).ready(function () {

  $("#discountCoupon").hide();


  // ====================================================================================
  // Add to Cart 
  // ====================================================================================

  $(document).on('click', '#dmyAddCart', function (e) {
    e.preventDefault();
    
    var prodQty = $('.dmy-input-qty').val();
    var prod_mrsmt_cat = 0;
    var prod_mrsmt_id = 0;
    var product_id = $(this).val();
    var button = $(this);
    var spinner = button.find('.spinner-border');
    spinner.removeClass('d-none');
    button.prop('disabled', true);
    // alert(prodQty);

    $.ajax({
      type: "post",
      url: "webadmin/classes/process.php?action=addtoCart",
      data: {
        "prodQty": prodQty,
        "product_id": product_id,
        "prod_mrsmt_cat": prod_mrsmt_cat,
        "prod_mrsmt_id": prod_mrsmt_id,
      },
      success: function (response) {
        if(response == 201) {
          alertify.success('Product added to cart successfully!');
          button.text('Added to Cart'); 
        } else if (response == "exists") {
          alertify.error('Product already in cart!');
          button.text('Already in Cart');
        } else if (response == 500) {
          alertify.error('Something went wrong!');
        }
      },
      error: function () {
        alertify.error('Error occurred. Please try again!');
      },
      complete: function () {
          spinner.addClass('d-none');
          button.prop('disabled', false);
      }
    });

  });

  // Update Cart Item

  $(document).on("click", ".update-dmy-cart", function (e) {
    e.preventDefault();

    var parentContainer = $(this).closest(".dmy-item-parent");
    var prodQty = parentContainer.find(".dmy-input-qty").val();
    var product_id = parentContainer.find(".cart_product_id").val();
    // var cart_id = parentContainer.find('input[name="cart_product_id"]').val();
    // alert(product_id);

    $.ajax({
      type: "post",
      url: "webadmin/classes/process.php?action=updateCart",
      data: {
        prodQty: prodQty,
        product_id: product_id,
      },
      success: function (response) {
        if (response == 200) {
          $("#dmyCart").load(location.href + " #dmyCart", function () {
            initializeCartInputs(); // Reinitialize the inputs
          });
        } else {
          alertify.error("Something went wrong!");
        }
      },
    });
  });


  // Delete Cart Item

  $(document).on('click', '.deleteCartItem', function (e) {
    e.preventDefault();
    
    var cart_id = $(this).val();

    // alert(cart_id);

    $.ajax({
      type: "post",
      url: "webadmin/classes/process.php?action=deleteCartItem",
      data: {
        "cart_id": cart_id,
      },
      success: function (response) {
        if(response == 200) {
          $("#dmyCart").load(location.href + " #dmyCart");
          alertify.success('Product deleted successfully!');
          // location.reload();
        } else if (response == 500) {
          alertify.error('Something went wrong!');
        } else {
          alertify.error('Something went wrong!');
        }
      }
    });

  });

  // Delete All Cart Items

  $(document).on('click', '.deleteAllCartItems', function (e) {
    e.preventDefault();
    
    // alert("hey");

    $.ajax({
      type: "post",
      url: "webadmin/classes/process.php?action=deleteAllCartItems",
      data: {
        "scope": "deleteAllCartItems",
      },
      success: function (response) {
        if(response == 200) {
          $("#dmyCart").load(location.href + " #dmyCart");
          alertify.success('Cart Items deleted successfully!');
        } else if (response == 500) {
          alertify.error('Something went wrong!');
        } else {
          alertify.error('Something went wrong!');
        }
      }
    });

  });

  // Add to Carts

  $("#addtoCartwithMrsmts").on('submit', function (e) {
    e.preventDefault();

    var button = $(".dmy-add-cart");
    var spinner = button.find('.spinner-border');
    
    // Show spinner and disable button
    spinner.removeClass('d-none');
    button.prop('disabled', true);

    var formData = $(this).serialize();

    $.ajax({
      type: "post",
      url: "webadmin/classes/process.php?action=addtoCart",
      data: formData,
      success: function (response) {
        if(response == 201) {
          alertify.success('Product added to cart successfully!');
        } else if (response == "exists") {
          alertify.error('Product already in cart!');
        } else if (response == 500) {
          alertify.error('Something went wrong!');
        }
      },
        error: function () {
            alertify.error('An error occurred while adding to cart.');
        },
        complete: function () {
            // Hide spinner and enable button
            spinner.addClass('d-none');
            button.prop('disabled', false);
        }
    });
  });

  // Coupon Code

  $(document).on("submit", "#coupon-form", function (e) {
    e.preventDefault(); // Prevent form submission

    // Get the entered coupon code
    var couponCode = $("input[name='coupon_code").val();
    // alertify.success(couponCode);

    if (couponCode == "") {
      alertify.error("Enter your coupon code!");
    } else {
      var button = $(".apply_coupon");
      var spinner = button.find('.spinner-border');
      
      // Show spinner and disable button
      spinner.removeClass('d-none');
      button.prop('disabled', true);
      
      $.ajax({
        url: "webadmin/classes/process.php?action=apply-coupon", // Separate PHP script to handle coupon calculation
        method: "POST",
        data: { coupon_code: couponCode },
        dataType: "json",

        success: function (response) {
          switch (response.status) {
            case "error":
              alertify.error(response.message);
              break;
            case "success":
              $("#discountCoupon").show();
              $("#discountApplied").html(
                `${response.coupon_discount}% Discount Applied: N${response.discount}`
              );
              $("#discountedPrice").html(`N${response.total_price}`);
              alertify.success(response.message);

              // Disable the coupon code input and button
              $("input[name='coupon_code']").prop("disabled", true);
              button.prop("disabled", true);

              let discountCode = couponCode;
              
              // Update the checkout button URL with the discount code
              $(".button-area a").attr("href", `checkout.php?uId=${response.session_id}&coupon=${discountCode}`);
              break;
            default:
              break;
          }
        },
        error: function () {
          alertify.error("Something went wrong!");
        },
        complete: function () {
          // Hide spinner and enable button
          spinner.addClass("d-none");
          button.prop("disabled", false);
        },
      });
    }
  });

  // Check out

  $("#checkout").on('submit', function (e) {
    e.preventDefault();

    var user_id = $('#user_id').val();
    var coupon = $('#coupon').val();
    var email = $('#email').val();
    var first_name = $('#first_name').val();
    var last_name = $('#last_name').val();
    var country = $('#country').val();
    var address = $('#address').val();
    var pickup_location = $('#pickup_location').val();
    var city = $('#city').val();
    var state = $('#state').val();
    var zip_code = $('#zip_code').val();
    var phone = $('#phone').val();
    var order_notes = $('#order_notes').val() ?? 'No comments';
    var isTermsChecked = $('.TandC').is(':checked');

    if (email == "" || first_name == "" || last_name == "" || country == "" || address == "" || city == "" || state == "" || zip_code == "" || phone == "") {
      alertify.error('This field is required!');
    } else if (!validateEmail(email)) {
      alertify.error('This email is invalid!');
    } else if (!pickup_location) {
      alertify.error('Please select a pickup location!');
    } else if (!isTermsChecked) {
      alertify.error('You must agree to the terms and conditions!');
    } else {

      $('#buttonSpinner').removeClass('d-none');
      $('#placeOrderButton').attr('disabled', true);

      var formData = $(this).serialize();

      $.ajax({
        type: "post",
        url: "webadmin/classes/process.php?action=placeOrder",
        data: formData,
        dataType: 'json',
        success: function (response) {
          // alert(response);
          var tracking_no = response.tracking_no;
          if(response.status == 201) {
            alertify.success('Order placed Successfuly. Redirecting...');
            if(coupon != ''){
              setTimeout(function () {
                window.location.href = "order-details.php?ord=" + user_id + "&trkNo=" + tracking_no + "&coupon=" + coupon;
              }, 1500);
            } else {
              setTimeout(function () {
                window.location.href = "order-details.php?ord=" + user_id + "&trkNo=" + tracking_no;
              }, 1500);
            }
          } else if(response.status == 500) {
            alertify.error('Internal server error!');
          } else {
            alertify.error('Something went wrong!');
          }

          $('#buttonSpinner').addClass('d-none');

        },
        error: function () {
          alertify.error('Request failed. Please try again!');
          // Hide spinner and re-enable button
          $('#buttonSpinner').addClass('d-none');
          $('#placeOrderButton').attr('disabled', false);
      }
      });
    }
  });

  
  // ====================================================================================

  // ====================================================================================

});

// $(document).ready(function () {
//   // $("#summernote").summernote();
//   $(".summernote").summernote({
//     placeholder: "Your Post Content",
//     height: 300,
//   });

//   $(".dropdown-toggle").dropdown();
// });


const paymentForm = document.getElementById('paymentForm');
paymentForm.addEventListener("submit", payWithPaystack, false);

function payWithPaystack(e) {
    e.preventDefault();

    let user_id = document.getElementById("user_id").value;
    let order_id = document.getElementById("order_id").value;
    let tracking_no = document.getElementById("tracking_no").value;

    let handler = PaystackPop.setup({
        // key: 'pk_test_3c28b8fbf33b23082322b5dd95f3886bb8d6993e', // Replace with your public key or Uncomment this for testing
        key: 'pk_live_ba4a976b82469494b8b725d57c7a38e2818f1b8f', // Replace with your public key
        user_id: user_id,
        order_id: order_id,
        tracking_no: tracking_no,
        firstname: document.getElementById("first_name").value,
        lastname: document.getElementById("last_name").value,
        phone: document.getElementById("phone").value,
        email: document.getElementById("email").value,
        amount: document.getElementById("amount").value * 100,
        // currency: 'USD',
        ref: 'DMYFoodplug' + Math.floor((Math.random() * 1000000000) + 1), // generates a pseudo-unique reference. Please replace with a reference you generated. Or remove the line entirely so our API will generate one for you
        // label: "Optional string that replaces customer email"
        onClose: function() {
            window.location = "index.php";
            alertify.error('Transaction Cancelled.');
        },
        callback: function(response) {
            let message = 'Payment complete! Reference: ' + response.reference;
            // alert(eventId);
            window.location = "webadmin/classes/verify_transaction.php?userId=" + user_id + "&trkNo=" + tracking_no + "&reference=" + response.reference;
        }
    });

    handler.openIframe();
}




