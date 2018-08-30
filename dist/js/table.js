// Pure JS
let myCustomers = (function () {
  let customers = [
    {
      'id': 1,
      'name': 'Manas Ranjan',
      'gender': 'Male',
      'country': 'India',
      'phone': 7978022452
    },
    {
      'id': 2,
      'name': 'Vishnu',
      'gender': 'Male',
      'country': 'India',
      'phone': 8896363534
    },
    {
      'id': 3,
      'name': 'Sindusha',
      'gender': 'Female',
      'country': 'India',
      'phone': 9987345190
    }
  ];

  // Setting some sample values if no cutomers exists in storage
  localStorage.setItem('customers', localStorage.getItem('customers') || JSON.stringify(customers));

  // Adding a new customer
  let addCustomer = function (input) {
    let customers = JSON.parse(localStorage.getItem('customers'));
    // Checking possible errors
    try {
      if (!input.gender) {
        throw false;
      }
      if (!isNaN(parseInt(input.name))) {
        throw false;
      }
      if (!isNaN(parseInt(input.country))) {
        throw false;
      }
      if (isNaN(parseInt(input.phone))) {
        throw false;
      }
    }
    catch (err) {
      return err;
    }
    input.phone = parseInt(input.phone);
    input.id = autoIncrementId();
    customers.push(input);
    localStorage.setItem('customers', JSON.stringify(customers));
    return true;
  };

  // To increment id
  let autoIncrementId = function () {
    let customers = JSON.parse(localStorage.getItem('customers'));
    let ids = [];
    for (let i = 0; i < customers.length; i++) {
      ids.push(customers[i].id);
    }
    let newId = Math.max(...ids) + 1;
    return newId;
  };

  // To get list of all the customers
  let getCustomers = function () {
    let customers = JSON.parse(localStorage.getItem('customers'));
    return customers;
  }

  // To find customer
  let findCustomer = function (id) {
    let customers = JSON.parse(localStorage.getItem('customers'));
    let requestedCustomer = {};
    for (let i = 0; i < customers.length; i++) {
      if (id === customers[i].id) {
        requestedCustomer.id = customers[i].id;
        requestedCustomer.name = customers[i].name;
        requestedCustomer.gender = customers[i].gender;
        requestedCustomer.country = customers[i].country;
        requestedCustomer.phone = customers[i].phone;
      }
    }
    return requestedCustomer;
  };

  // Update customer details
  let updateCustomer = function (updatedCustomer) {
    let customers = JSON.parse(localStorage.getItem('customers'));
    // Checking all possible exceptions
    try {
      if (!updatedCustomer.name || !isNaN(parseInt(updatedCustomer.name))) {
        throw false;
      }
      if (!updatedCustomer.country || !isNaN(parseInt(updatedCustomer.country))) {
        throw false;
      }
      if (!updatedCustomer.phone || isNaN(parseInt(updatedCustomer.phone))) {
        throw false;
      }
    }
    catch (err) {
      return err;
    }
    for (let i = 0; i < customers.length; i++) {
      if (updatedCustomer.id === customers[i].id) {
        customers[i].id = updatedCustomer.id;
        customers[i].name = updatedCustomer.name;
        customers[i].gender = updatedCustomer.gender;
        customers[i].country = updatedCustomer.country;
        customers[i].phone = updatedCustomer.phone;
      }
    }
    localStorage.setItem('customers', JSON.stringify(customers));
    return true;
  };

  // Delete customer
  let deleteCustomer = function (id) {
    let customers = JSON.parse(localStorage.getItem('customers'));
    let index = 0;
    for (let i = 0; i < customers.length; i++) {
      if (id === customers[i].id) {
        index = i;
      }
    }
    if (index >= 0) {
      customers.splice(index, 1);
    }
    localStorage.setItem('customers', JSON.stringify(customers));
  };

  return {
    addCustomer: addCustomer,
    findCustomer: findCustomer,
    getCustomers: getCustomers,
    updateCustomer: updateCustomer,
    deleteCustomer: deleteCustomer
  };

}());

