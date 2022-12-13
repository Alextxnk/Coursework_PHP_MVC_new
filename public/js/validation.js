$(document).ready(function () {
  $("#title").on("input", function () {
    checkTitle();
  });
  $("#slug").on("input", function () {
    checkSlug();
  });
  $("#body").on("input", function () {
    checkBody();
  });

  // $("#submitbtn").click(function () {
  $(document).on("submit", "#myform", function (e) {
    e.preventDefault();
    if (!checkTitle() && !checkSlug() && !checkBody()) {
      $("#message").html(
        `<div class="bg-orange-100 border-l-4 border-orange-500 text-orange-700 p-4" role="alert">Please fill all required fields.</div>`
      );
    } else if (!checkTitle() || !checkSlug() || !checkBody()) {
      $("#message").html(
        `<div class="bg-orange-100 border-l-4 border-orange-500 text-orange-700 p-4" role="alert">Please fill all required fields.</div>`
      );
    } else {
      $("#message").html("");
      const form = $("#myform")[0];
      let data = new FormData(form);

      $.ajax({
        method: "POST",
        url: "/posts/store",
        dataType: "JSON",
        data: data,
        processData: false,
        contentType: false,
        cache: false,
        success: function (response) {
          if (response.success) {
            $("#message").html(
              `<div class="bg-green-100 border-l-4 border-green-500 text-gray-700 p-4" role="alert">${response.message}</div>`
            );
            $("#title").val("");
            $("#slug").val("");
            $("#body").val("");
            $("#thumbnail").val("");
            $("#imgTag").attr(
              "src",
              "https://upload.wikimedia.org/wikipedia/commons/thumb/a/ac/No_image_available.svg/1024px-No_image_available.svg.png"
            );
          } else {
            $("#message").html(
              `<div class="bg-orange-100 border-l-4 border-orange-500 text-orange-700 p-4" role="alert">${response.message}</div>`
            );
          }
        },
      });
    }
  });

  $(document).on("submit", "#authorForm", function (e) {
    e.preventDefault();

      $("#message").html("");
      const form = $("#authorForm")[0];
      let data = new FormData(form);
      $.ajax({
        method: "POST",
        url: "/admin/author/store",
        dataType: "JSON",
        data: data,
        processData: false,
        contentType: false,
        cache: false,
        success: function (response) {
          if (response.success) {
            $("#message").html(
                `<div class="bg-green-100 border-l-4 border-green-500 text-gray-700 p-4" role="alert">
              ${response.message}</div>`
            );
            //$("#title").val("");
            $("#body").val("");
          } else {
            $("#message").html(
                `<div class="bg-orange-100 border-l-4 border-orange-500 text-orange-700 p-4" role="alert">${response.message}</div>`
            );
            setTimeOutFn();
          }
        },
      });
  });

  $(document).on("submit", "#updateAuthor", function (e) {
    e.preventDefault();
    $("#message").html("");
    const form = $("#updateAuthor")[0];
    let data = new FormData(form);
    $.ajax({
      method: "POST",
      url: "/admin/author/update",
      dataType: "JSON",
      data: data,
      processData: false,
      contentType: false,
      cache: false,
      success: function (response) {
        if (response.success) {
          $("#message").html(
              `<div class="bg-green-100 border-l-4 border-green-500 text-gray-700 p-4" role="alert">
              ${response.message}</div>`
          );
          //$("#title").val("");
          $("#body").val("");
        } else {
          $("#message").html(
              `<div class="bg-orange-100 border-l-4 border-orange-500 text-orange-700 p-4" role="alert">${response.message}</div>`
          );
          setTimeOutFn();
        }
      },
    });
  });

  $(document).on("submit", "#firmForm", function (e) {
    e.preventDefault();

    $("#message").html("");
    const form = $("#firmForm")[0];
    let data = new FormData(form);
    $.ajax({
      method: "POST",
      url: "/admin/firm/store",
      dataType: "JSON",
      data: data,
      processData: false,
      contentType: false,
      cache: false,
      success: function (response) {
        if (response.success) {
          $("#message").html(
              `<div class="bg-green-100 border-l-4 border-green-500 text-gray-700 p-4" role="alert">
              ${response.message}</div>`
          );
          $("#body").val("");
        } else {
          $("#message").html(
              `<div class="bg-orange-100 border-l-4 border-orange-500 text-orange-700 p-4" role="alert">${response.message}</div>`
          );
          setTimeOutFn();
        }
      },
    });
  });

  $(document).on("submit", "#updateFirm", function (e) {
    e.preventDefault();
    $("#message").html("");
    const form = $("#updateFirm")[0];
    let data = new FormData(form);
    $.ajax({
      method: "POST",
      url: "/admin/firm/update",
      dataType: "JSON",
      data: data,
      processData: false,
      contentType: false,
      cache: false,
      success: function (response) {
        if (response.success) {
          $("#message").html(
              `<div class="bg-green-100 border-l-4 border-green-500 text-gray-700 p-4" role="alert">
              ${response.message}</div>`
          );
          $("#body").val("");
        } else {
          $("#message").html(
              `<div class="bg-orange-100 border-l-4 border-orange-500 text-orange-700 p-4" role="alert">${response.message}</div>`
          );
          setTimeOutFn();
        }
      },
    });
  });

  $(document).on("submit", "#mainForm", function (e) {
    e.preventDefault();

    $("#message").html("");
    const form = $("#mainForm")[0];
    let data = new FormData(form);
    $.ajax({
      method: "POST",
      url: "/admin/main/store",
      dataType: "JSON",
      data: data,
      processData: false,
      contentType: false,
      cache: false,
      success: function (response) {
        if (response.success) {
          $("#message").html(
              `<div class="bg-green-100 border-l-4 border-green-500 text-gray-700 p-4" role="alert">
              ${response.message}</div>`
          );
          $("#body").val("");
        } else {
          $("#message").html(
              `<div class="bg-orange-100 border-l-4 border-orange-500 text-orange-700 p-4" role="alert">${response.message}</div>`
          );
          setTimeOutFn();
        }
      },
    });
  });

  $(document).on("submit", "#updateMain", function (e) {
    e.preventDefault();
    $("#message").html("");
    const form = $("#updateMain")[0];
    let data = new FormData(form);
    $.ajax({
      method: "POST",
      url: "/admin/main/update",
      dataType: "JSON",
      data: data,
      processData: false,
      contentType: false,
      cache: false,
      success: function (response) {
        if (response.success) {
          $("#message").html(
              `<div class="bg-green-100 border-l-4 border-green-500 text-gray-700 p-4" role="alert">
              ${response.message}</div>`
          );
          $("#body").val("");
        } else {
          $("#message").html(
              `<div class="bg-orange-100 border-l-4 border-orange-500 text-orange-700 p-4" role="alert">${response.message}</div>`
          );
          setTimeOutFn();
        }
      },
    });
  });

  $(document).on("submit", "#cameraForm", function (e) {
    e.preventDefault();

    $("#message").html("");
    const form = $("#cameraForm")[0];
    let data = new FormData(form);
    $.ajax({
      method: "POST",
      url: "/admin/camera/store",
      dataType: "JSON",
      data: data,
      processData: false,
      contentType: false,
      cache: false,
      success: function (response) {
        if (response.success) {
          $("#message").html(
              `<div class="bg-green-100 border-l-4 border-green-500 text-gray-700 p-4" role="alert">
              ${response.message}</div>`
          );
          $("#model").val("");
          $("#camera_type").val("");
          $("#matrix_resolution").val("");
          $("#matrix_type").val("");
          $("#max_resolution").val("");
          $("#cost").val("");
          $("#thumbnail").val("");
          $("#imgTag").attr(
              "src",
              "https://upload.wikimedia.org/wikipedia/commons/thumb/a/ac/No_image_available.svg/1024px-No_image_available.svg.png"
          );
        } else {
          $("#message").html(
              `<div class="bg-orange-100 border-l-4 border-orange-500 text-orange-700 p-4" role="alert">${response.message}</div>`
          );
          setTimeOutFn();
        }
      },
    });
  });

  $(document).on("submit", "#updateCamera", function (e) {
    e.preventDefault();
    $("#message").html("");
    const form = $("#updateCamera")[0];
    let data = new FormData(form);
    $.ajax({
      method: "POST",
      url: "/admin/camera/update",
      dataType: "JSON",
      data: data,
      processData: false,
      contentType: false,
      cache: false,
      success: function (response) {
        if (response.success) {
          $("#message").html(
              `<div class="bg-green-100 border-l-4 border-green-500 text-gray-700 p-4" role="alert">
              ${response.message}</div>`
          );
          $("#model").val("");
          $("#camera_type").val("");
          $("#matrix_resolution").val("");
          $("#matrix_type").val("");
          $("#max_resolution").val("");
          $("#cost").val("");
          $("#thumbnail").val("");
          $("#imgTag").attr(
              "src",
              "https://upload.wikimedia.org/wikipedia/commons/thumb/a/ac/No_image_available.svg/1024px-No_image_available.svg.png"
          );
        } else {
          $("#message").html(
              `<div class="bg-orange-100 border-l-4 border-orange-500 text-orange-700 p-4" role="alert">${response.message}</div>`
          );
          setTimeOutFn();
        }
      },
    });
  });

  $(document).on("submit", "#lensForm", function (e) {
    e.preventDefault();

    $("#message").html("");
    const form = $("#lensForm")[0];
    let data = new FormData(form);
    $.ajax({
      method: "POST",
      url: "/admin/lens/store",
      dataType: "JSON",
      data: data,
      processData: false,
      contentType: false,
      cache: false,
      success: function (response) {
        if (response.success) {
          $("#message").html(
              `<div class="bg-green-100 border-l-4 border-green-500 text-gray-700 p-4" role="alert">
              ${response.message}</div>`
          );
          $("#model").val("");
          $("#lens_type").val("");
          $("#min_distance").val("");
          $("#max_distance").val("");
          $("#cost").val("");
          $("#thumbnail").val("");
          $("#imgTag").attr(
              "src",
              "https://upload.wikimedia.org/wikipedia/commons/thumb/a/ac/No_image_available.svg/1024px-No_image_available.svg.png"
          );
        } else {
          $("#message").html(
              `<div class="bg-orange-100 border-l-4 border-orange-500 text-orange-700 p-4" role="alert">${response.message}</div>`
          );
          setTimeOutFn();
        }
      },
    });
  });

  $(document).on("submit", "#updateLens", function (e) {
    e.preventDefault();
    $("#message").html("");
    const form = $("#updateLens")[0];
    let data = new FormData(form);
    $.ajax({
      method: "POST",
      url: "/admin/lens/update",
      dataType: "JSON",
      data: data,
      processData: false,
      contentType: false,
      cache: false,
      success: function (response) {
        if (response.success) {
          $("#message").html(
              `<div class="bg-green-100 border-l-4 border-green-500 text-gray-700 p-4" role="alert">
              ${response.message}</div>`
          );
          $("#model").val("");
          $("#lens_type").val("");
          $("#min_distance").val("");
          $("#max_distance").val("");
          $("#cost").val("");
          $("#thumbnail").val("");
          $("#imgTag").attr(
              "src",
              "https://upload.wikimedia.org/wikipedia/commons/thumb/a/ac/No_image_available.svg/1024px-No_image_available.svg.png"
          );
        } else {
          $("#message").html(
              `<div class="bg-orange-100 border-l-4 border-orange-500 text-orange-700 p-4" role="alert">${response.message}</div>`
          );
          setTimeOutFn();
        }
      },
    });
  });

  $(document).on("submit", "#updatePost", function (e) {
    e.preventDefault();
    if (!checkTitle() && !checkSlug() && !checkBody()) {
      $("#message").html(
        `<div class="bg-orange-100 border-l-4 border-orange-500 text-orange-700 p-4" role="alert">Please fill all required fields.</div>`
      );
    } else if (!checkTitle() || !checkSlug() || !checkBody()) {
      $("#message").html(
        `<div class="bg-orange-100 border-l-4 border-orange-500 text-orange-700 p-4" role="alert">Please fill all required fields.</div>`
      );
    } else {
      $("#message").html("");
      const form = $("#updatePost")[0];
      let data = new FormData(form);
      console.log("before ajax");
      $.ajax({
        method: "POST",
        url: "/posts/update",
        dataType: "JSON",
        data: data,
        processData: false,
        contentType: false,
        cache: false,
        success: function (response) {
          if (response.success) {
            $("#message").html(
              `<div class="bg-green-100 border-l-4 border-green-500 text-gray-700 p-4" role="alert">${response.message}</div>`
            );
            $("#title").val("");
            $("#slug").val("");
            $("#body").val("");
            $("#thumbnail").val("");
            $("#imgTag").attr(
              "src",
              "https://upload.wikimedia.org/wikipedia/commons/thumb/a/ac/No_image_available.svg/1024px-No_image_available.svg.png"
            );
          } else {
            $("#message").html(
              `<div class="bg-orange-100 border-l-4 border-orange-500 text-orange-700 p-4" role="alert">${response.message}</div>`
            );
          }
        },
      });
    }
  });

  $(document).on("submit", "#registerForm", function (e) {
    e.preventDefault();
    if (!checkUsername() && !checkEmail() && !checkPassword()) {
      $("#message").html(
        `<div class="bg-orange-100 border-l-4 border-orange-500 text-orange-700 p-4" role="alert">Please fill all required fields.</div>`
      );
    } else {
      $("#message").html("");
      const form = $("#registerForm")[0];
      let data = new FormData(form);

      $.ajax({
        method: "POST",
        url: "/register/store",
        dataType: "JSON",
        data: data,
        processData: false,
        contentType: false,
        cache: false,
        success: function (response) {
          if (response.success) {
            $("#message").html(
              `<div class="bg-green-100 border-l-4 border-green-500 text-gray-700 p-4" role="alert">
              ${response.message}
              &nbsp; <a class="font-bold text-blue-600 underline" href="/login">Login</a>
              </div>`
            );
            $("#username").val("");
            $("#email").val("");
            $("#password").val("");
            $("#thumbnail").val("");
            $("#imgTag").attr(
              "src",
              "https://upload.wikimedia.org/wikipedia/commons/thumb/a/ac/No_image_available.svg/1024px-No_image_available.svg.png"
            );
          } else {
            $("#message").html(
              `<div class="bg-orange-100 border-l-4 border-orange-500 text-orange-700 p-4" role="alert">${response.message}</div>`
            );
          }
        },
      });
    }
  });

  $(document).on("submit", "#loginForm", function (e) {
    e.preventDefault();
    // if (!checkEmail() && !checkPassword()) {
    //   $("#message").html(
    //     `<div class="bg-orange-100 border-l-4 border-orange-500 text-orange-700 p-4" role="alert">Please fill all required fields.</div>`
    //   );
    // } else if (!checkEmail() || !checkPassword()) {
    //   $("#message").html(
    //     `<div class="bg-orange-100 border-l-4 border-orange-500 text-orange-700 p-4" role="alert">Please fill all required fields.</div>`
    //   );
    // } else {
    $("#message").html("");
    const form = $("#loginForm")[0];
    let data = new FormData(form);
    // console.log(data);
    $.ajax({
      method: "POST",
      url: "/login/session",
      dataType: "JSON",
      data: data,
      processData: false,
      contentType: false,
      cache: false,
      success: function (response) {
        if (response.success) {
          console.log("afet ajx");
          $("#message").html(
            `<div class="bg-green-100 border-l-4 border-green-500 text-gray-700 p-4" role="alert">
              ${response.message}
              &nbsp; <a class="font-bold text-blue-600 underline" href="/login">Login</a>
              </div>`
          );
          $("#username").val("");
          $("#email").val("");
          $("#password").val("");
          $("#thumbnail").val("");
          $("#imgTag").attr(
            "src",
            "https://upload.wikimedia.org/wikipedia/commons/thumb/a/ac/No_image_available.svg/1024px-No_image_available.svg.png"
          );
        } else {
          $("#message").html(
            `<div class="bg-orange-100 border-l-4 border-orange-500 text-orange-700 p-4" role="alert">${response.message}</div>`
          );
        }
      },
    });
    // }
  });

  $(document).on("submit", "#categoryForm", function (e) {
    e.preventDefault();
    $("#message").html("");
    const form = $("#categoryForm")[0];
    let data = new FormData(form);
    $.ajax({
      method: "POST",
      url: "/categories/store",
      dataType: "JSON",
      data: data,
      processData: false,
      contentType: false,
      cache: false,
      success: function (response) {
        if (response.success) {
          $("#message").html(
            `<div class="bg-green-100 border-l-4 border-green-500 text-gray-700 p-4" role="alert">
              ${response.message}</div>`
          );
          $("#name").val("");
        } else {
          $("#message").html(
            `<div class="bg-orange-100 border-l-4 border-orange-500 text-orange-700 p-4" role="alert">${response.message}</div>`
          );
          setTimeOutFn();
        }
      },
    });
  });

  $(document).on("submit", "#updateCategory", function (e) {
    e.preventDefault();
    $("#message").html("");
    const form = $("#updateCategory")[0];
    let data = new FormData(form);
    $.ajax({
      method: "POST",
      url: "/categories/update",
      dataType: "JSON",
      data: data,
      processData: false,
      contentType: false,
      cache: false,
      success: function (response) {
        if (response.success) {
          $("#message").html(
            `<div class="bg-green-100 border-l-4 border-green-500 text-gray-700 p-4" role="alert">
              ${response.message}</div>`
          );
          $("#name").val("");
        } else {
          $("#message").html(
            `<div class="bg-orange-100 border-l-4 border-orange-500 text-orange-700 p-4" role="alert">${response.message}</div>`
          );
          setTimeOutFn();
        }
      },
    });
  });

  $(document).on("submit", "#updateUser", function (e) {
    e.preventDefault();
    if (!checkUsername() && !checkEmail()) {
      $("#message").html(
        `<div class="bg-orange-100 border-l-4 border-orange-500 text-orange-700 p-4" role="alert">Please fill all required fields.</div>`
      );
    } else {
      $("#message").html("");
      const form = $("#updateUser")[0];
      let data = new FormData(form);
      console.log("before ajax");
      $.ajax({
        method: "POST",
        url: "/users/update",
        dataType: "JSON",
        data: data,
        processData: false,
        contentType: false,
        cache: false,
        success: function (response) {
          if (response.success) {
            $("#message").html(
              `<div class="bg-green-100 border-l-4 border-green-500 text-gray-700 p-4" role="alert">${response.message}</div>`
            );
            $("#username").val("");
            $("#email").val("");
            $("#thumbnail").val("");
            $("#imgTag").attr(
              "src",
              "https://upload.wikimedia.org/wikipedia/commons/thumb/a/ac/No_image_available.svg/1024px-No_image_available.svg.png"
            );
          } else {
            $("#message").html(
              `<div class="bg-orange-100 border-l-4 border-orange-500 text-orange-700 p-4" role="alert">${response.message}</div>`
            );
          }
        },
      });
    }
  });

  $("#username").on("input", function () {
    checkUsername();
  });
  // $("#email").on("input", function () {
  //   checkEmail();
  // });
  // $("#password").on("input", function () {
  //   checkPassword();
  // });
});

