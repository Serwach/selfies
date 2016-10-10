$('#my_form').keydown(function() {
var key = e.which;
if (key == 13) {
// As ASCII code for ENTER key is "13"
$('#my_form').submit(); // Submit form code
}
});