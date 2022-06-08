var url = window.location.pathname;
var id = url.substring(url.lastIndexOf('/') + 1);
console.log(id)

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });
var slug = "";
  $.ajax({
    type:'GET',
    url:"http://127.0.0.1:8000/api/articles/" + id,
    dataType: 'JSON',
    beforeSend: function(xhr, settings) { 
        xhr.setRequestHeader('Authorization','Bearer ' + localStorage.getItem('token') ); 
    },
    success:function(data){
        console.log(data)
        slug = data.slug
        container = $("#detailedPost")
        image = typeof(data.image) == "undefined" ? "no_image.jpg" : data.image
        container.append(
            '<h1 class="lead">' + data.title +'</h1>' +
            '<p>' + data.content + '</p>' +
            '<div class="well" style="width:250px">' +
            '<img src="../images/' + image + '" alt="" style="width:200px; hight:150px">' +
            '</div>'
        )

        commentContainer = $("#commentSection")
        comments = data['comments']
            
        comments.forEach(item => {
            commentContainer.append(
                '<div>' + 
                    '<h6 class="fw-bold mb-1">SOME Person</h6>'+
                    '<div class="d-flex align-items-center mb-3">'+
                    '<p class="mb-0">'+
                        new Date(item.updated_at).toLocaleDateString()+
                    '</p>'+
                    '</div>'+
                    '<p class="mb-0">'+
                        item.content +
                    '</p>'+
                '</div>'+
                '<hr class="my-0" />'
            )
        })
    }
  })

  $("#addComment").click(function(e){
    e.preventDefault()


    const content = $("textarea[name=content]").val();
    const form_data = new FormData();
    form_data.append("content", content) 
    form_data.append("slug", slug) 
    
    $.ajax({
      type:'POST',
      url:"http://127.0.0.1:8000/api/comment/add",
      dataType: 'JSON',
      data: form_data,
      processData: false,
      contentType: false,
      beforeSend: function(xhr, settings) { 
        xhr.setRequestHeader('Authorization','Bearer ' + localStorage.getItem('token') ); 
      },
      success:function(data){
        location.reload();
      }
    });
  });