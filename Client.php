
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ClientPage</title>
    <link rel="stylesheet" href="client.css">

<?php include('./db_connect.php'); ?>
<?php 
session_start();
if(isset($_SESSION['name']));
/*header("location:index.php?page=home");*/
?>
</head>
<body>
 
 <div class="full-page">
        <div class="navbar">
            <div>
                 <a href=''>
                	<?php echo "Welcome back ".($_SESSION['role'] == 2 ? " ".$_SESSION['username'] : $_SESSION['username'])."!"  ?>
            </a>
            </div>
            <nav>
                <ul id='MenuItems'>
                    <li><a href='Client.php'>Home</a></li>
                    <li><a href='mydetails.php'>My Details</a></li>
                    <li><a href='loanapplication.php'>Apply For Loan</a></li>
                    <li><a href="Homepage.php"><button type='button' class='toggle-btn'>Logout</button></a></li>
                </ul>
            </nav>
        </div>
    </div>
  
</body>
</body>
</html>