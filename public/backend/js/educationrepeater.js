var educationCounter = 0;

document.getElementById('educationbtn').addEventListener('click', function() {
    addEducationSection();
});
document.getElementById('educationbtn_remove').addEventListener('click', function() {
    removeEducationSection();
});

function addEducationSection() {
    educationCounter++;

    var educationDiv = document.createElement("div");
    educationDiv.className = "custom-div";
    educationDiv.innerHTML = "<h4>Education</h4>";
    var cloneTitle = educationDiv.cloneNode(true);

    var educationTemplate = document.getElementById("educationAdd");

    var clonedElement = educationTemplate.cloneNode(true);

    // var educationButton=document.getElementById("educationbutton")
    document.getElementById("educationContainer").appendChild(cloneTitle);

    var graduationIdbs=clonedElement.querySelector('#graduation_year_start_bs');
    var newGraduationId=graduationIdbs.id+[educationCounter];
    graduationIdbs.id=newGraduationId;

    console.log(newGraduationId);

    var graduationIdad=clonedElement.querySelector('#graduation_year_start_ad');
    var newGraduationIdad=graduationIdad.id+[educationCounter];
    graduationIdad.id=newGraduationIdad;
    // console.log(newGraduationIdad);
    document.getElementById("educationContainer").appendChild(clonedElement);

    $('#'+ newGraduationId).nepaliDatePicker({
        onChange:function(){
            var nepali=$('#'+ newGraduationId).val();
            console.log(nepali);

            var english=NepaliFunctions.BS2AD(nepali);
            console.log(english);
            $('#' + newGraduationIdad).val(english);
        }
    })

    // var removeBtn = document.createElement("button");
    // removeBtn.innerHTML = '<i class="fa-solid fa-trash"></i>';
    // removeBtn.className = "btn btn-sm btn-danger";
    // removeBtn.setAttribute("data-toggle", "tooltip");
    // removeBtn.setAttribute("data-placement", "top");
    // removeBtn.setAttribute("title", "Delete");
    var removeBtn=document.getElementById('educationbtn_remove');
    removeBtn.addEventListener("click", function() {
        // var removebtn=this.closest(educationTemplate);
        // console.log(removebtn);
        // removebtn.removeChild(educationAdd);
        // educationCounter--;
});

    // document.querySelector('.removeBtn').appendChild(removeBtn);
}

