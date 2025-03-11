$(document).ready(function () {
  $("#dvnvatform").on("submit", function (event) {
    event.preventDefault();
    Swal.fire({
      title: "Are you sure?",
      text: "Please confirm if you want to continue the submission.",
      icon: "warning",
      showCancelButton: true,
      confirmButtonColor: "#3085d6",
      cancelButtonColor: "#d33",
      confirmButtonText: "Yes, submit it!",
    }).then((result) => {
      if (result.isConfirmed) {
        var formData = new FormData(this);
        formData.append("dvnvatform", "true");

        $.ajax({
          url: "../inc/controller.php",
          type: "POST",
          data: formData,
          processData: false,
          contentType: false,
          success: function (response) {
            Swal.fire({
              title: "Success!",
              text: "Submitted successfully!",
              icon: "success",
              showConfirmButton: false,
              timer: 1500,
            });
            setTimeout(function () {
              window.location.href = "dvnvat-list.php";
            }, 1600);
          },
        });
      } else if (result.dismiss === Swal.DismissReason.cancel) {
      }
    });
  });

  $("#dvvatform").on("submit", function (event) {
    event.preventDefault();
    Swal.fire({
      title: "Are you sure?",
      text: "Please confirm if you want to continue the submission.",
      icon: "warning",
      showCancelButton: true,
      confirmButtonColor: "#3085d6",
      cancelButtonColor: "#d33",
      confirmButtonText: "Yes, submit it!",
    }).then((result) => {
      if (result.isConfirmed) {
        var formData = new FormData(this);
        formData.append("dvvatform", "true");

        $.ajax({
          url: "../inc/controller.php",
          type: "POST",
          data: formData,
          processData: false,
          contentType: false,
          success: function (response) {
            Swal.fire({
              title: "Success!",
              text: "Submitted successfully!",
              icon: "success",
              showConfirmButton: false,
              timer: 1500,
            });
            setTimeout(function () {
              window.location.href = "dvvat-list.php";
            }, 1600);
          },
        });
      } else if (result.dismiss === Swal.DismissReason.cancel) {
      }
    });
  });

  $("#supplyform").on("submit", function (event) {
    event.preventDefault();
    Swal.fire({
      title: "Are you sure?",
      text: "Please confirm if you want to continue the submission.",
      icon: "warning",
      showCancelButton: true,
      confirmButtonColor: "#3085d6",
      cancelButtonColor: "#d33",
      confirmButtonText: "Yes, submit it!",
    }).then((result) => {
      if (result.isConfirmed) {
        var formData = new FormData(this);
        formData.append("supplyform", "true");

        $.ajax({
          url: "../inc/controller.php",
          type: "POST",
          data: formData,
          processData: false,
          contentType: false,
          success: function (response) {
            Swal.fire({
              title: "Success!",
              text: "Submitted successfully!",
              icon: "success",
              showConfirmButton: false,
              timer: 1500,
            });
            setTimeout(function () {
              location.reload();
            }, 1600);
          },
        });
      } else if (result.dismiss === Swal.DismissReason.cancel) {
      }
    });
  });

  $("#unitform").on("submit", function (event) {
    event.preventDefault();
    Swal.fire({
      title: "Are you sure?",
      text: "Please confirm if you want to continue the submission.",
      icon: "warning",
      showCancelButton: true,
      confirmButtonColor: "#3085d6",
      cancelButtonColor: "#d33",
      confirmButtonText: "Yes, submit it!",
    }).then((result) => {
      if (result.isConfirmed) {
        var formData = new FormData(this);
        formData.append("unitform", "true");

        $.ajax({
          url: "../inc/controller.php",
          type: "POST",
          data: formData,
          processData: false,
          contentType: false,
          success: function (response) {
            Swal.fire({
              title: "Success!",
              text: "Submitted successfully!",
              icon: "success",
              showConfirmButton: false,
              timer: 1500,
            });
            setTimeout(function () {
              location.reload();
            }, 1600);
          },
        });
      } else if (result.dismiss === Swal.DismissReason.cancel) {
      }
    });
  });

  $("#productform").on("submit", function (event) {
    event.preventDefault();
    Swal.fire({
      title: "Are you sure?",
      text: "Please confirm if you want to continue the submission.",
      icon: "warning",
      showCancelButton: true,
      confirmButtonColor: "#3085d6",
      cancelButtonColor: "#d33",
      confirmButtonText: "Yes, submit it!",
    }).then((result) => {
      if (result.isConfirmed) {
        var formData = new FormData(this);
        formData.append("productform", "true");

        $.ajax({
          url: "../inc/controller.php",
          type: "POST",
          data: formData,
          processData: false,
          contentType: false,
          success: function (response) {
            Swal.fire({
              title: "Success!",
              text: "Submitted successfully!",
              icon: "success",
              showConfirmButton: false,
              timer: 1500,
            });
            setTimeout(function () {
              location.reload();
            }, 1600);
          },
        });
      } else if (result.dismiss === Swal.DismissReason.cancel) {
      }
    });
  });

  $(document).on("click", "#editproduct", function () {
    var productID = $(this).data("product-id");
    $.ajax({
      type: "GET",
      url: "../inc/controller.php",
      data: { product_id: productID },
      dataType: "json",
      success: function (data) {
        $("#product_ids").val(data.product_id);
        $("#item_names").val(data.item_name);
        $("#item_quantitys").val(data.item_quantity);
        $("#unit_ids").val(data.unit_id);
        $("#item_conditions").val(data.item_condition);
        $("#item_remarkss").val(data.item_remarks);
        $("#item_expdates").val(data.item_expdate);
        $("#supply_ids").val(data.supply_id);
      },
    });
  });

  $("#editproductform").on("submit", function (event) {
    event.preventDefault();
    Swal.fire({
      title: "Are you sure?",
      text: "Please confirm if you want to continue the submission.",
      icon: "warning",
      showCancelButton: true,
      confirmButtonColor: "#3085d6",
      cancelButtonColor: "#d33",
      confirmButtonText: "Yes, submit it!",
    }).then((result) => {
      if (result.isConfirmed) {
        var formData = new FormData(this);
        formData.append("editproductform", "true");

        $.ajax({
          url: "../inc/controller.php",
          type: "POST",
          data: formData,
          processData: false,
          contentType: false,
          success: function (response) {
            Swal.fire({
              title: "Success!",
              text: "Submitted successfully!",
              icon: "success",
              showConfirmButton: false,
              timer: 1500,
            });
            setTimeout(function () {
              location.reload();
            }, 1600);
          },
        });
      } else if (result.dismiss === Swal.DismissReason.cancel) {
      }
    });
  });



  $("#employeeform").on("submit", function (event) {
    event.preventDefault();
    Swal.fire({
      title: "Are you sure?",
      text: "Please confirm if you want to continue the submission.",
      icon: "warning",
      showCancelButton: true,
      confirmButtonColor: "#3085d6",
      cancelButtonColor: "#d33",
      confirmButtonText: "Yes, submit it!",
    }).then((result) => {
      if (result.isConfirmed) {
        var formData = new FormData(this);
        formData.append("employeeform", "true");

        $.ajax({
          url: "../inc/controller.php",
          type: "POST",
          data: formData,
          processData: false,
          contentType: false,
          success: function (response) {
            Swal.fire({
              title: "Success!",
              text: "Submitted successfully!",
              icon: "success",
              showConfirmButton: false,
              timer: 1500,
            });
            setTimeout(function () {
              location.reload();
            }, 1600);
          },
        });
      } else if (result.dismiss === Swal.DismissReason.cancel) {
      }
    });
  });

  $("#seminarform").on("submit", function (event) {
    event.preventDefault();
    Swal.fire({
      title: "Are you sure?",
      text: "Please confirm if you want to continue the submission.",
      icon: "warning",
      showCancelButton: true,
      confirmButtonColor: "#3085d6",
      cancelButtonColor: "#d33",
      confirmButtonText: "Yes, submit it!",
    }).then((result) => {
      if (result.isConfirmed) {
        var formData = new FormData(this);
        formData.append("seminarform", "true");

        $.ajax({
          url: "../inc/controller.php",
          type: "POST",
          data: formData,
          processData: false,
          contentType: false,
          success: function (response) {
            Swal.fire({
              title: "Success!",
              text: "Submitted successfully!",
              icon: "success",
              showConfirmButton: false,
              timer: 1500,
            });
            setTimeout(function () {
              location.reload();
            }, 1600);
          },
        });
      } else if (result.dismiss === Swal.DismissReason.cancel) {
      }
    });
  });

  $("#authorizerform").on("submit", function (event) {
    event.preventDefault();
    Swal.fire({
      title: "Are you sure?",
      text: "Please confirm if you want to continue the submission.",
      icon: "warning",
      showCancelButton: true,
      confirmButtonColor: "#3085d6",
      cancelButtonColor: "#d33",
      confirmButtonText: "Yes, submit it!",
    }).then((result) => {
      if (result.isConfirmed) {
        var formData = new FormData(this);
        formData.append("authorizerform", "true");

        $.ajax({
          url: "../inc/controller.php",
          type: "POST",
          data: formData,
          processData: false,
          contentType: false,
          success: function (response) {
            Swal.fire({
              title: "Success!",
              text: "Submitted successfully!",
              icon: "success",
              showConfirmButton: false,
              timer: 1500,
            });
            setTimeout(function () {
              location.reload();
            }, 1600);
          },
        });
      } else if (result.dismiss === Swal.DismissReason.cancel) {
      }
    });
  });
});

