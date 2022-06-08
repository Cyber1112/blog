if(!localStorage.getItem('token')){
  window.location = "http://127.0.0.1:8000/register";
}

$.ajaxSetup({
  headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});

$.ajax({
  type:'GET',
  url:"http://127.0.0.1:8000/api/articles",
  dataType: 'JSON',
  beforeSend: function(xhr, settings) { 
      xhr.setRequestHeader('Authorization','Bearer ' + localStorage.getItem('token') ); 
  },
  success:function(data){
      var result = data[0]
      container = $("#post_article")
      result.forEach(item => {
          container.prepend(
          '<article class="post vt-post">' +
              '<div class="row">' +
                  '<div class="col-xs-12 col-sm-5 col-md-5 col-lg-4">' +
                      '<div class="post-type post-img">' +
                          '<a href="#"><img src="https://bootdey.com/img/Content/avatar/avatar1.png" class="img-responsive" alt="image post"></a>' +
                      '</div>'+
                      '<div class="author-info author-info-2">'+
                          '<ul class="list-inline">'+
                              '<li>'+
                                  '<div class="info">'+
                                      '<p>Posted on:</p>'+
                                      '<strong>' + new Date(item.updated_at).toLocaleDateString() + '</strong></div>'+
                              '</li>'+
                              '<li>'+
                                  '<div class="info">'+
                                      '<p>Comments:</p>'+
                                      '<strong>127</strong></div>'+
                              '</li>'+
                          '</ul>'+
                      '</div>'+
                  '</div>'+
                  '<div class="col-xs-12 col-sm-7 col-md-7 col-lg-8">'+
                      '<div class="caption">'+
                          '<h3 class="md-heading"><a href="http://127.0.0.1:8000/detail/' +item.id + '">' + item.title +'</a></h3>'+
                          '<p>' + item.content +'</p>'+
                          '<a class="btn btn-success edit_btn" href="#editArticleModal" data-toggle="modal" role="button" style="margin-right:6px" data-id="'+item.id+'">Edit</a>'+
                          '<a class="btn btn-danger delete_btn" href="#deleteArticleModal" data-toggle="modal" role="button" data-id="'+item.id+'">Delete</a>  </div>'+
                  '</div>'+
              '</div>'+
          '</article>'                           
          )
          // console.log(item)
      });
  }
})


$("#logout").click(function(e){      
  $.ajax({
     type:'POST',
     url:"http://127.0.0.1:8000/api/logout",
     beforeSend: function(xhr, settings) { 
         xhr.setRequestHeader('Authorization','Bearer ' + localStorage.getItem('token') ); 
      },
     success:function(data){
          window.localStorage.removeItem('token');
          window.location = "http://127.0.0.1:8000/login";
     }
  });

});

$("#addArticle").click(function(e){
  e.preventDefault()
  const title = $("input[name=title]").val();
  const slug = $("input[name=slug]").val();
  const content = $("textarea[name=content]").val();
  const file_data = $("input[name=image]").prop("files")[0]; 
  const form_data = new FormData();
  form_data.append("image", file_data) 
  form_data.append("title", title) 
  form_data.append("slug", slug) 
  form_data.append("content", content) 
  
  $.ajax({
    type:'POST',
    url:"http://127.0.0.1:8000/api/articles/",
    dataType: 'JSON',
    data: form_data,
    processData: false,
    contentType: false,
    beforeSend: function(xhr, settings) { 
      xhr.setRequestHeader('Authorization','Bearer ' + localStorage.getItem('token') ); 
    },
    success:function(data){
      window.location = "http://127.0.0.1:8000";
    }
  });
});

var edit_id;
$(document).on('click', '.edit_btn', function() {
    edit_id = $(this).data('id');
});

$("#updateArticle").click(function(e){
          
  e.preventDefault()
  const formData = $("#editFormArticle :input").filter(function(index, element) {
      return $(element).val() != '';
    }).serialize()
  console.log(formData)

  $.ajax({
    type:'PUT',
    url:"http://127.0.0.1:8000/api/articles/" + edit_id + formData,
    dataType: 'JSON',
    beforeSend: function(xhr, settings) { 
      xhr.setRequestHeader('Authorization','Bearer ' + localStorage.getItem('token') ); 
    },
    success:function(data){
      console.log(data)
    }
  });

});


var delete_id;
$(document).on('click', '.delete_btn', function() {
  delete_id = $(this).data('id');
});

$("#deleteArticle").click(function(e){
  e.preventDefault()
  $.ajax({
    type:'DELETE',
    url:"http://127.0.0.1:8000/api/articles/" + delete_id,
    dataType: 'JSON',
    beforeSend: function(xhr, settings) { 
      xhr.setRequestHeader('Authorization','Bearer ' + localStorage.getItem('token') ); 
    },
    success:function(data){
      window.location = "http://127.0.0.1:8000";
    }
  });
});
