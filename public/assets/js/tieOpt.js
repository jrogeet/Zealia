let selected = '';
let selectString = '';



function string(x){
    selectString = '';
    let cont = [];
    if (x.includes('R')){
        selectString = selectString + 'Realistic ';
    }if (x.includes('I')){
        selectString = selectString + 'Investigative ';
    }if (x.includes('A')){
        selectString = selectString + 'Artistic ';
    }if (x.includes('S')){
        selectString = selectString + 'Social ';
    }if (x.includes('E')){
        selectString = selectString + 'Enterprising ';
    }if (x.includes('C')){
        selectString = selectString + 'Conventional ';
    }

    cont = selectString.split(" ");
    cont.pop()

    return(selectString);

}

function select(x,y){
    selected = selected+x;

    if (selected.length > y){
        selected = selected.slice(1,);
    }

    console.log(selected);
    console.log(string(selected));
    document.getElementById('selAtt').innerHTML = 'Currently selected attribute: ' + string(selected);

}

function submit(){

    finalRes = tempRes+selected;

    url = `result?id=${id}&r=${rCount}&i=${iCount}&a=${aCount}&s=${sCount}&e=${eCount}&c=${cCount}&finalRes=${finalRes}`;

    window.location.href = url;
}