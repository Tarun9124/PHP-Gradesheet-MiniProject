<?php
$cn = mysqli_connect('localhost', 'root', '', 'gradesheet');
$pwdstudent = md5("student@123");
$pwdfaculty = md5("faculty@123");
if ($cn) {
  try {
    if ($_POST['role'] == 'student') {
      echo '<!DOCTYPE html>
            <html lang="en">
              <head>
                <meta charset="UTF-8" />
                <meta name="viewport" content="width=device-width, initial-scale=1.0" />
                <link
                  rel="stylesheet"
                  href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"
                />
                <link href="../assets/css/Login.css" rel="stylesheet" />
                <link
                  href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap"
                  rel="stylesheet"
                />
                <title>Regestration</title>
              </head>
              <body>
              <section class="side">
              <img src="../assets/img/img.svg" alt="" />
            </section>
        
            <section class="main">
              <div class="login-container">
                <p class="title">STUDENT</p>
                <div class="separator"></div>
                <p class="welcome-message">
                  Please, provide details to credential to proceed and have access to
                  all our services
                </p>';
      echo "
            <form class='login-form' action='../PHP/RegestrationStudent.php' method='post'>
            <div class='myform-control'>
            <input
              type='number'
              name='id'
              value='" . $_POST['id'] . "'
              required
              readonly
            />
            <i
              ><svg
                xmlns='http://www.w3.org/2000/svg'
                width='16'
                height='16'
                fill='currentColor'
                class='bi bi-person'
                viewBox='0 0 16 16'
              >
                <path
                  d='M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0Zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4Zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10Z'
                /></svg
            ></i>
          </div>
          <div class='myform-control'>
          <input
            type='text'
            name='dpt'
            value='" . $_POST['dpt'] . "'
            required
            readonly
          />
          <i
          ><svg
            xmlns='http://www.w3.org/2000/svg'
            width='16'
            height='16'
            fill='currentColor'
            class='bi bi-buildings'
            viewBox='0 0 16 16'
          >
            <path
              d='M14.763.075A.5.5 0 0 1 15 .5v15a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5V14h-1v1.5a.5.5 0 0 1-.5.5h-9a.5.5 0 0 1-.5-.5V10a.5.5 0 0 1 .342-.474L6 7.64V4.5a.5.5 0 0 1 .276-.447l8-4a.5.5 0 0 1 .487.022ZM6 8.694 1 10.36V15h5V8.694ZM7 15h2v-1.5a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 .5.5V15h2V1.309l-7 3.5V15Z'
            />
            <path
              d='M2 11h1v1H2v-1Zm2 0h1v1H4v-1Zm-2 2h1v1H2v-1Zm2 0h1v1H4v-1Zm4-4h1v1H8V9Zm2 0h1v1h-1V9Zm-2 2h1v1H8v-1Zm2 0h1v1h-1v-1Zm2-2h1v1h-1V9Zm0 2h1v1h-1v-1ZM8 7h1v1H8V7Zm2 0h1v1h-1V7Zm2 0h1v1h-1V7ZM8 5h1v1H8V5Zm2 0h1v1h-1V5Zm2 0h1v1h-1V5Zm0-2h1v1h-1V3Z'
            /></svg
        ></i>
        </div>
                <div class='myform-control'>
                <select name='sem' required>
                  <option value='' disabled selected hidden>Choose SEM</option>
                  <option value='1'>SEM-1</option>
                  <option value='2'>SEM-2</option>
                  <option value='3'>SEM-3</option>
                  <option value='4'>SEM-4</option>
                  <option value='5'>SEM-5</option>
                  <option value='6'>SEM-6</option>
                </select>
                <i
                  ><svg
                    xmlns='http://www.w3.org/2000/svg'
                    width='16'
                    height='16'
                    fill='currentColor'
                    class='bi bi-award'
                    viewBox='0 0 16 16'
                  >
                    <path
                      d='M9.669.864 8 0 6.331.864l-1.858.282-.842 1.68-1.337 1.32L2.6 6l-.306 1.854 1.337 1.32.842 1.68 1.858.282L8 12l1.669-.864 1.858-.282.842-1.68 1.337-1.32L13.4 6l.306-1.854-1.337-1.32-.842-1.68L9.669.864zm1.196 1.193.684 1.365 1.086 1.072L12.387 6l.248 1.506-1.086 1.072-.684 1.365-1.51.229L8 10.874l-1.355-.702-1.51-.229-.684-1.365-1.086-1.072L3.614 6l-.25-1.506 1.087-1.072.684-1.365 1.51-.229L8 1.126l1.356.702 1.509.229z'
                    />
                    <path
                      d='M4 11.794V16l4-1 4 1v-4.206l-2.018.306L8 13.126 6.018 12.1 4 11.794z'
                    /></svg
                ></i>
              </div>
              <button class='submit' name='add'>Add</button>
              </form>
              </body>
              </html>";
    } else if ($_POST['role'] == 'faculty') {
      $sql = "INSERT INTO faculty VALUES ('" . $_POST['id'] . "', '" . $_POST['name'] . "','" . $_POST['dpt'] . "')";
      if (mysqli_query($cn, $sql)) {
        echo '<div id="msg"><h1 style="color:green";>Record Inserted in Faculty Table!<h1></div>';
        echo '<script>setTimeout(function(){ document.getElementById("msg").style.display = "none"; }, 2000);</script>';
      } else {
        echo '<div id="message"><h1 style="color:red";>Record Not Inserted in Faculty Table!<h1></div>';
        echo "<script>setTimeout(function(){ window.location.href = '../HTML/Regestration.html'; }, 2000);</script>";
      }
    }
  } catch (Exception $e) {
    echo 'Error: ' . $e->getMessage();
  } finally {
    if (isset($_POST['submit'])) {
      if ($_POST['role'] == 'faculty') {
        $sql1 = "INSERT INTO user VALUES ('" . $_POST['id'] . "','" . $pwdfaculty . "','" . $_POST['email'] . "','" . $_POST['name'] . "','" . $_POST['nickname'] . "','" . $_POST['dpt'] . "','" . $_POST['role'] . "')";
        if (mysqli_query($cn, $sql1)) {
          echo "<div id='msg'><h1 style='color:green';>Record Not Inserted in User Table!<h1></div>";
          echo '<script>setTimeout(function(){ document.getElementById("msg").style.display = "none"; window.location.href = "../HTML/Regestration.html";}, 2000);</script>';
        } else {
          echo "<div id='msg'><h1 style='color:red';>Record Not Inserted in User Table!<h1></div>";
          echo '<script>setTimeout(function(){ document.getElementById("msg").style.display = "none"; window.location.href = "../HTML/Regestration.html";}, 2000);</script>';
        }
      } else if ($_POST['role'] == 'student') {
        $sql1 = "INSERT INTO user VALUES ('" . $_POST['id'] . "','" . $pwdstudent . "','" . $_POST['email'] . "','" . $_POST['name'] . "','" . $_POST['nickname'] . "','" . $_POST['dpt'] . "','" . $_POST['role'] . "')";
        if (mysqli_query($cn, $sql1)) {
          echo "<div id='msg'><h1 style='color:green';>Record Inserted in User Table!<h1></div>";
          echo '<script>setTimeout(function(){ document.getElementById("msg").style.display = "none";}, 2000);</script>';
        } else {
          echo "<div id='msg'><h1 style='color:red';>Record Not Inserted in User Table!<h1></div>";
          echo '<script>setTimeout(function(){ document.getElementById("msg").style.display = "none";}, 2000);</script>';
        }
      }
    }
  }
}
