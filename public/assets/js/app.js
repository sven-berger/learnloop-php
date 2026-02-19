(function () {
  const appElement = document.getElementById("app");

  if (!appElement) {
    return;
  }

  let skills = [];

  try {
    const rawSkills = appElement.dataset.skills || "[]";
    skills = JSON.parse(rawSkills);
  } catch (error) {
    skills = [];
  }

  if (!Array.isArray(skills) || skills.length === 0) {
    return;
  }

  function renderWithVanilla(items) {
    const list = document.createElement("ul");
    list.className = "list-group";

    items.forEach(function (skill) {
      const item = document.createElement("li");
      item.className = "list-group-item";
      item.textContent = String(skill);
      list.appendChild(item);
    });

    appElement.replaceChildren(list);
  }

  const hasReact = typeof window.React !== "undefined";
  const hasReactDomRoot =
    typeof window.ReactDOM !== "undefined" &&
    typeof window.ReactDOM.createRoot === "function";

  if (hasReact && hasReactDomRoot) {
    const listItems = skills.map(function (skill, index) {
      return window.React.createElement(
        "li",
        { className: "list-group-item", key: index },
        String(skill),
      );
    });

    const app = window.React.createElement(
      "ul",
      { className: "list-group" },
      listItems,
    );

    window.ReactDOM.createRoot(appElement).render(app);
    return;
  }

  renderWithVanilla(skills);
})();
