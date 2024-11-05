const nword = ['ONE','TWO','THREE'];
const tempRes = getParameterByName('tempRes'); // Replace with your actual variable
const options = getParameterByName('option');
const subBut = document.getElementById('sub');
const opCount = 3-tempRes.length;

const id = getParameterByName('id');
let rCount = getParameterByName('r');
let iCount = getParameterByName('i');
let aCount = getParameterByName('a');
let sCount = getParameterByName('s');
let eCount = getParameterByName('e');
let cCount = getParameterByName('c');

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
     desc = '';

        switch (letter){
            case 'R':
                desc = 'Realistic skills are crucial for practical, hands-on tasks. These roles involve coding, testing, debugging, and implementing solutions to ensure operational efficiency.';
                break
            case 'I':
                desc = 'The Investigative type is dominant in roles that require extensive research, analytical thinking, and problem-solving. These roles involve designing studies, collecting and interpreting data, and ensuring accuracy and integrity.';
                break
            case 'A':
                desc = 'The Artistic type plays a significant role in fostering creativity and innovation. These roles involve designing user-friendly interfaces, transforming complex information into understandable content, and developing innovative solutions.';
                break
            case 'S':
                desc = 'Social skills are essential for effective communication, collaboration, and teamwork. These roles involve interacting with team members, stakeholders, and clients, fostering teamwork, and ensuring effective communication.';
                break
            case 'E':
                desc = 'Enterprising skills are crucial for roles that involve leadership, strategic planning, and effective communication. These roles require managing projects, securing funding, advocating for research, and influencing decision-making processes.';
                break
            case 'C':
                desc = 'Conventional traits are essential for roles requiring organization, attention to detail, and adherence to established procedures. These roles involve managing budgets, maintaining accurate records, documenting processes, and ensuring regulatory compliance.';
                break
        }

        var code =          `
                                
                                <div class="relative z-10 w-7/12 transform translate-x-[-50%] left-1/2 flex object-center my-12">
                                    <h1 class="relative text-right mr-[-0.3rem] text-8xl font-synebold text-orange2">${initial}</h1>
                                    <div class="relative inline-block w-full">
                                        <h1 class="relative flex h-2/5 mt-[0.9rem] font-synebold text-xl pl-[0.2rem<p class="relative pl-[.3rem] mt-[-1rem] font-synereg">${desc}</p>
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
        var ques = '';

        switch (letter){
            case 'R':
                qList = ['I enjoy hands-on activities like assembling furniture or fixing things around the house.',
                         'I prefer tasks that involve working with nature, such as gardening or farming.',
                         'I like learning how different tools and machinery operate in practical settings.']
                num = Math.floor(Math.random() * 3);
                ques = qList[num];
                break
            case 'I':
                qList = ['I am curious about how technology works and enjoy exploring new scientific advancements.',
                         'I enjoy solving real-world problems by analyzing data and finding patterns.',
                         'I prefer researching and investigating to get to the root of a problem.']
                num = Math.floor(Math.random() * 3);
                ques = qList[num]
                break
            case 'A':
                qList = ['I find joy in transforming my ideas into visual or performance-based art forms.',
                         'I enjoy exploring new and unconventional methods of self-expression.',
                         'I am drawn to environments where I can create and innovate without boundaries.']
                num = Math.floor(Math.random() * 3);
                ques = qList[num]
                break
            case 'S':
                qList = ['I enjoy working on projects that directly improve the well-being of others.',
                         'I like facilitating group collaborations to ensure everyone contributes effectively.',
                         'I find it rewarding to mentor or support people who need guidance.']
                num = Math.floor(Math.random() * 3);
                ques = qList[num]
                break
            case 'E':
                qList = ['I thrive in leadership roles where I can influence and guide others toward success.',
                         'I enjoy identifying new business opportunities and creating strategies to pursue them.',
                         'I like taking calculated risks to achieve larger goals in competitive environments.']
                num = Math.floor(Math.random() * 3);
                ques = qList[num]
                break
            case 'C':
                qList = ['I enjoy organizing schedules and managing the logistical aspects of projects.',
                         'I prefer following established processes and maintaining high standards in my work.',
                         'I find satisfaction in ensuring tasks are completed with precision and accuracy.']
                num = Math.floor(Math.random() * 3);
                ques = qList[num]
                break
        }

        var code =          `
                                <div class="group relative py-8 hover:bg-blue3 flex text-left">
                                    <div class="relative block mx-auto w-[10%]">
                                        <input class="peer relative appearance-none w-[20px] h-5 min-w-[20px] left-1/2 top-1/2 transform -translate-y-1/2 -translate-x-1/2 border rounded border-grey2 cursor-pointer bg-white2 checked:bg-orange1" type="checkbox" onclick="checker(this)" id="${letter}">
                                    </div>
                                    
                                    <span class="relative block mx-auto w-[90%] pr-8 text-gray-700 group-hover:text-white">${ques}</span>
                                    
                                </div>
                            `;

        htmlContent+=code
        
        
    }

    const containerDiv = document.getElementById("opCont");


    // Inject the HTML content into the container div
    containerDiv.innerHTML = htmlContent;
}

function checker(checkbox) {
    // Get the ID of the checkbox
    const checkboxId = checkbox.id;

    // Check if the checkbox is checked
    if (checkbox.checked) {
        selCounter+=1
        selected+=checkboxId;
    }else if (checkbox.checked == false) {
        selCounter = selCounter - 1
        selected = selected.replace(`${checkboxId}`,"");
        subBut.classList.add('bg-grey2', 'text-grey1');
        subBut.classList.remove('bg-blue3', 'text-white1');
    }

    if (selCounter == opCount){
        subBut.classList.add('bg-blue3', 'text-white1');
        subBut.classList.remove('bg-grey2', 'text-grey1');
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

    for (let letter of selected){
        switch (letter){
            case 'R':
                rCount++;
                break
            case 'I':
                iCount++;
                break
            case 'A':
                aCount++;
                break
            case 'S':
                sCount++;
                break
            case 'E':
                eCount++;
                break
            case 'C':
                cCount++;
                break
        }
    }

    finalRes = tempRes+selected;

    console.log(finalRes);

    url = `result?id=${id}&r=${rCount}&i=${iCount}&a=${aCount}&s=${sCount}&e=${eCount}&c=${cCount}&finalRes=${finalRes}`;

    window.location.href = url;
}

document.getElementById('tempResDisplay').textContent = tempRes;
partialInjection(tempRes);
document.getElementById('opCountDisplay').textContent = nword[opCount-1];
optionInjection(options);