$("#genfundForm").on("submit", function (event) {
  event.preventDefault();
  Swal.fire({
    title: "Are you sure?",
    text: "Please confirm if you want to continue the submission.",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Yes, submit it!",
  }).then((result) => {
    if (result.isConfirmed) {
      var formData = new FormData(this);
      formData.append("genfundForm", "true");

      $.ajax({
        url: "../inc/controller.php",
        type: "POST",
        data: formData,
        processData: false,
        contentType: false,
        success: function (response) {
          Swal.fire({
            title: "Success!",
            text: "Submitted successfully!",
            icon: "success",
            showConfirmButton: false,
            timer: 1500,
          });
          setTimeout(function () {
            location.reload();
          }, 1600);
        },
      });
    } else if (result.dismiss === Swal.DismissReason.cancel) {
    }
  });
});

$("#UpdategenfundForm").on("submit", function (event) {
  event.preventDefault();
  Swal.fire({
    title: "Are you sure?",
    text: "Please confirm if you want to continue the submission.",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Yes, submit it!",
  }).then((result) => {
    if (result.isConfirmed) {
      var formData = new FormData(this);
      formData.append("UpdategenfundForm", "true");

      $.ajax({
        url: "../inc/controller.php",
        type: "POST",
        data: formData,
        processData: false,
        contentType: false,
        success: function (response) {
          Swal.fire({
            title: "Success!",
            text: "Submitted successfully!",
            icon: "success",
            showConfirmButton: false,
            timer: 1500,
          });
          setTimeout(function () {
            location.reload();
          }, 1600);
        },
      });
    } else if (result.dismiss === Swal.DismissReason.cancel) {
    }
  });
});

