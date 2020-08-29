<!DOCTYPE html>
<html lang="en">
   <head>
      <!-- Required meta tags -->
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <title>Assignment08 &mdash; Simple Login Page &mdash; Login</title>
      <!-- Bootstrap CSS -->
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
      <script src="https://code.jquery.com/jquery-3.2.1.js" integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE=" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
      <script>
            $(function()
            {
                $('#login').click(function(e){
 
                    let self = $(this);
 
                    e.preventDefault(); // prevent default submit behavior
 
                    self.prop('disabled',true); 
 
                    var data = $('#login-form').serialize(); // get form data
 
                     // sending ajax request to login.php file, it will process login request and give response.
                    $.ajax({
                        url: 'login.php',
                        type: "POST",
                        data: data,
                    }).done(function(res) {
                        res = JSON.parse(res);
                        if (res['status']) // if login successful redirect user to secure.php page.
                        {
                            location.href = "secure.php"; // redirect user to secure.php location/page.
                        } else {
 
                            var errorMessage = '';
                            // if there is any errors convert array of errors into html string, 
                            //here we are wrapping errors into a paragraph tag.
                            console.log(res.msg);
                            $.each(res['msg'],function(index,message) {
                                errorMessage += '<p>' + message+ '</p>';
                            });
                            // place the errors inside the div#error-msg.
                            $("#error-msg").html(errorMessage);
                            $("#error-msg").show(); // show it on the browser, default state, hide
                            // remove disable attribute to the login button, 
                            //to prevent multiple form submissions 
                            //we have added this attribution on login from submit
                            self.prop('disabled',false); 
                        }
                    }).fail(function() {
                        alert("error");
                    }).always(function(){
                        self.prop('disabled',false); 
                    });
                });
            });
        </script>
   </head>
   <body>
      <div class="container">
        <div class="card" style="margin-top: 10px;">
            <div class="card-body">
                <h1>A Cool Login Page</h1>
                <hr />
                <p>You can either create your own account <i>or</i> login as Seward:</p>
                <ul>
                    <li>Email: sewardn@asmsa.org</li>
                    <li>Password: squirrel</li>
                </ul>
            </div>
        </div>
         <div class="card" style="margin-top:10px">
            <div class="card-header">
               Login
            </div>
            <div class="card-body">
            <div id="error-msg" class="alert alert-danger" style="display:none" role="alert"></div>
               <form name="login-form" action="login.php"  id="login-form" method="post">
                  <div class="form-group">
                     <label for="email">Email address</label>
                     <input type="email" class="form-control" name="email" id="email" placeholder="Enter email">
                  </div>
                  <div class="form-group">
                     <label for="password">Password</label>
                     <input type="password" class="form-control" name="password" id="password" placeholder="Password">
                  </div>
                  <button type="submit" id="login" class="btn btn-primary" style="cursor: pointer;">Login</button>
                  <a href="create-account.php" class="btn btn-secondary" style="cursor: pointer;">Create Account</a>
               </form>
            </div>
         </div>
         <footer>
            <div class="card" style="text-align:center;margin-top:10px;">
                <div class="card-body">
                    <p><a href="../index.php">Directory</a></p>
                </div>
            </div>
      </footer>
      </div>
   
   </body>
</html>