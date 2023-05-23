$(".dellBtn").on("click", (e) => {
    let element = e.target;
    let id = element.dataset.id;
    
    location = "./scripts/dellUsers/dellUser.php?id=" + id;
})