<?php
include_once("connection.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact</title>

    <!--custom css-->
    <style>
        *{
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        text-decoration: none;
        border: none;
        outline: none;
        scroll-behavior: smooth;
        font-family: 'Poppins', sans-serif;
        }

        :root{
        --bg-color: #1f242d; 
        --second-bg-color: #323946;
        --text-color: #fff;
        --main-color: #0ef;    
        }
        html{
            font-size: 62.5%;
            overflow-x: hidden;
        }

        body{
            background-color: var(--bg-color);
            color: var(--text-color);
        }

        form {
        display: flex;
        flex-direction: column;
        align-items: center;
        }

        label {
        font-weight: bold;
        margin-top: 10px;
        }

        input {
        padding: 8px;
        margin-bottom: 20px;
        border-radius: 5px;
        border: none;
        box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
        width: 300px;
        }

        .btn {
        display: inline-block;
        padding: 1rem 2.8rem;
        background: var(--main-color);
        border-radius: 4rem;
        box-shadow: 0 0 1rem var(--main-color);
        font-size: 1.6rem;
        color: var(--second-bg-color);
        letter-spacing: .1rem;
        font-weight: 600;
        width: 200px;
        height: 50px;
        transition: .5s ease;
        }

        .btn:hover{
        box-shadow: none;
        }

        span{
        color: var(--main-color)
        }

        .heading{
            text-align: center;
            font-size: 4.5rem;
            padding-top: 100px;
        }

        .header .info-system{
            position: fixed;
            width: 100%;
            height: 120px;
            background: #1f242d;
            border-bottom: 2px solid #0ef;
        }

        section{
            min-height: 100vh;
            padding: 5rem 9% 2rem;
        }

        .contact h2{
            margin-bottom: 3rem;
        }

        .contact form{
        max-width: 70rem;
        margin: 1rem auto;
        text-align: center;
        margin-bottom: 3rem;
        }

        .contact form .input-box{
            display: flex;
            justify-content: space-between;
            width: 100%;
            flex-wrap: wrap;
        }

        .contact form .input-box input,
        .contact form textarea{
            width: 100%;
            padding: 1.5rem;
            font-size: 1.6rem;
            color: var(--text-color);
            background: var(--second-bg-color);
            border-radius: .8rem;
            margin: .7rem 0;
        }

        .contact form .input-box input{
            width: 49%;
        }

        .contact form textarea{
            resize: none;
        }

        .contact form .btn{
            margin-top: 2rem;
            cursor: pointer;
        }

        .info-system{
            background: #323946;
            text-align: center;
            padding: 30px;
            width: 100%;
            font-weight: bold;
        }

        .info-system .logo{
            color: white;
            text-align: center;
            font-size: 4.5rem;
        }

        .styled-table {
            border-collapse: collapse;
            margin: 25px 0;
            font-size: 20px;
            font-family: sans-serif;
            width: 100%;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
            margin-left: auto;
            margin-right: auto;
            margin-bottom: 50px;
        }
        
        .styled-table thead tr {
            background-color: #0ef;
            color: black;
            text-align: left;
        }

        .styled-table td{
            background: #323946;
        }

        .styled-table th,
        .styled-table td {
            padding: 12px 15px;
        }
        
        .styled-table tbody tr {
            border-bottom: 1px solid #dddddd;
        }

        .styled-table tbody tr:last-of-type {
            border-bottom: 2px solid #0ef;
        }

        .styled-table tbody tr.active-row {
            font-weight: bold;
            color: #323946;
        }

        .input-btn{
            text-align: center;
        }
        
        .input-btn input{
            margin: 15px;
        }

        .contact-list{
            background: var(--second-bg-color);
            padding-top: 1px;
        }
        
        .contact-list .heading{
            padding-top: 50px;
        }

        .edit{
            color: white;
        }
        
    </style>
</head>

<body>

    <!-- header design -->
    <header class="header">
        
        <div class="info-system"> <a href="#" class="logo">CONTACT <span>INFORMATION</span> SYSTEM</a> 
        </div>
    </header>
   
    <!-- contact design -->
    <section class="contact" id="contact">
        <h2 class="heading">Contact <span>Me!</span></h2>

        <form name="contact-form" action="insertContact.php" method="post" enctype="multipart/form-data">
            <div class="input-box">
                <input type="text" name="fullName" placeholder="Full Name" required>
                <input type="email" name="emailAdd" placeholder="Email Address" required>
            </div>

            <div class="input-box">
                <input type="number" name="mobileNum" placeholder="Mobile Number" required>
                <input type="text" name="emailSub" placeholder="Email Subject" required>
            </div>

            <textarea name="yourMessage" id="" cols="30" rows="10" placeholder="Your Message" required></textarea>
            <input type="submit" name="Send" value="Send Message" class="btn">
        </form>
    </section>

    <!-- contact design -->
    <section class="contact-list" id="contact-list">
        <h2 class="heading">Contact <span>List</span></h2>
        <table class="styled-table">
            <thead>
                <tr>
                    <th>Full Name</th>
                    <th>Email Address</th>
                    <th>Mobile Number</th>
                    <th>Email Subject</th>
                    <th>Messages</th>
                    <th>Button</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $sql = ("SELECT * FROM contact");
                    $result = mysqli_query($conn, $sql);
                    $resultcheck = mysqli_num_rows($result);
                    
                    if ($resultcheck > 0) {
                        while ($row = mysqli_fetch_assoc($result)){
                            $contactID = $row['contactID'];
                ?>
        
                <tr>
                    <td><?php  echo $row['fullName']; ?></td>
                    <td><?php  echo $row['emailAdd']; ?></td>
                    <td><?php  echo $row['mobileNum']; ?></td>
                    <td><?php  echo $row['emailSub']; ?></td>
                    <td><?php  echo $row['yourMessage']; ?></td>
                    <td ><a class="edit" href="edit.php?contactID=<?php echo $contactID; ?>">Edit </a> | <a class="edit" href="remove.php?contactID=<?php echo $contactID; ?>">Delete </a></td>
                </tr>
                <?php } } ?>
            </tbody>
        </table> 
            <div class="input-btn">
                <a href="#contact"><<input type="submit" name="Send" value="Add" class="btn"></a>
            </div>
        </form>
    </section>


    <!--custom js-->
    <script> 
    </script>

</body>
</html>