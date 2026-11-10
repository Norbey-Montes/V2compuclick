/**
 * Lógica de autenticación genérica (login / registro / sesión).
 */
(function () {
  const $ = (sel) => document.querySelector(sel);

  const formLogin = $("#form-login");
  const formRegister = $("#form-register");
  const panelLogin = $("#panel-login");
  const panelRegister = $("#panel-register");
  const msgEl = $("#auth-message");
  const configBanner = $("#config-banner");

  function showMessage(text, type = "error") {
    if (!msgEl) return;
    msgEl.textContent = text;
    msgEl.className = "message message--" + type;
    msgEl.hidden = !text;
  }

  function setLoading(form, loading) {
    const btn = form?.querySelector('button[type="submit"]');
    if (!btn) return;
    btn.disabled = loading;
    btn.dataset.loading = loading ? "1" : "0";
  }

  function clientOrWarn() {
    if (window.__AUTH_CONFIG_MISSING__) {
      showMessage(
        "Configura asset/js/auth/config.js con tu SUPABASE_URL y SUPABASE_ANON_KEY.",
        "error"
      );
      return null;
    }
    if (!window.supabaseClient) {
      showMessage("No se pudo inicializar Supabase. Revisa la consola del navegador.", "error");
      return null;
    }
    return window.supabaseClient;
  }

  // Detectar parámetros en la URL para mostrar mensajes de error o éxito
  window.addEventListener('DOMContentLoaded', () => {
    const urlParams = new URLSearchParams(window.location.search);
    if (urlParams.get('error') === 'unauthorized') {
      showMessage("Acceso restringido sin autenticación.", "error");
    } else if (urlParams.get('logout') === 'success') {
      showMessage("Sesión cerrada con éxito.", "ok");
    }
  });

  async function redirectIfSession() {
    const client = window.supabaseClient;
    if (!client || window.__AUTH_CONFIG_MISSING__) return;
    const { data } = await client.auth.getSession();
    if (data?.session) {
      window.location.href = "/computadores";
    }
  }

  // Tabs login / registro
  document.querySelectorAll("[data-tab]").forEach((btn) => {
    btn.addEventListener("click", () => {
      const tab = btn.getAttribute("data-tab");
      document.querySelectorAll("[data-tab]").forEach((b) => b.classList.remove("is-active"));
      btn.classList.add("is-active");
      if (panelLogin) panelLogin.hidden = tab !== "login";
      if (panelRegister) panelRegister.hidden = tab !== "register";
      showMessage("");
    });
  });

  formLogin?.addEventListener("submit", async (e) => {
    e.preventDefault();
    const client = clientOrWarn();
    if (!client) return;

    const email = $("#login-email").value.trim();
    const password = $("#login-password").value;

    setLoading(formLogin, true);
    showMessage("");

    const { data, error } = await client.auth.signInWithPassword({ email, password });

    setLoading(formLogin, false);

    if (error) {
      showMessage(error.message || "No se pudo iniciar sesión.", "error");
      return;
    }

    showMessage("¡Conexión exitosa! Sesión iniciada. Redirigiendo…", "ok");
    setTimeout(() => {
      window.location.href = "/computadores";
    }, 1200);

    return data;
  });

  formRegister?.addEventListener("submit", async (e) => {
    e.preventDefault();
    const client = clientOrWarn();
    if (!client) return;

    const email = $("#register-email").value.trim();
    const password = $("#register-password").value;
    const password2 = $("#register-password2").value;
    const fullName = $("#register-name").value.trim();

    if (password.length < 6) {
      showMessage("La contraseña debe tener al menos 6 caracteres.", "error");
      return;
    }
    if (password !== password2) {
      showMessage("Las contraseñas no coinciden.", "error");
      return;
    }

    setLoading(formRegister, true);
    showMessage("");

    const { data, error } = await client.auth.signUp({
      email,
      password,
      options: {
        data: { full_name: fullName || null },
      },
    });

    setLoading(formRegister, false);

    if (error) {
      showMessage(error.message || "No se pudo registrar.", "error");
      return;
    }

    if (data?.session) {
      showMessage("¡Cuenta creada con éxito! Redirigiendo…", "ok");
      setTimeout(() => {
        window.location.href = "/computadores";
      }, 1200);
    } else {
      showMessage(
        "Cuenta creada. Revisa tu correo para confirmar e inicia sesión.",
        "ok"
      );
      document.querySelector('[data-tab="login"]')?.click();
    }
  });

  if (configBanner && window.__AUTH_CONFIG_MISSING__) {
    configBanner.hidden = false;
  }

  redirectIfSession();
})();