function checkTitle() {
  var pattern = /^[A-Za-z0-9А-Яа-я_ -]+$/;
  var title = $("#title").val();
  var validtitle = pattern.test(title);
  if ($("#title").val().length < 10) {
    $("#title_err").html("Длина заголовка слишком маленькая, минимум 10 символов");
    return false;
  } else if (!validtitle) {
    $("#title_err").html("Заголовок может состоять из букв a-z, а-я или цифр 0-9");
    return false;
  } else {
    $("#title_err").html("");
    return true;
  }
}

function checkSlug() {
  var pattern = /^[A-Za-z_ -]+$/;
  var slug = $("#slug").val();
  var validslug = pattern.test(slug);
  if ($("#slug").val().length < 4) {
    $("#slug_err").html("Slug length is too short");
    return false;
  } else if (!validslug) {
    $("#slug_err").html("Slug should be a-z only");
    return false;
  } else {
    $("#slug_err").html("");
    return true;
  }
}

function readURL(input) {
  if (input.files && input.files[0]) {
    let reader = new FileReader();
    reader.onload = function (e) {
      let arr = input.files[0].name.split(".").pop();
      let fileSize = input.files[0].size;
      // $("#thumbnail_err").text("");
      if (arr == "jpg" || arr == "png" || arr == "gif" || arr == "jpeg") {
        $("#thumbnail_err").text("");
        $("#imgTag").attr("src", e.target.result);
      } else {
        $("#thumbnail_err").text("Image extension is not valid");
        $("#thumbnail").val("");
        $("#imgTag").attr(
          "src",
          "https://upload.wikimedia.org/wikipedia/commons/thumb/a/ac/No_image_available.svg/1024px-No_image_available.svg.png"
        );
      }

      if (fileSize > 5242880) {
        $("#thumbnail_err").text("");
        $("#thumbnail_err").text("Максимальный размер файла 5МБ");
        $("#thumbnail").val("");
        $("#imgTag").attr(
          "src",
          "https://upload.wikimedia.org/wikipedia/commons/thumb/a/ac/No_image_available.svg/1024px-No_image_available.svg.png"
        );
      } else {
        $("#thumbnail_err").text("");
        $("#imgTag").attr("src", e.target.result);
      }
    };
    reader.readAsDataURL(input.files[0]); // convert to base64 string
  }
}
$("#thumbnail").change(function () {
  readURL(this);
});

