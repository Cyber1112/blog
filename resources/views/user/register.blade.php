<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/st.css?v=<?php echo time(); ?>">
    <title>Hello, world!</title>
  </head>
  <body>
    <section class="Form my-4 mx-5">
        <div class="container">
            <div class="row no-gutters">
                <div class="col-lg-5 img-container">
                    <img src="../assets/images/healthylife.jpg" class="img-fluid" alt="">
                </div>
                <div class="col-lg-7 px-5 pt-5">
                    <h1 class="font-weight-bold py-3">LOGO</h1>
                    <h4>REGISTER</h4>
                    <p></p>
                    <form action="" method="POST">
                        <div class="form-row">
                          <div class="col-lg-7">
                              <input type="email" name="email" placeholder="Email" class="form-control my-3 p-3" required>
                          </div>
                        </div>
                        <div class="form-row">
                            <div class="col-lg-7">
                                <input type="text" name="username" placeholder="Username" class="form-control my-3 p-3" required>
                            </div>
                        </div>
                          <div class="form-row">
                              <div class="col-lg-7">
                                  <input type="password" name="password" placeholder="Password" class="form-control my-3 p-3" required>
                              </div>
                          </div>
                          <div class="form-row">
                              <div class="col-lg-7">
                                  <input type="password" name="password_confirmation" placeholder="Re-type Password" class="form-control my-3 p-3" required>
                              </div>
                          </div>
        
                          <div class="form-row">
                              <div class="col-lg-7">
                                  <button type="sumbit" name="register_btn" id="register_btn" class="btn1 mt-3 mb-5">SIGN UP</button>
                              </div>
                          </div>
        
                          <p>Already have an account <a href="http://127.0.0.1:8000/login">Log in</a></p>
                      </form>
                </div>
            </div>
        </div>
    </section>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>

        <script type="text/javascript">
   
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
           
            $("#register_btn").click(function(e){
          
                e.preventDefault();
           
                var email = $("input[name=email]").val();
                var username = $("input[name=username]").val();
                var password = $("input[name=password]").val();
                var password_confirmation = $("input[name=password_confirmation]").val();
                
                $.ajax({
                   type:'POST',
                   url:"http://127.0.0.1:8000/api/register",
                   dataType: 'JSON',
                   data:{
                       email:email,
                       username:username,
                       password:password, 
                       password_confirmation:password_confirmation,
                    },
                   success:function(data){
                        window.localStorage.setItem("token", data.access_token);
                        window.location = "http://127.0.0.1:8000";
                   }
                });
          
            });
        </script>
   
  </body>
</html>