$("#stfForm").on("submit", function (event) {
  event.preventDefault();
  Swal.fire({
    title: "Are you sure?",
    text: "Please confirm if you want to continue the submission.",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Yes, submit it!",
  }).then((result) => {
    if (result.isConfirmed) {
      var formData = new FormData(this);
      formData.append("stfForm", "true");

      $.ajax({
        url: "../inc/controller.php",
        type: "POST",
        data: formData,
        processData: false,
        contentType: false,
        success: function (response) {
          Swal.fire({
            title: "Success!",
            text: "Submitted successfully!",
            icon: "success",
            showConfirmButton: false,
            timer: 1500,
          });
          setTimeout(function () {
            location.reload();
          }, 1600);
        },
      });
    } else if (result.dismiss === Swal.DismissReason.cancel) {
    }
  });
});

$("#UpdatestfForm").on("submit", function (event) {
  event.preventDefault();
  Swal.fire({
    title: "Are you sure?",
    text: "Please confirm if you want to continue the submission.",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Yes, submit it!",
  }).then((result) => {
    if (result.isConfirmed) {
      var formData = new FormData(this);
      formData.append("UpdatestfForm", "true");

      $.ajax({
        url: "../inc/controller.php",
        type: "POST",
        data: formData,
        processData: false,
        contentType: false,
        success: function (response) {
          Swal.fire({
            title: "Success!",
            text: "Submitted successfully!",
            icon: "success",
            showConfirmButton: false,
            timer: 1500,
          });
          setTimeout(function () {
            location.reload();
          }, 1600);
        },
      });
    } else if (result.dismiss === Swal.DismissReason.cancel) {
    }
  });
});

