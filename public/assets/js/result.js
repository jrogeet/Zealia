function getParameterByName(name, url = window.location.href) {
  name = name.replace(/[\[\]]/g, "\\$&");
  let regex = new RegExp("[?&]" + name + "(=([^&#]*)|&|#|$)"),
    results = regex.exec(url);
  if (!results) return null;
  if (!results[2]) return "";
  return decodeURIComponent(results[2].replace(/\+/g, " "));
}

function descriptionInjection(string) {
  const containerDiv = document.getElementById("tdCont");

  // Show loading initially
  containerDiv.innerHTML = `
        <div class="flex justify-center">
            <div class="animate-spin rounded-full h-16 w-16 border-4 border-orangeaccent border-t-transparent"></div>
        </div>
    `;

  // Simulate loading for better UX
  setTimeout(() => {
    let htmlContent = `<div class="absolute inset-0 bg-threshold-cropped-solid opacity-5 bg-cover bg-center"></div>`;

    string.split("").forEach((letter, index) => {
      var initial = letter;
      var title = "";
      var desc = "";

      switch (letter) {
        case "R":
          title = "ealistic";
          desc =
            "Realistic skills are crucial for practical, hands-on tasks. These roles involve coding, testing, debugging, and implementing solutions to ensure operational efficiency.";
          break;
        case "I":
          title = "nvestigative";
          desc =
            "The Investigative type is dominant in roles that require extensive research, analytical thinking, and problem-solving. These roles involve designing studies, collecting and interpreting data, and ensuring accuracy and integrity.";
          break;
        case "A":
          title = "rtistic";
          desc =
            "The Artistic type plays a significant role in fostering creativity and innovation. These roles involve designing user-friendly interfaces, transforming complex information into understandable content, and developing innovative solutions.";
          break;
        case "S":
          title = "ocial";
          desc =
            "Social skills are essential for effective communication, collaboration, and teamwork. These roles involve interacting with team members, stakeholders, and clients, fostering teamwork, and ensuring effective communication.";
          break;
        case "E":
          title = "nterprising";
          desc =
            "Enterprising skills are crucial for roles that involve leadership, strategic planning, and effective communication. These roles require managing projects, securing funding, advocating for research, and influencing decision-making processes.";
          break;
        case "C":
          title = "onventional";
          desc =
            "Conventional traits are essential for roles requiring organization, attention to detail, and adherence to established procedures. These roles involve managing budgets, maintaining accurate records, documenting processes, and ensuring regulatory compliance.";
          break;
      }

      var code = `
                <div class="relative z-10 w-8/12 mx-auto mb-6 last:mb-32
                          opacity-0 translate-y-4 animate-[fadeIn_0.6s_ease_forwards]"
                     style="animation-delay: ${index * 200}ms">
                    <div class="group bg-white/[0.02] backdrop-blur-md rounded-2xl p-8 
                               hover:bg-white/[0.04] transition-all duration-500 border border-white/5">
                        <div class="flex items-start gap-8">
                            <div class="flex flex-col items-center">
                                <span class="text-7xl font-clashbold text-orangeaccent/90 group-hover:text-orangeaccent transition-colors duration-300">${initial}</span>
                                <div class="h-px w-12 bg-gradient-to-r from-transparent via-white/20 to-transparent mt-4"></div>
                            </div>
                            <div class="flex-1 pt-3">
                                <h2 class="text-xl font-clashbold text-blackpri mb-3 tracking-wide">${title}</h2>
                                <p class="text-blackless font-satoshimed leading-relaxed text-sm">${desc}</p>
                            </div>
                        </div>
                    </div>
                </div>
            `;

      htmlContent += code;
    });

    containerDiv.innerHTML = htmlContent;
  }, 1000);
}
const res = getParameterByName("finalRes");

document.getElementById("resultDisplay").textContent = res;
descriptionInjection(res);
