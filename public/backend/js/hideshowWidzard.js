$(document).ready(function() {
    $("#page1").show();
    $("#page2").hide();

    $("#nextPage1").click(function() {
        var isValidBasicValidation = basicDetailsValidation();

        if (isValidBasicValidation==false) {
            alert("Please fill all the necessary credentials");
            return ;
        }
        $("#page1").hide();
        $("#page2").show();
    });
    $("#prevPage2").click(function() {
        $("#page2").hide();
        $("#page1").show();
    });
    $("#nextPage2").click(function() {
        var isValidDetailsValidation = addressDetailsValidation();
        if (isValidDetailsValidation==false) {
            alert("Please fill all the necessary credentials");
            return ;
        }
        $("#page2").hide();
        $("#page3").show();
    });
    $("#prevPage3").click(function() {
        $("#page3").hide();
        $("#page2").show();
    });
    $("#nextPage3").click(function() {
        var isValidEducationValidation = educationDetailsValidation();
        if (isValidEducationValidation==false) {
            alert("Please fill all the necessary credentials");
            return ;
        }
        $("#page3").hide();
        $("#page4").show();
    });
    $("#prevPage4").click(function() {
        $("#page4").hide();
        $("#page3").show();
    });
    $("#nextPage4").click(function() {
        var isValidExperienceValidation= experienceDetailsValidation();
        if(isValidExperienceValidation==false){
            alert("Please fill all the necessary credentials");
            return ;
        }
        $("#page4").hide();
        $("#page5").show();
    });
    $("#prevPage5").click(function() {
        $("#page5").hide();
        $("#page4").show();
    });

});
