<?php
require_once 'cek-akses.php';
$pdo = new PDO('mysql:host=localhost; dbname=pkl', "root", "");
$sql = "SELECT * FROM profil WHERE id_user=:id";
$query = $pdo->prepare($sql);
$query->execute(array('id' => $_SESSION['user']['id']));
$user1 = $query->fetch();

if (empty($_POST)) {
    echo '';
} else {
    $sqlUpdate = "UPDATE profil Set tinggal=:tinggal,lahir=:lahir,jk=:jk,tanggal=:tanggal WHERE id_user=:id";
    $queryUpdate = $pdo->prepare($sqlUpdate);
    $queryUpdate->execute(
        array(
            'tinggal' => $_POST['tinggal'],
            'lahir' => $_POST['lahir'],
            'jk' => $_POST['jk'],
            'tanggal' => $_POST['tanggal'],
            'id' => $_SESSION['user']['id']
        )
    );
}

include_once "pesan/php/config.php";

// melakukan koneksi 
$connect = mysqli_connect('localhost', 'root', '', 'pkl');
$id = $_SESSION['user']['unique_id'];
// mengambil data 5 pesan terbaru 
$sql = "SELECT * FROM messages where incoming_msg_id = $id and status = true ORDER BY msg_id DESC limit 5";
$pdo = new PDO('mysql:host=localhost; dbname=pkl', "root", "");
$query = $pdo->prepare($sql);
$query->execute();


