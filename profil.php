<?php
session_start();
require "function.php";

// Pastikan pengguna sudah login
if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit();
}

// Ambil informasi pengguna dari database
$id = $_SESSION["id"];
$stmt = $conn->prepare("SELECT username FROM user WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();

$stmt->close();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <style>
      body {
        background-color: black;
        margin: 0;
        font-family: Arial, sans-serif;
      }

      .fotoprofil .username {
        display: flex;
        justify-content: left;
        height: 100vh;
        margin: 0;
        background-color: #f0f0f0;
        padding: 10px;
      }

      .profile-container {
        text-align: left;
        padding: 10px;
      }

      .profile-label {
        cursor: pointer;
      }

      #profile-picture {
        width: 150px;
        height: 150px;
        border-radius: 50%;
        object-fit: cover;
        border: 3px solid red;
      }

      .username {
        font-family: Arial, sans-serif;
        display: flex;
        height: 100vh;
      }

      .username-section {
        display: flex;
        align-items: center;
        font-size: 30px;
        font-family: Arial, Helvetica, sans-serif;
        position: relative;
        bottom: 215px;
        left: 170px;
        color: white;
      }

      .username-display {
        font-family: sans-serif;
        font-size: 100px;
      }

      #edit-icon {
        cursor: pointer;
        width: 15px;
        height: auto;
        background-color: crimson;
      }

      .popup {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.5);
        justify-content: center;
        align-items: center;
      }

      .popup-content {
        background-color: #fff;
        padding: 20px;
        border-radius: 5px;
        text-align: center;
        position: relative;
      }

      .close {
        /* position:; */
        bottom: 10px;
        right: 10px;
        cursor: pointer;
        font-size: 20px;
      }

      #new-username {
        margin: 10px 0;
        padding: 5px;
        width: 80%;
        font-family: sans-serif;
      }

      #save-button {
        padding: 5px 10px;
        cursor: pointer;
      }

      .videoDisukai {
        margin: 0px 0 7px 0;
        padding: 0.6em 2em;
        border: none;
        outline: none;
        color: rgb(252, 251, 251);
        background: #0a0a0a;
        cursor: pointer;
        position: relative;
        z-index: 0;
        border-radius: 10px;
        user-select: none;
        -webkit-user-select: none;
        touch-action: manipulation;
      }

      .videoDisukai:before {
        content: "";
        background: linear-gradient(
          45deg,
          #ff0000,
          #ff7300,
          #727248,
          #506a46,
          #ff0000,
          #6973a7,
          #7a00ff,
          #824e77,
          #ff0000
        );
        position: absolute;
        top: -2px;
        left: -2px;
        background-size: 400%;
        z-index: -1;
        filter: blur(5px);
        -webkit-filter: blur(5px);
        width: calc(100% + 4px);
        height: calc(100% + 4px);
        animation: glowing-button-85 20s linear infinite;
        transition: opacity 0.3s ease-in-out;
        border-radius: 10px;
      }

      @keyframes glowing-button-85 {
        0% {
          background-position: 0 0;
        }
        50% {
          background-position: 400% 0;
        }
        100% {
          background-position: 0 0;
        }
      }

      .videoDisukai:after {
        z-index: -1;
        content: "";
        position: absolute;
        width: 100%;
        height: 100%;
        background: #222;
        left: 0;
        top: 0;
        border-radius: 10px;
      }

      .garis {
        border-top: solid crimson;
      }

      hr.style-eight {
        overflow: visible; /* For IE */
        padding: 0;
        border: none;
        border-top: medium double #333;
        color: #333;
        text-align: center;
        position: relative;
      }

      hr.style-eight:after {
        content: "§";
        display: inline-block;
        position: relative;
        top: -0.7em;
        font-size: 1.5em;
        padding: 0 0.25em;
        background: white;
      }

      .button-container {
        display: flex;
        justify-content: center;
        position: absolute;
        width: 100%;
        top: 11.7em;
      }

      #sidebar-toggle {
        position: absolute;
        top: 10px;
        right: 10px;
        padding: 10px;
        cursor: pointer;
        background-color: crimson;
        color: white;
        border: none;
        font-size: 16px;
      }

      .sidebar {
        display: none;
        position: fixed;
        right: 0;
        top: 0;
        height: 100%;
        width: 250px;
        background-color: #333;
        padding: 20px;
        color: white;
        overflow-y: auto;
        transition: 0.3s;
      }

      .sidebar {
        justify-content: space-between;
        margin-bottom: 10px;
      }

      .sidebar .logout-icon {
        position: absolute;
        top: 10px;
        right: 10px;
        width: 24px;
        height: 24px;
        cursor: pointer;
      }

      .riwayat-icon {
        position: absolute;
        top: 10px;
        left: 10px;
      }

      .sidebar button {
        flex: 1;
        padding: 10px;
        margin: 0 5px;
        cursor: pointer;
        background-color: crimson;
        border: none;
        color: white;
        font-size: 16px;
      }

      .sidebar button:first-child {
        margin-left: 0;
      }

      .sidebar button:last-child {
        margin-right: 0;
      }

      .sidebar-content {
        margin-top: 20px;
      }

      .menu-icon {
        cursor: pointer;
        background: transparent;
        border: none;
        color: white;
        font-size: 24px;
      }

      #sidebar-close {
        display: none;
        position: relative;
        top: 1px;
        left: 5px;
        padding: 10px;
        cursor: pointer;
        background-color: crimson;
        color: white;
        border: none;
        font-size: 16px;
      }
    </style>
  </head>
  <body>
    <section class="fotoprofil">
      <div class="profile-container">
        <label for="profile-picture-input" class="profile-label">
          <img
            id="profile-picture"
            src="https://blogger.googleusercontent.com/img/a/AVvXsEjGI7QvUxvn-SkIwUJUEzSgIbT-LiSA9Nw6d_Xfe9hvo8wNb8DNElXVoURLjS3XYDhwNqrtlM4R9XlMTak1amL_4GiDpr9NK1peOkoR2tm01wAVR0NBMdcjDBnxumlKFHCFADo2k8wWrar60eGpSWsWwpKKSlq2owHnx1JX6G0sIUhQeolJXz17nnkw"
            alt="Profile Picture"
          />
        </label>
        <input
          type="file"
          id="profile-picture-input"
          accept="image/*"
          style="display: none"
        />
      </div>
    </section>

    <div class="button-container">
      <button class="videoDisukai">Disukai</button>
    </div>

    <hr class="garis" />

    <div class="username-section">
      <p id=""><?= htmlspecialchars($user['username']); ?></p>
      <img
      src="https://img.icons8.com/ios-filled/50/000000/edit.png"
      alt="Edit"
      id="edit-icon"
      />
      <a href="logout.php">Logout</a>
    </div>
    
    <!-- Popup for changing username -->
    <div id="popup" class="popup">
      <div class="popup-content">
        <span class="close">&times;</span>
        <h2>Change Username</h2>
        <input type="text" id="new-username" placeholder="Enter new username" />
        <button id="save-button">Save</button>
      </div>
    </div>

    <button id="sidebar-toggle" class="menu-icon">&#9776;</button>

    <div id="sidebar" class="sidebar">
      <img
        id="logout-button"
        class="logout-icon"
        src="https://img.icons8.com/material-outlined/24/ffffff/logout-rounded.png"
        alt="Logout"
      />
      <div class="Riwayat-icon">
        <p id="riwayat-menu">Riwayat</p>
      </div>
      <button id="button1">Premium 1 bulan</button>
      <button id="button2">Premium 1 tahun</button>
      <div class="sidebar-content" id="sidebar-content"></div>
      <button id="sidebar-close">Close</button>
    </div>

    <div id="logout-popup" class="popup">
      <div class="popup-content">
        <span class="close">&times;</span>
        <h2>Confirm Logout</h2>
        <p>Are you sure you want to logout?</p>
        <button id="confirm-logout-button"><a href="logout.php">Yes</a></button>
        <button id="cancel-logout-button">No</button>
      </div>
    </div>

    <script>
      document.addEventListener("DOMContentLoaded", () => {
        const profilePictureInput = document.getElementById(
          "profile-picture-input"
        );
        const profilePicture = document.getElementById("profile-picture");

        const savedProfilePicture = localStorage.getItem("profilePicture");
        if (savedProfilePicture) {
          profilePicture.src = savedProfilePicture;
        }

        profilePictureInput.addEventListener("change", function (event) {
          const file = event.target.files[0];
          if (file) {
            const reader = new FileReader();
            reader.onload = function (e) {
              profilePicture.src = e.target.result;
              localStorage.setItem("profilePicture", e.target.result);
            };
            reader.readAsDataURL(file);
          }
        });

        document.addEventListener("DOMContentLoaded", () => {
          const usernameDisplay = document.getElementById("username-display");
          const editIcon = document.getElementById("edit-icon");
          const popup = document.getElementById("popup");
          const closeBtn = popup.querySelector(".close");
          const saveButton = document.getElementById("save-button");

          const setUsername = (username) => {
            usernameDisplay.textContent = username;
            localStorage.setItem("username", username);
          };

          const savedUsername = localStorage.getItem("username");
          if (savedUsername) {
            setUsername(savedUsername);
          }

          editIcon.addEventListener("click", () => {
            popup.style.display = "flex";
          });

          closeBtn.addEventListener("click", () => {
            popup.style.display = "none";
          });

          saveButton.addEventListener("click", () => {
            const newUsernameInput = document.getElementById("new-username");
            const newUsername = newUsernameInput.value.trim();
            if (newUsername) {
              setUsername(newUsername);
              popup.style.display = "none";
              newUsernameInput.value = "";
            }
          });

          window.addEventListener("click", (event) => {
            if (event.target === popup) {
              popup.style.display = "none";
            }
          });
        });

        const editIcon = document.getElementById("edit-icon");
        const popup = document.getElementById("popup");
        const closeBtn = popup.querySelector(".close");
        const saveButton = document.getElementById("save-button");
        const usernameDisplay = document.getElementById("username-display");
        const newUsernameInput = document.getElementById("new-username");

        const savedUsername = localStorage.getItem("username");
        if (savedUsername) {
          usernameDisplay.textContent = savedUsername;
        }

        editIcon.addEventListener("click", () => {
          popup.style.display = "flex";
        });

        closeBtn.addEventListener("click", () => {
          popup.style.display = "none";
        });

        saveButton.addEventListener("click", () => {
          const newUsername = newUsernameInput.value.trim();
          if (newUsername) {
            usernameDisplay.textContent = newUsername;
            localStorage.setItem("username", newUsername);
            popup.style.display = "none";
            newUsernameInput.value = "";
          }
        });

        window.addEventListener("click", (event) => {
          if (event.target === popup) {
            popup.style.display = "none";
          }
        });

        const sidebarToggle = document.getElementById("sidebar-toggle");
        const sidebarClose = document.getElementById("sidebar-close");
        const sidebar = document.getElementById("sidebar");
        const riwayatMenu = document.getElementById("riwayat-menu");
        const button1 = document.getElementById("button1");
        const button2 = document.getElementById("button2");
        const logoutButton = document.getElementById("logout-button");
        const sidebarContent = document.getElementById("sidebar-content");
        const logoutPopup = document.getElementById("logout-popup");
        const confirmLogoutButton = document.getElementById(
          "confirm-logout-button"
        );
        const cancelLogoutButton = document.getElementById(
          "cancel-logout-button"
        );
        let premium1MonthDuration = 30 * 24 * 60 * 60;
        let premium1YearDuration = 365 * 24 * 60 * 60;
        let premiumMessages = [];

        function formatDuration(seconds) {
          const days = Math.floor(seconds / (24 * 60 * 60));
          const hours = Math.floor((seconds % (24 * 60 * 60)) / (60 * 60));
          const minutes = Math.floor((seconds % (60 * 60)) / 60);
          const sec = seconds % 60;
          return `${days}d ${hours}h ${minutes}m ${sec}s`;
        }

        function updateDuration() {
          for (let msg of premiumMessages) {
            msg.duration--;
            if (msg.duration < 0) msg.duration = 0;
          }

          displayPremiumMessages();
        }

        function displayPremiumMessages() {
          sidebarContent.innerHTML = premiumMessages
            .map(
              (msg, index) => `
                        <h3>Riwayat Pembayaran</h3>
                        <p>Tanggal Pembayaran: ${msg.paymentDate}</p>
                        <p>Jumlah Uang yang Dibayarkan: Rp ${msg.amount}</p>
                        <p>VIP Premium: ${
                          msg.type === "1month" ? "1 Bulan" : "1 Tahun"
                        }</p>
                        <p>Sisa Waktu: <span id="duration-${index}">${formatDuration(
                msg.duration
              )}</span></p>
                    `
            )
            .join("");
        }

        function addPremiumMessage(type) {
          let newDuration;
          let amount;
          if (type === "1month") {
            newDuration = 30 * 24 * 60 * 60;
            amount = 50000;
          } else {
            newDuration = 365 * 24 * 60 * 60;
            amount = 500000;
          }

          const existingMessage = premiumMessages.find(
            (msg) => msg.type === type
          );
          if (existingMessage) {
            existingMessage.duration += newDuration;
          } else {
            premiumMessages.push({
              type,
              duration: newDuration,
              paymentDate: new Date().toLocaleDateString(),
              amount,
            });
          }

          displayPremiumMessages();
        }

        setInterval(updateDuration, 1000);

        sidebarToggle.addEventListener("click", () => {
          sidebar.style.display =
            sidebar.style.display === "none" || sidebar.style.display === ""
              ? "block"
              : "none";
          sidebarClose.style.display =
            sidebar.style.display === "block" ? "block" : "none";
        });

        sidebarClose.addEventListener("click", () => {
          sidebar.style.display = "none";
          sidebarClose.style.display = "none";
        });

        riwayatMenu.addEventListener("click", () => {
          displayPremiumMessages();
        });

        button1.addEventListener("click", () => addPremiumMessage("1month"));
        button2.addEventListener("click", () => addPremiumMessage("1year"));

        logoutButton.addEventListener("click", () => {
          logoutPopup.style.display = "flex";
        });

        confirmLogoutButton.addEventListener("click", () => {
          logoutPopup.style.display = "none";
          alert("Logged out successfully!");
          // Perform logout action here
        });

        cancelLogoutButton.addEventListener("click", () => {
          logoutPopup.style.display = "none";
        });

        window.addEventListener("click", (event) => {
          if (event.target === logoutPopup) {
            logoutPopup.style.display = "none";
          }
        });
      });
    </script>
  </body>
</html>
