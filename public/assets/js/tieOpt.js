const nword = ["ONE", "TWO", "THREE"];
const tempRes = getParameterByName("tempRes"); // Replace with your actual variable
const options = getParameterByName("option");
const subBut = document.getElementById("sub");
const opCount = 3 - tempRes.length;

const id = getParameterByName("id");
let rCount = getParameterByName("r");
let iCount = getParameterByName("i");
let aCount = getParameterByName("a");
let sCount = getParameterByName("s");
let eCount = getParameterByName("e");
let cCount = getParameterByName("c");

var selCounter = 0;
var selected = "";

function getParameterByName(name, url = window.location.href) {
  name = name.replace(/[\[\]]/g, "\\$&");
  let regex = new RegExp("[?&]" + name + "(=([^&#]*)|&|#|$)"),
    results = regex.exec(url);
  if (!results) return null;
  if (!results[2]) return "";
  return decodeURIComponent(results[2].replace(/\+/g, " "));
}

function updateProgress() {
  const progressBar = document.getElementById("progressBar");
  const progressText = document.getElementById("progressText");
  const selectionCounter = document.getElementById("selectionCounter");
  const percentage = (selCounter / opCount) * 100;

  // Update progress bar height
  progressBar.style.height = `${percentage}%`;
  progressText.textContent = `${selCounter}/${opCount}`;
  selectionCounter.textContent = `${selCounter} selected`;

  // Update step indicators
  for (let i = 1; i <= 3; i++) {
    const step = document.getElementById(`step${i}`);
    if (selCounter >= i) {
      step.classList.add("bg-orangeaccent", "w-3", "h-3");
      step.classList.remove("bg-white/30", "w-2", "h-2");
    } else {
      step.classList.add("bg-white/30", "w-2", "h-2");
      step.classList.remove("bg-orangeaccent", "w-3", "h-3");
    }
  }
}

function resetSelections() {
  const checkboxes = document.querySelectorAll('input[type="checkbox"]');
  checkboxes.forEach((checkbox) => (checkbox.checked = false));
  selCounter = 0;
  selected = "";
  updateProgress();
  updateSubmitButton();
}

function updateSubmitButton() {
  const button = document.getElementById("sub");
  const isComplete = selCounter === opCount;

  if (isComplete) {
    button.classList.remove("bg-grey2", "text-grey1");
    button.classList.add("bg-blue3", "text-white", "hover:bg-blue3/90");
    button.disabled = false;
  } else {
    button.classList.add("bg-grey2", "text-grey1");
    button.classList.remove("bg-blue3", "text-white", "hover:bg-blue3/90");
    button.disabled = true;
  }
}

function formatDisplayResult(result) {
  if (!result || result.trim() === "") {
    return "N/A";
  }
  return result;
}

function handleEmptyResult() {
  const containerDiv = document.getElementById("tdCont");
  containerDiv.innerHTML = `
        <div class="w-8/12 mx-auto">
            <div class="opacity-0 translate-y-4 animate-[fadeIn_0.6s_ease_forwards]">
                <div class="group relative overflow-hidden rounded-xl p-8
                            bg-gradient-to-br from-white/[0.03] to-transparent backdrop-blur-sm
                            border border-white/10 hover:border-white/20 transition-all duration-300">
                    <div class="flex flex-col items-center gap-4 text-center">
                        <span class="text-4xl font-clashbold text-blackpri/40">No Current Result</span>
                        <p class="text-sm text-blackpri/60 font-satoshimed leading-relaxed">
                            Your personality type will be determined based on your selections below.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    `;
}

function partialInjection(string) {
  if (!string || string.trim() === "") {
    handleEmptyResult();
    return;
  }

  const containerDiv = document.getElementById("tdCont");
  let htmlContent = `<div class="grid grid-cols-${string.length} gap-6 w-8/12 mx-auto">`;

  string.split("").forEach((letter, index) => {
    var initial = letter;
    desc = "";

    switch (letter) {
      case "R":
        desc =
          "Realistic skills are crucial for practical, hands-on tasks. These roles involve coding, testing, debugging, and implementing solutions to ensure operational efficiency.";
        break;
      case "I":
        desc =
          "The Investigative type is dominant in roles that require extensive research, analytical thinking, and problem-solving. These roles involve designing studies, collecting and interpreting data, and ensuring accuracy and integrity.";
        break;
      case "A":
        desc =
          "The Artistic type plays a significant role in fostering creativity and innovation. These roles involve designing user-friendly interfaces, transforming complex information into understandable content, and developing innovative solutions.";
        break;
      case "S":
        desc =
          "Social skills are essential for effective communication, collaboration, and teamwork. These roles involve interacting with team members, stakeholders, and clients, fostering teamwork, and ensuring effective communication.";
        break;
      case "E":
        desc =
          "Enterprising skills are crucial for roles that involve leadership, strategic planning, and effective communication. These roles require managing projects, securing funding, advocating for research, and influencing decision-making processes.";
        break;
      case "C":
        desc =
          "Conventional traits are essential for roles requiring organization, attention to detail, and adherence to established procedures. These roles involve managing budgets, maintaining accurate records, documenting processes, and ensuring regulatory compliance.";
        break;
    }

    htmlContent += `
            <div class="opacity-0 translate-y-4 animate-[fadeIn_0.6s_ease_forwards]"
                 style="animation-delay: ${index * 150}ms">
                <div class="group relative overflow-hidden rounded-xl p-6 
                            bg-gradient-to-br from-white/[0.03] to-transparent backdrop-blur-sm
                            border border-white/10 hover:border-white/20 transition-all duration-300">
                    <div class="flex flex-col items-center gap-4">
                        <span class="text-6xl font-clashbold bg-gradient-to-b from-orangeaccent to-orangeaccent/70 
                                   bg-clip-text text-transparent group-hover:scale-110 transition-transform duration-300">${letter}</span>
                        <p class="text-sm text-center text-blackpri/70 font-satoshimed leading-relaxed">${desc}</p>
                    </div>
                </div>
            </div>
        `;
  });

  htmlContent += "</div>";
  containerDiv.innerHTML = htmlContent;
}

