$(document).ready(function() {
 
    $("#submit").removeClass('bg-blue-600 hover:bg-transparent hover:text-blue-60');
    $("#submit").addClass('bg-blue-950');

    $("form").on("change", "input, select", function() {
      let allFieldsFilled = checkAllFieldsFilled();
      let passwordLengthValid = checkPasswordLength();
      let passwordMatch = checkPasswordMatch();
      let checkboxChecked = $("#MarketingAccept").is(":checked");

      if (allFieldsFilled && passwordLengthValid && passwordMatch && checkboxChecked) {
        $("#submit").removeClass('bg-blue-950');
        $("#submit").addClass('bg-blue-600 hover:bg-transparent hover:text-blue-60');
      } else {
        $("#submit").removeClass('bg-blue-600 hover:bg-transparent hover:text-blue-60');
        $("#submit").addClass('bg-blue-950');
      }
    });

    $("form").on("submit", function(event) {
      let allFieldsFilled = checkAllFieldsFilled();
      let passwordLengthValid = checkPasswordLength();
      let passwordMatch = checkPasswordMatch();
      let checkboxChecked = $("#MarketingAccept").is(":checked");
  
      if (!allFieldsFilled || !passwordLengthValid || !passwordMatch || !checkboxChecked) {
        event.preventDefault(); 
        alert("Пожалуйста, проверьте правильность заполнения формы.");
      }
    });
  
    function checkAllFieldsFilled() {
      let allFieldsFilled = true;
      $("form input").not(":checkbox").each(function() {
        if ($(this).val().trim() === "") {
          allFieldsFilled = false;
          return false; 
        }
      });
      return allFieldsFilled;
    }
  
    // Функция для проверки длины пароля
    function checkPasswordLength() {
      let password = $("#Password").val().trim();
      return password.length >= 8;
    }
  
    
    function checkPasswordMatch() {
      let password = $("#Password").val().trim();
      let confirmPassword = $("#PasswordConfirmation").val().trim();
      return password === confirmPassword;
    }
  });
  