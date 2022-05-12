document.getElementById('l2').addEventListener('click',()=>{
    if(document.querySelector('.mnav-2').classList.contains('mm'))
    {
        document.querySelector('.mnav-2').classList.toggle('mm');
    }
    document.querySelector('.mnav-1').classList.toggle('mm');
})
document.getElementById('l3').addEventListener('click',()=>{
    if(document.querySelector('.mnav-1').classList.contains('mm'))
    {
        document.querySelector('.mnav-1').classList.toggle('mm');
    }
    document.querySelector('.mnav-2').classList.toggle('mm');
})
document.addEventListener('mouseup',(e)=>{
    if(document.querySelector('.mnav-1').classList.contains('mm'))
    {
        if(!document.querySelector('.mnav-1').contains(e.target) && !document.getElementById('l2').contains(e.target))
        {
            document.querySelector('.mnav-1').classList.toggle('mm');
        }
    }
    if(document.querySelector('.mnav-2').classList.contains('mm'))
    {
        if(!document.querySelector('.mnav-2').contains(e.target) && !document.getElementById('l3').contains(e.target))
        {
            document.querySelector('.mnav-2').classList.toggle('mm');
        }
    }
})
for(i of document.querySelector('.mnav3').children)
{
    i.addEventListener('click',()=>{
        document.querySelector('.mnav-2').classList.toggle('mm');
    })
}
document.getElementById('inp11').addEventListener('input',(e)=>{
    let q=e.target.value.toLowerCase();
    let b4=document.querySelector('.results-1');
    for(i of b4.children)
    {
        i.addEventListener('click',(e)=>{
            document.getElementById('inp11').value=e.target.innerText;
            b4.style.display='none';
        })
        if(i.innerText.toLowerCase().includes(q) && q!='')
        {
            b4.style.display='block';
            i.style.display='block';
        }
        else{
            i.style.display='none';
        }
    }
    if(q=='')
    {
        b4.style.display='none';
    }
})
document.getElementById('inp12').addEventListener('input',(e)=>{
    let q=e.target.value.toLowerCase();
    let b4=document.querySelector('.results-2');
    for(i of b4.children)
    {
        i.addEventListener('click',(e)=>{
            document.getElementById('inp12').value=e.target.innerText;
            b4.style.display='none';
        })
        if(i.innerText.toLowerCase().includes(q) && q!='')
        {
            b4.style.display='block';
            i.style.display='block';
        }
        else{
            i.style.display='none';
        }
    }
    if(q=='')
    {
        b4.style.display='none';
    }
})
document.querySelector('.mid-i').addEventListener('input',(e)=>{
    let q=e.target.value.toLowerCase();
    let b4=document.querySelector('.results-0');
    for(i of b4.children)
    {
        i.addEventListener('click',(f)=>{
            
            document.getElementById('inp11').value=f.target.innerText;
            e.target.value="";
            window.location.href="#home2";
            b4.style.display='none';
        })
        if(i.innerText.toLowerCase().includes(q) && q!='')
        {
            b4.style.display='block';
            i.style.display='block';
        }
        else{
            i.style.display='none';
        }
    }
    if(q=='')
    {
        b4.style.display='none';
    }
})
document.getElementById('dest-btn').addEventListener('click',(e)=>{
    if(document.getElementById('inp12').value!='' && document.getElementById('inp11').value!='' && document.getElementById('inp13').value!='')
    {
        e.target.previousElementSibling.value=`${document.getElementById('inp11').value}-${document.getElementById('inp12').value}-${document.getElementById('inp13').value}`;
        e.target.parentNode.submit();
    }
})