$("#EDitgenfundForm").on("submit", function (event) {
  event.preventDefault();
  Swal.fire({
    title: "Are you sure?",
    text: "Please confirm if you want to continue the submission.",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Yes, submit it!",
  }).then((result) => {
    if (result.isConfirmed) {
      var formData = new FormData(this);
      formData.append("EDitgenfundForm", "true");

      $.ajax({
        url: "../inc/controller.php",
        type: "POST",
        data: formData,
        processData: false,
        contentType: false,
        success: function (response) {
          Swal.fire({
            title: "Success!",
            text: "Submitted successfully!",
            icon: "success",
            showConfirmButton: false,
            timer: 1500,
          });
          setTimeout(function () {
            location.reload();
          }, 1600);
        },
      });
    } else if (result.dismiss === Swal.DismissReason.cancel) {
    }
  });
});

$("#fundAllotmentform").on("submit", function (event) {
  event.preventDefault();
  Swal.fire({
    title: "Are you sure?",
    text: "Please confirm if you want to continue the submission.",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Yes, submit it!",
  }).then((result) => {
    if (result.isConfirmed) {
      var formData = new FormData(this);
      formData.append("fundAllotmentform", "true");

      $.ajax({
        url: "../inc/controller.php",
        type: "POST",
        data: formData,
        processData: false,
        contentType: false,
        success: function (response) {
          Swal.fire({
            title: "Success!",
            text: "Submitted successfully!",
            icon: "success",
            showConfirmButton: false,
            timer: 1500,
          });
          setTimeout(function () {
            location.reload();
          }, 1600);
        },
      });
    } else if (result.dismiss === Swal.DismissReason.cancel) {
    }
  });
});

$("#editfundAllotmentform").on("submit", function (event) {
  event.preventDefault();
  Swal.fire({
    title: "Are you sure?",
    text: "Please confirm if you want to continue the submission.",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Yes, submit it!",
  }).then((result) => {
    if (result.isConfirmed) {
      var formData = new FormData(this);
      formData.append("editfundAllotmentform", "true");

      $.ajax({
        url: "../inc/controller.php",
        type: "POST",
        data: formData,
        processData: false,
        contentType: false,
        success: function (response) {
          Swal.fire({
            title: "Success!",
            text: "Submitted successfully!",
            icon: "success",
            showConfirmButton: false,
            timer: 1500,
          });
          setTimeout(function () {
            location.reload();
          }, 1600);
        },
      });
    } else if (result.dismiss === Swal.DismissReason.cancel) {
    }
  });
});

