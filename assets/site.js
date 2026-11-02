/* Axiom 2050 — shared page behaviour */
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

  var now = new Date();
  var year = now.getFullYear();

  // Footer year
  var y = document.getElementById("year");
  if (y) y.textContent = year;

  // Ribbon: place "you are here" between 2026 and 2050, and count the years left
  var marker = document.getElementById("ribbon-marker");
  if (marker) {
    var start = new Date(2026, 0, 1).getTime();
    var end = new Date(2050, 0, 1).getTime();
    var pct = Math.min(100, Math.max(0, (now.getTime() - start) / (end - start) * 100));
    marker.style.left = pct.toFixed(2) + "%";
  }
  var left = document.getElementById("years-left");
  if (left) left.textContent = Math.max(0, 2050 - year);
  var nowYear = document.getElementById("now-year");
  if (nowYear) nowYear.textContent = year;

  // "Share your 2050" form: validates and prepares a summary to copy.
  // To collect submissions for real, point this at a form service when deploying.
  var form = document.getElementById("vision-form");
  if (!form) return;
  var out = document.getElementById("vision-summary");
  var pre = document.getElementById("vision-text");
  var errBox = document.getElementById("form-error");
  var copyBtn = document.getElementById("copy-vision");
  var editBtn = document.getElementById("edit-vision");

  form.addEventListener("submit", function (e) {
    e.preventDefault();
    var msg = form.elements["prediction"].value.trim();
    var email = form.elements["email"].value.trim();
    if (!msg) {
      errBox.textContent = "Write your prediction for 2050, then prepare it again.";
      errBox.hidden = false;
      return;
    }
    if (email && !/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)) {
      errBox.textContent = "That email address looks incomplete. Fix it or leave it blank.";
      errBox.hidden = false;
      return;
    }
    errBox.hidden = true;
    var outlook = form.querySelector('input[name="outlook"]:checked');
    pre.textContent = [
      "Name: " + (form.elements["name"].value.trim() || "Anonymous"),
      "Email: " + (email || "Not given"),
      "Shift: " + form.elements["shift"].value,
      "Outlook: " + (outlook ? outlook.value : "Not given"),
      "",
      msg
    ].join("\n");
    form.hidden = true;
    out.hidden = false;
  });

  if (editBtn) editBtn.addEventListener("click", function () { out.hidden = true; form.hidden = false; });
  if (copyBtn) copyBtn.addEventListener("click", function () {
    function selectFallback() {
      var r = document.createRange(); r.selectNodeContents(pre);
      var s = window.getSelection(); s.removeAllRanges(); s.addRange(r);
      copyBtn.textContent = "Selected — press Ctrl/Cmd+C";
    }
    try { navigator.clipboard.writeText(pre.textContent).then(function () { copyBtn.textContent = "Copied"; }, selectFallback); }
    catch (err) { selectFallback(); }
  });
})();
