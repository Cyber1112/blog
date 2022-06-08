<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <link rel="stylesheet" href="../assets/css/style.css?v=<?php echo time(); ?>">
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="assets/css/style.css">
        <title>Document</title>
    </head>
    <style>
        
    </style>

    <body>
        <div class="header">
            <a href="#default" class="logo">BLOG</a>
            <div class="header-right">
                <a class="active" href="#home">Home</a>
                <a href="#contact">Contact</a>
                <a href="#" id="logout">Log Out</a>
            </div>
        </div>

        <div class="container" style="margin: 30px">
            
            <div class="col-lg-9 col-md-9 col-sm-12" id="detailedPost">

            </div>

            <section style="background-color:wheat;">
                <div class="container my-5 py-5">
                  <div class="row d-flex justify-content-center">
                    <div class="col-md-12 col-lg-10">
                      <div class="card text-dark">
                        <div class="card-body p-4">
                          <h4 class="mb-0">Recent comments</h4>
                          <p class="fw-light mb-4 pb-2">Latest Comments section by users</p>

                          <div class="d-flex flex-start" id="commentSection">
                            
                          </div>

                        <div class="col-md-10 col-lg-8 col-xl-6">
                            <div class="card">

                                <div class="card-body p-4">
                                    <div class="d-flex flex-start w-100">
                                        <div class="w-100">
                                            <h1>Add a comment</h1>
                                            <div class="form-outline">
                                                <textarea name="content" class="form-control" id="textAreaExample" rows="4" placeholder="What is your view"></textarea>
                                            </div>
                                            <div class="d-flex justify-content-between mt-3" style="margin-top:20px; padding-bottom:30px">
                                                <input type="submit" id="addComment" name="commentArticle" class="btn btn-success" value="Add">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                        </div> 
                      </div>
                    </div>
                  </div>
                </div>
              </section>
            
        </div>
        
        {{-- <div class="container">
            <div class="coment-bottom bg-white">
                <div class="" style="display:flex;">
                    <textarea name="text" cols="100" rows="4"></textarea>
                    <button class="btn btn-primary" type="button">Comment</button>
                </div>
    
                <div class="commented-section mt-2">
                    <div class="d-flex flex-row align-items-center commented-user"> NAME </div>
                    <div class="comment-text-sm"><span>Comment.</span></div>
                </div>
            </div>
        </div> --}}

        <script
        src="https://code.jquery.com/jquery-3.3.1.min.js"
        integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
        crossorigin="anonymous"
        ></script>
        <script src="../assets/js/detail.js"></script>
    </body>
</html>