function checkBody() {
  if ($("#body").val().length < 20) {
    $("#body_err").html("Длина секции слишком маленькая");
    return false;
  } else {
    $("#body_err").html("");
    return true;
  }
}

function checkUsername() {
  var pattern = /^[A-Za-z0-9_ -]+$/;
  var title = $("#username").val();
  var validtitle = pattern.test(title);
  if ($("#username").val().length < 6) {
    $("#username_err").html("Username length is too short");
    return false;
  } else if (!validtitle) {
    $("#username_err").html("Username should be a-z or 0-9 only");
    return false;
  } else {
    $("#username_err").html("");
    return true;
  }
}

function checkEmail() {
  var pattern1 = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
  var email = $("#email").val();
  var validemail = pattern1.test(email);
  if (email == "") {
    $("#email_err").html("Email is required.");
    return false;
  } else if (email.length < 8) {
    $("#email_err").html("Email length is too short.");
    return false;
  } else if (!validemail) {
    $("#email_err").html("Invalid email.");
    return false;
  } else {
    $("#email_err").html("");
    return true;
  }
}

function checkPassword() {
  var pattern2 = /^(?=.*\d)(?=.*[!@#$%^&*])(?=.*[a-z])(?=.*[A-Z]).{8,}$/;
  var pass = $("#password").val();
  var validpass = pattern2.test(pass);

  if (pass == "") {
    $("#password_err").html("Password can not be empty.");
    return false;
  } else if (!validpass) {
    $("#password_err").html(
      "Minimum 5 and upto 15 characters, at least one uppercase letter, one lowercase letter, one number and one special character."
    );
    return false;
  } else {
    $("#password_err").html("");
    return true;
  }
}

function setTimeOutFn() {
  const message = document.getElementById("message");
  setTimeout(function () {
    message.style.display = "none";
  }, 2000);
}
