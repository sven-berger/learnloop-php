function SkillList(props) {
  return React.createElement(
    "ul",
    null,
    props.items.map((skill, index) =>
      React.createElement("li", { key: index }, skill),
    ),
  );
}

const appElement = document.getElementById("app");

if (appElement) {
  const rawSkills = appElement.dataset.skills || "[]";
  const skills = JSON.parse(rawSkills);
  const app = React.createElement(SkillList, { items: skills });

  if (ReactDOM.createRoot) {
    ReactDOM.createRoot(appElement).render(app);
  } else {
    ReactDOM.render(app, appElement);
  }
}
