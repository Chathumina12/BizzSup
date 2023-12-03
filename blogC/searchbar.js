function search(){
    let filter= document.getElementById('find').value.toUpperCase();
    
    let item = document.querySelectorAll('.raw1 .blogs');

    let l = document.getElementsByTagName('button');
for(var i = 0; i<= l.length; i++){
    let a =item[i].getElementsByTagName('button')[0];

    let value=a.innerHTML || a.innerText | a.textcontent;

    if (value.toUpperCase().indexOf(filter) > -1) {
        item[i].style.display="" ;
    }
    else
    {
        item[i].style.display="none";
    }

}
    
}

