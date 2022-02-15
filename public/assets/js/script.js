// Input : Covid positive proof file
$('.custom-file-input').on('change', function () {
    var fileName = document.getElementById("covid-positive-file").files[0].name;
    $(this).next('.covid-positive-filename').addClass("selected").html(fileName);
});

// Input : Covid negative proof file
$('.custom-file-input').on('change', function () {
    var fileName = document.getElementById("covid-negative-file").files[0].name;
    $(this).next('.covid-negative-filename').addClass("selected").html(fileName);
});

// Covid Positive File Preview
function covidPositiveFilePreview(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('.covid-positive-file-preview')
                .attr('src', e.target.result)
                .width('120px')
                .height('120px')
                .css("margin-top", "50px");
        };

        reader.readAsDataURL(input.files[0]);
    }
};

// Covid Negative File Preview
function covidNegativeFilePreview(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('.covid-negative-file-preview')
                .attr('src', e.target.result)
                .width('120px')
                .height('120px')
                .css("margin-top", "50px");
        };

        reader.readAsDataURL(input.files[0]);
    }
};

// Selectize : Select Gender
$("#select-gender").selectize({
    sortField: "text",
});

// Selectize : Select Blood Group
$("#select-blood-group").selectize({
    sortField: "text",
});

// Selectize : Select Blood Rhesus
$("#select-blood-rhesus").selectize({
    sortField: "text",
});

// Selectize : Select City
$("#select-city").selectize({
    sortField: "text",
});