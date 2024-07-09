let rCount = 0;
let iCount = 0;
let aCount = 0;
let sCount = 0;
let eCount = 0;
let cCount = 0;
let finalRes = "";
let tempRes = '';
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

    console.log('DEBUG');
    if (tempRes.length > 3){
        let count = tempRes.length;
        let container = '';
        for (let ind = tempRes.length-1; ind >= 0; ind--){
            if ( results[tempRes[ind]] == results[tempRes[ind+1]] ){
                continue;
            }else {
                container = tempRes.slice(0, ind+1);
            }
        }

        console.log('tempRes: ',tempRes,'container: ', container);

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

        finalRes = tempRes.toUpperCase();
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
        tempRes = tempRes+x;
    }

    console.log("topKeys: ", topKeys);
    console.log("topRes: ", topRes);

}

sub.addEventListener("click", submit);

function onClick(){

    if (this.checked){
        if(this.className == 'r'){
            rCount++;
        }else if(this.className == 'i'){
            iCount++;
        }else if(this.className == 'a'){
            aCount++;
        }else if(this.className == 's'){
            sCount++;
        }else if(this.className == 'e'){
            eCount++;
        }else if(this.className == 'c'){
            cCount++;
        }
    }else if (!this.unchecked){
        if(this.className == 'r'){
            rCount--;
        }else if(this.className == 'i'){
            iCount--;
        }else if(this.className == 'a'){
            aCount--;
        }else if(this.className == 's'){
            sCount--;
        }else if(this.className == 'e'){
            eCount--;
        }else if(this.className == 'c'){
            cCount--;
        }
    }
    console.log('r', rCount);
    console.log('i', iCount);
    console.log('a', aCount);
    console.log('s', sCount);
    console.log('e', eCount);
    console.log('c', cCount);
        
};

agrbut.forEach(function(agrbut) {
    agrbut.onclick = onClick;
});

