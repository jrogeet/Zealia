const nword = ['ONE','TWO','THREE'];
const tempRes = getParameterByName('tempRes'); // Replace with your actual variable
const options = getParameterByName('option');
const subBut = document.getElementById('sub');
const opCount = 3-tempRes.length;

const id = getParameterByName('id');
const rCount = getParameterByName('r');
const iCount = getParameterByName('i');
const aCount = getParameterByName('a');
const sCount = getParameterByName('s');
const eCount = getParameterByName('e');
const cCount = getParameterByName('c');

var selCounter = 0;
var selected = ''

function getParameterByName(name, url = window.location.href) {
    name = name.replace(/[\[\]]/g, '\\$&');
    let regex = new RegExp('[?&]' + name + '(=([^&#]*)|&|#|$)'),
        results = regex.exec(url);
    if (!results) return null;
    if (!results[2]) return '';
    return decodeURIComponent(results[2].replace(/\+/g, ' '));
}

function partialInjection(string) {
    // Define the HTML content to be injected
    var htmlContent = `<div class="absolute inset-0 bg-threshold-cropped-solid opacity-10 bg-cover bg-center"></div> `;

    // Check the length of string and inject the HTML if it meets your condition
    for (letter of string) { // Adjust the condition as needed
        var initial = letter;
        var title = '';
        var desc = '';

        switch (letter){
            case 'R':
                title = 'ealistic';
                desc = 'Realistic skills are crucial for practical, hands-on tasks. These roles involve coding, testing, debugging, and implementing solutions to ensure operational efficiency.';
                break
            case 'I':
                title = 'nvestigative';
                desc = 'The Investigative type is dominant in roles that require extensive research, analytical thinking, and problem-solving. These roles involve designing studies, collecting and interpreting data, and ensuring accuracy and integrity.';
                break
            case 'A':
                title = 'rtistic';
                desc = 'The Artistic type plays a significant role in fostering creativity and innovation. These roles involve designing user-friendly interfaces, transforming complex information into understandable content, and developing innovative solutions.';
                break
            case 'S':
                title = 'ocial';
                desc = 'Social skills are essential for effective communication, collaboration, and teamwork. These roles involve interacting with team members, stakeholders, and clients, fostering teamwork, and ensuring effective communication.';
                break
            case 'E':
                title = 'nterprising';
                desc = 'Enterprising skills are crucial for roles that involve leadership, strategic planning, and effective communication. These roles require managing projects, securing funding, advocating for research, and influencing decision-making processes.';
                break
            case 'C':
                title = 'onventional';
                desc = 'Conventional traits are essential for roles requiring organization, attention to detail, and adherence to established procedures. These roles involve managing budgets, maintaining accurate records, documenting processes, and ensuring regulatory compliance.';
                break
        }

        var code =          `
                                
                                <div class="relative z-10 w-7/12 transform translate-x-[-50%] left-1/2 flex object-center my-12">
                                    <h1 class="relative text-right mr-[-0.3rem] text-8xl font-synebold text-orange2">${initial}</h1>
                                    <div class="relative inline-block w-full">
                                        <h1 class="relative flex h-2/5 mt-[0.9rem] font-synebold text-xl pl-[0.2rem]">${title}</h1>
                                        <p class="relative pl-[.3rem] mt-[-1rem] font-synereg">${desc}</p>
                                    </div>
                                </div>
                            `;

        htmlContent+=code
        
        
    }

    const containerDiv = document.getElementById("tdCont");

    // Inject the HTML content into the container div
    containerDiv.innerHTML = htmlContent;
    
    // Append the container div to the body or any other container
    document.body.appendChild(containerDiv);
}

function optionInjection(string) {
    // Define the HTML content to be injected
    var htmlContent = ` `;

    // Check the length of string and inject the HTML if it meets your condition
    for (letter of string) { // Adjust the condition as needed
        var initial = letter;
        var title = '';
        var desc = '';

        switch (letter){
            case 'R':
                title = 'ealistic';
                desc = 'Realistic skills are crucial for practical, hands-on tasks. These roles involve coding, testing, debugging, and implementing solutions to ensure operational efficiency.';
                break
            case 'I':
                title = 'nvestigative';
                desc = 'The Investigative type is dominant in roles that require extensive research, analytical thinking, and problem-solving. These roles involve designing studies, collecting and interpreting data, and ensuring accuracy and integrity.';
                break
            case 'A':
                title = 'rtistic';
                desc = 'The Artistic type plays a significant role in fostering creativity and innovation. These roles involve designing user-friendly interfaces, transforming complex information into understandable content, and developing innovative solutions.';
                break
            case 'S':
                title = 'ocial';
                desc = 'Social skills are essential for effective communication, collaboration, and teamwork. These roles involve interacting with team members, stakeholders, and clients, fostering teamwork, and ensuring effective communication.';
                break
            case 'E':
                title = 'nterprising';
                desc = 'Enterprising skills are crucial for roles that involve leadership, strategic planning, and effective communication. These roles require managing projects, securing funding, advocating for research, and influencing decision-making processes.';
                break
            case 'C':
                title = 'onventional';
                desc = 'Conventional traits are essential for roles requiring organization, attention to detail, and adherence to established procedures. These roles involve managing budgets, maintaining accurate records, documenting processes, and ensuring regulatory compliance.';
                break
        }

        var code =          `
                                <div class="group relative p-8 hover:bg-blue3 flex text-left">
                                    <input type="checkbox" onclick="checker(this)" id="${letter}" class="peer relative appearance-none w-[20px] h-5 min-w-[20px] 
                                        border rounded border-grey2 
                                        cursor-pointer
                                        bg-white2 
                                        checked:bg-orange1
                                        mr-14
                                        ml-7
                                        mt-14">
                                    <label class="relative inline-block text-left">
                                        <span class="flex font-synesemi text-3xl text-black group-hover:text-white"><h1 class="text-orange2">${letter}</h1>${title}</span></br>
                                        <span class="text-gray-700 group-hover:text-white">${desc}</span>
                                    </label>
                                </div>
                            `;

        htmlContent+=code
        
        
    }

    const containerDiv = document.getElementById("opCont");

    // Inject the HTML content into the container div
    containerDiv.innerHTML = htmlContent;
    
    // Append the container div to the body or any other container
    document.body.appendChild(containerDiv);
}

function checker(checkbox) {
    // Get the ID of the checkbox
    const checkboxes = document.querySelectorAll('.myCheckbox');
    const checkboxId = checkbox.id;

    // Check if the checkbox is checked
    if (checkbox.checked) {
        selCounter+=1
        selected+=checkboxId;
    }else if (checkbox.checked == false) {
        selCounter = selCounter - 1
        selected = selected.replace(`${checkboxId}`,"");
        subBut.style.display = 'none';
    }

    if (selCounter == opCount){
        subBut.style.display = 'block';
    }else if (selCounter > opCount) {
        selCounter-=1;
        checkbox.checked = false;
        alert('Limit reached!');
        selected = selected.replace(`${checkboxId}`,"");
    }
    


    console.log(selCounter);
    console.log(selected);
}

function submit(){

    finalRes = tempRes+selected;

    console.log(finalRes);

    url = `result?id=${id}&r=${rCount}&i=${iCount}&a=${aCount}&s=${sCount}&e=${eCount}&c=${cCount}&finalRes=${finalRes}`;

    window.location.href = url;
}

document.getElementById('tempResDisplay').textContent = tempRes;
partialInjection(tempRes);
document.getElementById('opCountDisplay').textContent = nword[opCount-1];
optionInjection(options);