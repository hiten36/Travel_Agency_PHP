const urlParams = new URLSearchParams(window.location.search);
const myParam = urlParams.get('confo');
document.querySelector('.conf-btn').addEventListener('click',(e)=>{
    
    let c1=document.querySelectorAll('.cm-inp1');
    let str1="";
    let str2="";
    for(i of c1)
    {
        if(i.children[0].value=='')
        {
            e.preventDefault();
            i.children[1].style.display='block';
        }
        else{
            i.children[1].style.display='none';
        }
        if(i.children[2].value=='')
        {
            e.preventDefault();
            i.children[3].style.display='block';
        }
        else{
            i.children[3].style.display='none';
        }
        
        str1+=i.children[0].value+'.'+i.children[2].value+'.';
        flag=false;
        let a=document.getElementsByName(i.children[4].children[0].name);
        for(j of a)
        {
            if(j.checked)
            {
                str1+=j.value+"!";
                flag=true;
            }
        }
        if(!flag)
        {
            e.preventDefault();
            i.children[5].style.display='block';
        }
        else{
            i.children[5].style.display='none';
        }
    }
    document.getElementById("hid_conf").value=str1+myParam;
})
let from=myParam.split('_')[0];
let to=myParam.split('_')[1].split('-')[0];
document.getElementById('inp11').value=from;
document.getElementById('inp12').value=to;
document.getElementById('inp13').value=`${myParam.split('_')[1].split('-')[1]}-${myParam.split('_')[1].split('-')[2]}-${myParam.split('_')[1].split('-')[3]}`;
if(document.querySelector('.dis-btn')!=undefined)
{
    document.querySelector('.dis-btn').addEventListener('click',(e)=>{
        let nc=document.createElement('div');
        nc.innerHTML=` <div style="text-align:center;" class="alert-box">
        <p style="margin-bottom:1.5rem;">You have to login before booking ticket. </p>
        <a href="signin" class="home-btn">Login Now</a>
    </div>`;
        e.target.parentNode.appendChild(nc);
    })
}
document.getElementById('l1').addEventListener('click',()=>{
    if(document.getElementById('dark').classList.contains('active')){
        document.getElementById('dark').classList.remove('active');
        document.getElementById('dark').style.display='none';
        document.getElementById('light').classList.add('active');
        document.getElementById('light').style.display='block';
        document.querySelector('.navbar').classList.add('dcolor1');
        document.querySelector('.mid-i').classList.add('dcolor2');
        document.querySelector('.mid-img').classList.add('dcolor3');
        document.querySelector('.logo-a').classList.add('dcolor4');
        document.querySelector('.book-main').classList.add('dcolor2');
        document.querySelector('.confo-main').classList.add('dcolor2');
        document.querySelector('.confo-main1').classList.add('dcolor2');
        for(i of document.querySelectorAll('.home-btn'))
        {
            i.classList.add('dcolor5');
        }
        for(i of document.querySelectorAll('.home21-i'))
        {
            i.classList.add('dcolor2');
        }
        for(i of document.querySelectorAll('.foot-a'))
        {
            i.classList.add('dcolor6');
        }
        for(i of document.querySelectorAll('.mnav'))
        {
            i.classList.add('dcolor1');
        }
        for(i of document.querySelectorAll('.mnav11-i'))
        {
            i.classList.add('dcolor2');
        }
        for(i of document.querySelectorAll('.mnav1-a'))
        {
            i.classList.add('dcolor6');
        }
        for(i of document.querySelectorAll('.results'))
        {
            i.classList.add('dcolor2');
        }
        for(i of document.querySelectorAll('.cm2'))
        {
            i.classList.add('dcolor1');
        }
        document.querySelector('.footer').classList.add('dcolor1');
        document.querySelector('.footer').classList.add('dcolor6');
        document.querySelector('.hiten').classList.add('dcolor4');
        document.querySelector('.home2').classList.add('dcolor1');
        document.querySelector('.logo-img').classList.add('dcolor3');
    }
    else
    {
        document.getElementById('dark').classList.add('active');
        document.getElementById('dark').style.display='block';
        document.getElementById('light').classList.remove('active');
        document.getElementById('light').style.display='none';
        document.querySelector('.navbar').classList.remove('dcolor1');
        document.querySelector('.mid-i').classList.remove('dcolor2');
        document.querySelector('.mid-img').classList.remove('dcolor3');
        document.querySelector('.logo-a').classList.remove('dcolor4');
        document.querySelector('.book-main').classList.remove('dcolor2');
        document.querySelector('.confo-main').classList.remove('dcolor2');
        document.querySelector('.confo-main1').classList.remove('dcolor2');
        for(i of document.querySelectorAll('.home-btn'))
        {
            i.classList.remove('dcolor5');
        }
        for(i of document.querySelectorAll('.home21-i'))
        {
            i.classList.remove('dcolor2');
        }
        for(i of document.querySelectorAll('.foot-a'))
        {
            i.classList.remove('dcolor6');
        }
        for(i of document.querySelectorAll('.mnav'))
        {
            i.classList.remove('dcolor1');
        }
        for(i of document.querySelectorAll('.mnav11-i'))
        {
            i.classList.remove('dcolor2');
        }
        for(i of document.querySelectorAll('.mnav1-a'))
        {
            i.classList.remove('dcolor6');
        }
        for(i of document.querySelectorAll('.results'))
        {
            i.classList.remove('dcolor2');
        }
        for(i of document.querySelectorAll('.cm2'))
        {
            i.classList.remove('dcolor1');
        }
        document.querySelector('.footer').classList.remove('dcolor1');
        document.querySelector('.footer').classList.remove('dcolor6');
        document.querySelector('.hiten').classList.remove('dcolor4');
        document.querySelector('.home2').classList.remove('dcolor1');
        document.querySelector('.logo-img').classList.remove('dcolor3');
    }
})