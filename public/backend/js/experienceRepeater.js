var experienceCounter = 0;

document.getElementById('experiencebtn').addEventListener('click', function () {
    addExperienceSection();
});

function addExperienceSection() {
    experienceCounter++;

    // adding remove button
    var experienceDiv = document.createElement("div");
    experienceDiv.className = "custom-div mt-3 mb-3 d-flex justify-content-end";

    var experienceTitle = document.createElement("h4");
    experienceTitle.textContent = "Experience";
    experienceDiv.appendChild(experienceTitle);

    var exp_removeBtn = document.createElement("button");
    exp_removeBtn.innerHTML = '<i class="fa-solid fa-trash"></i>';
    exp_removeBtn.setAttribute("type", "button");
    exp_removeBtn.setAttribute("class", "btn btn-sm btn-danger ml-auto exp-remove-btn");
    exp_removeBtn.setAttribute("data-toggle", "tooltip");
    exp_removeBtn.setAttribute("data-placement", "top");
    exp_removeBtn.setAttribute("title", "Delete");

    experienceDiv.appendChild(exp_removeBtn);

    document.getElementById("experienceContainer").appendChild(experienceDiv);

    var educationTemplate = document.getElementById("experienceAdd");
    var clonedElement = educationTemplate.cloneNode(true);

    var orgStartId = clonedElement.querySelector('#org_start_bs');
    var newOrgStartId = orgStartId.id + [experienceCounter];
    orgStartId.id = newOrgStartId;
    console.log(newOrgStartId);

    var orgStartIda = clonedElement.querySelector('#org_start_ad');
    var newOrgStartIda = orgStartIda.id + [experienceCounter];
    orgStartIda.id = newOrgStartIda;
    console.log(newOrgStartIda);

    var orgEndId = clonedElement.querySelector('#org_end_bs');
    var newOrgEndId = orgEndId.id + [experienceCounter];
    orgEndId.id = newOrgEndId;
    console.log(newOrgEndId);

    var orgEndIda = clonedElement.querySelector('#org_end_ad');
    var newOrgEndIda = orgEndIda.id + [experienceCounter];
    orgEndIda.id = newOrgEndIda;
    console.log(newOrgEndIda);

    document.getElementById("experienceContainer").appendChild(clonedElement);
    clonedElement.classList.add("experienceSection");

    $('#' + newOrgStartId).nepaliDatePicker({
        onChange: function () {
            var nepali = $('#' + newOrgStartId).val();
            console.log(nepali);

            var english = NepaliFunctions.BS2AD(nepali);
            console.log(english);
            $('#' + newOrgStartIda).val(english);
        }
    })

    $('#' + newOrgEndId).nepaliDatePicker({
        onChange: function () {
            var nepali = $('#' + newOrgEndId).val();
            console.log(nepali);

            var english = NepaliFunctions.BS2AD(nepali);
            console.log(english);
            $('#' + newOrgEndIda).val(english);
        }
    });
    var experienceContainer=document.getElementById("experienceContainer")
    exp_removeBtn.onclick = function(){
        experienceCounter--;
        experienceContainer.removeChild(experienceDiv);
        experienceContainer.removeChild(clonedElement);
    }
}