// jQuery part
$(document).ready(function () {

  let customerTable = '';
  let id = '';
  const timeToHide = 2000;

  // Catching frequently used DOM elements
  let $customerTable = $('.customer-table');
  let $formContainer = $('.form-container');
  let $messageBox = $('.message');
  let $addCustomer = $('.add-button');
  let $updateCustomer = $('.update-button');
  let $errorMessage = $('.error-msg');

  // Function to create a table using DataTable plugin
  let createTable = function (customers) {
    customerTable = $customerTable.DataTable({
      data: customers,
      columns: [
        { data: 'name' },
        { data: 'gender' },
        { data: 'country' },
        { data: 'phone' },
        {
          data: null,
          render: function (data, type, row, meta) {
            return `<div style="text-align: center"><a href="" class="edit_details" data-id="${data.id}" title="edit" >
            <img src="http://i.imgur.com/DHma3ln.png" alt="Edit" width=20px></a>
            <a href="" class="delete_details" data-id="${data.id}" title="delete" style="padding-left: 20px;">
            <img src="http://i.imgur.com/HNUCXDU.png" alt="Delete" width=20px></a></div>`;
          }
        }
      ],
      columnDefs: [
        { width: "30%", targets: 0 },
        { width: "15%", targets: 1 },
        { width: "25%", targets: 2 },
        { width: "20%", targets: 3 },
        { width: "10%", targets: 4, orderable: false }
      ]
    });
  }

  // Creating the table on page load
  createTable(JSON.parse(localStorage.getItem('customers')));

  // Function  to scroll to form
  let scrollToForm = function () {
    $('html, body').stop().animate({
      scrollTop: $formContainer.offset().top
    }, timeToHide);
  };

  // To pop up a message according to action performed
  let showMessage = function () {
    $messageBox.show();
    setTimeout(function () {
      $messageBox.hide('slow');
    }, timeToHide);
  };

  $addCustomer.click(function (e) {
    e.preventDefault();
    /**
     * Extracting customer details from form of webpage and reducing it to an object
     * to operate on it.
     */
    let customerDetails = $('.customer-details').serializeArray().reduce(function (obj, item) {
      obj[item.name] = item.value;
      return obj;
    }, {});
    let status = myCustomers.addCustomer(customerDetails);
    if (status) {
      let customers = myCustomers.getCustomers();
      if ($.fn.DataTable.isDataTable(customerTable)) {
        customerTable.destroy();
      }
      createTable(customers);
      $('.customer-details')[0].reset();
      $messageBox.text(`${customerDetails.name} has been added to customers list.`);
      showMessage();
      $errorMessage.text('');
    }
    else {
      $errorMessage.text('Please fill all fields with valid details.');
    }
  });

  // Resetting form details when clicked on reset button
  $('.reset-button').click(function (e) {
    e.preventDefault();
    $('.customer-details')[0].reset();
    $errorMessage.text('');
  })

  // Method to delete customers from table
  $(document).on('click', '.delete_details', function (e) {
    e.preventDefault(); // Prevents link from following the URL
    // Asking for confirmation before deleting
    if (confirm("Are you sure?")) {
      id = $(this).data('id');
      myCustomers.deleteCustomer(parseInt(id));
      let customers = myCustomers.getCustomers();
      if ($.fn.DataTable.isDataTable(customerTable)) {
        customerTable.destroy();
      }
      createTable(customers);
      $messageBox.text(`Customer has been deleted from customers list.`);
      showMessage();
    }
  });

  // Method to edit details of customer form customers list
  $(document).on('click', '.edit_details', function (e) {
    e.preventDefault(); // Prevents link from following the URL
    id = $(this).data('id');
    let clickedCustomer = myCustomers.findCustomer(id);
    $('#txtName').val(clickedCustomer.name);
    $('#txtCountry').val(clickedCustomer.country);
    $('#txtNumber').val(clickedCustomer.phone);
    if (clickedCustomer.gender === 'male') {
      $("#rdoGenderMale").prop("checked", true);
    } else {
      $("#rdoGenderFemale").prop("checked", true);
    }
    $addCustomer.hide();      // Hiding the add button
    $updateCustomer.show();   // Showing update button
    $formContainer.show();    // Showing form
    scrollToForm();
    $('#txtName').focus();
  });

  // Method to update details from updated form data
  $(document).on('click', '.update-button', function (e) {
    /**
     * This method is used to stop from submiting the form which is it's default action
     */
    e.preventDefault();
    let updatedCustomerDetails = $('.customer-details').serializeArray().reduce(function (obj, item) {
      obj[item.name] = item.value;
      return obj;
    }, {});
    updatedCustomerDetails.id = id;
    let status = myCustomers.updateCustomer(updatedCustomerDetails);
    if (status) {
      let customers = myCustomers.getCustomers();
      if ($.fn.DataTable.isDataTable(customerTable)) {
        customerTable.destroy();
      }
      createTable(customers);
      $formContainer.hide();
      $('.customer-details')[0].reset();
      $messageBox.text(`${updatedCustomerDetails.name}'s data has been updated in customers list.`);
      showMessage();
      $errorMessage.text('');
    }
    else {
      $errorMessage.text('Please fill all fields with valid details.');
    }
  });

  $('.add-another').click(function () {
    $('.customer-details')[0].reset();
    $formContainer.show();
    scrollToForm();
    $('#txtName').focus();
    $addCustomer.show();
    $updateCustomer.hide();
  })
});