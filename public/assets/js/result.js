function display(){ //MOSTLY 

    let letters = 'RIASEC';
    for (let i of finalRes){ // find bottom results
        letters = letters.replaceAll(i, "");
    }

    console.log(letters);

    let resultOne = document.getElementById('one');
    let resultTwo = document.getElementById('two');
    let resultThree = document.getElementById('three');
    let results = [resultOne, resultTwo, resultThree];

    for (let index in results){
        let content = []//0 = resName, 1 = resScore, 2 = description

        switch (finalRes[index]){ // get data
            case 'R':
                content.push('Realistic');
                content.push(rCount);
                content.push('Realistic skills are crucial for practical, hands-on tasks. These roles involve coding, testing, debugging, and implementing solutions to ensure operational efficiency.');
                content.push('Top Roles:');
                content.push('System Developer: Engaging in practical tasks such as coding, testing, and debugging software systems.');
                content.push('Principal Investigator (PI): Coordinating research activities, managing resources, and implementing study protocols.');
                break;
            case 'I':
                content.push('Investigative');
                content.push(iCount);
                content.push('The Investigative type is dominant in roles that require extensive research, analytical thinking, and problem-solving. These roles involve designing studies, collecting and interpreting data, and ensuring accuracy and integrity.');
                content.push('Top Roles:');
                content.push('Principal Investigator (PI): Conducting research, analyzing data, and ensuring research integrity.');
                content.push('Research Writer: Conducting extensive research on various topics and transforming complex information into understandable content.');
                break;
            case 'A':
                content.push('Artstic');
                content.push(aCount);
                content.push('The Artistic type plays a significant role in fostering creativity and innovation. These roles involve designing user-friendly interfaces, transforming complex information into understandable content, and developing innovative solutions.');
                content.push('Top Roles:');
                content.push('System Designer: Designing system architectures and software components, conceptualizing and crafting innovative solutions.');
                content.push('Research Writer: Transforming complex information into understandable content with creativity and originality.');
                break;
            case 'S':
                content.push('Social');
                content.push(sCount);
                content.push('Social skills are essential for effective communication, collaboration, and teamwork. These roles involve interacting with team members, stakeholders, and clients, fostering teamwork, and ensuring effective communication.');
                content.push('Top Roles:');
                content.push('Principal Investigator (PI): Collaborating with research staff, sponsors, and stakeholders, emphasizing interpersonal skills.');
                content.push('Research Writer: Interacting with clients, editors, and other stakeholders, emphasizing teamwork and communication.');
                break;
            case 'E':
                content.push('Enterprising');
                content.push(eCount);
                content.push('Enterprising skills are crucial for roles that involve leadership, strategic planning, and effective communication. These roles require managing projects, securing funding, advocating for research, and influencing decision-making processes.');
                content.push('Top Roles:');
                content.push('Principal Investigator (PI): Advocating for research, securing funding, managing project timelines, and leading research teams.');
                content.push('System Designer: Aligning technological decisions with business objectives, communicating effectively through designs, and influencing decision-making.');
                break;
            case 'C':
                content.push('Conventional');
                content.push(cCount);
                content.push('Conventional traits are essential for roles requiring organization, attention to detail, and adherence to established procedures. These roles involve managing budgets, maintaining accurate records, documenting processes, and ensuring regulatory compliance.');
                content.push('Top Roles:');
                content.push('Principal Investigator (PI): Managing budgets, ensuring regulatory compliance, and maintaining precise records.');
                content.push('Research Writer: Writing and editing content, reviewing drafts, and adhering to established writing standards.');
                break;
        }

        let name = document.createElement('h1');
        name.className = "name";
        name.textContent = content[0];

        let score = document.createElement('h1');
        score.className = "score";
        score.textContent = content[1];

        let desc = document.createElement('p');
        desc.className = "resultDesc";
        desc.textContent = content[2];

        let label = document.createElement('p');
        label.className = "topLabel";
        label.textContent = content[3];

        let l1 = document.createElement('li');
        l1.className = "list";
        l1.textContent = content[4];

        let l2 = document.createElement('li');
        l2.className = "list";
        l2.textContent = content[5];

        let container = document.createElement('div');
        container.className = "cont";
        container.appendChild(desc);
        container.appendChild(label);
        container.appendChild(l1);
        container.appendChild(l2);
    
        results[index].appendChild(name);
        results[index].appendChild(score);
        results[index].appendChild(container);
        



    }  

    let bottomOne = document.getElementById('b4');
    let bottomTwo = document.getElementById('b5');
    let bottomThree = document.getElementById('b6');
    let bottomResults = [bottomOne, bottomTwo, bottomThree];

    for (let index in bottomResults){
        let content = []//0 = resName, 1 = resScore, 2 = description

        switch (letters[index]){ // get data
            case 'R':
                content.push('Realistic');
                content.push(rCount);
                content.push('Realistic skills are crucial for practical, hands-on tasks. These roles involve coding, testing, debugging, and implementing solutions to ensure operational efficiency.');
                content.push('Top Roles:');
                content.push('System Developer: Engaging in practical tasks such as coding, testing, and debugging software systems.');
                content.push('Principal Investigator (PI): Coordinating research activities, managing resources, and implementing study protocols.');
                break;
            case 'I':
                content.push('Investigative');
                content.push(iCount);
                content.push('The Investigative type is dominant in roles that require extensive research, analytical thinking, and problem-solving. These roles involve designing studies, collecting and interpreting data, and ensuring accuracy and integrity.');
                content.push('Top Roles:');
                content.push('Principal Investigator (PI): Conducting research, analyzing data, and ensuring research integrity.');
                content.push('Research Writer: Conducting extensive research on various topics and transforming complex information into understandable content.');
                break;
            case 'A':
                content.push('Artstic');
                content.push(aCount);
                content.push('The Artistic type plays a significant role in fostering creativity and innovation. These roles involve designing user-friendly interfaces, transforming complex information into understandable content, and developing innovative solutions.');
                content.push('Top Roles:');
                content.push('System Designer: Designing system architectures and software components, conceptualizing and crafting innovative solutions.');
                content.push('Research Writer: Transforming complex information into understandable content with creativity and originality.');
                break;
            case 'S':
                content.push('Social');
                content.push(sCount);
                content.push('Social skills are essential for effective communication, collaboration, and teamwork. These roles involve interacting with team members, stakeholders, and clients, fostering teamwork, and ensuring effective communication.');
                content.push('Top Roles:');
                content.push('Principal Investigator (PI): Collaborating with research staff, sponsors, and stakeholders, emphasizing interpersonal skills.');
                content.push('Research Writer: Interacting with clients, editors, and other stakeholders, emphasizing teamwork and communication.');
                break;
            case 'E':
                content.push('Enterprising');
                content.push(eCount);
                content.push('Enterprising skills are crucial for roles that involve leadership, strategic planning, and effective communication. These roles require managing projects, securing funding, advocating for research, and influencing decision-making processes.');
                content.push('Top Roles:');
                content.push('Principal Investigator (PI): Advocating for research, securing funding, managing project timelines, and leading research teams.');
                content.push('System Designer: Aligning technological decisions with business objectives, communicating effectively through designs, and influencing decision-making.');
                break;
            case 'C':
                content.push('Conventional');
                content.push(cCount);
                content.push('Conventional traits are essential for roles requiring organization, attention to detail, and adherence to established procedures. These roles involve managing budgets, maintaining accurate records, documenting processes, and ensuring regulatory compliance.');
                content.push('Top Roles:');
                content.push('Principal Investigator (PI): Managing budgets, ensuring regulatory compliance, and maintaining precise records.');
                content.push('Research Writer: Writing and editing content, reviewing drafts, and adhering to established writing standards.');
                break;
        }

        let name = document.createElement('h1');
        name.className = "name";
        name.textContent = content[0];

        let score = document.createElement('h1');
        score.className = "score";
        score.textContent = content[1];

        let desc = document.createElement('p');
        desc.className = "resultDesc";
        desc.textContent = content[2];

        let label = document.createElement('p');
        label.className = "topLabel";
        label.textContent = content[3];

        let l1 = document.createElement('li');
        l1.className = "list";
        l1.textContent = content[4];

        let l2 = document.createElement('li');
        l2.className = "list";
        l2.textContent = content[5];

        let container = document.createElement('div');
        container.className = "cont";
        container.appendChild(desc);
        container.appendChild(label);
        container.appendChild(l1);
        container.appendChild(l2);
    
        bottomResults[index].appendChild(name);
        bottomResults[index].appendChild(score);
        bottomResults[index].appendChild(container);
        



    }  
    

}

display()