var experienceCounter = 0;

document.getElementById('experiencebtn').addEventListener('click', function() {
    addExperienceSection();
});

function addExperienceSection() {
    experienceCounter++;

    var educationTemplate = document.getElementById("experienceAdd");

    var clonedElement = educationTemplate.cloneNode(true);

    var orgStartId=clonedElement.querySelector('#org_start_bs');
    var newOrgStartId=orgStartId.id+[experienceCounter];
    orgStartId.id=newOrgStartId;
    console.log(newOrgStartId);

    var orgStartIda=clonedElement.querySelector('#org_start_ad');
    var newOrgStartIda=orgStartIda.id+[experienceCounter];
    orgStartIda.id=newOrgStartIda;
    console.log(newOrgStartIda);

    var orgEndId=clonedElement.querySelector('#org_end_bs');
    var newOrgEndId=orgEndId.id+[experienceCounter];
    orgEndId.id=newOrgEndId;
    console.log(newOrgEndId);

    var orgEndIda=clonedElement.querySelector('#org_end_ad');
    var newOrgEndIda=orgEndIda.id+[experienceCounter];
    orgEndIda.id=newOrgEndIda;
    console.log(newOrgEndIda);

    document.getElementById("experienceContainer").appendChild(clonedElement);

    $('#'+ newOrgStartId).nepaliDatePicker({
        onChange:function(){
            var nepali=$('#'+ newOrgStartId).val();
            console.log(nepali);

            var english=NepaliFunctions.BS2AD(nepali);
            console.log(english);
            $('#' + newOrgStartIda).val(english);
        }
    })

    $('#'+ newOrgEndId).nepaliDatePicker({
        onChange:function(){
            var nepali=$('#'+ newOrgEndId).val();
            console.log(nepali);

            var english=NepaliFunctions.BS2AD(nepali);
            console.log(english);
            $('#' + newOrgEndIda).val(english);
        }
    })

}

