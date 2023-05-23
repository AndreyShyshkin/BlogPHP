$("#logout").on("click", function() {
    $("#alert").removeClass("hidden")
    $("#logoutYes").on("click", function(){
        $("#alert").addClass("hidden")
        window.location.href = "./logout.php";
    })
    $("#logoutNo").on("click", function(){
        $("#alert").addClass("hidden")
    })
})