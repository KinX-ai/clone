const form = document.querySelector("form");
const input = form.querySelector("input");
const div = document.querySelector(".countdown");
const years = div.querySelector(".countdown .years");
const days = div.querySelector(".countdown .days");
const hours = div.querySelector(".countdown .hours");
const mins = div.querySelector(".countdown .mins");
const secs = div.querySelector(".countdown .secs");

const getData = () => {
  const birthTime = new Date(input.value).getTime();
  const startTime = new Date().getTime();
  const age = Math.floor((startTime - birthTime) / (1000 * 60 * 60 * 24 * 365));
  return [birthTime, startTime, age];
};

const validData = (birthTime, startTime, age) => birthTime && birthTime < startTime && age >= 0 && age <= 100;

const calcLifeTime = age => {
  const min = 180000;
  const max = (100 - age) * 1000 * 60 * 60 * 24 * 365;
  const lifeTime = Math.floor(Math.random() * (max - min) + min);
  return lifeTime;
};

const storeData = (startTime, lifeTime) => {
  localStorage.setItem('startTime', startTime);
  localStorage.setItem('lifeTime', lifeTime);
};

const counter = lifeTime => {
  updateCounter(lifeTime);
  div.style.display = "block";
  form.style.display = "none";
  const interval = setInterval(() => {
    lifeTime -= 1000;
    if (lifeTime === 0) {
      clearInterval(interval);
      document.body.style.backgroundColor = '#000000';
    }
    updateCounter(lifeTime);
  }, 1000);
};

const updateCounter = lifeTime => {
  const [y, d, h, m, s] = calcValues(lifeTime);
  years.textContent = y < 10 ? "0" + y : y;
  days.textContent = d < 10 ? "0" + d : d;
  hours.textContent = h < 10 ? "0" + h : h;
  mins.textContent = m < 10 ? "0" + m : m;
  secs.textContent = s < 10 ? "0" + s : s;
};

const calcValues = lifeTime => {
  const y = Math.floor(lifeTime / (1000 * 60 * 60 * 24 * 365));
  const d = Math.floor(lifeTime / (1000 * 60 * 60 * 24) % 365);
  const h = Math.floor(lifeTime / (1000 * 60 * 60) % 24);
  const m = Math.floor(lifeTime / (1000 * 60) % 60);
  const s = Math.floor(lifeTime / 1000) % 60;
  return [y, d, h, m, s];
};

const countdownHandler = e => {
  e.preventDefault();
  const [birthTime, startTime, age] = getData();
  if (!validData(birthTime, startTime, age)) {
    input.classList.add('not-valid');
    return;
  }
  const lifeTime = calcLifeTime(age);
  storeData(startTime, lifeTime);
  counter(lifeTime);
};

form.addEventListener("submit", countdownHandler);

const countdownStorage = () => {
  let lifeTime = Number(localStorage.getItem('lifeTime'));
  if (!lifeTime) return;
  const startTime = Number(localStorage.getItem('startTime'));
  lifeTime = lifeTime - (new Date().getTime() - startTime);
  counter(lifeTime);
};

countdownStorage();