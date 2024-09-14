let rCount = 0;
let iCount = 0;
let aCount = 0;
let sCount = 0;
let eCount = 0;
let cCount = 0;
let finalRes = "";
let tempRes = '';
let tempArr = [];
let topKeys = [];
let topRes = {};
let arrKeys = [];
let option = '';
let url = '';
let results = { r : rCount,
                i : iCount,
                a : aCount,
                s : sCount,
                e : eCount,
                c : cCount
              };

const agrbut = document.querySelectorAll('input[type=checkbox]'); //selects checkbox element from html
const sub = document.getElementById("sub");


function cal(){
    keySorted = Object.keys(results).sort(function(a,b){return results[a]-results[b]});
    keySorted.reverse();

    for (let x of keySorted){
        arrKeys.push(x);
    }

    for (let x in arrKeys){
        let counter = 0;
        if (topKeys.length < 3){
            topKeys.push(arrKeys[x]);
            counter++;
            continue;
        }
        if (results[arrKeys[x]] == results[arrKeys[+x-1]]){
            topKeys.push(arrKeys[x]);
            counter++;
            continue;
        }
        if (counter == 0){
            break;
        }
    }

    for (let x of topKeys){
        topRes[x] = results[x];
        tempArr.push(x);
    }

    console.log("topKeys: ", topKeys);
    console.log("topRes: ", topRes);
    console.log("tempArr", tempArr);

}

function submit(){
    let location = '';
    results = { r : rCount,
                i : iCount,
                a : aCount,
                s : sCount,
                e : eCount,
                c : cCount
              };
    cal();

    if (tempArr.length > 3){
        let container = '';
        for (let x in tempArr){
            let nextInd = parseInt(x)+1;
            if ( (container.length == 0) && (results[tempArr[x]] > results[tempArr[nextInd]]) ){
                container+=tempArr[x];
                continue;
            } else if (results[tempArr[x]] > results[tempArr[nextInd]] && container.length < 3){
                container+=tempArr[x];
                continue;
            }
        }

        tempRes = tempArr.filter(letter => !container.includes(letter)).join('');

        console.log('tempRes: ',tempRes,'|  container: ', container);

        if (container.length == 0){
            console.log("no cont");
            option = tempRes;
            tempRes = container;
        }else{
            for (let i = 0; i < container.length; i++) {
                //GPT Use replace() to remove all occurrences of the character from tempRes
                tempRes = tempRes.split(container[i]).join('');
            }
            option = tempRes;
            tempRes = container;
        }

        

        tempRes = tempRes.toUpperCase();
        option = option.toUpperCase();

        console.log('post');
        console.log('tempRes:',tempRes);
        console.log('option:',option);

        location = 'tieOpt';
        url = '&r=' + rCount + 
              '&i=' + iCount +
              '&a=' + aCount +
              '&s=' + sCount +
              '&e=' + eCount +
              '&c=' + cCount +
              '&tempRes=' + tempRes +
              '&option=' + option;

    }else{

        for (let i of tempArr){
            finalRes+=i;
        }

        finalRes = finalRes.toUpperCase();
        location = 'result';
        url = '&r=' + rCount + 
              '&i=' + iCount +
              '&a=' + aCount +
              '&s=' + sCount +
              '&e=' + eCount +
              '&c=' + cCount +
              '&finalRes=' + finalRes;
    }

    window.location.href = `${location}?id=${id}`+url;
}

sub.addEventListener("click", submit);

function onClick(){

    if (this.checked){
        if(this.id == 'R'){
            rCount++;
        }else if(this.id == 'I'){
            iCount++;
        }else if(this.id == 'A'){
            aCount++;
        }else if(this.id == 'S'){
            sCount++;
        }else if(this.id == 'E'){
            eCount++;
        }else if(this.id == 'C'){
            cCount++;
        }
    }else if (!this.unchecked){
        if(this.id == 'R'){
            rCount--;
        }else if(this.id == 'I'){
            iCount--;
        }else if(this.id == 'A'){
            aCount--;
        }else if(this.id == 'S'){
            sCount--;
        }else if(this.id == 'E'){
            eCount--;
        }else if(this.id == 'C'){
            cCount--;
        }
    }
    console.log('R', rCount);
    console.log('I', iCount);
    console.log('A', aCount);
    console.log('S', sCount);
    console.log('E', eCount);
    console.log('C', cCount);
        
};

agrbut.forEach(function(agrbut) {
    agrbut.onclick = onClick;
});