$(document).on("click", "#editfundBTN, #editfundBTNS", function () {
  var fundID = $(this).data("fallotment-id");
  var type = $(this).data("fund-type-id");

  $.ajax({
    type: "GET",
    url: "../inc/controller.php",
    data: { fallotment_id: fundID, fund_type: type },
    dataType: "json",
    success: function (data) {
      $("#fallotment_id").val(data.fallotment_id);
      $("#fund_type").val(data.fund_type);
      $("#fallotment_year").val(data.fallotment_year);
      $("#fund_allotment").val(data.fund_allotment);
    },
    error: function (xhr, status, error) {
      console.error("Error:", error);
    },
  });
});

$("#editGenfundForm").on("submit", function (event) {
  event.preventDefault();
  Swal.fire({
    title: "Are you sure?",
    text: "Please confirm if you want to continue the submission.",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Yes, submit it!",
  }).then((result) => {
    if (result.isConfirmed) {
      var formData = new FormData(this);
      formData.append("editGenfundForm", "true");

      $.ajax({
        url: "../inc/controller.php",
        type: "POST",
        data: formData,
        processData: false,
        contentType: false,
        success: function (response) {
          Swal.fire({
            title: "Success!",
            text: "Submitted successfully!",
            icon: "success",
            showConfirmButton: false,
            timer: 1500,
          });
          setTimeout(function () {
            location.reload();
          }, 1600);
        },
      });
    } else if (result.dismiss === Swal.DismissReason.cancel) {
    }
  });
});

$("#editStfForm").on("submit", function (event) {
  event.preventDefault();
  Swal.fire({
    title: "Are you sure?",
    text: "Please confirm if you want to continue the submission.",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Yes, submit it!",
  }).then((result) => {
    if (result.isConfirmed) {
      var formData = new FormData(this);
      formData.append("editGenfundForm", "true");

      $.ajax({
        url: "../inc/controller.php",
        type: "POST",
        data: formData,
        processData: false,
        contentType: false,
        success: function (response) {
          Swal.fire({
            title: "Success!",
            text: "Submitted successfully!",
            icon: "success",
            showConfirmButton: false,
            timer: 1500,
          });
          setTimeout(function () {
            location.reload();
          }, 1600);
        },
      });
    } else if (result.dismiss === Swal.DismissReason.cancel) {
    }
  });
});

$(document).on("click", "#Updatedetailsbtn", function () {
  var employeeID = $(this).data("employee-id");

  $.ajax({
    type: "GET",
    url: "../inc/controller.php",
    data: { employee_id: employeeID },
    dataType: "json",
    success: function (data) {
      $("#employee_id").val(data.employee_id);
      $("#employee_name").val(data.employee_name);
      $("#employee_position").val(data.employee_position);
      $("#employee_add").val(data.employee_add);
      $("#employee_phone").val(data.employee_phone);
      $("#employee_email").val(data.employee_email);
      $("#employee_bd").val(data.employee_bd);
      $("#currentemployee_img").val(data.employee_img); // Set current image
    },
    error: function (xhr, status, error) {
      console.error("Error fetching employee data:", error);
    },
  });
});

$("#employeeformUpdate").on("submit", function (event) {
  event.preventDefault();
  Swal.fire({
    title: "Confirm Submission",
    text: "Do you want to proceed with submitting this form?",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Yes, submit!",
    cancelButtonText: "No, cancel",
  }).then((result) => {
    if (result.isConfirmed) {
      var formData = new FormData(this);
      formData.append("employeeformUpdate", "true");

      $.ajax({
        url: "../inc/controller.php",
        type: "POST",
        data: formData,
        processData: false,
        contentType: false,
        success: function (response) {
          Swal.fire({
            title: "Success!",
            text: "Your changes have been saved successfully.",
            icon: "success",
            showConfirmButton: false,
            timer: 1500,
          });
          setTimeout(function () {
            location.reload();
          }, 1600);
        },
        error: function () {
          Swal.fire({
            title: "Error!",
            text: "There was an issue with your submission. Please try again.",
            icon: "error",
            confirmButtonText: "Okay",
          });
        },
      });
    } else if (result.dismiss === Swal.DismissReason.cancel) {
      Swal.fire({
        title: "Cancelled",
        text: "Your submission has been cancelled.",
        icon: "info",
        confirmButtonText: "Okay",
      });
    }
  });
});

