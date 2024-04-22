<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Conditional Forms Display</title>
<style>
  /* Optional: Some basic styling */
  .hidden {
    display: none;
  }
</style>
</head>
<body>

<!-- Input for selecting a condition -->
<select id="conditionSelect" onchange="toggleForm()">
  <option value="option1">Option 1</option>
  <option value="option2">Option 2</option>
  <option value="option3">Option 3</option>
</select>

<!-- Container for forms -->
<div id="formContainer"></div>

<script>
  // Function to toggle visibility of forms based on selected option
  function toggleForm() {
    var conditionSelect = document.getElementById("conditionSelect").value;
    var formContainer = document.getElementById("formContainer");
    formContainer.innerHTML = ""; // Clear existing forms

    if (conditionSelect === "option1") {
      formContainer.innerHTML = `
        <div>
          <h3>Form for Option 1</h3>
          <form>
            <label for="textInput1">Field 1:</label>
            <input type="text" id="textInput1">
            <label for="textInput2">Field 2:</label>
            <input type="text" id="textInput2">
          </form>
        </div>`;
    } else if (conditionSelect === "option2") {
      formContainer.innerHTML = `
        <div>
          <h3>Form for Option 2</h3>
          <form>
            <label for="textInput3">Field 3:</label>
            <input type="text" id="textInput3">
            <label for="textInput4">Field 4:</label>
            <input type="text" id="textInput4">
          </form>
        </div>`;
    } else if (conditionSelect === "option3") {
      formContainer.innerHTML = `
        <div>
          <h3>Form for Option 3</h3>
          <form>
            <label for="textInput5">Field 5:</label>
            <input type="text" id="textInput5">
            <label for="textInput6">Field 6:</label>
            <input type="text" id="textInput6">
          </form>
        </div>`;
    }
  }
</script>

</body>
</html>
