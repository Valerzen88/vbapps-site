var root = document.querySelector("html"),
  s = document.createElement("style"),
  r = document.querySelectorAll("input[type=range]"),
  prefs = ["webkit-slider-runnable", "moz-range", "ms"],
  styles = [],
  l = prefs.length;
n = r.length;

document.body.appendChild(s);

var getTrackStyleStr = function(el) {
  var str = "",
    j = el.dataset.idx,
    min = el.min || 0,
    perc = el.max ? ~~(100 * (el.value - min) / (el.max - min)) : el.value,
    val = Math.max(1, perc) + "% 100%",
    el_styles,
    w,
    h,
    size;

  if (j == 4) {
    el_styles = getComputedStyle(el);
    h = el_styles.height.split("px")[0] / 3;
    w = el_styles.width.split("px")[0] - h;
    size = w / 4 + "px " + (h / 2 - 2) + "px";
    val = size + "," + size + "," + val + ",100% 100%";
  }

  for (var i = 0; i < (j == 4 ? l : l - 1); i++) {
    str +=
      ".js input[type=range]:nth-of-type(" +
      j +
      ")::-" +
      prefs[i] +
      "-track{background-size:" +
      val +
      "}";
  }

  return str;
};

var updateStyle = function(el) {
  styles[el.dataset.idx] = getTrackStyleStr(el);
  s.textContent = styles.join("");
};

for (var i = 0; i < n; i++) {
  styles.push("");

  if (r[i].dataset.idx == 4 && root.classList.contains("-ms-")) {
    r[i].addEventListener(
      "change",
      function() {
        updateStyle(this);
      },
      false
    );
  }

  r[i].addEventListener(
    "input",
    function() {
      updateStyle(this);
    },
    false
  );
}