$("#cafoaForm").on("submit", function (event) {
  event.preventDefault();
  Swal.fire({
    title: "Are you sure?",
    text: "Please confirm if you want to continue the submission.",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Yes, submit it!",
  }).then((result) => {
    if (result.isConfirmed) {
      var formData = new FormData(this);
      formData.append("cafoaForm", "true");

      $.ajax({
        url: "../inc/controller.php",
        type: "POST",
        data: formData,
        processData: false,
        contentType: false,
        success: function (response) {
          Swal.fire({
            title: "Success!",
            text: "Submitted successfully!",
            icon: "success",
            showConfirmButton: false,
            timer: 1500,
          });
          setTimeout(function () {
            location.reload();
          }, 1600);
        },
      });
    } else if (result.dismiss === Swal.DismissReason.cancel) {
    }
  });
});

$(document).on("click", "#supplyupdatebtn", function () {
  var supplyID = $(this).data("supply-id");
  $.ajax({
    type: "GET",
    url: "../inc/controller.php",
    data: { supply_id: supplyID },
    dataType: "json",
    success: function (data) {
      $("#supply_id").val(data.supply_id);
      $("#supply_type").val(data.supply_type);
    },
    error: function (xhr, status, error) {
      console.error("Error fetching Supply data:", error);
    },
  });
});

$("#Updatesupplyform").on("submit", function (event) {
  event.preventDefault();
  Swal.fire({
    title: "Are you sure?",
    text: "Please confirm if you want to update the supply details.",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Yes, update it!",
  }).then((result) => {
    if (result.isConfirmed) {
      var formData = new FormData(this);
      formData.append("Updatesupplyform", "true");

      $.ajax({
        url: "../inc/controller.php",
        type: "POST",
        data: formData,
        processData: false,
        contentType: false,
        success: function (response) {
          Swal.fire({
            title: "Success!",
            text: "Supply updated successfully!",
            icon: "success",
            showConfirmButton: false,
            timer: 1500,
          });
          setTimeout(function () {
            location.reload();
          }, 1600);
        },
      });
    } else if (result.dismiss === Swal.DismissReason.cancel) {
    }
  });
});

$(document).on("click", "#unitupdatebtn", function () {
  var unitID = $(this).data("unit-id");
  $.ajax({
    type: "GET",
    url: "../inc/controller.php",
    data: { unit_id: unitID },
    dataType: "json",
    success: function (data) {
      $("#unit_id").val(data.unit_id);
      $("#unit_name").val(data.unit_name);
    },
    error: function (xhr, status, error) {
      console.error("Error fetching Supply data:", error);
    },
  });
});

$("#UpdateUnitform").on("submit", function (event) {
  event.preventDefault();
  Swal.fire({
    title: "Are you sure?",
    text: "Please confirm if you want to update the Unit details.",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Yes, update it!",
  }).then((result) => {
    if (result.isConfirmed) {
      var formData = new FormData(this);
      formData.append("UpdateUnitform", "true");

      $.ajax({
        url: "../inc/controller.php",
        type: "POST",
        data: formData,
        processData: false,
        contentType: false,
        success: function (response) {
          Swal.fire({
            title: "Success!",
            text: "Unit updated successfully!",
            icon: "success",
            showConfirmButton: false,
            timer: 1500,
          });
          setTimeout(function () {
            location.reload();
          }, 1600);
        },
      });
    } else if (result.dismiss === Swal.DismissReason.cancel) {
    }
  });
});

