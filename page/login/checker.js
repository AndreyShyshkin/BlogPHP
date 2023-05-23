$(document).ready(function() {

    
    $("#submit").removeClass('bg-blue-600 hover:bg-transparent hover:text-blue-60');
    $("#submit").addClass('bg-blue-950');

    $("form").on("change", "input, select", function() {
      let checkboxChecked = $("#MarketingAccept").is(":checked");

      if (checkboxChecked) {
        $("#submit").removeClass('bg-blue-950');
        $("#submit").addClass('bg-blue-600 hover:bg-transparent hover:text-blue-60');
      } else {
        $("#submit").removeClass('bg-blue-600 hover:bg-transparent hover:text-blue-60');
        $("#submit").addClass('bg-blue-950');
      }
    });

    $("form").on("submit", function(event) {
      let checkboxChecked = $("#MarketingAccept").is(":checked");
  
      if (!checkboxChecked) {
        event.preventDefault(); 
        alert("Пожалуйста, проверьте правильность заполнения формы.");
      }
    });
  });
  