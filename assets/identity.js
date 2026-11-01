/* =====================================================================
   AXIOMETRIQ — Adobe Tags (Launch) loader
   ---------------------------------------------------------------------
   FPID is set by Cloudflare. ECID and all tags are managed in Adobe
   Launch. This file only loads the Launch (satellite) library, and is
   included in the <head> of every page.

   - Accelerators page -> its own Launch property
   - Every other page  -> the site-wide Launch property (incl. Platforms)

   Only one library is loaded per page; two Launch libraries on the
   same page would conflict over the _satellite object.
   ===================================================================== */
(function () {
  var SITE_LAUNCH_URL =
    "https://assets.adobedtm.com/6d07e8369d1a/8f814d7a235a/launch-bdb7d8eee04b-development.min.js";
  var INSTRUMENTS_LAUNCH_URL =
    "https://assets.adobedtm.com/6d07e8369d1a/f67e141b2ab2/launch-40fc74611c4d-development.min.js";

  // Matches /accelerators.html and /accelerators (GitHub Pages serves both)
  var isInstruments = /\/accelerators(\.html)?\/?$/i.test(window.location.pathname);

  var s = document.createElement("script");
  s.src = isInstruments ? INSTRUMENTS_LAUNCH_URL : SITE_LAUNCH_URL;
  s.async = true;
  document.head.appendChild(s);
})();
