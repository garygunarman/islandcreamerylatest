function deleteLocations() {
var question = confirm ("Are you sure you want to delete?");
if (question) {
document.getElementById("action").value="delete";
document.getElementById("locations_form").submit(); } }

function uploadSubmit(){
document.getElementById("submit_button").value="Update Thumbs...";
document.getElementById("thumbnail_form").submit(); }