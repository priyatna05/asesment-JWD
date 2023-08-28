document.addEventListener("DOMContentLoaded", function () {
  const ipkThreshold = 3.0; // IPK threshold for eligibility
  const ipkInput = document.getElementById("ipk");
  const registerButton = document.getElementById("register-button");

  ipkInput.addEventListener("input", function () {
    if (parseFloat(ipkInput.value) < ipkThreshold) {
      registerButton.disabled = true;
    } else {
      registerButton.disabled = false;
    }
  });
});