$(document).on("click", "#removetenants", function () {
  var employeeID = $(this).data("employee-id");

  Swal.fire({
    title: "Deletion Confirmation",
    text: "Are you sure you want to delete this member?",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Yes, Delete it!",
  }).then((result) => {
    if (result.isConfirmed) {
      $.ajax({
        url: "../inc/controller.php",
        method: "GET",
        data: {
          employee_id: employeeID,
          removetenants: true,
        },
        success: function (response) {
          Swal.fire({
            title: "Deleted!",
            text: "The member has been deleted successfully.",
            icon: "success",
            showConfirmButton: false,
            timer: 1500,
          });
          setTimeout(function () {
            location.reload();
          }, 1600);
        },
        error: function (xhr, status, error) {
          Swal.fire({
            title: "Error!",
            text: "An error occurred while deleting the member. Please try again.",
            icon: "error",
          });
        },
      });
    }
  });
});

$(document).on("click", "#deleterow", function (e) {
  e.preventDefault();
  var progID = $(this).data("prog-id");
  var refID = $(this).data("ref-id");

  Swal.fire({
    title: "Remove Record?",
    text: "Do you really want to delete this record? This action cannot be undone.",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Yes, delete it!",
    cancelButtonText: "Cancel",
  }).then((result) => {
    if (result.isConfirmed) {
      $.ajax({
        url: "../inc/controller.php",
        method: "GET",
        data: {
          reference_id: refID,
          prog_id: progID,
          deleterow: true,
        },
        success: function (response) {
          Swal.fire({
            title: "Record Deleted",
            text: "The record was successfully removed from the database.",
            icon: "success",
            showConfirmButton: false,
            timer: 1500,
          });
          setTimeout(function () {
            location.reload();
          }, 1600);
        },
        error: function (xhr, status, error) {
          Swal.fire({
            title: "Delete Failed",
            text: "An error occurred while attempting to delete the record. Please try again.",
            icon: "error",
          });
        },
      });
    }
  });
});

$(document).on("click", "#deleterows", function (e) {
  e.preventDefault();
  var progID = $(this).data("prog-id");
  var refID = $(this).data("ref-id");

  Swal.fire({
    title: "Remove Record?",
    text: "Do you really want to delete this record? This action cannot be undone.",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Yes, delete it!",
    cancelButtonText: "Cancel",
  }).then((result) => {
    if (result.isConfirmed) {
      $.ajax({
        url: "../inc/controller.php",
        method: "GET",
        data: {
          reference_id: refID,
          prog_id: progID,
          deleterows: true,
        },
        success: function (response) {
          Swal.fire({
            title: "Record Deleted",
            text: "The record was successfully removed from the database.",
            icon: "success",
            showConfirmButton: false,
            timer: 1500,
          });
          setTimeout(function () {
            location.reload();
          }, 1600);
        },
        error: function (xhr, status, error) {
          Swal.fire({
            title: "Delete Failed",
            text: "An error occurred while attempting to delete the record. Please try again.",
            icon: "error",
          });
        },
      });
    }
  });
});



$(document).on("click", "#deleteproduct", function (event) {
  event.preventDefault();
  var productID = $(this).data("product-id");

  Swal.fire({
    title: "Are you sure you want to delete?",
    text: "Please confirm if you want to continue the deletion.",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Yes, delete!",
  }).then((result) => {
    if (result.isConfirmed) {
      $.ajax({
        type: "GET",
        url: "../inc/controller.php",
        data: {
          product_id: productID,
          deleteproduct: true,
        },
        success: function (response) {
          console.log("Server Response:", response); // Debugging log
          Swal.fire("Deleted!", "The product has been deleted.", "success").then(() => {
            location.reload(); // Reload the page after successful deletion
          });
        },
        error: function (xhr, status, error) {
          console.error("Error:", error); // Log the error
          Swal.fire("Error!", "Failed to delete the product.", "error");
        },
      });
    }
  });
});






