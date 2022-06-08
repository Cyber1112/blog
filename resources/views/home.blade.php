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
            <div class="row">
                <div class="col-md-12" style="margin: 30px"><span class="pull-right"><a href="#addArticleModal" class="btn btn-success" data-toggle="modal">Add New Article</a></span></div>
            </div>

            <div class="col-md-9 col-lg-12" id="post_article">               

                <div class="pagination-wrap">
                    <nav aria-label="Page navigation example">
                      <ul class="pagination">
                        <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item"><a class="page-link" href="#">Next</a></li>
                      </ul>
                    </nav>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
        <!-- Add Modal HTML -->
        <div id="addArticleModal" class="modal fade">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form method="POST" id="postNewArticle">
                        <div class="modal-header">						
                            <h4 class="modal-title">Add Article</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        </div>
                        <div class="modal-body">					
                            <div class="form-group">
                                <label>Title</label>
                                <input type="text" class="form-control" name="title" id="art_title" required>
                            </div>
                            <div class="form-group">
                                <label>Slug</label>
                                <input type="text" class="form-control" name="slug" id="art_slug" required>
                            </div>
                            <div class="form-group">
                                <label>Content</label>
                                <textarea name="content" id="art_cont" class="form-control"></textarea>
                            </div>	
                            <div class="form-group">
                                <label>
                                    <span class="mt-2 text-base leading-normal">Select a file</span>
                                    <input type="file"
                                            name="image"
                                    >
                                </label>
                                
                            </div>
                            				
                        </div>
                        <div class="modal-footer">
                            <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                            <input type="submit" id="addArticle" name="add_Article" class="btn btn-success" value="Add">
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- Edit Modal HTML -->
        <div id="editArticleModal" class="modal fade">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form method="put" id="editFormArticle">
                        <div class="modal-header">						
                            <h4 class="modal-title">Edit Article</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        </div>
                        <div class="modal-body">					
                            <div class="form-group">
                                <label>Title</label>
                                <input type="text" class="form-control" name="title" id="art_title">
                            </div>
                            <div class="form-group">
                                <label>Slug</label>
                                <input type="text" class="form-control" name="slug" id="art_slug">
                            </div>
                            <div class="form-group">
                                <label>Content</label>
                                <textarea name="content" id="art_cont" class="form-control"></textarea>
                            </div>						
                            <div class="form-group">
                                <label>
                                    <span class="mt-2 text-base leading-normal">Select a file</span>
                                    <input type="file"
                                            name="image"
                                    >
                                </label>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                            <input type="submit" name="updateArticle" id="updateArticle" class="btn btn-info" value="Update">
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- Delete Modal HTML -->
        <div id="deleteArticleModal" class="modal fade">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form method="post">
                        <div class="modal-header">						
                            <h4 class="modal-title">Delete Article</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        </div>
                        <div class="modal-body">					
                            <p>Are you sure you want to delete these Article?</p>
                            <p class="text-warning"><small>This action cannot be undone.</small></p>
                        </div>
                        <div class="modal-footer">
                            <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                            <input type="submit" class="btn btn-danger" value="Delete" id="deleteArticle">
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <script
        src="https://code.jquery.com/jquery-3.3.1.min.js"
        integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
        crossorigin="anonymous"
        ></script>
        <script src="../assets/js/index.js"></script>
    </body>
</html>
