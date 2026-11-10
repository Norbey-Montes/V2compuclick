/**
 * Protección de páginas privadas + datos del usuario + logout.
 */
(function () {
  const $ = (sel) => document.querySelector(sel);

  function fillUser(user) {
    if (!user) return;
    const name = user.user_metadata?.full_name || user.email.split('@')[0] || "Usuario";

    document.querySelectorAll("[data-user-name]").forEach((el) => {
      el.textContent = name;
    });
  }

  async function requireSession() {
    if (!window.supabaseClient) {
      return new Promise((resolve) => setTimeout(async () => {
        resolve(await requireSession());
      }, 50));
    }

    const { data, error } = await window.supabaseClient.auth.getSession();
    if (error || !data?.session) {
      window.location.replace('/?error=unauthorized');
      return null;
    }
    return data.session;
  }

  async function init() {
    const session = await requireSession();
    if (!session) return;

    fillUser(session.user);
    document.body.classList.add("auth-ready");

    $("#btn-logout")?.addEventListener("click", async (e) => {
      e.preventDefault();
      if (window.supabaseClient) {
        await window.supabaseClient.auth.signOut();
      }
      window.location.replace('/?logout=success');
    });

    window.supabaseClient.auth.onAuthStateChange((event) => {
      if (event === "SIGNED_OUT") {
        window.location.replace('/?logout=success');
      }
    });
  }

  init();
})();