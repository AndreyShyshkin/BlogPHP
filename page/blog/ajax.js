$("#formPost").on("submit", function(e){
    e.preventDefault();

    let form = $("#formPost")


    let fileData = $("#formFile").prop('files')[0];
    let formData = new FormData($("#formPost")[0]);
        formData.append("file", fileData);
    $.ajax({
        type: "POST",
        url: "/page/blog/NewPost/submitPost.php",
        data: formData,
        contentType: false,
        processData: false,
        success: function(data){
            $("#posts").append(data);
        }
    })
});