?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  <title>Beranda</title>
  <!-- style css link -->
  <style>
    @import url("https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap");

    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      list-style: none;
      text-decoration: none;
      font-family: "Poppins", sans-serif;
    }

    :root {
      --background: #d1deec;
      --foreground: #f1f3f5;
      --white: #fff;
      --black: #000;
      --gray: #6e6e6e;
      --shadow: #00000063;
      --border: #cfcfcf;
    }

    .dark-color {
      --background: #222230;
      --foreground: #42435c;
      --white: #2b2c44;
      --black: #eeecff;
      --gray: #d5dfd5;
      --shadow: #00000063;
      --border: #3f4172;
    }

    .darkTheme.button-Active span {
      margin-left: 16px;
    }

    body {
      background-color: #222230;
      -webkit-text-size-adjust: 100%;
      -webkit-tap-highlight-color: #3a78ffec;
    }

    button:focus,
    input:focus {
      border: none;
      outline: none;
    }

    h1,
    h2,
    h3,
    h4,
    h5,
    h6,
    b {
      color: var(--black);
    }

    a:focus,
    a:hover {
      text-decoration: none;
      color: inherit;
    }

    /* header section style start here */



    /* header section style end here */

    /* home section start here */

    .home {
      display: flex;
      justify-content: center;
    }

    .container {
      padding-top: 100px;
    }

    .home-weapper {
      width: 100%;
      display: flex;
      justify-content: space-between;
    }

    .home-left {
      position: fixed;
    left:0%;
      background: var(--white);
      box-shadow: 0 2px 5px 0 var(--shadow);
      border-top-right-radius: 20px;
      border-bottom-right-radius: 20px;
      overflow: hidden;
      flex-direction: column;
      padding: 30px;
      padding-bottom: 200px;
      margin-bottom: 500px;
    }

    .profile {
font-weight:bold;
      width: 100%;
      height: 60px;
      overflow: hidden;
      border-radius: 10px;
      display: flex;
      align-items: center;
      margin-bottom: 30px;
      cursor: pointer;
    }

    .profile img {
      width: 50px;
      float: left;
      margin-right: 10px;
      border-radius: 50px;
    }


    .mini-headign {
font-weight: bold;
      text-transform: uppercase;
      color: var(--gray);
      margin-bottom: 15px;
    }

    .see-more-btn {
      padding: 8px;
      background: var(--white);
      border: none;
      box-shadow: 0 2px 6px 0 var(--shadow);
      border-radius: 50px;
      color: #4575b3;
      font-weight: 600;
      font-size: 15px;
      margin-top: 10px;
      transition: 0.4s;
    }

    .see-more-btn i {
      font-size: 12px;
      margin-left: 5px;
    }

    .see-more-btn:hover {
      background: #f1f3f5;
      box-shadow: 0 5px 6px 0 #76767663;
      cursor: pointer;
    }

    .explore {

      display: flex;
      flex-direction: column;
    }

    .explore a {
      text-decoration: none;
      color: #fff;
      margin-bottom: 15px;
      font-weight: 600;
    }

    .explore a:hover {
      color: #1877f2;
    }

    .explore a i {
      margin-right: 10px;
      width: 25px;
      height: 25px;
      box-shadow: 0 2px 5px 0 var(--shadow);
      border-radius: 8px;
      text-align: center;
      line-height: 25px;
      transition: 0.4s;
    }

    .explore>div {
      display: flex;
      align-items: center;
      margin-bottom: 15px;
      font-weight: 600;
      color: #4575b3;
    }

    .darkTheme {
      width: 40px;
      height: 24px;
      background: #4575b3;
      margin-right: 12px;
      border-radius: 50px;
      position: relative;
      display: flex;
      align-items: center;
      cursor: pointer;
    }

    .darkTheme span {
      position: absolute;
      width: 16px;
      height: 16px;
      background: white;
      border-radius: 50px;
      left: 4px;
      transition: 0.5s;
    }

    /* home section end here */

    /* home center section start here */

    .home-center {
      position: absolute;
      left: 22%;
      width: 51.1%;
      overflow: hidden;
    }

    .home-center .createPost {
      background: var(--white);
      box-shadow: 0 2px 5px 0 var(--shadow);
      border-radius: 20px;
      padding: 15px;
      margin-bottom: 20px;
    }

    .stories-wrapper {
      display: flex;
      justify-content: space-between;
      height: 170px;
      margin-bottom: -170px;
    }

    .home-center .mini-headign {
      color: #1877f2;
      margin-bottom: 10px;
    }

    .single-stories {
      width: 18%;
      position: relative;
      padding-top: 25px;
    }

    .single-stories label {
      width: 45px;
      height: 45px;
      background: #daeaff;
      position: absolute;
      left: 50%;
      transform: translateX(-50%);
      top: 0;
      border-radius: 50px;
      overflow: hidden;
      border: 3px solid #1877f2;
    }

    .single-stories label img {
      width: 100%;
    }

    .single-stories>div {
      width: 100%;
      overflow: hidden;
      height: 100%;
      border-radius: 18px;
      text-align: center;
      box-shadow: 1px 6px 6px 0 var(--shadow);
    }

    .single-stories>div img {
      width: 100%;
      height: 100%;
      object-fit: cover;
    }

    .single-stories>div b {
      position: absolute;
      bottom: 5px;
      left: 50%;
      transform: translateX(-50%);
      font-size: 12px;
      color: white;
      font-weight: 400;
      text-shadow: 0 1px 8px black;
    }

    .single-stories>div i {
      position: absolute;
      bottom: 30px;
      left: 50%;
      transform: translateX(-50%);
      font-size: 25px;
      color: white;
    }

    /* createPost start */

    .post-text {
      width: 100%;
      position: relative;
      margin-bottom: 30px;
    }

    .post-text img {
      width: 40px;
      border-radius: 50px;
      position: absolute;
      left: 10px;
      top: 30px;
    }

    .post-text input {
      padding: 20px 20px 20px 60px;
      width: 100%;
      background: var(--foreground);
      border: none;
      height: 100px;
      border-radius: 10px;
      box-shadow: 0 2px 5px 0 var(--shadow);
      color: var(--black);
    }

    .post-icon {
      
      display: flex;
      align-items: center;
    }

    .post-icon a {
      text-decoration: none;
      margin-right: 10px;
      padding: 5px;
      border-radius: 10px;
      font-size: 14px;
      color: #262626;
      font-weight: 500;
    }

    .post-icon a i {
      padding: 5px;
      border-radius: 5px;
      color: #fff;
    }

    /* createPost end */

    /* facebook post 01 start */

    .fb-post1 {
      background: var(--white);
      box-shadow: 0 2px 5px 0 var(--shadow);
      border-radius: 20px;
      padding: 15px 20px;
      padding-bottom: 20px;
    }

    .fb-post1-container {
      display: flex;
      flex-direction: column;
    }

    .fb-post1-header {
      padding-bottom: 10px;
      border-bottom: 2px solid var(--border);
      padding-bottom: 8px;
    }

    .fb-post1-header ul {
      display: flex;
    }

    .fb-post1-header ul li {
      text-transform: uppercase;
      padding: 5px 10px;
      font-weight: 600;
      color: var(--gray);
      transition: 0.4s;
      cursor: pointer;
    }

    .fb-post1-header ul li:hover {
      color: #3d3e42;
    }

    .fb-post1-header .active {
      color: var(--black);
      border-bottom: 3px solid #1877f2;
    }

    .fb-p1-main {
      display: flex;
      flex-direction: column;
    }

    .post-title {
      display: flex;
      flex-wrap: wrap;
      align-items: center;
      margin: 15px 0;
    }

    .post-title img {
      width: 50px;
      border-radius: 50px;
      margin-right: 20px;
      margin-bottom: 20px;
    }

    .post-title ul {
      width: 87%;
      margin-bottom: 20px;
    }

    .post-title ul li span {
      color: var(--gray);
      font-weight: 400;
      font-size: 14px;
    }

    .post-title p {
      color: var(--gray);
    }

    .post-title p a {
      color: #4575b3;
    }

    .post-images {
      display: flex;
      justify-content: space-between;
    }

    .post-images1 {
      width: 60%;
      overflow: hidden;
    }

    .post-images2 {
      width: 37%;
      overflow: hidden;
    }

    .post-images1 img:nth-child(1) {
      width: 100%;
      margin-bottom: 10px;
      height: 200px;
      object-fit: cover;
      border-radius: 15px;
    }

    .post-images1 img:nth-child(2) {
      width: 47%;
      margin-right: 4%;
      height: 120px;
      object-fit: cover;
      border-radius: 15px;
    }

    .post-images1 img:nth-child(3) {
      width: 47%;
      height: 120px;
      object-fit: cover;
      border-radius: 15px;
    }

    .post-images2 img {
      width: 100%;
      height: 335px;
      border-radius: 15px;
      object-fit: cover;
    }

    .like-comment {
      width: 100%;
      margin-top: 15px;
    }

    .like-comment ul {
      display: flex;
    }

    .like-comment ul li {
      margin-right: 20px;
    }

    .like-comment ul li img {
      width: 20px;
      margin-right: -5px;
    }

    .like-comment ul li i {
      color: #9d9d9d;
    }

    .like-comment ul li span {
      color: var(--gray);
      margin-left: 10px;
      font-size: 14px;
    }

    /* facebook post 01 end */
    /* home center section end here */

    /* home right start */

    .home-right {
      position: fixed;
      left: 75%;
      width: 25%;
      overflow: hidden;
    }

    .home-right-wrapper {
      display: flex;
      flex-direction: column;
    }

    .event-friend,
    .create-page,
    .messenger {
      background: var(--white);
      box-shadow: 0 2px 5px 0 var(--shadow);
      border-top-left-radius: 20px;
      border-bottom-left-radius: 20px;
      padding: 15px;
      margin-bottom: 20px;
      padding-bottom: 200px;
    }

    .event {
      display: flex;
      flex-direction: column;
    }

    .heading {
      color: #1877f2;
      margin-bottom: 12px;
    }

    .heading span {
      font-size: 10px;
      float: right;
      font-weight: 600;
      color: var(--gray);
      cursor: pointer;
    }

    .event img {
      width: 100%;
      border-radius: 10px;
      margin-bottom: 18px;
    }

    .event-date {
      display: flex;
      margin-bottom: 12px;
    }

    .event-date h3 {
      color: #1877f2;
      text-align: center;
      line-height: 20px;
      margin-right: 10px;
      background: var(--white);
      padding: 6px;
      box-shadow: 0 2px 5px 0 var(--shadow);
      border-radius: 6px;
    }

    .event-date h3 b {
      color: var(--black);
      display: block;
      text-transform: uppercase;
    }

    .event-date h4 {
      color: var(--black);
      font-size: 14px;
    }

    .event-date h4 span {
      display: block;
      font-size: 12px;
      font-weight: 600;
      color: var(--gray);
    }

    .event button {
      padding: 6px;
      background: #1877f2;
      color: white;
      border-radius: 6px;
      border: none;
      margin-bottom: 18px;
      transition: 0.4s;
    }

    .event button:hover {
      background: #115cbd;
      cursor: pointer;
    }

    .event button i {
      margin-right: 6px;
    }

    .event-friend hr {
      margin-bottom: 20px;
      border: none;
      border-bottom: 2px solid var(--border);
    }

    .friend ul {
      display: flex;
      margin-bottom: 10px;
    }

    .friend ul li img {
      width: 50px;
      border-radius: 50px;
      margin-right: 10px;
    }

    .friend ul li b {
      color: var(--black);
      cursor: pointer;
      text-transform: capitalize;
    }

    .friend ul li p {
      font-size: 12px;
      display: block;
      margin-bottom: 10px;
      color: var(--gray);
    }

    .friend ul li button {
      background: #1877f2;
      border: none;
      padding: 3px 10px;
      color: white;
      border-radius: 5px;
      margin-right: 5px;
      font-size: 12px;
      cursor: pointer;
    }

    .friend-remove {
      background: var(--background) !important;
      color: var(--black) !important;
    }

    .create-page ul li {
      display: flex;
      margin-bottom: 15px;
      align-items: center;
    }

    .create-page ul li .fa-circle-plus {
      color: white;
      padding: 10px;
      background: #1877f2;
      border-radius: 10px;
      font-size: 20px;
      margin-right: 8px;
      cursor: pointer;
    }

    .create-page ul li h4 {
      font-size: 14px;
      color: var(--black);
      margin-right: 95px;
    }

    .create-page ul li i {
      color: var(--gray);
    }

    .create-page ul li img {
      width: 100%;
      border-radius: 10px;
    }

    .create-page ul li b {
      font-size: 12px;
    }

    .create-page ul li button {
      font-size: 12px;
      border: none;
      padding: 3px 10px;
      background: #1877f2;
      color: white;
      border-radius: 50px;
      cursor: pointer;
    }

    .create-page ul li:nth-child(3) {
      justify-content: space-between;
      margin-bottom: 5px;
    }

    .create-page ul li b span {
      display: block;
      font-weight: 500;
      color: var(--gray);
    }

    .messenger-search {
      display: flex;
      margin-bottom: 20px;
      align-items: center;
      position: relative;
    }

    .messenger-search .fa-user-group {
      color: white;
      padding: 10px;
      background: #1877f2;
      border-radius: 10px;
      font-size: 20px;
      margin-right: 8px;
      cursor: pointer;
    }

    .messenger-search h4 {
      font-size: 14px;
      color: var(--black);
      margin-right: 8px;
    }

    .messenger-search input {
      padding: 3px 10px;
      width: 100%;
      border-radius: 8px;
      border: none;
      background: var(--foreground);
      color: var(--gray);
    }

    .messenger ul {
      display: flex;
      flex-direction: column;
    }

    .messenger ul li {
      display: flex;
      width: 100%;
      margin-bottom: 10px;
      overflow: hidden;
      align-items: center;
      background: var(--foreground);
      padding: 10px 5px;
      border-radius: 10px;
      box-shadow: 0 2px 5px 0 var(--shadow);
      position: relative;
      transition: 0.4s;
    }

    .messenger ul li img {
      width: 42px;
      border-radius: 50px;
      margin-right: 10px;
    }

    .messenger ul li:hover {
      box-shadow: 0 4px 6px 0 var(--shadow);
    }

    .messenger ul li b {
      color: var(--black);
      font-size: 14px;
    }

    .messenger ul li b span {
      display: block;
      color: var(--gray);
      font-size: 10px;
      position: relative;
      margin-left: 15px;
    }

    .messenger ul li span::before {
      content: "";
      display: block;
      width: 7px;
      height: 7px;
      background: #12da01;
      position: absolute;
      border-radius: 50px;
      top: 4px;
      left: -12px;
    }

    .messenger ul li:nth-child(2) span::before {
      background: #ff9600;
    }

    .messenger ul li i {
      color: #1877f2;
      position: absolute;
      right: 12px;
      top: 35%;
      background: white;
      padding: 5px;
      border-radius: 50px;
      box-shadow: 0 2px 5px #95959561;
    }

    .messenger-search .fa-magnifying-glass {
      position: absolute;
      right: 6px;
      font-size: 12px;
      color: var(--black);
      cursor: pointer;
    }



    /* home right end */

    /* Login & Signup Form CSS Start */
    .form {
      padding: 25px 30px;
    }

    .form header {
      font-size: 25px;
      font-weight: 600;
      padding-bottom: 10px;
      border-bottom: 1px solid #e6e6e6;
    }

    .form form {
      margin: 20px 0;
    }

    .form form .error-text {
      color: #721c24;
      padding: 8px 10px;
      text-align: center;
      border-radius: 5px;
      background: #f8d7da;
      border: 1px solid #f5c6cb;
      margin-bottom: 10px;
      display: none;
    }

    .form form .name-details {
      display: flex;
    }

    .form .name-details .field:first-child {
      margin-right: 10px;
    }

    .form .name-details .field:last-child {
      margin-left: 10px;
    }

    .form form .field {
      display: flex;
      margin-bottom: 10px;
      flex-direction: column;
      position: relative;
    }

    .form form .field label {
      margin-bottom: 2px;
    }

    .form form .input input {
      height: 40px;
      width: 100%;
      font-size: 16px;
      padding: 0 10px;
      border-radius: 5px;
      border: 1px solid #ccc;
    }

    .form form .field input {
      outline: none;
    }

    .form form .image input {
      font-size: 17px;
    }

    .form form .button input {
      height: 45px;
      border: none;
      color: #fff;
      font-size: 17px;
      background: #333;
      border-radius: 5px;
      cursor: pointer;
      margin-top: 13px;
    }

    .form form .field i {
      position: absolute;
      right: 15px;
      top: 70%;
      color: #ccc;
      cursor: pointer;
      transform: translateY(-50%);
    }

    .form form .field i.active::before {
      color: #333;
      content: "\f070";
    }

    .form .link {
      text-align: center;
      margin: 10px 0;
      font-size: 17px;
    }

    .form .link a {
      color: #333;
    }

    .form .link a:hover {
      text-decoration: underline;
    }


    /* Users List CSS Start */
    .users {
    
    }

    .users header,
    .users-list a {
      display: flex;
      align-items: center;
      padding-bottom: 20px;
      border-bottom: 1px solid #e6e6e6;
      justify-content: space-between;
    }

    .wrapper img {
      object-fit: cover;
      border-radius: 50%;
    }

    .users header img {
      height: 50px;
      width: 50px;
    }

    :is(.users, .users-list) .content {
      display: flex;
      align-items: center;
    }

    :is(.users, .users-list) .content .details {
      color: #000;
      margin-left: 20px;
    }

    :is(.users, .users-list) .details span {
      font-size: 18px;
      font-weight: 500;
    }

    .users header .logout {
      display: block;
      background: #333;
      color: #fff;
      outline: none;
      border: none;
      padding: 7px 15px;
      text-decoration: none;
      border-radius: 5px;
      font-size: 17px;
    }

    .users .search {
      margin: 20px 0;
      display: flex;
      position: relative;
      align-items: center;
      justify-content: space-between;
    }

    .users .search .text {
      font-size: 18px;
    }

    .users .search input {
      position: absolute;
      height: 42px;
      width: calc(100% - 50px);
      font-size: 16px;
      padding: 0 13px;
      border: 1px solid #e6e6e6;
      outline: none;
      border-radius: 5px 0 0 5px;
      opacity: 0;
      pointer-events: none;
      transition: all 0.2s ease;
    }

    .users .search input.show {
      opacity: 1;
      pointer-events: auto;
    }

    .users .search button {
      position: relative;
      z-index: 1;
      width: 47px;
      height: 42px;
      font-size: 17px;
      cursor: pointer;
      border: none;
      background: #fff;
      color: #333;
      outline: none;
      border-radius: 0 5px 5px 0;
      transition: all 0.2s ease;
    }

    .users .search button.active {
      background: #333;
      color: #fff;
    }

    .search button.active i::before {
      content: '\f00d';
    }

    .users-list {
      max-height: 350px;
      overflow-y: auto;
    }

    :is(.users-list, .chat-box)::-webkit-scrollbar {
      width: 0px;
    }

    .users-list a {
      padding-bottom: 10px;
      margin-bottom: 15px;
      padding-right: 15px;
      border-bottom-color: #f1f1f1;
    }

    .users-list a:last-child {
      margin-bottom: 0px;
      border-bottom: none;
    }

    .users-list a img {
      height: 40px;
      width: 40px;
    }

    .users-list a .details p {
      color: #67676a;
    }

    .users-list a .status-dot {
      font-size: 12px;
      color: #468669;
      padding-left: 10px;
    }

    .users-list a .status-dot.offline {
      color: #ccc;
    }

    /* Chat Area CSS Start */
    .chat-area header {
      display: flex;
      align-items: center;
      padding: 18px 30px;
    }

    .chat-area header .back-icon {
      color: #333;
      font-size: 18px;
    }

    .chat-area header img {
      height: 45px;
      width: 45px;
      margin: 0 15px;
    }

    .chat-area header .details span {
      font-size: 17px;
      font-weight: 500;
    }

    .chat-box {
      position: relative;
      min-height: 500px;
      max-height: 500px;
      overflow-y: auto;
      padding: 10px 30px 20px 30px;
      background: #f7f7f7;
      box-shadow: inset 0 32px 32px -32px rgb(0 0 0 / 5%),
        inset 0 -32px 32px -32px rgb(0 0 0 / 5%);
    }

    .chat-box .text {
      position: absolute;
      top: 45%;
      left: 50%;
      width: calc(100% - 50px);
      text-align: center;
      transform: translate(-50%, -50%);
    }

    .chat-box .chat {
      margin: 15px 0;
    }

    .chat-box .chat p {
      word-wrap: break-word;
      padding: 8px 16px;
      box-shadow: 0 0 32px rgb(0 0 0 / 8%),
        0rem 16px 16px -16px rgb(0 0 0 / 10%);
    }

    .chat-box .outgoing {
      display: flex;
    }

    .chat-box .outgoing .details {
      margin-left: auto;
      max-width: calc(100% - 130px);
    }

    .outgoing .details p {
      background: #333;
      color: #fff;
      border-radius: 18px 18px 0 18px;
    }

    .chat-box .incoming {
      display: flex;
      align-items: flex-end;
    }

    .chat-box .incoming img {
      height: 35px;
      width: 35px;
    }

    .chat-box .incoming .details {
      margin-right: auto;
      margin-left: 10px;
      max-width: calc(100% - 130px);
    }

    .incoming .details p {
      background: #fff;
      color: #333;
      border-radius: 18px 18px 18px 0;
    }

    .typing-area {
      padding: 18px 30px;
      display: flex;
      justify-content: space-between;
    }

    .typing-area input {
      height: 45px;
      width: calc(100% - 58px);
      font-size: 16px;
      padding: 0 13px;
      border: 1px solid #e6e6e6;
      outline: none;
      border-radius: 5px 0 0 5px;
    }

    .typing-area button {
      color: #fff;
      width: 55px;
      border: none;
      outline: none;
      background: #333;
      font-size: 19px;
      cursor: pointer;
      opacity: 0.7;
      pointer-events: none;
      border-radius: 0 5px 5px 0;
      transition: all 0.3s ease;
    }

    .typing-area button.active {
      opacity: 1;
      pointer-events: auto;
    }

    /* Responive media query */
    @media screen and (max-width: 450px) {

      .form,
      .users {
        padding: 20px;
      }

      .form header {
        text-align: center;
      }

      .form form .name-details {
        flex-direction: column;
      }

      .form .name-details .field:first-child {
        margin-right: 0px;
      }

      .form .name-details .field:last-child {
        margin-left: 0px;
      }

      .users header img {
        height: 45px;
        width: 45px;
      }

      .users header .logout {
        padding: 6px 10px;
        font-size: 16px;
      }

      :is(.users, .users-list) .content .details {
        margin-left: 15px;
      }

      .users-list a {
        padding-right: 10px;
      }

      .chat-area header {
        padding: 15px 20px;
      }

      .chat-box {
        min-height: 400px;
        padding: 10px 15px 15px 20px;
      }

      .chat-box .chat p {
        font-size: 15px;
      }

      .chat-box .outogoing .details {
        max-width: 230px;
      }

      .chat-box .incoming .details {
        max-width: 265px;
      }

      .incoming .details img {
        height: 30px;
        width: 30px;
      }

      .chat-area form {
        padding: 20px;
      }

      .chat-area form input {
        height: 40px;
        width: calc(100% - 48px);
      }

      .chat-area form button {
        width: 45px;
      }
    }

    ::selection {
    color: #fff;
    background: #4671EA;
  }

  .wrapper {
    width: 470px;
    background: #fff;
    border-radius: 5px;
    padding: 5px;

  }

  .wrapper h2 {
    color: #4671EA;
    font-size: 28px;
    text-align: center;
  }

  .wrapper textarea {
    width: 100%;
    resize: none;
    height: 159px;
    outline: none;
    padding: 15px;
    font-size: 16px;
    margin-top: 20px;
    border-radius: 5px;
    max-height: 330px;
    caret-color: #4671EA;
    border: 1px solid #bfbfbf;
  }

  textarea::placeholder {
    color: #b3b3b3;
  }

  textarea:is(:focus, :valid) {
    padding: 14px;
    border: 2px solid #4671EA;
  }

  textarea::-webkit-scrollbar {
    width: 0px;
  }
  .users-list a{
  text-decoration:none;
  display: flex;
  align-items: center;
  padding-bottom: 20px;
  border-bottom: 1px solid #e6e6e6;
  justify-content: space-between;
}
 
