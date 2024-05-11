var experienceCounter = 0;

document.getElementById('experiencebtn').addEventListener('click', function () {
    addExperienceSection();
});

function addExperienceSection() {
    experienceCounter++;

//created and cloned the title and button for the cloned element
    var experienceDiv = document.createElement("div");
    experienceDiv.className = "custom-div card-header mt-3 mb-3 d-flex justify-content-between";

    var experienceTitle = document.createElement("h5");
    experienceTitle.textContent = "Add Experience Details";
    experienceDiv.appendChild(experienceTitle);

    var exp_removeBtn = document.createElement("button");
    exp_removeBtn.innerHTML = '<i class="fa-solid fa-trash"></i>';
    exp_removeBtn.setAttribute("type", "button");
    exp_removeBtn.setAttribute("class", "btn btn-sm btn-danger ml-auto exp-remove-btn");

    experienceDiv.appendChild(exp_removeBtn);
    document.getElementById("experienceContainer").appendChild(experienceDiv);

//cloned div
    var experienceTemplate = document.getElementById("experienceAdd");
    var clonedExperience = experienceTemplate.cloneNode(true);

//removing parent's title
    var experienceHeader = clonedExperience.querySelector('.rem');
    experienceHeader.parentNode.removeChild(experienceHeader);

//generating unique id's
    var orgStartId = clonedExperience.querySelector('#org_start_bs');
    var newOrgStartId = orgStartId.id + [experienceCounter];
    orgStartId.id = newOrgStartId;
    console.log(newOrgStartId);

    var orgStartIda = clonedExperience.querySelector('#org_start_ad');
    var newOrgStartIda = orgStartIda.id + [experienceCounter];
    orgStartIda.id = newOrgStartIda;
    console.log(newOrgStartIda);

    var orgEndId = clonedExperience.querySelector('#org_end_bs');
    var newOrgEndId = orgEndId.id + [experienceCounter];
    orgEndId.id = newOrgEndId;
    console.log(newOrgEndId);

    var orgEndIda = clonedExperience.querySelector('#org_end_ad');
    var newOrgEndIda = orgEndIda.id + [experienceCounter];
    orgEndIda.id = newOrgEndIda;
    console.log(newOrgEndIda);

    var ckeditorId = clonedExperience.querySelector('#editor');
    var newckeditorId = ckeditorId.id + [experienceCounter];
    ckeditorId.id = newckeditorId;
    console.log(newckeditorId);

    document.getElementById("experienceContainer").appendChild(clonedExperience);

    var clonedInputs = clonedExperience.querySelectorAll('input, select, textarea');
    clonedInputs.forEach(function (input) {
        input.value = '';
    });

//initializing datepicker for all the newly generated id
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

//remove button
    var experienceContainer = document.getElementById("experienceContainer")
    exp_removeBtn.onclick = function () {
        experienceCounter--;
        experienceContainer.removeChild(experienceDiv);
        experienceContainer.removeChild(clonedExperience);
    }

    ClassicEditor
        .create(document.querySelector('#' + newckeditorId), {
        })
        .then(editor => {
            console.log('Editor initialized:', editor);

            // Get all div elements with the specified class
            var divsWithClass = document.querySelectorAll('div.ck.ck-reset.ck-editor.ck-rounded-corners');

            // Keep track of the first div's aria-labelledby attribute value
            var firstAriaLabelledBy = null;

            // Iterate over each matching div element
            divsWithClass.forEach(function (div) {
                // Check if it has an aria-labelledby attribute
                if (div.hasAttribute('aria-labelledby')) {
                    var currentAriaLabelledBy = div.getAttribute('aria-labelledby');
                    // If it's the first div found, mark it as such and store its aria-labelledby value
                    if (firstAriaLabelledBy === null) {
                        firstAriaLabelledBy = currentAriaLabelledBy;
                    } else if (currentAriaLabelledBy === firstAriaLabelledBy) {
                        // Remove the div element from its parent if it has the same aria-labelledby attribute value
                        div.parentNode.removeChild(div);
                    }
                }
            });
        })
        .catch(error => {
            console.error('Error initializing editor:', error);
        });
}
