var educationCounter = 0;

document.getElementById('educationbtn').addEventListener('click', function() {
    addEducationSection();
});

function addEducationSection() {
    educationCounter++;

    var educationDiv = document.createElement("div");
    educationDiv.className = "custom-div mt-5 mb-3 d-flex justify-content-end";

    var educationTitle = document.createElement("h5");
    educationTitle.textContent = "Add Education Details";
    educationDiv.appendChild(educationTitle);

    var removeBtn = document.createElement("button");
    removeBtn.innerHTML = '<i class="fa-solid fa-trash"></i>';
    removeBtn.setAttribute("type", "button");
    removeBtn.setAttribute("class", "btn btn-sm btn-danger ml-auto remove-btn");
    removeBtn.setAttribute("data-toggle", "tooltip");
    removeBtn.setAttribute("data-placement", "top");
    removeBtn.setAttribute("title", "Delete");

    educationDiv.appendChild(removeBtn);

    document.getElementById("educationContainer").appendChild(educationDiv);

    var educationTemplate = document.getElementById("educationAdd");
    var clonedElement = educationTemplate.cloneNode(true);

    var graduationIdbs = clonedElement.querySelector('#graduation_year_start_bs');
    var newGraduationId = graduationIdbs.id + educationCounter;
    graduationIdbs.id = newGraduationId;
    console.log(newGraduationId);

    var graduationIdad = clonedElement.querySelector('#graduation_year_start_ad');
    var newGraduationIdad = graduationIdad.id + educationCounter;
    graduationIdad.id = newGraduationIdad;
    // console.log(newGraduationIdad);
    document.getElementById("educationContainer").appendChild(clonedElement);

    var clonedInputs = clonedElement.querySelectorAll('input, select, textarea');
    clonedInputs.forEach(function(input) {
        input.value = '';
    });

    $('#' + newGraduationId).nepaliDatePicker({
        onChange: function() {
            var nepali = $('#' + newGraduationId).val();
            console.log(nepali);

            var english = NepaliFunctions.BS2AD(nepali);
            console.log(english);
            $('#' + newGraduationIdad).val(english);
        }
    });
    var educationContainer=document.getElementById("educationContainer")
    removeBtn.onclick = function(){
        educationCounter--;
        // const mainDiv = document.getElementById('educationAdd');
        educationContainer.removeChild(educationDiv);
        educationContainer.removeChild(clonedElement);
    }
}