/* navbar */
  </style>
  <!-- fontawesome css link -->

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
    integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>

<body>

  <!-- header section start -->
  <nav style="width: 100%;
background: #2B2C44;
position: fixed;
z-index: 999;
padding:12px;
padding-left:30px;">
    <div style="display: flex;
align-items: center;
justify-content: space-between;" class="container1">
      <h1 style="font-weight:bold;color:white;font-family:Poppins;" class="log ">
        Schwarzer
      </h1>
      <div style="float:right;" class="create">
        <form action="index.php" method="get" class="d-flex" role="search">
          <input style="padding-right:436px;border-radius:10px;" name="cari" class="form-control me-4" type="text"
            placeholder="Cari" aria-label="Search">
          <button style="padding-left:30px;padding-right:30px;margin-right:-16px;border-radius:10px;border-color:#4575B3;color:white;" class="btn btn-outline-primary" type="submit"><i
              class="fa-solid fa-search"></i></button>
        </form>


      </div>
      <div style="padding-right:15px;"class="dropdown">
        <button style="padding-left:40px;padding-right:42px;background-color:#4575B3;color:white;"type="button" class="btn" data-toggle="dropdown">
          Notifikasi <span style="padding-left:20px;"class="badge badge-light " id="notif"></span>
        </button>
        <div id="pesan" class="dropdown-menu" aria-labelledby="dropdownMenuButton">
          <form action="data_pesan.php" method="post">
            <?php while ($row = $query->fetch()) { ?>
              <a id="pesan" class="dropdown-item"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                  fill="currentColor" class="bi bi-envelope-fill" viewBox="0 0 16 16">
                  <path fill-rule="evenodd"
                    d="M.05 3.555A2 2 0 0 1 2 2h22a2 2 0 0 1 1.95 1.555L8 8.414.05 3.555zM0 4.697v7.104l5.803-3.558L0 4.697zM6.761 8.83l-6.57 4.027A2 2 0 0 0 2 14h22a2 2 0 0 0 1.808-1.144l-6.57-4.027L8 9.586l-1.239-.757zm3.436-.586L16 11.801V4.697l-5.803 3.546z" />
                </svg>&nbsp; 
                <button class="btn "type="Submit">
                  <?php echo htmlentities($row['msg']); ?><br>
                </button>
              </a>

            <?php } ?>
          </form>
        </div>
      </div>


      <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
        </script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous">
        </script>

      <script src="https://code.jquery.com/jquery-3.5.1.js"
        integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
      <script type="text/javascript" src="tampil2.js"></script>

    </div>
  </nav>


  <!-- header section end -->
  <!-- home section start -->


  <div class="home">
    <div class="container">
      <div class="home-weapper">

        <!-- home left start here -->
        <div style="background-color:#2B2C44;" class="home-left">
          <div class="profile">
            <?php
            $pdo = new PDO('mysql:host=localhost; dbname=pkl', "root", "");
            $sql = "SELECT  gambar,nama FROM users WHERE id=:id";
            $query = $pdo->prepare($sql);
            $query->execute(array('id' => $_SESSION['user']['id']));
            $topik = $query->fetch();
            ?>
            <img style="width:40px;height:40px;" src="image/<?php echo $topik['gambar'];?>">
            <h4 style="margin-bottom:-3px;color:white;" ><?php echo htmlentities($topik['nama']);?><br></h4>
          
          </div>

          <div class="explore">
            <h4 style="color:white;" class="mini-headign">JELAJAHI</h4>

            <a style="margin-top:10px;margin-bottom:20px;padding-right:92px;" href="index.php"><i class="fa-solid fa-home"></i>Beranda</a>
            <a style="margin-top:10px;margin-bottom:20px;" href="profil-utama.php?id=<?php echo $_SESSION['user']['id']; ?>"><i class="fa-solid fa-user"></i></i>Profile</a>
            <a style="margin-top:10px;margin-bottom:20px;" href="profil-edit.php?req=0"><i class="fa-solid Example of address-book fa-solid fa-gear"></i></i>Setelan Profil</a>
            <a style="margin-top:10px;margin-bottom:20px;" href="logout.php"><i class="fa-solid fa-sign-out"></i>Keluar</a>

            

          </div>

        </div><!-- home left end here -->

        <!-- home center start here -->

        <div  class="home-center">
          <div class="home-center-wrapper">
            <div style="background-color:#2B2C44;" class="createPost">
              <h3 style="color:white;" class="mini-headign">Tentang Anda</h3>
              <?php if (empty($user1['id'])) { ?>
                        <div style="margin-left:25px;margin-top:25px;margin-right:25px;">
                            <form action="simpan-profil.php" method="POST">
                                <div class="mb-3">
                                    <label style="color:white;" class="form-label fw-bold">Tinggal di</label>
                                    <input type="text" name="tinggal" class="form-control"
                                        placeholder="Tempat tinggal anda sekarang" required>
                                </div>
                                <div class="mb-3">
                                    <label style="color:white;" class="form-label fw-bold">Lahir di</label>
                                    <input type="text" name="lahir" class="form-control"
                                        placeholder="Tempat lahir anda" required>
                                </div>
                                <div class="mb-3">
                                    <label style="color:white;" class="form-label fw-bold">Jenis Kelamin</label>
                                    <select name="jk" class="form-select" aria-label="Default select example">
                                        <option selected></option>
                                        <option value="Laki-laki">Laki-laki</option>
                                        <option value="Perempuan">Perempuan</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label style="color:white;" class="form-label fw-bold">Tanggal lahir</label>
                                    <input type="date" name="tanggal" class="form-control" required>
                                </div>
                                <div class="text-end">
                                    <button class="btn btn-primary">Simpan</button>
                                </div>
                            </form>
                        </div>
                    <?php } else {
                        echo '';
                    } ?>
                    <?php if (!empty($user1['id'])) { ?>
                        <div class="col-12">

                            <form style="padding-right:25px;padding-left:25px;padding-top:20px" action="" method="POST">
                                <div class="mb-3">
                                    <label style="color:white;" class="form-label fw-bold">Tinggal</label>
                                    <input type="text" name="tinggal" class="form-control text-muted"
                                        value="<?php echo isset($_POST['tinggal']) ? $_POST['tinggal'] : $user1['tinggal']; ?>"
                                        required>
                                </div>
                                <div class="mb-3">
                                    <label style="color:white;" class="form-label fw-bold">Lahir</label>
                                    <input type="text" name="lahir" class="form-control text-muted"
                                        value="<?php echo isset($_POST['lahir']) ? $_POST['lahir'] : $user1['lahir']; ?>"
                                        required>
                                </div>
                                <div class="mb-3">
                                    <label style="color:white;" class="form-label fw-bold">Jenis Kelamin</label>
                                    <select name="jk" class="form-select text-muted" aria-label="Default select example">
                                        <option selected>
                                            <?php echo isset($_POST['jk']) ? $_POST['jk'] : $user1['jk']; ?>
                                        </option>
                                        <option value="Laki-laki">Laki-laki</option>
                                        <option value="Perempuan">Perempuan</option>
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label style="color:white;" class="form-label fw-bold">Tanggal Lahir</label>
                                    <input type="date" name="tanggal" class="form-control text-muted"
                                        value="<?php echo isset($_POST['tanggal']) ? $_POST['tanggal'] : $user1['tanggal']; ?>"
                                        required>
                                </div>
                                <div class="text-end">
                                    <button class="btn btn-primary">Simpan</button>
                                </div>
                            </form>
                        </div>
                    <?php } else {
                        echo '';
                    } ?>
            </div>

            
          </div> <!-- home center wrapper end -->
        </div> <!-- home center end -->

        <div class="home-right">
          <div style="background-color:#2B2C44;" class="messenger"> 
          <h3 style="color:white;" style="color:#1877f2;" class="mini-headign">OBROLAN</h3>

            <section class="users">
              <header>

                <div class="content">
                <div class="messenger-search">
              
   

            </div>
                  <?php
                  $sql = mysqli_query($conn, "SELECT * FROM users WHERE unique_id = {$_SESSION['user']['unique_id']}");
                  if (mysqli_num_rows($sql) > 0) {
                    $row = mysqli_fetch_assoc($sql);
                  }
                  ?>
                  <img src="image/<?php echo $row['gambar']; ?>" style="border-radius:50%;width:40px;height:40px;"alt="">
                  <div  class="details">
                    <span style="color:white;">
                      <?php echo $row['nama'] ?>
                    </span>
                  </div>

              </header>
              <div class="search">
                <span style="color:white;" class="text">Pilih user untuk memulai obrolan</span>
                <input type="text" placeholder="Masukan nama...">
                <button><i class="fas fa-search"></i></button>
              </div>
              <div style="" class="users-list">
                  
              </div>
            </section>


          </div><!-- home right end -->






        </div>
      </div>
    </div>
    <div>
    <?php include 'modal.php'; ?>


    <!-- home section end -->
    <script src="users.js"></script>
    <script>
      var darkButton = document.querySelector(".darkTheme");

      darkButton.onclick = function () {
        darkButton.classList.toggle("button-Active");
        document.body.classList.toggle("dark-color")
      }

    </script>
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
    crossorigin="anonymous"></script>
</body>

</html>