function optionInjection(string) {
  let htmlContent = "";

  string.split("").forEach((letter, index) => {
    var ques = "";

    switch (letter) {
      case "R":
        qList = [
          "I enjoy hands-on activities like assembling furniture or fixing things around the house.",
          "I prefer tasks that involve working with nature, such as gardening or farming.",
          "I like learning how different tools and machinery operate in practical settings.",
        ];
        num = Math.floor(Math.random() * 3);
        ques = qList[num];
        break;
      case "I":
        qList = [
          "I am curious about how technology works and enjoy exploring new scientific advancements.",
          "I enjoy solving real-world problems by analyzing data and finding patterns.",
          "I prefer researching and investigating to get to the root of a problem.",
        ];
        num = Math.floor(Math.random() * 3);
        ques = qList[num];
        break;
      case "A":
        qList = [
          "I find joy in transforming my ideas into visual or performance-based art forms.",
          "I enjoy exploring new and unconventional methods of self-expression.",
          "I am drawn to environments where I can create and innovate without boundaries.",
        ];
        num = Math.floor(Math.random() * 3);
        ques = qList[num];
        break;
      case "S":
        qList = [
          "I enjoy working on projects that directly improve the well-being of others.",
          "I like facilitating group collaborations to ensure everyone contributes effectively.",
          "I find it rewarding to mentor or support people who need guidance.",
        ];
        num = Math.floor(Math.random() * 3);
        ques = qList[num];
        break;
      case "E":
        qList = [
          "I thrive in leadership roles where I can influence and guide others toward success.",
          "I enjoy identifying new business opportunities and creating strategies to pursue them.",
          "I like taking calculated risks to achieve larger goals in competitive environments.",
        ];
        num = Math.floor(Math.random() * 3);
        ques = qList[num];
        break;
      case "C":
        qList = [
          "I enjoy organizing schedules and managing the logistical aspects of projects.",
          "I prefer following established processes and maintaining high standards in my work.",
          "I find satisfaction in ensuring tasks are completed with precision and accuracy.",
        ];
        num = Math.floor(Math.random() * 3);
        ques = qList[num];
        break;
    }

    htmlContent += `
            <div class="group relative border-b border-white/10 last:border-none">
                <label class="flex items-start gap-4 p-6 cursor-pointer hover:bg-white/[0.02] transition-colors">
                    <div class="relative pt-1">
                        <input class="peer sr-only" type="checkbox" onclick="checker(this)" id="${letter}">
                        <div class="w-5 h-5 border-2 border-blackpri/20 rounded transition-all
                                  peer-checked:border-orangeaccent peer-checked:bg-orangeaccent"></div>
                        <svg class="absolute top-[0.3rem] left-[0.2rem] w-3 h-3 text-white opacity-0 
                                  peer-checked:opacity-100 transition-opacity" viewBox="0 0 16 16">
                            <path fill="none" stroke="currentColor" stroke-width="2" 
                                  d="M4 8l3 3 5-5"/>
                        </svg>
                    </div>
                    <span class="flex-1 text-blackpri/80 group-hover:text-blackpri transition-colors">${ques}</span>
                </label>
            </div>
        `;
  });

  document.getElementById("opCont").innerHTML = htmlContent;
}

function checker(checkbox) {
  // Get the ID of the checkbox
  const checkboxId = checkbox.id;

  // Check if the checkbox is checked
  if (checkbox.checked) {
    selCounter += 1;
    selected += checkboxId;
  } else if (checkbox.checked == false) {
    selCounter = selCounter - 1;
    selected = selected.replace(`${checkboxId}`, "");
    subBut.classList.add("bg-grey2", "text-grey1");
    subBut.classList.remove("bg-blue3", "text-white");
  }

  if (selCounter == opCount) {
    subBut.classList.add("bg-blue3", "text-white");
    subBut.classList.remove("bg-grey2", "text-grey1");
  } else if (selCounter > opCount) {
    selCounter -= 1;
    checkbox.checked = false;
    alert("Limit reached!");
    selected = selected.replace(`${checkboxId}`, "");
  }

  console.log(selCounter);
  console.log(selected);
  updateProgress();
  updateSubmitButton();
}

function submit() {
  for (let letter of selected) {
    switch (letter) {
      case "R":
        rCount++;
        break;
      case "I":
        iCount++;
        break;
      case "A":
        aCount++;
        break;
      case "S":
        sCount++;
        break;
      case "E":
        eCount++;
        break;
      case "C":
        cCount++;
        break;
    }
  }

  finalRes = tempRes + selected;

  console.log(finalRes);

  url = `result?id=${id}&r=${rCount}&i=${iCount}&a=${aCount}&s=${sCount}&e=${eCount}&c=${cCount}&finalRes=${finalRes}`;

  window.location.href = url;
}

document.getElementById("tempResDisplay").textContent =
  formatDisplayResult(tempRes);
partialInjection(tempRes);
document.getElementById("opCountDisplay").textContent = nword[opCount - 1];
optionInjection(options);
updateProgress();
updateSubmitButton();