$(document).on("click", "#deletesupply", function (event) {
  event.preventDefault();
  var supplyID = $(this).data("supply-id");

  Swal.fire({
    title: "Are you sure you want to delete?",
    text: "Please confirm if you want to continue the deletion.",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Yes, delete!",
  }).then((result) => {
    if (result.isConfirmed) {
      $.ajax({
        type: "GET",
        url: "../inc/controller.php",
        data: {
          supply_id: supplyID,
          deletesupply: true,
        },
        success: function (response) {
          console.log("Server Response:", response); // Debugging log
          Swal.fire("Deleted!", "The product has been deleted.", "success").then(() => {
            location.reload(); // Reload the page after successful deletion
          });
        },
        error: function (xhr, status, error) {
          console.error("Error:", error); // Log the error
          Swal.fire("Error!", "Failed to delete the product.", "error");
        },
      });
    }
  });
});




$(document).on("click", "#approved", function (e) {
  e.preventDefault();
  var dvID = $(this).data("dv-id");
  Swal.fire({
    title: "Approve Record?",
    text: "Do you really want to approve this record? This action cannot be undone.",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Yes, approve it!",
    cancelButtonText: "Cancel",
  }).then((result) => {
    if (result.isConfirmed) {
      $.ajax({
        url: "../inc/controller.php",
        method: "GET",
        data: {
          dv_id: dvID,
          approved: true,
        },
        success: function (response) {
          Swal.fire({
            title: "Record Approved",
            text: "The record was successfully approved.",
            icon: "success",
            showConfirmButton: false,
            timer: 1500,
          });
          setTimeout(function () {
            location.reload();
          }, 1600);
        },
        error: function (xhr, status, error) {
          Swal.fire({
            title: "Approval Failed",
            text: "An error occurred while attempting to approve the record. Please try again.",
            icon: "error",
          });
        },
      });
    }
  });
});


$(document).on("click", "#disapproved", function (e) {
  e.preventDefault();
  var dvID = $(this).data("dv-id");
  Swal.fire({
    title: "Reject Record?",
    text: "Do you really want to reject this record? This action cannot be undone.",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Yes, reject it!",
    cancelButtonText: "Cancel",
  }).then((result) => {
    if (result.isConfirmed) {
      $.ajax({
        url: "../inc/controller.php",
        method: "GET",
        data: {
          dv_id: dvID,
          disapproved: true,  // Keep disapproved as true
        },
        success: function (response) {
          Swal.fire({
            title: "Record Rejected",
            text: "The record was successfully rejected.",
            icon: "success",
            showConfirmButton: false,
            timer: 1500,
          });
          setTimeout(function () {
            location.reload();
          }, 1600);
        },
        error: function (xhr, status, error) {
          Swal.fire({
            title: "Rejection Failed",
            text: "An error occurred while attempting to reject the record. Please try again.",
            icon: "error",
          });
        },
      });
    }
  });
});


$(document).on("click", "#authoupdate", function () {
  var autoID = $(this).data("authorizer-id");
  $.ajax({
    type: "GET",
    url: "../inc/controller.php",
    data: { authorizer_id: autoID },
    dataType: "json",
    success: function (data) {
      $("#authorizer_id").val(data.authorizer_id);
      $("#authorizer_name").val(data.authorizer_name);
      $("#app_level").val(data.app_level);
    },
    error: function (xhr, status, error) {
      console.error("Error fetching Supply data:", error);
    },
  });
});




$("#authorizerformupdate").on("submit", function (event) {
  event.preventDefault();
  Swal.fire({
    title: "Are you sure?",
    text: "Please confirm if you want to continue the submission.",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Yes, submit it!",
  }).then((result) => {
    if (result.isConfirmed) {
      var formData = new FormData(this);
      formData.append("authorizerformupdate", "true");

      $.ajax({
        url: "../inc/controller.php",
        type: "POST",
        data: formData,
        processData: false,
        contentType: false,
        success: function (response) {
          Swal.fire({
            title: "Success!",
            text: "Submitted successfully!",
            icon: "success",
            showConfirmButton: false,
            timer: 1500,
          });
          setTimeout(function () {
            location.reload();
          }, 1600);
        },
      });
    } else if (result.dismiss === Swal.DismissReason.cancel) {
    }
  });
});