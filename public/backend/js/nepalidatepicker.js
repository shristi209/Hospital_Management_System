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
        console.log($('#date_of_birth_AD').val());
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

function dateconversion(){
    var nepali = $('#org_start_bs').val();
            var english = NepaliFunctions.BS2AD(nepali);
            $('#org_start_ad').val(english);
}
setInterval(() => {
    dateconversion();
}, 1000);

$('#org_end_bs').nepaliDatePicker({
    onChange:function(){
        var nepali=$('#org_end_bs').val();
        console.log(nepali);

        var english=NepaliFunctions.BS2AD(nepali);
        console.log(english);
        $('#org_end_ad').val(english);
    }
})
