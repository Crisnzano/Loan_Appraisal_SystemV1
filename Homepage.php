<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>HomePage</title>
    <link rel="stylesheet" href="Homepage.css">

<?php include('./db_connect.php'); ?>
<?php 
session_start();
if(isset($_SESSION['login_id']))
/*header("location:index.php?page=home");*/
?>
</head>
<body>
 
 <div class="full-page">
        <div class="navbar">
            <div>
                <a href='website.html'>LOANS</a>
            </div>
            <nav>
                <ul id='MenuItems'>
                    <li><a href='#'>Home</a></li>
                    <li><a href='#'>About Us</a></li>
                    <li><a href='#'>Services</a></li>
                    <li><a href='#'>Contact</a></li>
                    <li><button class='loginbtn' onclick="document.getElementById('login-form').style.display='block'" style="width:auto;">Login</button></li>
                </ul>
            </nav>
        </div>
        <div id='login-form'class='login-page'>
            <div class="form-box">
                <div class='button-box'>
                    <div id='btn'></div>
                    <a href="login.php">
                    <button type='button' class='toggle-btn'>Log In</button></a>
                    <a href="manage_borrower1.php">
                    <button type='button' id="new_borrower" class="toggle-btn"></i> Register</button></a>
                </div>
               
         <form id='register' class='input-group-register'>
             <input type='text'class='input-field'placeholder='First Name' required>
             <input type='text'class='input-field'placeholder='Last Name ' required>
             <input type='email'class='input-field'placeholder='Email Id' required>
             <input type='password'class='input-field'placeholder='Enter Password' required>
             <input type='password'class='input-field'placeholder='Confirm Password'  required>
             <input type='checkbox'class='check-box'><span>I agree to the terms and                                                   conditions</span>
             
                    <button type='submit'class='submit-btn' id="new_borrower"></i>Register</button>
             </form>
            </div>
        </div>
    </div>
    <script>
    $('#login-form').submit(function(e){
        e.preventDefault()
        $('#login-form button[type="button"]').attr('disabled',true).html('Logging in...');
        if($(this).find('.alert-danger').length > 0 )
            $(this).find('.alert-danger').remove();
        $.ajax({
            url:'ajax.php?action=login',
            method:'POST',
            data:$(this).serialize(),
            error:err=>{
                console.log(err)
        $('#login-form button[type="button"]').removeAttr('disabled').html('Login');

            },
            success:function(resp){
                if(resp == 1){
                    /*location.href ='index.php?page=home';
                }else if(resp == 2){
                    location.href ='voting.php';*/
                }else{
                    $('#login-form').prepend('<div class="alert alert-danger">Username or password is incorrect.</div>')
                    $('#login-form button[type="button"]').removeAttr('disabled').html('Login');
                }
            }
        })
    })
</script>   
<script>
    $('#borrower-list').dataTable()
    $('#new_borrower').click(function(){
        uni_modal("Register","manage_borrower.php",'mid-large')
    })
    $('.edit_borrower').click(function(){
        uni_modal("Edit borrower","manage_borrower.php?id="+$(this).attr('data-id'),'mid-large')
    })
    $('.delete_borrower').click(function(){
        _conf("Are you sure to delete this borrower?","delete_borrower",[$(this).attr('data-id')])
    })
function delete_borrower($id){
        start_load()
        $.ajax({
            url:'ajax.php?action=delete_borrower',
            method:'POST',
            data:{id:$id},
            success:function(resp){
                if(resp==1){
                    alert_toast("borrower successfully deleted",'success')
                    setTimeout(function(){
                        location.reload()
                    },1500)

                }
            }
        })
    }
</script>
</body>
</body>
</html>