/* Axiometriq — shared page behaviour */
(function () {
  // Mobile menu
  var toggle = document.querySelector(".menu-toggle");
  var nav = document.getElementById("site-nav");
  if (toggle && nav) {
    toggle.addEventListener("click", function () {
      var open = nav.classList.toggle("open");
      toggle.setAttribute("aria-expanded", open ? "true" : "false");
      toggle.textContent = open ? "Close" : "Menu";
    });
  }

  // Footer year
  var y = document.getElementById("year");
  if (y) y.textContent = new Date().getFullYear();

  // Contact form: validates and prepares an enquiry summary.
  // When deploying, replace the summary step with a POST to your form handler or CRM.
  var form = document.getElementById("enquiry-form");
  if (!form) return;
  var out = document.getElementById("enquiry-summary");
  var pre = document.getElementById("enquiry-text");
  var errBox = document.getElementById("form-error");
  var copyBtn = document.getElementById("copy-enquiry");
  var editBtn = document.getElementById("edit-enquiry");

  form.addEventListener("submit", function (e) {
    e.preventDefault();
    var name = form.elements["name"].value.trim();
    var email = form.elements["email"].value.trim();
    var msg = form.elements["message"].value.trim();
    if (!name || !email || !msg) {
      errBox.textContent = "Add your name, work email and a short note about the project, then prepare the enquiry again.";
      errBox.hidden = false;
      return;
    }
    if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)) {
      errBox.textContent = "That email address looks incomplete. Check it and try again.";
      errBox.hidden = false;
      return;
    }
    errBox.hidden = true;
    var platforms = Array.prototype.slice.call(form.querySelectorAll('input[name="platform"]:checked')).map(function (c) { return c.value; });
    var lines = [
      "Name: " + name,
      "Email: " + email,
      "Company: " + (form.elements["company"].value.trim() || "—"),
      "Area of interest: " + form.elements["area"].value,
      "Platforms in use: " + (platforms.length ? platforms.join(", ") : "Not specified"),
      "",
      msg
    ];
    pre.textContent = lines.join("\n");
    form.hidden = true;
    out.hidden = false;
  });

  if (editBtn) editBtn.addEventListener("click", function () { out.hidden = true; form.hidden = false; });

  if (copyBtn) copyBtn.addEventListener("click", function () {
    var text = pre.textContent;
    function selectFallback() {
      var r = document.createRange(); r.selectNodeContents(pre);
      var s = window.getSelection(); s.removeAllRanges(); s.addRange(r);
      copyBtn.textContent = "Selected — press Ctrl/Cmd+C";
    }
    try {
      navigator.clipboard.writeText(text).then(function () { copyBtn.textContent = "Copied"; }, selectFallback);
    } catch (err) { selectFallback(); }
  });
})();
