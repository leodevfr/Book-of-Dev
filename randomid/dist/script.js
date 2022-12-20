const randId = document.querySelector(".rand-id");
const btn = document.querySelector("button");

// Nombre aléatoire
const randomNumber = length => {
  return Math.floor(Math.random() * length);
};

// Générez une chaîne pseudo-aléatoire.
const generateID = length => {
  const possible =
  "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";
  let text = "";

  for (let i = 0; i < length; i++) {
    text += possible.charAt(randomNumber(possible.length));
  }

  return text;
};

randId.innerText = generateID(16);

btn.addEventListener("click", () => {
  randId.innerText = generateID(16);
});