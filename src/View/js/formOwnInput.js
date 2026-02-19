const selectMulti = document.getElementById("selectMulti");
let ownInput = null;

selectMulti.addEventListener("change", function () {
  if (this.value === "ownLetter") {
    if (!ownInput) {
      ownInput = document.createElement("input");
      ownInput.type = "number";
      ownInput.name = "selectMulti";
      ownInput.className = "form-control mt-3";
      ownInput.placeholder = "Eigenen Multi-Faktor eingeben";
      ownInput.required = true;

      // Select deaktivieren (damit nur EIN Wert existiert)
      selectMulti.disabled = true;
      selectMulti.parentElement.appendChild(ownInput);
    }
  } else {
    if (ownInput) {
      ownInput.remove();
      ownInput = null;
      selectMulti.disabled = false;
    }
  }
});
