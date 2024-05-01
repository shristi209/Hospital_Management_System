window.onload = function() {
    var mainInput = document.getElementById("date_of_birth_BS");
    mainInput.nepaliDatePicker();
};
window.onload = function() {
    var mainInput = document.getElementById("graduation_year_start_bs");
    mainInput.nepaliDatePicker();
};
window.onload = function() {
    var mainInput = document.getElementById("org_start_bs");
    mainInput.nepaliDatePicker();
};

$('#date_of_birth_BS').nepaliDatePicker({
    onChange: function() {
        var nepaliDate = $('#date_of_birth_BS').val();
        console.log(nepaliDate);
        var englishDate = NepaliFunctions.BS2AD(nepaliDate);
        $('#date_of_birth_AD').val(englishDate);
    }
});
$('#graduation_year_start_bs').nepaliDatePicker({
    onChange: function() {
        var nepaliDate = $('#graduation_year_start_bs').val();
        console.log(nepaliDate);
        var englishDate = NepaliFunctions.BS2AD(nepaliDate);
        $('#graduation_year_start_ad').val(englishDate);
    }
});
// $('#org_start_bs').nepaliDatePicker({
//     onChange: function() {
//         var nepali = $('#org_start_bs').val();
//         console.log(nepali);
//         var english = NepaliFunctions.BS2AD(nepali);
//         $('#org_start_ad').val(english);
//     }
// });
// $(document).ready(function(){
//     alert('hi');
//     $('#org_start_bs').click(function(){
//         var nepali = $(this).val();

//                 var english = NepaliFunctions.BS2AD(nepali);
//                 alert(nepali);
//                 $('#org_start_ad').val(english);
//     });
// });

function dateconversion(){
    var nepali = $('#org_start_bs').val();
            var english = NepaliFunctions.BS2AD(nepali);
            $('#org_start_ad').val(english);
}

setInterval(() => {
    dateconversion();
}, 1000);
