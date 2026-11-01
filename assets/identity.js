/* =====================================================================
   AXIOMETRIQ IDENTITY LAYER — FPID + ECID
   ---------------------------------------------------------------------
   This one file holds the identity logic for the whole site. It is
   loaded in the <head> of every page, BEFORE the Adobe Tags / Web SDK
   and Google tag loaders, so every page shares the same visitor ID.

   ACTION REQUIRED: paste your existing code from the current live
   technology.html and instruments.html into the two sections below,
   exactly as it runs today (no wrapper needed). Then delete the
   reference notes at the bottom if you don't need them.
   ===================================================================== */


/* ---------- SECTION A: FPID (first-party device ID) ----------------- */
/* >>> PASTE YOUR FPID CODE HERE >>> */

/* <<< END FPID <<< */


/* ---------- SECTION B: ECID (Experience Cloud ID) ------------------- */
/* >>> PASTE YOUR ECID CODE HERE >>> */

/* <<< END ECID <<< */


/* ---------------------------------------------------------------------
   REFERENCE ONLY (commented out, not executed)
   How FPID is typically passed to the Adobe Edge Network with Web SDK.
   If an FPID arrives and no ECID cookie exists, the Edge Network
   derives the ECID from the FPID, so the visitor keeps the same ECID
   even after browser cookie limits clear the client-side cookie.

   alloy("sendEvent", {
     xdm: {
       identityMap: {
         FPID: [{
           id: "<value of your server-set FPID cookie>",
           authenticatedState: "ambiguous",
           primary: true
         }]
       }
     }
   });

   For Google: the same first-party ID can be sent to GA4 as a
   user property or (for signed-in users) user_id, so Adobe and
   Google reports can be reconciled on one key.
   --------------------------------------------------------------------- */
